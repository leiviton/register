<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Painel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		init_painel();
	}
	public function index()
	{
		$this->inicio();
	}
	public function inicio()
	{
		if (esta_logado(FALSE)) {
			set_tema('titulo','Inicio');
			set_tema('conteudo',load_modulo('home','conteudo'));
			load_template();
		} else {
			redirect('usuarios/login');
		}		
	}
}
