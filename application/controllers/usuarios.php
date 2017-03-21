<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		init_painel();
	}
	public function index()
	{
		$this->VerifyCadastro();
	}
	public function login()
	{
		$this->form_validation->set_rules('usuario','USUÁRIO','trim|required|min_length[4]|strtolower');
		$this->form_validation->set_rules('senha','SENHA','trim|required|min_length[4]|strtolower');
		if ($this->form_validation->run() == true) {
			$usuario = $this->input->post('usuario', TRUE);
			$senha = md5( $this->input->post('senha', TRUE));
			$redirect = $this->input->post('redirect', TRUE);
				if ($this->usuarios->do_login($usuario,$senha) == TRUE) {
					$query = $this->usuarios->get_bylogin($usuario)->row();
					$dados = array(
						'user_id' => $query->idusuarios,
						'user_nome' => $query->nome,
						'user_admin' => $query->adm,
						'user_logado' => TRUE,
						);
					$this->session->set_userdata($dados);
					auditoria('Login no sistema','Login efetuado com sucesso!');
					if ($redirect != '') {
						redirect($redirect);
					} else {
						redirect('painel');
					}		
					
				} else {
					$query = $this->usuarios->get_bylogin($usuario)->row();
					if(empty($query)){
						set_msg('errologin','Verifique nome do usuario.','erro');
					}
					elseif ($query->senha != $senha) {
						set_msg('errologin','Verifique sua senha.','erro');
					}
					elseif ($query->ativo == 0) {
						set_msg('errologin','Seu usuario está sem permissão para acessar, entre em contato com o TI.','erro');
					}
					else{
						set_msg('errologin','Erro desconhecido, entre em contato com o TI.','erro');
					}
					redirect('usuarios/login');
				}
			
		}
		//carrega login
		set_tema('titulo','Login Sistema');
		set_tema('conteudo', load_modulo('usuarios','login'));
		set_tema('rodape','');
		load_template();
	}
	public function logoff()	
	{
		auditoria('Logoff no sistema','Logoff efetuado com sucesso!');
		
		$this->session->unset_userdata(array('user_id'=>'','user_nome'=>'','user_admin'=>'','user_logado'=>''));
		$this->session->sess_destroy();	
		set_msg('msgos','Obrigado por usar nosso sistema, esperamos velo em breve!!!','sucesso');
		redirect('usuarios/login');
		
	}
	public function VerifyCadastro()
	{
		$this->form_validation->set_rules('cpf','CPF','trim|required|strtolower');	
		if($this->form_validation->run() == true){
			$cpf = $this->input->post('cpf');

			if($this->usuarios->get_bycpf($cpf)!=FALSE){
				$usuario = $this->usuarios->get_bycpf($cpf)->result();
				$cliente = $usuario[0];
				if($cliente->EMAIL != null){
					$chave = md5(uniqid(rand(), true));	
					if ($this->usuarios->grava_chave($chave,$cliente->EMAIL,$cpf)) {			
		
						$link = '<a href="'.base_url("usuarios/verificacao/$chave").'">'.base_url("usuarios/verificacao/$chave").'</a>';
						$mensagem = '<p> Bem vindo ao sistema de Direta Telecom, sua senha para o primeiro acesso é "123456", após acesso trocar sua senha para sua segurança,clique no link abaixo para confirmar seu cadastro: <br /><br />'.$link.'<br /><br /><br /><hr>Caso você não solicitou, desconsidere este email.</p>';
						if($this->sistema->enviar_email($cliente->EMAIL,'Bem Vindo ao sistema Direta Telecom',$mensagem)){

							set_msg('msgok','Siga as instruções enviadas no email '.$cliente->EMAIL.'!!','sucesso');
							redirect(current_url());
						}else {
							set_msg('msgerro','O email:'.$email.' não está cadastrado.','erro');
							redirect(current_url());
						} 
					}
				}else{
					set_msg('msgerro','Sr(A).'.$cliente->NOME_CLI.' você não possue email cadastrado no sistema.','erro');
					redirect('usuarios/cadastrar_email');
				}
			}
		}
		set_tema('titulo','Primeiro Acesso');
		set_tema('conteudo', load_modulo('usuarios','verify'));
		set_tema('rodape','');
		load_template();

	}

	public function cadastrar_email()
	{

		$this->form_validation->set_rules('cpf','CPF','trim|required|strtolower');	
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|strtolower');
		if($this->form_validation->run() == true){
			$cpf = $this->input->post('cpf');
			$email = $this->input->post('email');

			if($this->usuarios->get_bycpf($cpf)!=FALSE){
				$cliente = $this->usuarios->get_bycpf($cpf)->result();
				if($cliente[0]->EMAIL != $email && $cliente[0]->EMAIL == NULL){
						$chave = md5(uniqid(rand(), true));	
						if ($this->usuarios->grava_chave($chave,$email,$cpf)) {			
				
								$link = '<a href="'.base_url("usuarios/verifica_email/$chave").'">'.base_url("usuarios/confirmacao/$chave").'</a>';
								$mensagem = '<p> Bem vindo ao sistema Direta Telecom, clique no link abaixo para confirmar seu cadastro: <br /><br />'.$link.'<br /><br /><br /><hr>Caso você não solicitou, desconsidere este email.</p>';
								if($this->sistema->enviar_email($email,'Confirmação de email',$mensagem)){
									set_msg('msgok','Siga as instruções enviadas no email '.$email.'!!','sucesso');
									redirect(current_url());
								}else {
									set_msg('msgerro','O email:'.$email.' não está cadastrado.','erro');
									redirect(current_url());
								} 
							}

				}else{
					 et_msg('msgerro','O você já possue email cadastrado. Entre em contato no (35)35598800 para cadastrar um novo email.','erro');
				}		
			}else{
				set_msg('msgerro','O '.$cpf.' não está cadastrado.','erro');
			}
		}
		set_tema('titulo','Cadastrar Email');
		set_tema('conteudo', load_modulo('usuarios','cadastrar_email'));
		set_tema('rodape','');
		load_template();
	}

	public function verifica_email($chave='')
	{
		if ($this->usuarios->verifica_chave($chave)) {
			$dados['chave'] = $chave;
			if ($this->usuarios->get_byemail_chave($chave)) {
				set_msg('msgok','Cadastro realizado com sucesso.','sucesso');
				redirect('usuarios/confirmacao');
			}					
		}else{
			set_msg('errolink','Seu token expirou, solicite um novo.');
			edirect('usuarios/VerifyCadastro');			
		}
	}

	public function verificacao($chave='')
	{
		if ($this->usuarios->verifica_chave($chave)) {
			$dados['chave'] = $chave;
			set_msg('msgok','Cadastro realizado com sucesso.','sucesso');
			redirect('usuarios/confirmacao');		
		}else{
			set_msg('errolink','Seu token expirou, solicite um novo.');
			redirect('usuarios/VerifyCadastro');
				
		}
	}

	public function confirmacao()
	{
		set_tema('titulo','Cadastro confirmado');
		set_tema('conteudo', load_modulo('usuarios','confirmacao'));
		set_tema('rodape','');
		load_template();
	}


	public function gravar_senha()
	{
		$this->form_validation->set_message('matches','O campo %s está diferente do campo %s.');
		$this->form_validation->set_rules('senha','SENHA','trim|required|min_length[4]|strtolower');
		$this->form_validation->set_rules('senha2','REPITA A SENHA','trim|required|min_length[4]|strtolower|matches[senha]');
		
		if ($this->form_validation->run()==TRUE) {
			$dados['senha'] = bcrypt($this->input->post('senha'));
			$chave = $this->input->post('chave');
			$this->usuarios->salvar_senha_alterada($dados,$chave);
		}
		set_msg('msgals','Senha alterada com sucesso, faça seu login!!!','sucesso');
		auditoria('Nova senha','Senha atualizada!');	
		redirect('usuarios/login');
	}

	public function nova_senha()	
	{
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|strtolower');
		if ($this->form_validation->run() == true) {
			$email = $this->input->post('email');

				if ($this->usuarios->recuperar_senha()) {					
					$chave = md5(uniqid(rand(), true));					

					if ($this->usuarios->grava_chave($chave,$email)) {				
		
						$link = '<a href="'.base_url("usuarios/verificacao/$chave").'">'.base_url("usuarios/verificacao/$chave").'</a>';
						$mensagem = '<p> Bem vindo ao sistema de Direta Telecom, clique no link abaixo: <br /><br />'.$link.'<br /><br /><br /><hr>Caso você não solicitou, desconsidere este email.</p>';
						if($this->sistema->enviar_email($email,'Nova senha para o sistema',$mensagem)){
							set_msg('msgok','Siga as instruções enviadas no email '.$email.'!!','sucesso');
						}else {
							set_msg('msgerro','O email:'.$email.' não está cadastrado.','erro');
						} 
					}
					redirect('usuarios/nova_senha');

				}else {
						set_msg('msgerro','O email:'.$email.' não está cadastrado.','erro');
				}
	   } 			
		
		set_tema('titulo','Nova Senha');
		set_tema('conteudo', load_modulo('usuarios','nova_senha'));
		set_tema('rodape','');
		load_template();
	}
	
	
	public function alterar_senha()
	{
		
		$this->form_validation->set_message('matches','O campo %s está diferente do campo %s.');
		$this->form_validation->set_rules('senha','SENHA','trim|required|min_length[4]|strtolower');
		$this->form_validation->set_rules('senha2','REPITA A SENHA','trim|required|min_length[4]|strtolower|matches[senha]');
		$this->form_validation->set_rules('cpf','CPF','trim|required');
		if ($this->form_validation->run()==TRUE) {
			$cpf = $this->input->post('cpf');
			$dados['password'] = bcrypt($this->input->post('senha'));

			if ($this->usuarios->get_bycpf($cpf)!=FALSE) {
				$user_id = $this->usuarios->get_bycpf($cpf)->row()->user_id;
				if($this->usuarios->do_update($dados,array('id'=>$this->$user_id))==TRUE){
					set_msg('msgok','Nova senha cadastrada com sucesso.','sucesso');
					redirect(current_url());
				}else{
					set_msg('msgerro','Ops! Não foi possivel salvar a nova senha, verifique e tente mais tarde.','erro');
					redirect(current_url());
				}				
			}else{
				set_msg('msgerro','O cpf'.$cpf.' não está cadastrado.','erro');
				redirect(current_url());
			}	
		}
		set_tema('titulo','Cadastrar senha');
		set_tema('conteudo', load_modulo('usuarios','alterar_senha'));
		load_template();
	}
	public function editar()	
	{
		esta_logado();
		$this->form_validation->set_rules('nome','NOME','trim|required|ucwords');
		if ($this->form_validation->run()==TRUE) {
			$dados['nome'] = $this->input->post('nome');
			$dados['ativo'] = ($this->input->post('ativo') == 1 ? 1 : 0);
			if (is_admin()) $dados['adm'] = ($this->input->post('adm')==1 ? 1 : 0);
			$this->usuarios->do_update($dados,array('id'=>$this->input->post('idusuario')));
			auditoria('Cadastro de usuario','Cadastrado!');
		}
		set_tema('titulo','Editar Usuarios');
		set_tema('conteudo', load_modulo('usuarios','editar'));
		load_template();
	}
	public function excluir()	
	{
		esta_logado();
		if (is_admin(TRUE)) {
			$iduser = $this->uri->segment(3);
			if ($iduser != NULL) {
				$query = $this->usuarios->get_byid($iduser);
				if ($query->num_rows()==1) {
					$query = $query->row();
					if ($query->id != 1) {
						$this->usuarios->do_delete(array('id'=>$query->id),FALSE);						
					} else {
						set_msg('msgerro','Usuário não pode ser excluido!!!','erro');
					}
					
				} else {
					set_msg('msgerro','Usuario não encontrato para exclusão!!!','erro');
				}
				
			} else {
				set_msg('msgerro','Escolha um usuario para excluir','erro');
			}			
			
		}
		redirect('usuarios/gerenciar_ativo');
	}
	
	
	
}
