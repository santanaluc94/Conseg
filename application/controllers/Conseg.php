<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Conseg extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$conseg_model = $this->load->model('conseg_model');
	}

	public function index()
	{
		$this->template->show('conseg');
	}

	public function consegPost()
	{

		$dados = $this->input->post();
		extract($dados);


		$data = [
			'titulo' => $titulo,
			'presidente_nome' => $nome,
			'presidente_email' => $email,			
			'presidente_telefone' => somenteNumeros($celular),					
		];

		$this->conseg_model->insert_conseg($data);
		
		
	}

	

	
	
}
