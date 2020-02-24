<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Consegs extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$conseg_model = $this->load->model('conseg_model');
	}

	public function index()
	{
		$dados['consegs'] = $this->conseg_model->get_consegs();
		$this->template->show('conseg',$dados);
	}

	public function cadastro()
	{
		$dados['acao'] = 'inserir';
		$this->template->show('cadastro/conseg',$dados);
	}

	public function editar($id)
	{
		$dados['acao'] = 'editar';
		$dados['conseg'] = $this->conseg_model->get_conseg($id);
		$this->template->show('cadastro/conseg',$dados);
	}

	public function consegPost($id = null)
	{

		$dados = $this->input->post();
		extract($dados);


		$data = [
			'titulo' => $titulo,
			'presidente_nome' => $nome,
			'presidente_email' => $email,			
			'presidente_telefone' => somenteNumeros($celular),					
		];

		if($acao == "inserir"){
			$this->conseg_model->insert_conseg($data);
			$this->session->set_flashdata('mensagem', 'CONSEG cadastrado com sucesso !!!');
		}

		if($acao == "editar"){
			$this->conseg_model->update_conseg($id,$data);
			$this->session->set_flashdata('mensagem', 'CONSEG editado com sucesso !!!');
		}

		redirect("Consegs/index");
		
		
	}

	

	
	
}
