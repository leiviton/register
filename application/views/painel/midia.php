<?php
defined('BASEPATH') OR exit('No direct script access allowed');
switch ($tela) {	
    case 'cadastrar':
       echo '<div class="row">
                <div class="col-md-12 col-sm-8 col-xs-12">';
          echo breadcrumb();        

          echo '<div class="x_panel tile fixed_height_620">
                <div class="x_title">
                <h2>Cadastrar Midia</h2>
                <ul class="nav navbar-right panel_toolbox">                                   
                </ul>
                <div class="clearfix"></div>
                </div>
                <div class="x_content">';           
                
          erros_validacao();
          get_msg('msgokm');
          get_msg('erromidia');
          get_msg('msgerrom');

          echo form_open_multipart('midia/cadastrar',array('id'=>'demo-form2','class'=>'custom formlogin'));
          //nome arquivo
          echo '<div class="form-group espaco">';
          echo '<label class="control-label col-md-1 col-sm-3 col-xs-12">Nome:</label>';   
          echo '<div class="col-md-5 col-sm-6 col-xs-12">';
          echo form_input(array('name'=>'nome','type'=>'text', 'class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Digite Nome'),set_value('nome'),'autofocus');
          echo '</div>';
          echo '</div><br /><br />';
          //descricao
          echo '<div class="form-group espaco">'; 
          echo '<label class="control-label col-md-1 col-sm-3 col-xs-12">Descrição:</label>';          
          echo '<div class="col-md-5 col-sm-6 col-xs-12">';
          echo form_input(array('name'=>'descricao','type'=>'text', 'class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Digite Descrição'),set_value('descricao'));
          echo '</div>';
          echo '</div><br /><br />';
          //upload
          echo '<div class="form-group espaco">'; 
          echo '<label class="control-label col-md-1 col-sm-3 col-xs-12">Arquivo:</label>';          
          echo '<div class="col-md-4 col-sm-6 col-xs-12">';
          echo form_upload(array('name'=>'arquivo', 'class'=>'col-xs-12'),set_value('arquivo'));
          echo '</div>';
          echo '</div><br /><br />';
          //botoes
          echo '<div class="form-group">';        
          echo '<div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">';
          echo anchor('painel','Cancelar',array('class'=>'btn btn-danger'));
          echo form_submit(array('name'=>'cadastrar','class'=>'btn btn-success'),'Salvar');  
                
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
                 ?>
                  <div>
                    <table class="table table-striped responsive-utilities jambo_table dataTable data-table col-md-12 col-sm-12 col-xs-12" id="example">
                      <thead>
                        <tr>
                          <th>Nome:</th>
                          <th>Link:</th>
                          <th>Miniatura:</th>
                          <th>Ações:</th>                          
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $query = $this->midia->get_all()->result();
                        foreach ($query as $linha) {
                          echo '<tr>';
                          printf('<td>%s</td>',$linha->nome);
                          printf('<td><input class="col-md-11" type="text" value="%s" /></td>',base_url("uploads/$linha->arquivo"));
                          printf('<td class="text-center">%s</td>',thumb($linha->arquivo));
                           printf('<td class="text-center">%s%s%s</td>',anchor("uploads/$linha->arquivo",'&nbsp;&nbsp;&nbsp;&nbsp;',array('class'=>'fa fa-external-link','data-toggle'=>'tooltip','data-placement'=>'top','data-original-title'=>'Visualizar','target'=>'_blank')), anchor("midia/editar/$linha->id",'&nbsp;&nbsp;&nbsp;&nbsp;',array('class'=>'fa fa-cog','data-toggle'=>'tooltip','data-placement'=>'top','data-original-title'=>'Editar')),anchor("midia/excluir/$linha->id",' ',array('class'=>'glyphicon glyphicon-off','data-toggle'=>'tooltip','data-placement'=>'top','data-original-title'=>'Excluir')),'');
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
       $idmidia = $this->uri->segment(3);
    if ($idmidia == NULL) {
      set_msg('msgerroed','Escolha uma midia para alterar','erro');
      redirect('midia/gerenciar');
    }?>
    <div class="row">
                <div class="col-md-12 col-sm-8 col-xs-12">
          <?php echo breadcrumb(); ?>
                
                <div class="x_panel tile fixed_height_620">
                <div class="x_title">
                <h2>Alterar Midia</h2>
                <ul class="nav navbar-right panel_toolbox">                                   
                </ul>
                <div class="clearfix"></div>
                </div>
                <div class="x_content">
    <?php 
    if (is_admin(TRUE)) {
        $query = $this->midia->get_byid($idmidia)->row();
        erros_validacao();
        get_msg('msgokupmidia');
          echo form_open(current_url(),array('id'=>'demo-form2','class'=>'custom'));
          echo '<div class="row">';
          echo '<div class="col-md-6">';
           //nome arquivo
          echo '<div class="form-group espaco">';
          echo '<label class="control-label col-md-1 col-sm-3 col-xs-12">Nome:</label>';   
          echo '<div class="col-md-8 col-sm-6 col-xs-12">';
          echo form_input(array('name'=>'nome','type'=>'text', 'class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Digite Nome'),set_value('nome',$query->nome),'autofocus');
          echo '</div>';
          echo '</div><br /><br />';
          //descricao
          echo '<div class="form-group espaco">'; 
          echo '<label class="control-label col-md-1 col-sm-3 col-xs-12">Descrição:</label>';          
          echo '<div class="col-md-8 col-sm-6 col-xs-12">';
          echo form_input(array('name'=>'descricao','type'=>'text', 'class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Digite Descrição'),set_value('descricao',$query->descricao));
          echo '</div>';
          echo '</div><br /><br />';
          echo '</div>';
          echo '<div class="col-md-6">';
          echo thumb($query->arquivo,200,80);
          echo '</div>';
          echo '</div>';
          //botoes
          echo '<div class="form-group">';        
          echo '<div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">';
          echo anchor('painel','Cancelar',array('class'=>'btn btn-danger'));
          echo form_submit(array('name'=>'editar','class'=>'btn btn-success'),'Salvar');  
                
          echo '</div>'; 
          echo '</div>';
          echo form_hidden('idmidia',$idmidia);
          echo form_close();

          echo'</div>
               </div>
               </div>
               </div>';

      } else {
        redirect('midia/gerenciar');
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