<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cidadaos extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$cidadao_model = $this->load->model('cidadao_model');
		$conseg_model = $this->load->model('conseg_model');
		$status_model = $this->load->model('status_model');
		$secretaria_model = $this->load->model('secretaria_model');
		$login_model = $this->load->model('login_model');

		if($this->login_model->is_logged_in() == false){
			redirect("Login");
		}

	}

	public function index()
	{
		$dados['cidadaos'] = $this->cidadao_model->get_cidadaos();
		$this->template->show('cidadao',$dados);
	}

	public function cadastro()
	{
		$dados['consegs'] = $this->conseg_model->get_consegs();
		$dados['secretarias'] = $this->secretaria_model->get_secretarias();
		$dados['acao'] = 'inserir';
		$this->template->show('cadastro/cidadao',$dados);
	}

	public function editar($id)
	{
		$dados['consegs'] = $this->conseg_model->get_consegs();
		$dados['secretarias'] = $this->secretaria_model->get_secretarias();
		$dados['cidadao'] = $this->cidadao_model->get_cidadao($id);
		$dados['acao'] = 'editar';
		$this->template->show('cadastro/cidadao',$dados);
	}

	public function inativar($id)
	{
		$this->cidadao_model->inativar_cidadao($id);
		$this->session->set_flashdata('mensagem', 'Cidadão inativado com sucesso !!!');
		redirect("Cidadaos/index");
	}

	public function cidadaoPost($id = null)
	{

		$dados = $this->input->post();
		extract($dados);

		$data = [
			'id_conseg' => $conseg,
			'nome' => $nome,
			'email' => $email,
			'celular' => somenteNumeros($celular)						
		];

		if($acao == "inserir"){
			$cidadao = $this->cidadao_model->insert_cidadao($data);
			$this->session->set_flashdata('mensagem', 'Cidadão cadastrado com sucesso !!! Deseja adicionar demanda para esse cidadão ?');
			$this->session->set_flashdata('cidadao', $cidadao);
		}

		if($acao == "editar"){
			$this->cidadao_model->update_cidadao($id,$data);
			$this->session->set_flashdata('mensagem', 'Cidadão editado com sucesso !!! Deseja adicionar demanda para esse cidadão ?');
			$this->session->set_flashdata('cidadao', $id);
		}	

		redirect("Cidadaos/index");
		
	}

	

	
	
}
