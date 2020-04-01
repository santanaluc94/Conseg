<?php


class Candidato_model extends CI_Model {

public $nome;
public $email;
public $cpf;
public $conseg;
public $telefone;
public $status;
public $assina;



public function get_candidatos()
{
		$query = $this->db->get_where('candidatos', array('status' => 0));
		$resultado = $query->result();
		
		foreach($resultado as $key => $item){           
			$conseg_candidato = $this->conseg_model->get_conseg($item->conseg); 		
			$resultado[$key]->connome = $conseg_candidato->CONNOME; 
		}

		return $resultado;

}

public function get_candidato($id)
{
        $query = $this->db->get_where('candidatos', array('id' => $id));
        return $query->row();
}

public function update_status_candidato($id, $status)
{
		$assina = $this->login_model->assinatura();
		$this->db->set('assina',$this->login_model->assinatura());
		$this->db->set('status', $status);
		$this->db->where('id', $id);
		$this->db->update('candidatos');        
}

public function excluirCandidato($id)
{
		
		$this->db->where('id', $id);
		if($this->db->delete('candidatos')){
			return true;
		}else{
			return false;
		}
}

public function insert_candidato($parametros)
{

	extract($parametros);

	$query = $this->db->get_where('candidatos', array('email' => $email));

	if ($query->num_rows() > 0) {
		return false;
	}else {
		$this->nome            = $nome; // please read the below note
		$this->email           = $email;      
		$this->conseg          = $conseg;      
		$this->telefone        = $telefone;      
		$this->cpf             = $cpf;      
		$this->status          = 0; 
		$this->assina		   = $this->login_model->assinatura();

		if($this->db->insert('candidatos', $this)){
				return true; 
		}else {
				return "erro";
		}
	}       
        
}



}