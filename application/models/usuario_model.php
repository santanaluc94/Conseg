<?php


class Usuario_model extends CI_Model {

public $usunome;
public $usucpf;
public $usutelefone;
public $usuemail;
public $ususenha;
public $usustatus;
public $usuinclusao;
public $usualteracao;
public $usurelatorios;
public $usuadministrador;
public $conidconseg;


public function get_usuarios()
{
        $query = $this->db->get('usuario');

        $resultado = $query->result();

        foreach($resultado as $key => $item){
                $resultado[$key]->USURELATORIOS = ($item->USURELATORIOS == 1) ? 'Sim' : 'Não'; 
                $resultado[$key]->USUADMINISTRADOR = ($item->USUADMINISTRADOR == 1) ? 'Sim' : 'Não'; 
                $status = $this->status_model->get_status($item->USUSTATUS); 
                $resultado[$key]->USUSTATUS = ($item->USUSTATUS == 1) ? 'Ativo' : 'Inativo'; 	
        }
        
        return $resultado;
}

public function get_usuario($id)
{
        $query = $this->db->get_where('usuario', array('USUIDUSUARIO' => $id));
        return $query->row();
}

public function insert_usuario($parametros)
{

        extract($parametros);

        $candidato = $this->candidato_model->get_candidato($id);
       
        $this->usunome          = $candidato->nome; 
        $this->usucpf           = $candidato->cpf;
        $this->usutelefone      = $candidato->telefone;
        $this->usuemail         = $candidato->email;
        $this->ususenha         = gerar_senha(6, true, true, true, false);           
        $this->usustatus        = 1; 
        $this->usuinclusao      = date("Y-m-d H:i");
        $this->usualteracao     = date("Y-m-d H:i");
        $this->usurelatorios    = ($relatorio == true) ? 1 : 0;
        $this->usuadministrador = ($administrador == true) ? 1 : 0;
        $this->conidconseg      = $candidato->conseg;
	$this->assina		= $this->login_model->assinatura();


        if($this->db->insert('usuario', $this)){
                if(isset($id)){
                        $this->candidato_model->update_status_candidato($id,1);
                }

                $data = [				
                        'email' => $this->usuemail,
                        'senha' => $this->ususenha								
                ];		

                return $data;
        }else{
		return false;
        }        
}

public function update_usuario($id,$parametros)
{       

        extract($parametros);       

        $this->db->set('usunome',$nome); 
        $this->db->set('usucpf',$cpf);
        $this->db->set('usutelefone',$telefone);
        $this->db->set('usuemail',$email);      
        $this->db->set('usualteracao', date("Y-m-d H:i"));
        $this->db->set('usurelatorios',($relatorios == 'on') ? 1 : 0);
        $this->db->set('usuadministrador', ($administrador == 'on') ? 1 : 0);
        $this->db->set('conidconseg', $id_conseg);
	$this->db->set('assina', $this->login_model->assinatura());

        $this->db->where('USUIDUSUARIO', $id);
       
        if($this->db->update('usuario')){
		return true;
        }else{
		return false;
        }        
}

public function inativar_usuario($id)
{        
        $usustatus        = 0;        

	$this->db->set('assina',$this->login_model->assinatura());
        $this->db->set('USUSTATUS', $usustatus);
        $this->db->where('USUIDUSUARIO', $id);
        $this->db->update('usuario');
        //echo $this->db->last_query();
}

public function ativar_usuario($id)
{        
        $usustatus        = 1;        

	$this->db->set('assina',$this->login_model->assinatura());
        $this->db->set('USUSTATUS', $usustatus);
        $this->db->where('USUIDUSUARIO', $id);
        $this->db->update('usuario');
        //echo $this->db->last_query();
}






}