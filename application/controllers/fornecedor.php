<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fornecedor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		init_painel();
		
	}
	public function index()
	{
		$this->gerenciar();
	}
	public function cadastrar()
	{
		esta_logado();
		$this->form_validation->set_message('is_unique','Este %s já está cadastrado no sistema.');
		$this->form_validation->set_message('matches','O campo %s está diferente do campo %s.');
		$this->form_validation->set_rules('razaoSocial','RAZÃO SOCIAL','trim|required|ucwords');
		$this->form_validation->set_rules('cnpj','CNPJ','trim|required|min_length[4]|is_unique[fornecedor.cnpj]|strtolower');
		
		if ($this->form_validation->run()==TRUE) {

			//array de pessoas
			$dados = elements(array('razaoSocial','cnpj','inscricaoEstadual'),$this->input->post());
			
			//array de contato
			$data = elements(array('telefone','celular','email','nomeContato'),$this->input->post());

			//array de endereço
			$end = elements(array('endereco','numero','bairro','cep','cidade'),$this->input->post());
			$end['estado_idestado'] = $this->input->post('estado'); 

			
			if ( is_numeric($id = $this->fornecedor->add('fornecedor', $dados, true)) ) {
				$data['fornecedor_idFornecedor'] = $id;
				$end['fornecedor_idfornecedor'] = $id;
				
				if ($this->fornecedor->add('contatoforne',$data,false)){
					if($this->fornecedor->add('enderecofornecedor',$end,false)){
						 set_msg('msgok','Cadastro realizado com sucesso!','sucesso'); 
						 redirect('fornecedor/cadastrar');									        
	               	}
	               	else {
                		set_msg('msgerro','Erro ao adicionar!','erro');
            		}
                }
                else {
	                set_msg('msgerro','Erro ao adicionar!','erro');
	            }

            } else {
                set_msg('msgerro','Erro ao adicionar!','erro');
            }		
        }	
		set_tema('titulo','Cadastro de Fornecedor');
		set_tema('conteudo', load_modulo('fornecedor','cadastrar'));
		load_template();
	}
    public function gerenciar()	
	{
		esta_logado();
		set_tema('titulo','Gerenciar Fornecedor');
		set_tema('conteudo', load_modulo('fornecedor','gerenciar'));
		load_template();
	}


}