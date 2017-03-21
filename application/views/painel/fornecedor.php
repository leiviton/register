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

          		$idestado = $this->fornecedor->get_all_est()->result();

				 ?>
					<div class="row">
						<h3 class="title1">Cadastro de Fornecedor:</h3>
						<div class="form-three widget-shadow">
							<?php  echo form_open('fornecedor/cadastrar',array('id'=>'demo-form2','class'=>'form-horizontal')); ?>
							<h4>Dados da Empresa:</h4>
								<br>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Razão Social:</label>
									<div class="col-sm-6">
										<input type="text" name="razaoSocial" class="form-control1" id="focusedinput" placeholder="Razão Social" required="">
									</div>									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">CNPJ:</label>
									<div class="col-sm-2">
										<input  type='text' name='cnpj' class="form-control1" id="cnpj" placeholder="CNPJ" maxlength="18" required="">
									</div>									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Inscrição Estatual:</label>
									<div class="col-sm-2">
										<input type="text" name="inscricaoEstadual" class="form-control1" id="focusedinput" placeholder="Inscrição Estatual" required="">
									</div>									
								</div>
								<hr>
								<br>
								<h4>Contato:</h4>
								<br>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Nome de Contato:</label>
									<div class="col-sm-4">
										<input type="text" name="nomeContato" class="form-control1" id="focusedinput" placeholder="Nome de Contato">
									</div>									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Email:</label>
									<div class="col-sm-4">
										<input type="text" name="email" class="form-control1" id="focusedinput" placeholder="Email Cliente">
									</div>									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Telefone:</label>
									<div class="col-sm-2">
										<input type="text" name="telefone" id="fone" class="form-control1" id="focusedinput" placeholder="Telefone Cliente" required="">
									</div>									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Celular:</label>
									<div class="col-sm-2">
										<input type="text" name="celular" id="cel" class="form-control1" id="focusedinput" placeholder="Celular Cliente">
									</div>									
								</div>
								<hr>
								<br>
								<h4>Endereço Comercial:</h4>
								<br>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Logradouro:</label>
									<div class="col-sm-4">
										<input type="text" name="endereco" class="form-control1" id="focusedinput" placeholder="Rua,Avenita,etc" required="">
									</div>									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Número:</label>
									<div class="col-sm-2">
										<input type="text" name="numero" class="form-control1" id="focusedinput" placeholder="Número" required="">
									</div>									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Bairro:</label>
									<div class="col-sm-4">
										<input type="text" name="bairro" class="form-control1" id="focusedinput" placeholder="Bairro" required="">
									</div>									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">CEP:</label>
									<div class="col-sm-2">
										<input type="text" name="cep" class="form-control1" id="cep" placeholder="CEP do endereço" required="">
									</div>									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Cidade:</label>
									<div class="col-sm-4">
										<input type="text" name="cidade" class="form-control1" id="focusedinput" placeholder="Cidade" required="">
									</div>									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Estado:</label>
									<div class="col-sm-2">
										<select id="estado" name="estado" class="estado form-control">
											 <?php 												
													foreach($idestado as $idest){
														echo '<option value="'.$idest->idestado.'" selected="selected">'.$array[$idest->idestado] = $idest->estado.'</option>';
													}
											?>
	                                     </select>
									</div>									
								</div>
								
								
								        <button type="submit" class="btn btn-success botao">Salvar</button>
								        <?php echo anchor('fornecedor/gerenciar','Cancelar',array('class'=>'btn btn-danger'));?>
								</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="http://digitalbush.com/wp-content/uploads/2014/10/jquery.maskedinput.js"></script>
	  	<script type="text/javascript">
	  		$('#fone').mask('(99) 9999-9999');
        
         	$('#cel').mask('(99) 99999-9999');

          	$('#dataNascimento').mask('99/99/9999');

          	$('#cep').mask('99.999-999');

          	$('#cnpj').mask('99.999.999/9999-99');

          	$(document).ready(function() {
  					 $("select.estado").select2({
  					 		theme: "classic",
  					 		placeholder: "Selecione",
  							allowClear: false
  					 	 });
  					 
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
          		<h3 class="title1">Gerenciamento de Fornecedores</h3>		
          		<p><?php echo anchor('fornecedor/cadastrar','Novo Fornecedor',array('class'=>'btn btn-primary add'));?></p>
          	
			<div class="bs-example widget-shadow datadiv" data-example-id="hoverable-table">
				<table class="table table-hover data-table jambo_table" id="example">
                      <thead>
                        <tr>
                          <th>Código:</th>
                          <th>Razão:</th>
                          <th>CNPJ:</th>
                          <th>Telefone:</th>
                          <th>Contato:</th>                          
                          <th>Endereço:</th>
                          <th>Bairro:</th>
                          <th>CEP:</th>
                          <th>Cidade:</th>
                          <th>Estado:</th>                          
                          <th class="text-center">Ações:</th>  
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $query = $this->fornecedor->get_ativo()->result();
                        foreach ($query as $linha) {
                          echo '<tr>';
                          printf('<td>%s</td>',$linha->codigo);
                          printf('<td>%s</td>',$linha->razaoSocial);
                          printf('<td>%s</td>',$linha->cnpj);
                          printf('<td>%s</td>',$linha->telefone);
                          printf('<td>%s</td>',$linha->nomeContato);
                          printf('<td>%s,%s</td>',$linha->endereco, $linha->numero);
						  printf('<td>%s</td>',$linha->bairro);
						  printf('<td>%s</td>',$linha->cep);
                          printf('<td>%s</td>',$linha->cidade);
                          printf('<td>%s</td>',$linha->estado);
                          printf('<td class="text-center">%s%s%s</td>',anchor("fornecedor/editar/$linha->codigo",'&nbsp;&nbsp;&nbsp;&nbsp;',array('class'=>'fa fa-edit','data-toggle'=>'tooltip','data-placement'=>'top','data-original-title'=>'Editar')),anchor("fornecedor/excluir/$linha->codigo",' ',array('class'=>'glyphicon glyphicon-off','data-toggle'=>'tooltip','data-placement'=>'top','data-original-title'=>'Excluir')),'');
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