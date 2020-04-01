<?php


class Demanda_model extends CI_Model {

public $demidcodigo;
public $cididcidadao;
public $demdata;
public $demhora;
public $demtexto;
public $secidsecretaria;
public $staidstatus;
public $demidprivacidade;
public $demendereco;
public $demcomplemento;
public $dembairro;
public $demcep;
public $demuf;



public function get_demandas()
{
        $query = $this->db->get('demanda');
        $resultado = $query->result();

        foreach($resultado as $key => $item){                
            $cidadao = $this->cidadao_model->get_cidadao($item->CIDIDCIDADAO);
            $secretaria = $this->secretaria_model->get_secretaria($item->SECIDSECRETARIA);   
            $resultado[$key]->SECRETARIA = $secretaria->SECNOME; 
            $resultado[$key]->CIDADAO = $cidadao->CIDNOME; 
	}		
		
        return $resultado;
}

public function get_demandas_status($status)
{
        $query = $this->db->get_where('demanda', array('STAIDSTATUS' => $status));
        $resultado = $query->result();

        foreach($resultado as $key => $item){                
            $cidadao = $this->cidadao_model->get_cidadao($item->CIDIDCIDADAO);
            $secretaria = $this->secretaria_model->get_secretaria($item->SECIDSECRETARIA);   
            $resultado[$key]->SECRETARIA = $secretaria->SECNOME; 
            $resultado[$key]->CIDADAO = $cidadao->CIDNOME; 
	}		
		
        return $resultado;
}

public function get_demanda($id)
{
        $query = $this->db->get_where('demanda', array('DEMIDDEMANDA' => $id));
        $demanda = $query->row();

        $cidadao = $this->cidadao_model->get_cidadao($demanda->CIDIDCIDADAO);
        $secretaria = $this->secretaria_model->get_secretaria($demanda->SECIDSECRETARIA); 
        $conseg = $this->secretaria_model->get_secretaria($demanda->SECIDSECRETARIA);  

        $demanda->SECRETARIA = $secretaria->SECNOME; 
        $demanda->SECRETARIAEMAIL = $secretaria->SECRESPONSAVELEMAIL; 
        $demanda->CIDADAO = $cidadao->CIDNOME; 

        return $demanda;
        
}

public function insert_demanda($parametros)
{

        extract($parametros);

        $this->demidcodigo      = 1; 
        $this->cididcidadao     = $cidadao;
        $this->demdata          = $data;
        $this->demhora          = $horario;
        $this->demtexto         = $texto_demanda;
        $this->secidsecretaria  = $secretaria; 
        $this->staidstatus      = 1;
        $this->demidprivacidade = (isset ($privacidade)) ? 1 : 0;
        $this->demendereco      = $endereco;
        $this->demcomplemento   = $complemento;
        $this->demcidade        = $cidade;
        $this->dembairro        = $bairro;        
        $this->demcep           = $cep; 
        $this->demuf            = $uf; 
	$this->assina           = $this->login_model->assinatura();



        $this->db->insert('demanda', $this);
        return $this->db->insert_id();
}

public function update_demanda($id,$parametros)
{
        extract($parametros);

        $this->demidcodigo      = 1; 
        $this->cididcidadao     = $cidadao;
        $this->demdata          = $data;
        $this->demhora          = $horario;
        $this->demtexto         = $texto_demanda;
        $this->secidsecretaria  = $secretaria; 
        $this->staidstatus      = $status;
        $this->demidprivacidade = (isset ($privacidade)) ? 1 : 0;
        $this->demendereco      = $endereco;
        $this->demcomplemento   = $complemento;
        $this->demcidade        = $cidade;
        $this->dembairro        = $bairro;        
        $this->demcep           = $cep; 
        $this->demuf            = $uf; 
	$this->assina		= $this->login_model->assinatura();


        $this->db->where('DEMIDDEMANDA', $id);
        $this->db->update('demanda', $this);

        return $this;
}

public function inativar_demanda($id)
{        
        $staidstatus        = 0;        

	$this->db->set('assina',$this->login_model->assinatura());
        $this->db->set('STAIDSTATUS', $staidstatus);
        $this->db->where('DEMIDDEMANDA', $id);
        $this->db->update('demanda');
        //echo $this->db->last_query();
}



}