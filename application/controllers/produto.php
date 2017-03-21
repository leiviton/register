<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produto extends CI_Controller {

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
		$this->form_validation->set_rules('nome','NOME','trim|required|ucwords');
		$this->form_validation->set_rules('descricao','DESCRIÇÃO','trim|required|min_length[4]|strtolower');
		$this->form_validation->set_rules('precoCusto','PREÇO CUSTO','trim|required|min_length[4]|strtolower');
		$this->form_validation->set_rules('precoVenda','PREÇO VENDA','trim|required|ucwords');
		$this->form_validation->set_rules('estoque','ESTOQUE','trim|required|ucwords');
		$this->form_validation->set_rules('estoqueMinimo','ESTOQUE MINIMO','trim|required|ucwords');

		if($this->form_validation->run()==TRUE){
		    //array de produtos
			$dados = elements(array('nome','descricao','precoCusto','precoVenda','estoque','estoqueMinimo'),$this->input->post());
			
			
			if ( is_numeric($id = $this->produto->add('produto', $dados, true)) ) {
							set_msg('msgok','Cadastro do produto realizado,código do produto '.$id.'!','sucesso'); 
						    redirect('produto/cadastrar');
						               	
            } else {
                set_msg('msgerro','Erro ao adicionar produto!','erro');
            }		
        }	
		set_tema('titulo','Cadastro de produto');
		set_tema('conteudo', load_modulo('produto','cadastrar'));
		load_template();
	}
    public function gerenciar()	
	{
		esta_logado();
		set_tema('titulo','Gerenciar Produtos');
		set_tema('conteudo',load_modulo('produto','gerenciar'));
		load_template();
	}


}