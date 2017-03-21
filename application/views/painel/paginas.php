<?php
defined('BASEPATH') OR exit('No direct script access allowed');
switch ($tela) {	
    case 'cadastrar':
       echo '<div class="row">
                <div class="col-md-12 col-sm-8 col-xs-12">';
          echo breadcrumb();        

          echo '<div class="x_panel tile fixed_height_20">
                <div class="x_title">
                <h2>Cadastrar Páginas</h2>
                <ul class="nav navbar-right panel_toolbox">                                   
                </ul>
                <div class="clearfix"></div>
                </div>
                <div class="x_content">';           
                
          erros_validacao();
          get_msg('msgokp');
          get_msg('msgerrop');
          get_msg('msgokupp');
          get_msg('msgerroupp');

          echo form_open('paginas/cadastrar',array('id'=>'demo-form2','class'=>'custom formlogin'));
          //titulo
          echo '<div class="form-group espaco">';
          echo '<label class="control-label col-md-1 col-sm-3 col-xs-12">Título da página:</label>';   
          echo '<div class="col-md-5 col-sm-6 col-xs-12">';
          echo form_input(array('name'=>'titulo','type'=>'text', 'class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Digite titulo'),set_value('titulo'),'autofocus');
          echo '</div>';
          echo '</div><br /><br />';
          //slug
          echo '<div class="form-group espaco">'; 
          echo '<label class="control-label col-md-1 col-sm-3 col-xs-12">Slug:</label>';          
          echo '<div class="col-md-5 col-sm-6 col-xs-12">';
          echo form_input(array('name'=>'slug','type'=>'text', 'class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Digite slug'),set_value('slug'));
          echo '</div>';
          echo '</div><br /><br />';
          //conteudo
          echo '<div class="form-group espaco">'; 
          echo '<label class="control-label col-md-1 col-sm-3 col-xs-12">Conteudo:</label>';          
          echo '<div class="col-md-9 col-sm-6 col-xs-12">';
          echo form_textarea(array('name'=>'conteudo','id'=>'summernote','class'=>'form-control col-md-12 col-xs-12 htmleditor','placeholder'=>'Digite conteudo'),set_value('conteudo'));
          echo '</div>';
          echo '</div><br /><br />';
          //botoes
          echo '<div class="form-group">';        
          echo '<div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">';
          echo anchor('painel','Cancelar',array('class'=>'btn btn-danger'));
          echo form_submit(array('name'=>'cadastrar','class'=>'btn btn-success'),'Publicar');  
                
          echo '</div>'; 
          echo '</div>';

          echo '</form>';
                
          echo'</div>
               </div>
               </div>
               </div>
               ';

        break;  
    case 'gerenciar':
      ?>
          <div class="row"> 
            <div class="col-md-12 col-sm-12 col-xs-12">
            <?php echo breadcrumb(); ?>
              <div class="x_panel">
                <div class="x_title">
                  <h2>Midias do sistema</h2>
                  <ul class="nav navbar-right panel_toolbox">
                      <li><a href="javascript:;" id="imprimirCompras" onclick="window.print();"><i class="fa fa-print"></i></a></li>
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      <li><a class=""><i class="fa fa-close"></i></a>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content col-md-12 col-sm-12 col-xs-12">
                 <?php get_msg('msgok');
                 get_msg('msgerro');
                 get_msg('msgerroupmidia');
                 get_msg('msgokdelem');
                 get_msg('msgerrodelem');
                 get_msg('msgokdelep');
                 get_msg('msgerrodelep');
                 ?>
                  <div>
                    <table class="table table-striped responsive-utilities jambo_table dataTable data-table col-md-12 col-sm-12 col-xs-12" id="example">
                      <thead>
                        <tr>
                          <th>Titulo:</th>
                          <th>Slug:</th>
                          <th>Conteúdo:</th>
                          <th>Ações:</th>                          
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $query = $this->paginas->get_all()->result();
                        foreach ($query as $linha) {
                          echo '<tr>';
                          printf('<td>%s</td>',$linha->titulo);
                          printf('<td>%s</td>',$linha->slug);
                          printf('<td>%s</td>',resumo_post($linha->conteudo,10));
                          printf('<td class="text-center">%s%s%s</td>', anchor("paginas/editar/$linha->id",'&nbsp;&nbsp;&nbsp;&nbsp;',array('class'=>'fa fa-cog','data-toggle'=>'tooltip','data-placement'=>'top','data-original-title'=>'Editar')),anchor("paginas/excluir/$linha->id",' ',array('class'=>'glyphicon glyphicon-off','data-toggle'=>'tooltip','data-placement'=>'top','data-original-title'=>'Excluir')),'');
                          echo '</tr>';
                          echo '</tr>';
                          }
                         ?>
                      </tbody>
                    </table>
                  </div>                  
                </div>
              </div>
            </div>
          </div>
      <?php 
  break;	
  case 'editar':
       $idpagina = $this->uri->segment(3);
    if ($idpagina == NULL) {
      set_msg('msgerroed','Escolha uma pagina para alterar','erro');
      redirect('paginas/gerenciar');
    }?>
    <div class="row">
                <div class="col-md-12 col-sm-8 col-xs-12">
          <?php echo breadcrumb(); ?>
                
                <div class="x_panel tile fixed_height_620">
                <div class="x_title">
                <h2>Alterar Páginas</h2>
                <ul class="nav navbar-right panel_toolbox">                                   
                </ul>
                <div class="clearfix"></div>
                </div>
                <div class="x_content">
    <?php 
    if (is_admin(TRUE)) {
        $query = $this->paginas->get_byid($idpagina)->row();
        erros_validacao();
          get_msg('msgokp');
          get_msg('msgokupp');
          get_msg('msgerroupp');

          echo form_open('paginas/editar',array('id'=>'demo-form2','class'=>'custom formlogin'));
          //titulo
          echo '<div class="form-group espaco">';
          echo '<label class="control-label col-md-1 col-sm-3 col-xs-12">Título da página:</label>';   
          echo '<div class="col-md-5 col-sm-6 col-xs-12">';
          echo form_input(array('name'=>'titulo','type'=>'text', 'class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Digite titulo'),set_value('titulo',$query->titulo),'autofocus');
          echo '</div>';
          echo '</div><br /><br />';
          //slug
          echo '<div class="form-group espaco">'; 
          echo '<label class="control-label col-md-1 col-sm-3 col-xs-12">Slug:</label>';          
          echo '<div class="col-md-5 col-sm-6 col-xs-12">';
          echo form_input(array('name'=>'slug','type'=>'text', 'class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Digite slug'),set_value('slug',$query->slug));
          echo '</div>';
          echo '</div><br /><br />';
          echo '<br /><p><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Inserir Imagem</button>';
          echo anchor('midia/cadastrar','Upload imagens','class="btn btn-danger"').'</p><br />';
          //conteudo
          echo '<div class="form-group espaco">'; 
          echo '<label class="control-label col-md-1 col-sm-3 col-xs-12">Conteudo:</label>';          
          echo '<div class="col-md-9 col-sm-6 col-xs-12">';
          echo form_textarea(array('name'=>'conteudo','id'=>'summernote','class'=>'form-control col-md-12 col-xs-12 htmleditor','placeholder'=>'Digite conteudo'),set_value('conteudo',to_html($query->conteudo)));
          echo '</div>';
          echo '</div><br /><br />';
          //botoes
          echo '<div class="form-group">';        
          echo '<div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">';
          echo anchor('paginas/gerenciar','Cancelar',array('class'=>'btn btn-danger'));
          echo form_submit(array('name'=>'editar','class'=>'btn btn-success'),'Salvar Dados');  
                
          echo '</div>'; 
          echo '</div>';

         
          echo form_hidden('idpagina',$idpagina);
          echo form_close();

          echo'</div>
               </div>
               </div>
               </div>';
               incluir_arquivo('insertimg'); 
      } else {
        redirect('paginas/gerenciar');
      }
      break;
	  default:
		echo '<div class="alert alert-danger" role="alert">
				  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				  <span class="sr-only">Error:</span>
				  Tela não existe!
			  </div>';
		break;
}