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
		$historico_model = $this->load->model('historico_model');
		$this->load->library('viacep');
		$login_model = $this->load->model('login_model');

		if($this->login_model->is_logged_in() == false){
			redirect("Login");
		}
	}

	public function index()
	{
		$dados['status'] = $this->status_model->get_all_status();
		$dados['demandas'] = $this->demanda_model->get_demandas();
		$this->template->show('demanda',$dados);
	}

	public function lista($status)
	{
		$dados['status'] = $this->status_model->get_all_status();
		$dados['demandas'] = $this->demanda_model->get_demandas_status($status);
		$dados['status_lista'] = $this->status_model->get_status($status);		

		$this->template->show('demanda',$dados);
	}

	public function cadastro($cidadao = null)
	{

		$dados['acao'] = 'inserir';
		$dados['cidadao_selecionado'] = $cidadao;
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
		$dados['status'] = $this->status_model->get_all_status();

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
		$this->historico_model->insert_historico(99,$id,1);

		$this->comentar($id);
		
	}

	public function inativar($id,$status)
	{
		$this->demanda_model->inativar_demanda($id);
		$this->historico_model->insert_historico(0,$id,1);
		$this->session->set_flashdata('mensagem', 'Demanda inativada com sucesso !!!');

		redirect("Demandas/lista/".$status);
		
	}

	public function demandaPost($id = null)
	{

		$dados = $this->input->post();
		extract($dados);


		$data = [
			'cidadao' => $cidadao,
			'data' => $data,
			'horario' => $horario,
			'status' => $status,
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
			$demanda = $this->demanda_model->insert_demanda($data);
			$this->historico_model->insert_historico(1,$demanda,1);
			$this->session->set_flashdata('mensagem', 'Demanda cadastrada com sucesso !!!');
		}

		if($acao == "editar"){
			$demanda = $this->demanda_model->update_demanda($id,$data);
			$this->historico_model->insert_historico($status,$id,1);
			$this->session->set_flashdata('mensagem', 'Demanda editada com sucesso !!!');
		}

		redirect("Demandas/lista/1");


	}

	public function buscarCep()
	{
		$cep = $this->input->post('cep');
		$cep = somenteNumeros($cep);
		$cep = $this->viacep->buscarCEP($cep);
		echo json_encode( $cep );
	}

	public function enviarEmail($demanda){

		$demanda = $this->demanda_model->get_demanda($demanda);

		$this->email->from("wellingtonfinazzi@gmail.com", 'Meu E-mail');
		$this->email->subject("CONSEG do Usuário - Demanda para".$demanda->SECRETARIA);
		//$this->email->reply_to("consegdousuario@conseguarulhos.com");
		$this->email->to($demanda->SECRETARIAEMAIL); 
		//$this->email->cc('email_copia@dominio.com');
		//$this->email->bcc('email_copia_oculta@dominio.com');
		$this->email->message("
		<h1>CONSEG do Usuário - Demanda para ".$demanda->SECRETARIA."</h1>
		<h2>".$demanda->DEMDATA." - ".$demanda->DEMHORA."</h2>
		<p>".$demanda->CIDNOME." diz: ".$demanda->DEMTEXTO."</p>");
		$this->email->send();
		if($this->email->send()){
			redirect("Demandas/lista/".$demanda->STAIDSTATUS);
		}else {
			redirect("Demandas/lista/".$demanda->STAIDSTATUS);
		}
	}

	
	
}
