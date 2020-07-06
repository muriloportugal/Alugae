<?php
defined('BASEPATH') or exit('No direct script access allowed');

class App extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id')) {
			redirect('home/login');
		}
	}

    public function index()
    {
        $this->data['subview'] = 'home/index';
        $this->load->view('template/index', $this->data);
    }

    public function banco()
    {
        $this->data['subview'] = 'app/banco';
        $this->load->view('template/index', $this->data);
    }

	function logout()
	{
		$this->load->model('user_model');
		$this->user_model->logout();
		redirect('app');
	}

	public function users()
	{
		$this->load->model('user_model');
		$this->data['fetch_data'] =$this->user_model->fetch();

		$this->data['subview'] = 'app/users';
		$this->load->view('template/index', $this->data);
	}

    public function request($id)
    {
        $this->load->model('aluguel_model');
        $data = array(
            'locador_id' => $this->session->userdata('id'),
            'empreendimento_id' => $id,
            'dt_created' => date('Y-m-d H:i:s'),
        );
        $this->aluguel_model->insert($data);

        $this->session->set_flashdata('successOk', 'Solicitação efetuada, aguardando aprovação.');

        redirect('home');

    }

    public function rent()
    {
        $this->load->model('aluguel_model');
        $this->data['fetch_data'] =$this->aluguel_model->fetch_user($this->session->userdata('id'));

        $this->data['subview'] = 'app/rent';
        $this->load->view('template/index', $this->data);
    }

    public function rent_upd()
    {
        $op = $this->input->post('op');
        if ($op == 2) {
            $this->load->model('aluguel_model');
            $this->data['fetch_data'] = $this->aluguel_model->delete($this->input->post('id'));
        }
        redirect('app/rent');
    }

    public function kitchen()
    {
        $this->load->model('empreendimento_model');
        $this->data['fetch_data'] =$this->empreendimento_model->find_user($this->session->userdata('id'));

        $this->data['subview'] = 'app/kitchen';
        $this->load->view('template/index', $this->data);
    }

    public function kitchen_upd()
    {
        $this->load->model('empreendimento_model');
        $op = $this->input->post('op');
        //$auxDate = implode('-', array_reverse(explode('/', $this->input->post('date'))));
        if ($op == 1) {
            $data = array(
                'user_id' => $this->session->userdata('id'),
                'nome_fantasia' => $this->input->post('nome'),
                'telefone_comercial' => $this->input->post('telefone'),
                'descricao_breve' => $this->input->post('descricao'),
                'inventario' => $this->input->post('inventario'),
                'foto' => $this->input->post('foto'),
                'CNPJ_CPF' => $this->input->post('cnpj'),
                'cep' => $this->input->post('cep'),
                'cidade' => $this->input->post('cidade'),
                'uf' => $this->input->post('uf'),
                'endereco' => $this->input->post('logradouro'),
                'numero' => $this->input->post('numero'),
                'dt_created' => date('Y-m-d H:i:s'),
            );
            $this->empreendimento_model->insert($data);
            $this->session->set_flashdata('successOk', 'Empreendimento inserido!');
        } elseif ($op == 2) {
            $data = array(
                'nome_fantasia' => $this->input->post('nome'),
                'telefone_comercial' => $this->input->post('telefone'),
                'descricao_breve' => $this->input->post('descricao'),
                'inventario' => $this->input->post('inventario'),
                'foto' => $this->input->post('foto'),
                'CNPJ_CPF' => $this->input->post('cnpj'),
                'cep' => $this->input->post('cep'),
                'cidade' => $this->input->post('cidade'),
                'uf' => $this->input->post('uf'),
                'endereco' => $this->input->post('logradouro'),
                'numero' => $this->input->post('numero'),
                'alugado' => ($this->input->post('status') ==''? 1:0),
                'dt_updated' => date('Y-m-d H:i:s'),
            );
            $this->empreendimento_model->update($data, $this->input->post('id'));
            $this->session->set_flashdata('successOk', 'Empreendimento atualizado!');
        } elseif ($op == 3) {
            $this->empreendimento_model->delete($this->input->post('id'));
            $this->session->set_flashdata('successOk', 'Empreendimento removido!');
        }

        redirect('app/kitchen');
    }

    public function approve()
    {
        $this->load->model('aluguel_model');
        $this->data['fetch_data'] =$this->aluguel_model->fetch_request($this->session->userdata('id'));

        $this->data['subview'] = 'app/approve';
        $this->load->view('template/index', $this->data);
    }

    public function approve_upd()
    {
        $op = $this->input->post('op');
        if ($op == 1) {
            $this->load->model('empreendimento_model');
            $data = array(
                'alugado' => 1,
                'dt_updated' => date('Y-m-d H:i:s'),
            );
            $this->empreendimento_model->update($data, $this->input->post('empreendimento'));

            $this->load->model('aluguel_model');
            $data = array(
                'aprovado' => 1,
                'dt_updated' => date('Y-m-d H:i:s'),
            );
            $this->data['fetch_data'] = $this->aluguel_model->update($data, $this->input->post('id'));

            $this->session->set_flashdata('successOk', 'Solicitação aprovada.');
        }
        if ($op == 2) {
            $this->load->model('aluguel_model');
            $data = array(
                'aprovado' => 3,
                'dt_updated' => date('Y-m-d H:i:s'),
            );
            $this->aluguel_model->update($data, $this->input->post('id'));
            $this->session->set_flashdata('successOk', 'Solicitação negada.');
        }
        redirect('app/approve');
    }

}
