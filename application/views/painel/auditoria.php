<?php
defined('BASEPATH') OR exit('No direct script access allowed');
switch ($tela) {	  
    case 'gerenciar':
      ?>
          <div class="row"> 
            <div class="col-md-12 col-sm-12 col-xs-12">
            <?php echo breadcrumb(); ?>
              <div class="x_panel">
                <div class="x_title">
                  <h2>Auditoria de usuários</h2>
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
                 ?>
                  <div>
                    <table class="table table-striped responsive-utilities jambo_table dataTable data-table col-md-12 col-sm-12 col-xs-12" id="example">
                      <thead>
                        <tr>
                          <th>Usuario:</th>
                          <th>Operação:</th>
                          <th>Observação:</th>
                          <th>Data:</th>                          
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $query = $this->auditoria->get_all()->result();
                        foreach ($query as $linha) {
                          echo '<tr>';
                          printf('<td>%s</td>',$linha->usuario);
                          printf('<td>%s</td>','<span data-toggle="tooltip" data-placement="top" title="'.$linha->query.'" data-original-title="Settings">'.$linha->operacao.'</span>');
                          printf('<td>%s</td>',$linha->observacao);
                          printf('<td>%s</td>',date('d/m/Y H:i:s',strtotime($linha->data_hora)));
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
	  default:
		echo '<div class="alert alert-danger" role="alert">
				  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				  <span class="sr-only">Error:</span>
				  Tela não existe!
			  </div>';
		break;
}