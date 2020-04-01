<?php


class Conseg_model extends CI_Model {

public $connome;
public $conpresidente;
public $conpresidentetelefone;
public $conpresidenteemail;

public function get_consegs()
{
        $query = $this->db->get('conseg');
        return $query->result();
}

public function get_conseg($id)
{
        $query = $this->db->get_where('conseg', array('CONIDCONSEG' => $id));
        return $query->row();
}

public function insert_conseg($parametros)
{

        extract($parametros);

        $this->connome               = $titulo; // please read the below note
        $this->conpresidente         = $presidente_nome;
        $this->conpresidentetelefone = $presidente_telefone;
        $this->conpresidenteemail    = $presidente_email;
	$this->assina		     = $this->login_model->assinatura();


        $this->db->insert('conseg', $this);
        echo $this->db->last_query();
}

public function update_conseg($id,$parametros)
{
        extract($parametros);

        $this->connome               = $titulo; // please read the below note
        $this->conpresidente         = $presidente_nome;
        $this->conpresidentetelefone = $presidente_telefone;
        $this->conpresidenteemail    = $presidente_email;
	$this->assina		     = $this->login_model->assinatura();


        $this->db->where('CONIDCONSEG', $id);
        $this->db->update('conseg', $this);
        echo $this->db->last_query();
}



}