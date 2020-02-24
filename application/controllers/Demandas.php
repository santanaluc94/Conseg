<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Demandas extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$demanda_model = $this->load->model('demanda_model');
		$cidadao_model = $this->load->model('cidadao_model');
		$secretaria_model = $this->load->model('secretaria_model');
		$comentario_model = $this->load->model('comentario_model');
		$status_model = $this->load->model('status_model');
	}

	public function index()
	{
		$dados['demandas'] = $this->demanda_model->get_demandas();
		$this->template->show('demanda',$dados);
	}

	public function cadastro()
	{
		$dados['acao'] = 'inserir';
		$dados['cidadaos'] = $this->cidadao_model->get_cidadaos();
		$dados['secretarias'] = $this->secretaria_model->get_secretarias();
		$this->template->show('cadastro/demanda',$dados);
	}

	public function editar($id)
	{
		$dados['acao'] = 'editar';		
		$dados['demanda'] = $this->demanda_model->get_demanda($id);
		$dados['cidadaos'] = $this->cidadao_model->get_cidadaos();
		$dados['secretarias'] = $this->secretaria_model->get_secretarias();
		$this->template->show('cadastro/demanda',$dados);
	}

	public function comentar($id)
	{
		$dados['acao'] = 'comentar';
		$demanda = $this->demanda_model->get_demanda($id);
		$dados['demanda'] = $demanda;
		$dados['comentarios'] = $this->comentario_model->get_comentarios($id);
		$dados['cidadao'] = $this->cidadao_model->get_cidadao($demanda->CIDIDCIDADAO);
		$dados['secretaria'] = $this->secretaria_model->get_secretaria($demanda->SECIDSECRETARIA);

		$this->template->show('comentarios/demanda',$dados);
	}

	public function inserir_comentario($id)
	{
		$dados = $this->input->post();
		extract($dados);

		$data = [
			'demanda' => $id,
			'usuario' => 1,
			'data' => date("Y-m-d"),
			'horario' => date("H:i"),
			'texto' => $texto_comentario
		];
			
		$this->comentario_model->insert_comentario($data);

		$this->comentar($id);
		
	}

	public function demandaPost($id = null)
	{

		$dados = $this->input->post();
		extract($dados);


		$data = [
			'cidadao' => $cidadao,
			'data' => $data,
			'horario' => $horario,
			'secretaria' => $secretaria,
			'privacidade' => (isset($privacidade)) ? $privacidade : 0,
			'cep' => somenteNumeros($cep),
			'endereco' => $endereco,
			'bairro' => $bairro,
			'cidade' => $cidade,		
			'uf' => $uf,
			'complemento' => $complemento,
			'texto_demanda' => $texto_demanda		
		];
		
		if($acao == "inserir"){
			$this->demanda_model->insert_demanda($data);
			$this->session->set_flashdata('mensagem', 'Demanda cadastrada com sucesso !!!');
		}

		if($acao == "editar"){
			$this->demanda_model->update_demanda($id,$data);
			$this->session->set_flashdata('mensagem', 'Demanda editada com sucesso !!!');
		}

		redirect("Demandas/index");


	}

	

	
	
}
