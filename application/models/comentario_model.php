<?php


class Comentario_model extends CI_Model {

public $demiddemanda;
public $usuidcodigo;
public $comdata;
public $comhora;
public $comtexto;
public $assina;


public function get_comentarios($id)
{
        $query = $this->db->get_where('comentarios', array('DEMIDDEMANDA' => $id));
        return $query->result();
}

public function insert_comentario($parametros)
{
        extract($parametros);

        $this->demiddemanda        = $demanda; 
        $this->usuidcodigo         = $usuario;
        $this->comdata             = $data;
        $this->comhora             = $horario;
        $this->comtexto            = $texto;
	$this->assina		   = $this->login_model->assinatura();


        $this->db->insert('comentarios', $this);
        //echo $this->db->last_query();
}

public function update_comentario($id,$parametros)
{
        extract($parametros);

        $this->comdata             = $data;
        $this->comhora             = $horario;
        $this->comtexto            = $texto;
	$this->assina	           = $this->login_model->assinatura();


        $this->db->where('DEMIDDEMANDA', $id);
        $this->db->update('comentarios', $this);
        echo $this->db->last_query();
}



}