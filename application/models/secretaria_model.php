<?php


class Secretaria_model extends CI_Model {

public $secnome;
public $secresponsavel;
public $secresponsaveltelefone;
public $secresponsavelemail;
public $conidconseg;


public function get_secretarias()
{
        $query = $this->db->get('secretaria');
        return $query->result();
}

public function get_secretaria($id)
{
        $query = $this->db->get_where('secretaria', array('SECIDSECRETARIA' => $id));
        return $query->row();
}



public function insert_secretaria($parametros)
{

        extract($parametros);

        $this->secnome                  = $titulo; // please read the below note
        $this->secresponsavel           = $nome;
        $this->secresponsaveltelefone   = $celular;
        $this->secresponsavelemail      = $email;
        $this->conidconseg              = $conseg;

        $this->db->insert('secretaria', $this);
        echo $this->db->last_query();
}

public function update_secretaria($id,$parametros)
{
        extract($parametros);

        $this->secnome                  = $titulo; // please read the below note
        $this->secresponsavel           = $nome;
        $this->secresponsaveltelefone   = $celular;
        $this->secresponsavelemail      = $email;
        $this->conidconseg              = $conseg;

        $this->db->where('SECIDSECRETARIA', $id);
        $this->db->update('secretaria', $this);
        echo $this->db->last_query();
}

}