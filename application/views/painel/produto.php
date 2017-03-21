<?php
defined('BASEPATH') OR exit('No direct script access allowed');
switch ($tela) {
	  case 'cadastrar':
	  		?>
	  	<div id="page-wrapper" style="min-height: 270px; margin-top: -30px;">
			<div class="main-page">
				<div class="forms">
				<?php echo breadcrumb();
				erros_validacao();
          		get_msg('msgok');
          		get_msg('msgerro');

          		
				 ?>
					<div class="row">
						<h3 class="title1">Cadastro de produto:</h3>
						<div class="form-three widget-shadow">
							<?php  echo form_open('produto/cadastrar',array('id'=>'demo-form2','class'=>'form-horizontal')); ?>
							<h4>Dados da Empresa:</h4>
								<br>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Nome:</label>
									<div class="col-sm-4">
										<input type="text" name="nome" class="form-control1" id="focusedinput" placeholder="Nome Produto" required="">
									</div>									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Descrição:</label>
									<div class="col-sm-4">
										<input  type='text' name='descricao' class="form-control1" id="descricao" placeholder="Descrição Produto" required="">
									</div>									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Preço de Custo:</label>
									<div class="col-sm-2">
										<input type="text" name="precoCusto" class="form-control1 money" id="precoCusto" placeholder="Preço de custo" required="">
									</div>									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Preço de Venda:</label>
									<div class="col-sm-2">
										<input type="text" name="precoVenda" class="form-control1 money" id="precoVenda" placeholder="Preço de venda" required="">
									</div>									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Estoque:</label>
									<div class="col-sm-2">
										<input type="text" name="estoque" class="form-control1" id="estoque" placeholder="Estoque" required="">
									</div>									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Estoque Minimo:</label>
									<div class="col-sm-2">
										<input type="text" name="estoqueMinimo" class="form-control1" id="estoqueMinimo" placeholder="Estoque minimo" required="">
									</div>									
								</div>
								
								<hr>
								        <button type="submit" class="btn btn-success botao">Salvar</button>
								        <?php echo anchor('fornecedor/gerenciar','Cancelar',array('class'=>'btn btn-danger'));?>
								</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="<?php echo base_url('tema/js/jquery.js');?>"></script>
		<script src="<?php echo base_url('tema/js/jquery.maskmoney.js');?>"></script>
		<script type="text/javascript">
	        $(document).ready(function(){
	              $("input.money").maskMoney({showSymbol:true, symbol:"R$ ", decimal:".", thousands:"."});
	        });
	    </script>
		  		<?php 
	  break;
	   case 'gerenciar':
      ?>
      <div id="page-wrapper" style="min-height: 270px; margin-top: -40px;">
      <?php echo breadcrumb();
				erros_validacao();
          		get_msg('msgok');
          		get_msg('msgerro');?>
          		<h3 class="title1">Gerenciamento de produtos</h3>		
          		<p><?php echo anchor('produto/cadastrar','Novo Produto',array('class'=>'btn btn-primary add'));?></p>
          	
			<div class="bs-example widget-shadow datadiv" data-example-id="hoverable-table">
				<table class="table table-hover data-table jambo_table" id="example">
                      <thead>
                        <tr>
                          <th>Código:</th>
                          <th>Nome:</th>
                          <th>Descricao:</th>
                          <th>Preço:</th>
                          <th>Quantidade:</th>                          
                          <th class="text-center">Ações:</th>  
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $query = $this->produto->get_all()->result();
                        foreach ($query as $linha) {
                          echo '<tr>';
                          printf('<td>%s</td>',$linha->idproduto);
                          printf('<td>%s</td>',$linha->nome);
                          printf('<td>%s</td>',$linha->descricao);
                          printf('<td>%s</td>',$linha->precoVenda);
                          printf('<td>%s</td>',$linha->estoque);
                          printf('<td class="text-center">%s%s%s</td>',anchor("produto/editar/$linha->idproduto",'&nbsp;&nbsp;&nbsp;&nbsp;',array('class'=>'fa fa-edit','data-toggle'=>'tooltip','data-placement'=>'top','data-original-title'=>'Editar')),anchor("produto/excluir/$linha->idproduto",' ',array('class'=>'glyphicon glyphicon-off','data-toggle'=>'tooltip','data-placement'=>'top','data-original-title'=>'Excluir')),'');
                          echo '</tr>';
                          }
                         ?>
                      </tbody>
                    </table>
            </div>
        </div>
        <script src="<?php echo base_url("tema"); ?>/js/jquery.dataTables.js"></script>        
        <script src="<?php echo base_url("tema"); ?>/js/dataTables.tableTools.js"></script>
    	<script src="<?php echo base_url("tema"); ?>/js/table.js"></script>

    	
          
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