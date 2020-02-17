<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Demanda extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->template->show('demanda');
	}

	public function demandaPost()
	{

		$dados = $this->input->post();
		extract($dados);


		$data = [
			'nome' => $nome,
			'sobrenome' => $sobrenome,
			'cpf' => somenteNumeros($cpf),
			'email' => $email,
			'telefone' => somenteNumeros($telefone),
			'senha' => $senha,
			'status' => 1,
			'inclusao' => getDataAtual(),
			'alteracao' => getDataAtual()			
		];
		
		
	}

	

	
	
}
