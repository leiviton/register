<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		init_painel();
		
	}
	public function index()
	{
		$this->gerenciar_ativo();
	}
	public function cadastrar()
	{
		esta_logado();
		$this->form_validation->set_message('is_unique','Este %s já está cadastrado no sistema.');
		$this->form_validation->set_message('matches','O campo %s está diferente do campo %s.');
		$this->form_validation->set_rules('nome','NOME','trim|required|ucwords');
		$this->form_validation->set_rules('cpf','CPF','trim|required|min_length[4]|is_unique[clientes.cpf]|strtolower');
		$this->form_validation->set_rules('rg','RG','trim|required|min_length[4]|is_unique[clientes.rg]|strtolower');
		$this->form_validation->set_rules('nomePai','PAI','trim|required|ucwords');
		$this->form_validation->set_rules('nomeMae','MÃE','trim|required|ucwords');
		$this->form_validation->set_rules('dataNascimento','DATA NASCIMENTO','trim|required|ucwords');
		
		if ($this->form_validation->run()==TRUE) {

			 $dataNasc = $this->input->post('dataNascimento');
            
            try {
                
                $dataNasc = explode('/', $dataNasc);
                $dataNasc = $dataNasc[2].'-'.$dataNasc[1].'-'.$dataNasc[0];

            } catch (Exception $e) {
               $dataNasc = date('Y/m/d'); 
            }
            //array de pessoas
			$dados = elements(array('nome','cpf','rg','nomePai','nomeMae','sexo','banco','agencia','tipoconta','conta'),$this->input->post());
			$dados['dataNascimento'] = $dataNasc;

			//array de contato
			$data = elements(array('telefone','celular','email'),$this->input->post());

			//array de endereço
			$end = elements(array('endereco','numero','bairro','cep','cidade'),$this->input->post());
			$end['estado_idestado'] = $this->input->post('estado'); 

			//array de caids
			$caid['numero'] = $this->input->post('caid');
			$caid1['numero'] = $this->input->post('caid1'); 
			$caid2['numero'] = $this->input->post('caid2');
			$caid3['numero'] = $this->input->post('caid3');
			$caid4['numero'] = $this->input->post('caid4');

			if($caid1['numero'] == ''){
				$caid1['numero'] = '000000';
			}
			if($caid2['numero'] == ''){
				$caid2['numero'] = '000000';
			}
			if($caid3['numero'] == ''){
				$caid3['numero'] = '000000';
			}
			if($caid4['numero'] == ''){
				$caid4['numero'] = '000000';
			}

			if ( is_numeric($id = $this->cliente->add('clientes', $dados, true)) ) {
				$data['idcliente'] = $id;
				$end['clientes_idclientes'] = $id;
				
				if ($this->cliente->add('contato',$data,false)){
					if($this->cliente->add('endereco',$end,false)){
						if($caid['numero'] == ''){
							set_msg('msgok','Cadastro inicializado com sucesso, acrescente endereços!','sucesso'); 
						    redirect('cliente/cadastrar');
						}else{
							$caid['clientes_idclientes'] = $id;
							if($this->cliente->add('caid',$caid,false)){
								$caid1['clientes_idclientes'] = $id;
								if($this->cliente->add('caid',$caid1,false)){
									$caid2['clientes_idclientes'] = $id;
									if($this->cliente->add('caid',$caid2,false)){
										$caid3['clientes_idclientes'] = $id;
										if($this->cliente->add('caid',$caid3,false)){
											$caid4['clientes_idclientes'] = $id;
											if($this->cliente->add('caid',$caid4,false)){
														set_msg('msgok','Cadastro inicializado com sucesso, acrescente endereços!','sucesso'); 
									                    redirect('cliente/cadastrar');
									        }
									    }
									}
			                	}
		                    }
	                	}
	               	}
                }

            } else {
                set_msg('msgerro','Erro ao adicionar!','erro');
            }		
        }	
        $variaveis['chave'] = 2;
        $data['tela'] = 'cadastrar'; 
		set_tema('titulo','Cadastro de Cliente');
		set_tema('conteudo', load_modulo('cliente','cadastrar',$variaveis));
		load_template();
	}
    public function gerenciar_ativo()	
	{
		esta_logado();
		set_tema('titulo','Gerenciar Clientes');
		set_tema('conteudo', load_modulo('cliente','gerenciar_ativo'));
		load_template();
	}


}