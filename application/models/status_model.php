<?php


class Status_model extends CI_Model {

public $staidcodigo;
public $stanome;

public function get_all_status()
{
        $query = $this->db->get_where('status', array('EXIBIR' => true));
        $resultado = $query->result();
        return $resultado;
}

public function get_status($id)
{
        $query = $this->db->get_where('status', array('STAIDCODIGO' => $id));
        return $query->row();
        //echo $this->db->last_query();
        //exit;
}

}