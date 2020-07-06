<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('id')) {
            //redirect('app');
        }
        $this->load->model('user_model');
        $this->load->library('form_validation');
        $this->load->library('encrypt');
    }

    public function index()
    {
        $this->data['subview'] = 'home/index';
        $this->load->view('template/index', $this->data);
    }
    public function about()
    {
        $this->data['subview'] = 'home/about';
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
                    $this->session->set_flashdata('erroOk', $result);
                }
            } else {
                $this->session->set_flashdata('erroOk', "Credencial não encontrada!");
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
                'is_email_verified' => 1,
                'verification_key' => $verification_key
            );
            $id = $this->user_model->insert($data);
        } else {
            $this->session->set_flashdata('erroOk', 'E-mail já foi utilizado.');
        }
        redirect('home');
    }

    function find_city()
    {
        $city = $this->input->post('localidade');
        $state = $this->input->post('uf');

        $this->data['localidade'] = $city;
        $this->data['uf'] = $state;

        $this->load->model('empreendimento_model');
        $this->data['fetch_data'] = $this->empreendimento_model->city_state($city, $state);

        $this->data['subview'] = 'home/find_city';
        $this->load->view('template/index', $this->data);
    }

    public function kitchen($id)
    {
        $this->load->model('empreendimento_model');
        $this->data['fetch_data'] = $this->empreendimento_model->find($id);

        $this->data['subview'] = 'home/kitchen';
        $this->load->view('template/index', $this->data);
    }

}
