<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$usuario_model = $this->load->model('usuario_model');

	}

	public function index()
	{
		$dados['usuarios'] = $this->usuario_model->get_usuarios();
		$this->template->show('usuario');
	}

	public function cadastro()
	{
		$dados['acao'] = 'inserir';
		$this->template->show('cadastro/usuario',$dados);
	}

	public function usuarioPost()
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
			'inclusao' => getDataAtual()				
		];

		$this->usuario_model->insert_usuario($data);
		
		
	}

	

	
	
}
