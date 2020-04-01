<?php


class Cidadao_model extends CI_Model {

public $cidnome;
public $cidemail;
public $cidcelular;
public $cidstatus;
public $conidconseg;
public $assina;


public function get_cidadaos()
{
        $query = $this->db->get('cidadao');
        $resultado = $query->result();

        foreach($resultado as $key => $item){                
             $conseg = $this->conseg_model->get_conseg($item->CONIDCONSEG);   
             $status = $this->status_model->get_status($item->CIDSTATUS);
             $resultado[$key]->STATUS = $status->STANOME;
             $resultado[$key]->CONSEG = $conseg->CONNOME; 

        }

        return $resultado;
}

public function get_cidadao($id)
{
        $query = $this->db->get_where('cidadao', array('CIDIDCIDADAO' => $id));
        return $query->row();
}

public function insert_cidadao($parametros)
{
        extract($parametros);

        $this->cidnome        = $nome; // please read the below note
        $this->cidemail       = $email;
        $this->cidcelular     = $celular;
        $this->cidstatus      = 1;
        $this->conidconseg    = $id_conseg;
	$this->assina	      = $this->login_model->assinatura();


        $this->db->insert('cidadao', $this);
        return $this->db->insert_id();

        //echo $this->db->last_query();
}

public function update_cidadao($id,$parametros)
{
        extract($parametros);

        $this->cidnome        = $nome; // please read the below note
        $this->cidemail       = $email;
        $this->cidcelular     = $celular;
        $this->cidstatus      = 1;
        $this->conidconseg    = $id_conseg;
	$this->assina	      = $this->login_model->assinatura();


        $this->db->where('CIDIDCIDADAO', $id);
        $this->db->update('cidadao', $this);
        //echo $this->db->last_query();
}

public function inativar_cidadao($id)
{        
        $cidstatus = 0;        

	$this->db->set('assina',$this->login_model->assinatura());        
        $this->db->set('CIDSTATUS', $cidstatus);
        $this->db->where('CIDIDCIDADAO', $id);
        $this->db->update('cidadao');
        
}

}