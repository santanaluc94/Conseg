<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Index extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$login_model = $this->load->model('login_model');

		if($this->login_model->is_logged_in() == false){
			redirect("Login");
		}
	}

	public function index()
	{
		$this->template->show('index');
	}
}
