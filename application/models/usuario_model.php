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
        return $query->result();
}

public function get_usuario($id)
{
        $query = $this->db->get_where('usuario', array('USUIDUSUARIO' => $id));
        return $query->row();
}

public function insert_usuario($parametros)
{

        extract($parametros);

        $this->usunome          = $nome; 
        $this->usucpf           = $cpf;
        $this->usutelefone      = $telefone;
        $this->usuemail         = $email;
        $this->ususenha         = $senha;
        $this->usustatus        = $status; 
        $this->usuinclusao      = $inclusao;
        $this->usualteracao     = $alteracao;
        $this->usurelatorios    = $relatorios;
        $this->usuadministrador = $administrador;
        $this->conidconseg      = $id_conseg;



        $this->db->insert('usuario', $this);
        echo $this->db->last_query();
}

public function update_usuario($id,$parametros)
{

        extract($parametros);

        $this->usunome          = $nome; 
        $this->usucpf           = $cpf;
        $this->usutelefone      = $telefone;
        $this->usuemail         = $email;
        $this->ususenha         = $senha;
        $this->usustatus        = $status; 
        $this->usuinclusao      = $inclusao;
        $this->usualteracao     = $alteracao;
        $this->usurelatorios    = $relatorios;
        $this->usuadministrador = $administrador;
        $this->conidconseg      = $id_conseg;


        $this->db->where('USUIDUSUARIO', $id);
        $this->db->update('usuario', $this);
        echo $this->db->last_query();
}

public function inativar_usuario($id)
{        
        $usustatus        = 0;        

        $this->db->set('USUSTATUS', $usustatus);
        $this->db->where('USUIDUSUARIO', $id);
        $this->db->update('usuario');
        echo $this->db->last_query();
}






}