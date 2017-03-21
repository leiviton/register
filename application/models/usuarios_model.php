<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model
{
	public function do_insert($dados=NULL,$redir=TRUE)
	{
		if ($dados != NULL) {
			$this->db->insert('users',$dados);
			if ($this->db->affected_rows()>0) {
				auditoria('Cadastro de usuario',$dados['login'].'Cadastrado!');
				set_msg('msgok','Cadastro efetuado com sucesso!','sucesso');
			} else {
				set_msg('msgerro','Erro ao adicionar!','erro');
			}
			
			if($redir) redirect(current_url());
		}
	}
	public function do_update($dados=NULL,$condicao=NULL,$redir=TRUE)
	{
		if ($dados != NULL && is_array($condicao)) {
			$this->db->update('users', $dados, $condicao);
			if ($this->db->affected_rows()>0) {				
				return TRUE;
			
			} else {
				return FALSE;
			}
		}
	}
	public function do_delete($condicao=NULL,$redir=TRUE)
	{
		if ($condicao != NULL && is_array($condicao)) {
			$this->db->delete('users', $condicao);
			if ($this->db->affected_rows()>0) {
				auditoria('Exclusão de usuario','Excluido!');
				set_msg('msgok','Exclusão realizada com sucesso!','sucesso');
			} else {
				set_msg('msgerro','Erro ao excluir!','erro');
			}
			
			
			if($redir) redirect(current_url());
		}
	}
	public function do_login($usuario=NULL,$senha=NULL)
	{
		if ($usuario && $senha) {
			$this->db->where('login', $usuario);
			$this->db->where('senha', $senha);
            $this->db->where('ativo', 1);

			$query = $this->db->get('users');	
			if ($query->num_rows() == 1) {
				return TRUE;
			} else {
				return FALSE;
			}
			
		} else {
		 	return FALSE;
		}
		
	}
	public function get_bylogin($login=NULL)
	{
		if ($login!=NULL) {
			$this->db->where('login',$login);
			$this->db->limit(1);
			return $this->db->get('users');
		} else {
			return FALSE;
		}		
	}
	public function get_byemail($email=NULL)
	{
		if ($email!=NULL) {
			$this->db->where('email',$email);
			$this->db->limit(1);
			return $this->db->get('users');
		} else {
			return FALSE;
		}		
	}

	public function get_byid($id=NULL)
	{
		if ($id!=NULL) {
			$this->db->where('idusuarios',$id);
			$this->db->limit(1);
			return $this->db->get('users');
		} else {
			return FALSE;
		}		
	}
	public function get_ativo()
	{
		$this->db->where('ativo',1);
		return $this->db->get('users');
	}
	public function get_inativo()
	{
		$this->db->where('ativo',0);
		return $this->db->get('users');
	}
	public function count_usuarios()
	{
		return $this->db->count_all('users');
	}
	public function recuperar_senha()
	{
		$email = $this->input->post('email');

		$consulta = $this->db->get_where('users', array('email'=>$email));
			if ($consulta->num_rows() == 1) {
				return TRUE;
			} else {
				return FALSE;
			}
	}
	public function get_bycpf($cpf=NULL)
	{
		if ($cpf!=NULL) {
			$this->db->where('CPF',$cpf);
			$this->db->limit(1);
			$consulta = $this->db->get('clientes');
			if ($consulta->num_rows() == 1 ) {
				return $consulta;
			}else{
				return FALSE;
			}

		} else {
			return FALSE;
		}		
	}
	public function grava_chave($chave='',$email='')
	{
		if ($this->db->insert('token_validator', array('chave'=>$chave,'email'=>$email))) {
			return TRUE;	
		}
		else{
			return FALSE;
		}
	}
	public function verifica_chave($chave='')
	{
		$this->db->where('TIMESTAMPDIFF(MINUTE,data_hora, now()) <= 30');
		$consulta = $this->db->get_where('token_validator', array('chave'=>$chave));
		if ($consulta->num_rows()==1) {
			return TRUE;
		} else {
			return FALSE;
		}		
	}
	public function get_byemail_chave($chave='')
	{
		$email = $this->db->get_where('token_validator',array('chave'=>$chave))->row()->email;
		$cpf = $this->db->get_where('token_validator',array('chave'=>$chave))->row()->cpf;
		$user_id = $this->db->get_where('users',array('CPF'=>$cpf))->row()->id;
		$query = $this->db->where('CPF',$cpf)->update('users',array('email'=>$email));
		$query1 = $this->db->where('cpf',$cpf)->update('clientes',array('EMAIL'=>$email,'user_id'=>$user_id));

		if ($query) {
			if ($query1) {
				return TRUE;
			}else{
				return FALSE;
			}
		} else {
				return FALSE;
		}
	}
	public function salvar_senha_alterada($dados=NULL,$chave='')
	{		
		if ($dados != NULL && $chave != NULL) {
			$email = $this->db->get_where('token_validator',array('chave'=>$chave))->row()->email;

			$query = $this->db->where('email',$email)->update('users',$dados);

			if ($query) {
				return TRUE;
			} else {
				return FALSE;
			}			
		}
	}
}