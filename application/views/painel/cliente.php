<?php
defined('BASEPATH') OR exit('No direct script access allowed');
switch ($tela) {
	  case 'cadastrar':
	  		?>
	  		<link rel="stylesheet" type="text/css" media="screen"
     href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">

	  		<div id="page-wrapper" style="min-height: 270px; margin-top: -30px;">
			<div class="main-page">
				<div class="forms">
				<?php echo breadcrumb();
				erros_validacao();
          		get_msg('msgok');
          		get_msg('msgerro');

          		$idestado = $this->cliente->get_all_est()->result();

				 ?>
					<div class="row">
						<h3 class="title1">Cadastro de Clientes:</h3>
						<div class="form-three widget-shadow">
							<?php  echo form_open('cliente/cadastrar',array('id'=>'demo-form2','class'=>'form-horizontal')); ?>
							<h4>Dados Pessoais:</h4>
								<br>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Nome Cliente:</label>
									<div class="col-sm-6">
										<input type="text" name="nome" class="form-control1" id="focusedinput" placeholder="Nome Cliente" required="">
									</div>									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">CPF:</label>
									<div class="col-sm-2">
										<input  type='text' name='cpf' class="form-control1" id="focusedinput" placeholder="CPF" onkeypress='mascaraMutuario(this,cpfCnpj)' onblur='clearTimeout()' value="<?php echo set_value('cpf'); ?>" maxlength="14" required="">
									</div>									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">RG:</label>
									<div class="col-sm-2">
										<input type="text" name="rg" class="form-control1" id="focusedinput" placeholder="RG" required="">
									</div>									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Nome do Pai:</label>
									<div class="col-sm-6">
										<input type="text" name="nomePai" class="form-control1" id="focusedinput" placeholder="Nome do Pai" required="">
									</div>									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Nome da mãe:</label>
									<div class="col-sm-6">
										<input type="text" name="nomeMae" class="form-control1" id="focusedinput" placeholder="Nome da mãe" required="">
									</div>									
								</div>    
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Data de Nascimento:</label>
									<div class="col-sm-2">
										<input type="text" name="dataNascimento" class="form-control1" id="dataNascimento" placeholder="Data de Nascimento" required="">
									</div>									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Sexo:</label>
									<div class="col-sm-2">
										<select id="sexo" name="sexo" class="form-control1">
	                                         <option>Masculino</option>
	                                         <option>Feminino</option>
                                     	</select>
									</div>									
								</div>
								<hr>
								<br>
								<h4>Conta debito:</h4>
								<br>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Banco:</label>
									<div class="col-sm-3">
										<input type="text" name="banco" class="form-control1" id="focusedinput" placeholder="Banco dominicilío bancário">
									</div>									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Número Agência:</label>
									<div class="col-sm-2">
										<input type="text" name="agencia" class="form-control1" id="focusedinput" placeholder="Número da agência">
									</div>									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Tipo Conta:</label>
									<div class="col-sm-2">
										<input type="text" name="tipoconta" class="form-control1" id="focusedinput" placeholder="Tipo da conta">
									</div>									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Número Conta:</label>
									<div class="col-sm-2">
										<input type="text" name="conta" class="form-control1" id="focusedinput" placeholder="Número da conta">
									</div>									
								</div>
								


								<hr>
								<br>
								<h4>Contato:</h4>
								<br>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Email:</label>
									<div class="col-sm-4">
										<input type="text" name="email" class="form-control1" id="focusedinput" placeholder="Email Cliente">
									</div>									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Telefone:</label>
									<div class="col-sm-4">
										<input type="text" name="telefone" id="fone" class="form-control1" id="focusedinput" placeholder="Telefone Cliente" required="">
									</div>									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Celular:</label>
									<div class="col-sm-4">
										<input type="text" name="celular" id="cel" class="form-control1" id="focusedinput" placeholder="Celular Cliente">
									</div>									
								</div>
								<hr>
								<br>
								<h4>Endereço Residencial:</h4>
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
										<select id="estado" name="estado" class="form-control1">
											 <?php 												
													foreach($idestado as $idest){
														echo '<option value="'.$idest->idestado.'">'.$array[$idest->idestado] = $idest->estado.'</option>';
													}
											?>
	                                     </select>
									</div>									
								</div>
								<hr>
								<br>
								<h4>Número de Caid:</h4>
								<br>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Caid 1:</label>
									<div class="col-sm-3">
										<input type="text" name="caid" class="form-control1" id="focusedinput" placeholder="Número do CAID 1">
									</div>									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Caid 2:</label>
									<div class="col-sm-3">
										<input type="text" name="caid1" class="form-control1" id="focusedinput" placeholder="Número do CAID 2">
									</div>									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Caid 3:</label>
									<div class="col-sm-3">
										<input type="text" name="caid2" class="form-control1" id="focusedinput" placeholder="Número do CAID 3">
									</div>									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Caid 4:</label>
									<div class="col-sm-3">
										<input type="text" name="caid3" class="form-control1" id="focusedinput" placeholder="Número do CAID 4">
									</div>									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Caid 5:</label>
									<div class="col-sm-3">
										<input type="text" name="caid4" class="form-control1" id="focusedinput" placeholder="Número do CAID 5">
									</div>									
								</div>
								<?php echo form_hidden('chave',$chave);?>
								        <button type="submit" class="btn btn-success botao">Salvar</button>
								        <?php echo anchor('cliente/gerenciar_ativo','Cancelar',array('class'=>'btn btn-danger'));?>
								</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="http://digitalbush.com/wp-content/uploads/2014/10/jquery.maskedinput.js"></script>
	  	<script type="text/javascript">
	  		
	  		function mascaraMutuario(o,f){
			    v_obj=o
			    v_fun=f
			    setTimeout('execmascara()',1)
			}
			 
			function execmascara(){
			    v_obj.value=v_fun(v_obj.value)
			}
			 
			function cpfCnpj(v){
			 
			    //Remove tudo o que não é dígito
			    v=v.replace(/\D/g,"")
			 
			    if (v.length <= 14) { //CPF
			 
			        //Coloca um ponto entre o terceiro e o quarto dígitos
			        v=v.replace(/(\d{3})(\d)/,"$1.$2")
			 
			        //Coloca um ponto entre o terceiro e o quarto dígitos
			        //de novo (para o segundo bloco de números)
			        v=v.replace(/(\d{3})(\d)/,"$1.$2")
			 
			        //Coloca um hífen entre o terceiro e o quarto dígitos
			        v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
			 
			    } 
			 
			    return v
			 
			}

			$('#fone').mask('(99) 9999-9999');
        
         	$('#cel').mask('(99) 99999-9999');

          	$('#dataNascimento').mask('99/99/9999');


          	$('#cep').mask('99.999-999');


	  	</script>
        
	  		<?php 
	  break;
	   case 'gerenciar_ativo':
      ?>
      <div id="page-wrapper" style="min-height: 270px; margin-top: -40px;">
      <?php echo breadcrumb();
				erros_validacao();
          		get_msg('msgok');
          		get_msg('msgerro');?>
          		<h3 class="title1">Gerenciamento de Clientes</h3>		
          		<p><?php echo anchor('cliente/cadastrar','Novo Cliente',array('class'=>'btn btn-success add'));?></p>
          	
			<div class="bs-example widget-shadow datadiv" data-example-id="hoverable-table">
				<table class="table table-hover data-table jambo_table" id="example">
                      <thead>
                        <tr>
                          <th>Código:</th>
                          <th>Nome:</th>
                          <th>CPF:</th>
                          <th>Telefone:</th>
                          <th>Endereco:</th>
                          <th>Bairro:</th>
                          <th>Cidade:</th>
                          <th>Estado:</th>                          
                          <th class="text-center">Ações:</th>  
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $query = $this->cliente->get_ativo()->result();
                        foreach ($query as $linha) {
                          echo '<tr>';
                          printf('<td>%s</td>',$linha->codigo);
                          printf('<td>%s</td>',$linha->nome);
                          printf('<td>%s</td>',$linha->cpf);
                          printf('<td>%s</td>',$linha->telefone);
                          printf('<td>%s,%s</td>',$linha->endereco, $linha->numero);
						  printf('<td>%s</td>',$linha->bairro);
                          printf('<td>%s</td>',$linha->cidade);
                          printf('<td>%s</td>',$linha->estado);
                          printf('<td class="text-center">%s%s%s</td>',anchor("cliente/editar/$linha->codigo",'&nbsp;&nbsp;&nbsp;&nbsp;',array('class'=>'fa fa-edit','data-toggle'=>'tooltip','data-placement'=>'top','data-original-title'=>'Editar')),anchor("cliente/excluir/$linha->codigo",' ',array('class'=>'glyphicon glyphicon-off','data-toggle'=>'tooltip','data-placement'=>'top','data-original-title'=>'Excluir')),'');
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