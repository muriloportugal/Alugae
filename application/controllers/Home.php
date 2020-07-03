<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('id')) {
			redirect('app');
		}
		$this->load->model('user_model');
		$this->load->library('form_validation');
		$this->load->library('encrypt');
	}

	public function index()
	{
		$this->data['subview'] = 'home/login';
		$this->load->view('template/index', $this->data);
	}

	public function login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		if ($email != '' && $password != '') {
			$this->form_validation->set_rules('email', 'E-mail', 'required|trim|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required');
			if ($this->form_validation->run()) {
				$result = $this->user_model->login($email, $password);
				if ($result == '') {
					redirect('app');
				} else {
					echo $result;
					$this->session->set_flashdata('erro', $result);
				}
			} else {
				$this->session->set_flashdata('erro', "Credencial não encontrada!");
			}
			redirect('home');
		}

		$this->data['subview'] = 'home/login';
		$this->load->view('template/index', $this->data);
	}

	public function forgot()
	{
		$email = $this->input->post('email');
		if ($email != '') {
			$result = $this->user_model->user_email($email);
			if ($result->num_rows() == 1) {
				$this->session->set_flashdata('successOk', 'E-mail enviado para, ' . $email);
				redirect('home');
			} else {
				$this->session->set_flashdata('erroOk', 'E-mail ' . $email . ' não encontrado.');
			}
		}
		$this->data['subview'] = 'home/forgot';
		$this->load->view('template/index', $this->data);
	}

	public function account()
	{
		$this->data['subview'] = 'home/account';
		$this->load->view('template/index', $this->data);
	}

	function register()
	{
		$this->form_validation->set_rules('name', 'Nome', 'required|trim');
		$this->form_validation->set_rules('email', 'E-mail', 'required|trim|valid_email|is_unique[tbl_user.email]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run()) {
			$verification_key = md5(rand());
			$encrypted_password = $this->encrypt->encode($this->input->post('password'));
			$data = array(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'password' => $encrypted_password,
				'verification_key' => $verification_key
			);
			$id = $this->user_model->insert($data);
			if ($id > 0) {
				$envioEmail = $this->send_email($verification_key);
				if ($envioEmail) {
					$this->session->set_flashdata('message', 'Abra seu e-mail para receber e-mail de verificação');
				} else {
					$this->session->set_flashdata('erro', 'Erro ao enviar o e-mail de verificação');
				}
			}
		} else {
			$this->session->set_flashdata('erro', 'E-mail já foi utilizado.');
		}
		redirect('home');
	}

	function send_email($verification_key)
	{

		$message = "
    <p>Olá " . $this->input->post('user_name') . ".</p>
    <p>Este é um email de verificação do sistema Educação em Diabetes. Para concluir o processo registro e login no sistema clique neste <a href='" . base_url() . "home/verify_email/" . $verification_key . "'>link</a>.</p>
    <p>Depois de clicar neste link, seu email será verificado e você poderá fazer login no sistema.</p>
    <p>Obrigado, a equipe Educação em Diabetes agradece.</p>
    ";
		$subject = "Verificar e-mail portal Educação em Diabetes";
		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'webcrp.com',
			'smtp_port' => 587,
			'smtp_user' => 'contato@educacaoemdiabetes.com',
			'smtp_pass' => 'Evento001',
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'wordwrap' => TRUE
		);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from('Educação em Diabetes <contato@educacaoemdiabetes.com>');
		$this->email->to($this->input->post('user_email'));
		$this->email->subject($subject);
		$this->email->message($message);

		return $this->email->send();
	}

	function verify_email()
	{
		if ($this->uri->segment(3)) {
			$verification_key = $this->uri->segment(3);
			if ($this->register_model->verify_email($verification_key)) {
				$this->session->set_flashdata('message', 'Seu e-mail foi verificado com sucesso, agora você pode fazer o login!');
			} else {
				$this->session->set_flashdata('message', 'Link inválido, por favor verifique.');
			}
		}
		redirect('home');
	}

}
