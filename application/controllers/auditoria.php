<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auditoria extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		init_painel();
		esta_logado();
	}
	public function index()
	{
		$this->gerenciar();
	}
	public function gerenciar()	
	{		
		set_tema('titulo','Auditoria no sistema');
		set_tema('conteudo', load_modulo('auditoria','gerenciar'));
		load_template();
	}
}