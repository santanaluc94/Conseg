<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$usuario_model = $this->load->model('usuario_model');
		$candidato_model = $this->load->model('candidato_model');
		$conseg_model = $this->load->model('conseg_model');
		$status_model = $this->load->model('status_model');
		$login_model = $this->load->model('login_model');

		if($this->login_model->is_logged_in() == false){
			redirect("Login");
		}
		


	}

	public function index()
	{
		$dados['usuarios'] = $this->usuario_model->get_usuarios();
		$dados['candidatos'] = $this->candidato_model->get_candidatos();		
		$this->template->show('usuario',$dados);
	}

	public function cadastro()
	{
		$dados['acao'] = 'inserir';
		$dados['consegs'] = $this->conseg_model->get_consegs();
		$this->template->show('cadastro/usuario',$dados);
	}

	public function editar($id)
	{
		$dados['acao'] = 'editar';
		$dados['usuario'] = $this->usuario_model->get_usuario($id);
		$dados['consegs'] = $this->conseg_model->get_consegs();

		// echo "<pre>";
		// print_r($dados);
		// exit;

		$this->template->show('cadastro/usuario',$dados);
	}

	public function usuarioPost($id = null)
	{

		$dados = $this->input->post();
		extract($dados);		

		if($acao == "inserir"){

			$data = [
				'id' => $id,
				'relatorio' => $relatorio,
				'administrador' => $administrador,
				'idconseg' => $id_conseg						
			];

			$usuario = $this->usuario_model->insert_usuario($data);

			if($usuario !== false){			
				$this->enviarEmail($usuario);
				$this->session->set_flashdata('mensagem', 'Usuário cadastrado com sucesso !!!');
				redirect("usuarios/index");
			}else{
				$this->session->set_flashdata('mensagem_erro', 'Erro ao cadastrar usuário  !!!');
				redirect("usuarios/index");
			}
		
		}

		if($acao == "editar"){

			$data = [
				'id' => $id,
				'nome' => $nome,
				'email' => $email,
				'cpf' => somenteNumeros($cpf),
				'telefone' => somenteNumeros($telefone),
				'relatorios' => $relatorios,
				'administrador' => $administrador,
				'id_conseg' => $id_conseg						
			];

			if ($this->usuario_model->update_usuario($id,$data) == true) {
				$this->session->set_flashdata('mensagem', 'Usuário editado com sucesso !!!');
			}else{
				$this->session->set_flashdata('mensagem', 'Erro ao editar o usuário.');
			}

			//echo $this->db->last_query();
			//exit;
			
		}
		
		redirect("Usuarios");
		
	}

	public function excluirCandidato()
	{
		$dados = $this->input->post();
		extract($dados);

		if($this->candidato_model->excluirCandidato($id) == true){
			$this->session->set_flashdata('mensagem', 'Candidato excluído com sucesso !!!');
			redirect("usuarios/index");
		}else{
			$this->session->set_flashdata('mensagem', 'Candidato excluído com sucesso !!!');
			redirect("usuarios/index");
		}
	}

	public function inativar($id)
	{
		$this->usuario_model->inativar_usuario($id);
		$this->session->set_flashdata('mensagem', 'Usuario inativado com sucesso !!!');
		redirect("Usuarios/index");
	}

	public function ativar($id)
	{
		$this->usuario_model->ativar_usuario($id);
		$this->session->set_flashdata('mensagem', 'Usuario ativado com sucesso !!!');
		redirect("Usuarios/index");
	}


	public function enviarEmail($usuario){

		/*
		$config['smtp_host'] = 'smtp.gmail.com';
		$config['smtp_port'] = '465';
		$config['smtp_user'] = 'wellingtonfinazzi@gmail.com';
		$config['smtp_pass'] = 'Grotkowsk2';
		$config['protocol']  = 'smtp';
		$config['validate']  = TRUE;
		$config['mailtype']  = 'html';
		$config['charset']   = 'iso-8859-1';
		$config['newline']   = "\r\n";
		*/

		$this->load->library('email');

		$config = array();  
		$config['protocol'] = 'mail';  
		$config['smtp_host'] = 'mail.consegguarulhos.com';
		$config['smtp_user'] = '_mainaccount@consegguarulhos.com';  
		$config['smtp_pass'] = 'Cal2019#@!';  
		$config['smtp_port'] = 587;  
		$config['validate']  = TRUE;
		$config['mailtype']  = 'html';
		$config['charset']   = 'utf-8';
		$config['newline']   = "\r\n";

		$this->email->initialize($config);  
  
		$this->email->set_newline("\r\n");  

		

		
		$this->email->from("_mainaccount@consegguarulhos.com", 'CONSEG Guarulhos');
		$this->email->subject("CONSEG Guarulhos - Usuário e Senha");
		//$this->email->reply_to("consegdousuario@conseguarulhos.com");
		$this->email->to($usuario["email"]); 
		//$this->email->cc('email_copia@dominio.com');
		//$this->email->bcc('email_copia_oculta@dominio.com');
		$this->email->message("
		<h1> CONSEG Guarulhos </h1>
		<h2> Dados de Acesso </h2>
		<p>Segue os dados de acesso para o sistema do CONSEG Guarulhos</p><br>
		<p><strong>Email: </strong>".$usuario['email']."</p><br>
		<p><strong>Senha: </strong>".$usuario['senha']."</p><br>
		<p>Qualquer dúvida responder este email</p>");
		$this->email->send();		

		$this->email->print_debugger();
		
	}

	

	
	
}
