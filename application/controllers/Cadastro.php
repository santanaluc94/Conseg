<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cadastro extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index(): void
	{
		$this->template->show('cadastro');
	}

	public function cadastroPost(): void
	{
		$data = [
			'nome' => $this->input->post('nome'),
			'sobrenome' => $this->input->post('sobrenome'),
			'cpf' => $this->input->post('cpf'),
			'email' => $this->input->post('email'),
			'telefone' => $this->input->post('telefone'),
			'senha' => $this->input->post('senha'),
			'status' => 1,
			'inclusao' => $this->getDataAtual(),
			'alteracao' => $this->getDataAtual(),
			'acesso' => 'usuario',
			'relatorio' => 'teste'
		];

		$data = $this->validadorDeCampos($data);

		var_dump($data);
		die;

		// 	if ($this->users->saveUser($data)) {
		// 		$id = $this->db->insert_id();
		// 		$userData = $this->users->getDataById($id);
		// 		$this->session->set_userdata("userData", $userData[0]);

		// 		redirect('user/dashboard');
		// 	}

		// 	redirect('/guest/register?error=userExist');
	}

	public function validadorDeCampos(array $data)
	{
		$camposInvalidos = '';

		if (empty($data['nome'])) {
			$camposInvalidos = "nome";
		}

		if (empty($data['sobrenome'])) {
			if (empty($camposInvalidos)) {
				$camposInvalidos = "sobrenome";
			} else {
				$camposInvalidos .= "&sobrenome";
			}
		}

		if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
			if (empty($camposInvalidos)) {
				$camposInvalidos = "email";
			} else {
				$camposInvalidos .= "&email";
			}
		}

		if ($this->validadorDeCpf($data['cpf'])) {
			$data['cpf'] = $this->validadorDeCpf($data['cpf']);
		} else {
			if (empty($camposInvalidos)) {
				$camposInvalidos = "cpf";
			} else {
				$camposInvalidos .= "&cpf";
			}
		}

		if ($this->validadorDeTelefone($data['telefone'])) {
			$data['telefone'] = $this->validadorDeTelefone($data['telefone']);
		} else {
			if (empty($camposInvalidos)) {
				$camposInvalidos = "telefone";
			} else {
				$camposInvalidos .= "&telefone";
			}
		}

		if ($this->validadorDeSenha($data['senha'])) {
			$data['senha'] = password_hash($data['senha'], PASSWORD_BCRYPT);
		} else {
			if (empty($camposInvalidos)) {
				$camposInvalidos = "senha";
			} else {
				$camposInvalidos .= "&senha";
			}
		}

		if (empty($camposInvalidos)) {
			return $data;
		}

		redirect('/cadastro?error=' . $camposInvalidos);
	}

	protected function validadorDeCpf(string $cpf)
	{
		if (strlen($cpf) === 14) {

			$removingDots = str_replace(".", "", $cpf);
			$formattedCpf = str_replace("-", "", $removingDots);

			return $formattedCpf;
		}

		return false;
	}

	protected function validadorDeTelefone(string $telefone)
	{
		if (strlen($telefone) == 14 || strlen($telefone) == 15) {
			$removendoTraco = str_replace("-", "", $telefone);
			$removendoPrimeiroParenteses = str_replace("(", "", $removendoTraco);
			$telefone = str_replace(") ", "-", $removendoPrimeiroParenteses);

			return $telefone;
		}

		return false;
	}

	protected function validadorDeSenha(string $senha): bool
	{
		$confirmarSenha = $this->input->post('confirmar-senha');

		if ($senha === $confirmarSenha) {
			return true;
		}

		return false;
	}

	protected function getDataAtual(): string
	{
		date_default_timezone_set('America/Sao_Paulo');
		return date("Y-m-d H:i:s");
	}
}
