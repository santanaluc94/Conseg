<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$candidato_model = $this->load->model('candidato_model');	
		$conseg_model = $this->load->model('conseg_model');	
		$login_model = $this->load->model('login_model');
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function solicitar_acesso()
	{
		$dados = $this->input->post();
		extract($dados);

		if(isset($acao) && $acao == "inserir"){			
			$data = [
				'nome' => $nome,
				'email' => $email,
				'cpf' => somenteNumeros($cpf),				
				'telefone' => somenteNumeros($telefone),
				'conseg' => $conseg
			];

			if($this->candidato_model->insert_candidato($data) == true){
				$this->session->set_flashdata('mensagem', "Olá ".$nome." , sua solicitação foi enviada com sucesso. Aguarde os dados de acesso no seu e-mail: ".$email);
				redirect("login/mensagem");
			}else if($this->candidato_model->insert_candidato($data) == "erro"){
				$this->session->set_flashdata('mensagem', "Ocorreu um erro ao efetuar solicitação. Tente novamente mais tarde.");
				redirect("login/mensagem");
			}else{
				$this->session->set_flashdata('mensagem', "Olá ".$nome." , esta solicitação já foi enviada posteriormente. Aguarde os dados de acesso no seu e-mail: ".$email);
				redirect("login/mensagem");
			}

		}else{
			$dados['consegs'] = $this->conseg_model->get_consegs();
			$this->load->view('candidatos/solicitar_acesso',$dados);
			$this->load->view('scripts.php');
		}

		
	}

	public function mensagem(){

		$this->load->view("candidatos/mensagem");
	}
	

	public function efetuarLogin(){

		$dados = $this->input->post();
		extract($dados);

		$usuario = $this->login_model->efetuar_login($email,$senha);

		if($usuario !== false){			

			$newdata = array(
				'id' => $usuario->USUIDUSUARIO,
				'nome'  => $usuario->USUNOME,
				'email'     => $usuario->USUEMAIL,
				'relatorios' => $usuario->USURELATORIOS,
				'administrador' => $usuario->USUADMINISTRADOR,
				'logged_in' => TRUE
			);
		
			//print_r($newdata);
			//exit;

			$this->session->set_userdata($newdata);

			redirect("Demandas/lista/1");

		}else{
			$this->session->set_flashdata('mensagem',"Usuário e/ou senha incorretos.");
			redirect("Login");
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect("Login");
	}
}
