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

public function insert_conseg($parametros)
{

        extract($parametros);

        $this->connome               = $titulo; // please read the below note
        $this->conpresidente         = $presidente_nome;
        $this->conpresidentetelefone = $presidente_telefone;
        $this->conpresidenteemail    = $presidente_email;

        $this->db->insert('conseg', $this);
        echo $this->db->last_query();
}

public function update_entry()
{
        $this->title    = $_POST['title'];
        $this->content  = $_POST['content'];
        $this->date     = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));
}

}