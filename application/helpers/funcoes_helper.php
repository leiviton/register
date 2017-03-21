<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//carrega um modulo do sistema devolvendo a tela
function load_modulo($modulo=NULL,$tela=NULL,$chave = NULL,$diretorio='painel'){
	$CI =& get_instance();
	if ($modulo != NULL) {
		return $CI->load->view("$diretorio/$modulo",array('tela'=>$tela,'chave'=>$chave),TRUE);
	} else {
		return FALSE;
	}
	
}
//seta valores ao array tema da classe sistema
function set_tema($prop,$valor,$replace=TRUE,$variavel='')
{
	$CI =& get_instance();
	$CI->load->library('sistema');
	if ($replace) {
		$CI->sistema->tema[$prop] = $valor;			
	} else {
		if(!isset($CI->sistema->tema[$prop])) $CI->sistema->$tema[$prop] = '';
		$CI->sistema->tema[$prop] .= $valor;
	}
	
}
//retorna os valores do array $tema da classe sistema
function get_tema()
{
	$CI =& get_instance();
	$CI->load->library('sistema');
	return $CI->sistema->tema;
}
//inicializa o painel adm carregando os recursos necessários
function init_painel(){
	$CI =& get_instance();
	$CI->load->library(array('sistema','session','form_validation'));
	$CI->load->helper(array('form','url','array','text'));
	//carrega models
	$CI->load->model('usuarios_model','usuarios');
	$CI->load->model('auditoria_model','auditoria');
	$CI->load->model('cliente_model','cliente');
	$CI->load->model('fornecedor_model','fornecedor');
	$CI->load->model('produto_model','produto');

	set_tema('titulo_padrao','Painel ADM');
	set_tema('rodape','<div class="footer">
       <p>© '.date('Y').'Jotasat Admin Panel. All Rights Reserved | Design by <a href="http://leiviton.com.br/" target="_blank">Leiviton</a></p>
    </div>');
	
	set_tema('template','painel_view');
	//css
	set_tema('headerinc', load_css(array('bootstrap.min','custom','animate.min','floatexamples','app')));
	set_tema('jsinc',load_js(array('jquery.min','nprogress')));
	set_tema('footerjs',load_js(array('bootstrap.min','custom')));
	set_tema('footerarq',load_js(array('data','graf')));


}
//inicializa o tinymce para criacao de textarea com editor html
function incluir_arquivo($view, $pasta='includes',$echo = TRUE){
	$CI=& get_instance();
	if ($echo == TRUE) {
		echo $CI->load->view("$pasta/$view",'',TRUE);
		return TRUE;
	}
	return $CI->load->view("$pasta/$view",'',TRUE);
}
//carrega template do sistema
function load_template(){
	$CI=& get_instance();
	$CI->load->library('sistema');
	$CI->parser->parse($CI->sistema->tema['template'],get_tema());
}
//carrega css
function load_css($arquivo=NULL,$pasta='assets',$subpasta='css',$media='all'){
	if ($arquivo != NULL) {
		$CI=& get_instance();
		$CI->load->helper('url');
		$retorno = '';
		if (is_array($arquivo)) :
			foreach ($arquivo as $css) {
				$retorno .= '<link rel="stylesheet" type="text/css" href="'.base_url("$pasta/$subpasta/$css.css").'" media="'.$media.'"/>';
			}
		else:
			$retorno = '<link rel="stylesheet" type="text/css" href="'.base_url('assets/$pasta/$arquivo.css').'media="'.$media.'"/>';
		endif;
	}
	return $retorno;
}
//carrega todos os js , tambem remoto se necessario
function load_js($arquivo = NULL,$pasta='assets',$subpasta='js',$remoto=FALSE){
	if ($arquivo != NULL) {
		$CI=& get_instance();
		$CI->load->helper('url');
		$retorno = '';
		if (is_array($arquivo)) :
			foreach ($arquivo as $js) {
				if ($remoto) {
					$retorno .= '<script type="text/javascript" src="'.$js.'"></script>';
				}else{
				$retorno .= '<script type="text/javascript" src="'.base_url("$pasta/$subpasta/$js.js").'"></script>';
				}
			}
		else:
			if ($remoto) {
					$retorno = '<script type="text/javascript" src="'.$arquivo.'"></script>';
				}else{
				$retorno = '<script type="text/javascript" src="'.base_url("$pasta/$subpasta/$arquivo.js").'"></script>';
				}
			
		endif;
	}
	return $retorno;	
}
//mostrar os erros de validação
function erros_validacao(){
	 if (validation_errors())
	 {
          echo '<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><strong>x</strong></span>
        </button><p><strong>'.validation_errors('<p><strong>','</strong></p>').'</div>';
     }
}
//verifica se usuario está logado
function esta_logado($redir=TRUE){
		$CI=& get_instance();
		$CI->load->library('session');
		$user_status = $CI->session->userdata('user_logado');
		if (!isset($user_status) || $user_status != TRUE ) {
			if ($redir) {
				$CI->session->set_userdata(array('redir_para'=>current_url()));
				set_msg('errologin','Acesso restrito, faça login para continuar.','erro');
				redirect('usuarios/login');
			} else {
				return FALSE;
			}					
		} else {
			return TRUE;
		}
		
}
//define uma mensagem para exibir na proxima tela
function set_msg($id='msgerro',$msg=	NULL,$tipo='erro'){
		$CI=& get_instance();
		switch ($tipo) {
			case 'erro':
				$CI->session->set_flashdata($id,'<div class="alert alert-danger alert-dismissible fade in role="alert""><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><strong>x</strong></span>
        </button><p><strong>'.$msg.'</strong></p></div>');
				break;
			case 'sucesso':
				$CI->session->set_flashdata($id,'<div class="alert alert-success alert-dismissible fade in role="alert""><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><strong>x</strong></span>
        </button><p>'.$msg.'</div>');
				break;			
			default:
				$CI->session->set_flashdata($id,'<div class="alert alert-info alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><strong>x</strong></span>
        </button><p>'.$msg.'</div>');
				break;
		}
}
//verifica se existe uma mensagem para ser exibida
function get_msg($id,$printar=TRUE){
	$CI=& get_instance();
	if($CI->session->flashdata($id)){
		if($printar){
			echo $CI->session->flashdata($id);
			return TRUE;
		}
		else{
			return $CI->session->flashdata($id);
		}
	}
	return FALSE;
}
//verifica se é administrador
function is_admin($set_msg=FALSE){
	$CI=& get_instance();
	$user_admin = $CI->session->userdata('user_admin');
	if (!isset($user_admin) || $user_admin != TRUE) {
		if($set_msg) set_msg('msgerro','Seu usuário não tem permissão para cadastrar um administrador','erro');
		return FALSE;		
	} else {
		return TRUE;
	}
	
}
//migalhas 
function breadcrumb(){
	$CI =& get_instance();
	$CI->load->helper('url');
	$classe = ucfirst($CI->router->class);
	if ($classe == 'Painel') {
		$classe = anchor($CI->router->class,'Inicio');
	} else {
		$classe = anchor($CI->router->class,$classe);
	}
	$metodo = ucwords(str_replace('_',' ', $CI->router->method));
	if ($metodo != NULL && $metodo != 'Index') {
		$metodo = " &raquo; ".anchor($CI->router->class."/".$CI->router->method,$metodo);
	} else {
		$metodo = '';
	}
	return '<ol class="breadcrumb">Sua localização:<strong>'.anchor('painel','Sistema').' &raquo; '.$classe.$metodo.'</strong></ol>';
}
//seta registro na tabela de auditoria
function auditoria($operacao,$obs='',$query=TRUE){
	$CI=& get_instance();
	$CI->load->library('session');
	$CI->load->model('auditoria_model','auditoria');
	if ($query) {
		$last_query = $CI->db->last_query();
	} else {
		$last_query = '';
	}
	if (esta_logado(FALSE)) {
		$user_id = $CI->session->userdata('user_id');
		$user_login = $CI->usuarios->get_byid($user_id)->row()->login;
	} else {
		$user_login = 'Desconhecido';
	}
	$dados = array(
		'usuario' => $user_login,
		'operacao' => $operacao,
		'query'=> $last_query,
		'observacao'=>$obs
		);
		$CI->auditoria->do_insert($dados);
			
}	
//gera miniatura das imagens
function thumb($imagem=NULL,$largura=100, $altura=75,$geratag=TRUE)
{
	$CI =& get_instance();

	$CI->load->helper('file');
	$thumb = $largura.'x'.$altura.'_'.$imagem;
	$thumbinfo = get_file_info('./uploads/thumbs/'.$thumb);
	if ($thumbinfo!=FALSE) {
		$retorno = base_url('uploads/thumbs/'.$thumb);
	} else {
		$CI->load->library('image_lib');
		$config['image_library'] = 'gd2';
		$config['source_image'] = './uploads/'.$imagem;
		$config['new_image'] = './uploads/thumbs/'.$thumb;
		$config['maintan_ratio'] = TRUE;
		$config['width'] = 70;
		$config['height'] = 70;
		$CI->image_lib->initialize($config);
		if ($CI->image_lib->resize()) {
			$CI->image_lib->clear();
			$retorno = base_url('uploads/thumbs/'.$thumb);
		} else {
			$retorno = FALSE;
		}
		
	}
	if ($geratag && $retorno != FALSE) {
		$retorno = '<img src="'.$retorno.'" alt="" width="70" heigth="70" />';
	}
	return $retorno;
}
// gera slug
function slug($string=NULL){
	$string = remove_acentos($string);
	return url_title($string,'-',TRUE);

}
//remove acentos e caracteres especiais 
function remove_acentos($string=NULL){
$procurar = array('À','Á','Ã','Â','É','Ê','Í','Ó','Ò','Ú','Ü','Ç','á','à','ã','â','é','ê','í','ó','õ','ô','ú','ç');
$substuir = array('A','A','A','A','E','E','I','O','O','U','U','C','a','a','a','a','e','e','i','o','o','o','u','c');
return str_replace($procurar, $substuir, $string);
}
// gera o resumo de uma string
function resumo_post($string=NULL,$palavras=50,$decodifica_html=TRUE,$remove_tags=TRUE){
	if ($string != NULL) {
		if ($decodifica_html) $string = to_html($string);			
		if ($remove_tags) $string = strip_tags($string);
		$retorno = word_limiter($string,$palavras);
	} else {
		$retorno = FALSE;
	}
	return $retorno;
}
//converter dados do bd para html valido
function to_html($string=NULL){
	return html_entity_decode($string);
}
