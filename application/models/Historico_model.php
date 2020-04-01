<?php


class Historico_model extends CI_Model {


public $staidcodigo;
public $demiddemanda;
public $usuidcodigo;
public $hisdata;
public $hishora;

public function insert_historico($status,$demanda,$usuario)
{

        extract($parametros);

       
        $this->staidcodigo = $status;
        $this->demiddemanda = $demanda;
        $this->usuidcodigo = 1;
        $this->hisdata = date("Y-m-d");
        $this->hishora = date("H:i"); 
	$this->assina = $this->login_model->assinatura();



        $this->db->insert('historicostatus', $this);
        echo $this->db->last_query();
}

}