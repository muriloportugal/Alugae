<?php
defined('BASEPATH') or exit('No direct script access allowed');

class App extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id')) {
			redirect('home');
		}
	}

	public function index()
	{
		$this->data['subview'] = 'app/index';
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

}
