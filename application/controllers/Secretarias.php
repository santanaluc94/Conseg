<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Secretarias extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$secretaria_model = $this->load->model('secretaria_model');	
	}

	public function index()
	{
		$dados['secretarias'] = $this->secretaria_model->get_secretarias();
		
		$this->template->show('secretaria',$dados);
	}

	public function cadastro()
	{
		$dados['acao'] = 'inserir';
		$dados['consegs'] = $this->conseg_model->get_consegs();
		$this->template->show('cadastro/secretaria',$dados);
	}

	public function editar($id)
	{
		$dados['acao'] = 'editar';
		$dados['secretaria'] = $this->secretaria_model->get_secretaria($id);
		$dados['consegs'] = $this->conseg_model->get_consegs();
		$this->template->show('cadastro/secretaria',$dados);
	}

	public function secretariaPost($id = null)
	{

		$dados = $this->input->post();
		extract($dados);


		$data = [
			'conseg' => $conseg,
			'titulo' => $titulo,
			'nome' => $nome,
			'email' => $email,
			'celular' => somenteNumeros($celular)
				
		];
		
		if($acao == "inserir"){
			$this->secretaria_model->insert_secretaria($data);
			$this->session->set_flashdata('mensagem', 'Secretaria cadastrada com sucesso !!!');
		}

		if($acao == "editar"){
			$this->secretaria_model->update_secretaria($id,$data);
			$this->session->set_flashdata('mensagem', 'Secretaria editada com sucesso !!!');
		}

		redirect("Secretarias/index");
	}

	

	
	
}
