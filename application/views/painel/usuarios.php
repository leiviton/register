<?php
defined('BASEPATH') OR exit('No direct script access allowed');
switch ($tela) {
	  case 'login':
    
		break;
    case 'confirmacao':
    ?>
       <div class="full-page" data-image='../../assets/img/login.jpeg'>
    <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
    <div class="content" style="margin-top: 80px">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">       
          <?php
            erros_validacao();
            get_msg('msgerro');
            get_msg('msgok');         
           
            ?>
            <div class="card card-login">
                <div class="card-header text-center" data-background-color="blue">
                  <h4 class="card-title">Confirmação</h4>
                </div>
                <div class="card-content">    
                  <div class="form-group">
                    <div class="col-md-6 col-md-offset-4 text-center">                                      
                      <a class="btn btn-primary btn-lg " href="https://direta.net.br/app/public">Ir para o login</a>
                    </div>
                  </div>
                </div>
              </div>   
            </div>
          </div>  
        </div>
        <?php
      break;
    case 'verify':
    ?>
    <div class="full-page" data-image='../../assets/img/login.jpeg'>
    <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
    <div class="content" style="margin-top: 80px">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">       
          <?php
            erros_validacao();
            get_msg('msgerro');
            get_msg('msgok');         
            echo form_open('usuarios/VerifyCadastro',array('class'=>'custom formlogin'));
            ?>
            <div class="card card-login">
                <div class="card-header text-center" data-background-color="blue">
                  <h4 class="card-title">Primeiro Acesso</h4>
                </div>
                <div class="card-content">
                  <div class="col-md-3"></div>
                 <div class="input-group" style="">                  
                  <span class="input-group-addon">
                      <i class="material-icons">face</i>
                  </span>
                  <div class="form-group label-floating is-empty">                    
                    <label class="control-label">Seu CPF</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="cpf" required="true">
                    </div>
                  </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                      <input type="submit" class="btn btn-info" name="enviar" value="Solicitar">                    
                      <a class="btn btn-danger btn-simple" href="https://direta.net.br/app/public/">voltar ao login</a>
                    </div>
                  </div>
                </div>
              </div>         
            
              </form>
            </div>
          </div>  
        </div>
      </div>
    <?php
    break;
    case 'cadastrar_email':
    ?>
     <div class="full-page" data-image='../../assets/img/login.jpeg'>
      <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
      <div class="content" style="margin-top: 80px">
        <div class="container">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">       
            <?php
              erros_validacao();
              get_msg('msgerro');
              get_msg('msgok');         
              echo form_open('usuarios/cadastrar_email',array('class'=>'custom formlogin'));
              ?>
              <div class="card card-login">
                  <div class="card-header text-center" data-background-color="blue">
                    <h4 class="card-title">Cadastrar email</h4>
                  </div>
                  <div class="card-content">
                    <div class="col-md-3"></div>
                    <div class="input-group">
                      <span class="input-group-addon">
                          <i class="material-icons">face</i>
                      </span>
                      <div class="form-group label-floating is-empty">
                        <label class="control-label">Seu CPF</label>
                        <div class="col-md-8">
                          <input type="text" class="form-control" name="cpf" placeholder="Digite seu CPF" required="true">
                        </div>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="material-icons">email</i>
                      </span>
                      <div class="form-group label-floating is-empty">
                        <label class="control-label">Seu Email</label>
                        <div class="col-md-8">
                          <input type="text" class="form-control" name="email" placeholder="Digite seu email" required="true">
                        </div>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-md-offset-4">
                        <input type="submit" class="btn btn-info" name="enviar" value="Cadastrar">                   
                        <a class="btn btn-danger btn-simple" href="https://direta.net.br/app/public/">voltar ao login</a>
                      </div>
                    </div>
                  </div>
                </div>         
              
                </form>
              </div>
            </div>  
          </div>
        </div>
    <?php
    break;    
  case 'alterar_senha':
   ?>
     <div class="full-page" data-image='../../assets/img/login.jpeg'>
      <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
      <div class="content" style="margin-top: 80px">
        <div class="container">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">       
            <?php
              erros_validacao();
              get_msg('msgerro');
              get_msg('msgok');         
              echo form_open('usuarios/alterar_senha',array('class'=>'custom formlogin'));
              ?>
              <div class="card card-login">
                  <div class="card-header text-center" data-background-color="blue">
                    <h4 class="card-title">Cadastrar nova senha</h4>
                  </div>
                  <div class="card-content">
                    <div class="col-md-"></div>
                    <div class="input-group">
                      <span class="input-group-addon">
                          <i class="material-icons">face</i>
                      </span>
                      <div class="form-group label-floating is-empty">                    
                        <label class="control-label">Seu CPF</label>
                        <div class="col-md-8">
                          <input type="text" class="form-control" name="cpf" required="true">
                          <span class="material-input"></span>
                        </div>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock_outline</i>
                        </span>
                    <div class="form-group label-floating is-empty">
                      <label class="control-label">Digite sua nova senha</label>
                        <div class="col-md-8">
                        <input type="password" class="form-control" name="senha" required="true">
                        <span class="material-input"></span>
                      </div>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock_outline</i>
                        </span>
                    <div class="form-group label-floating is-empty">
                      <label class="control-label">Repita a senha</label>
                      <div class="col-md-8">
                        <input type="password" class="form-control" name="senha2" required="true">
                        <span class="material-input"></span>
                      </div>
                    </div>
                  </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-md-offset-4">
                        <input type="submit" class="btn btn-info" name="enviar" value="Cadastrar">                   
                        <a class="btn btn-danger btn-simple" href="https://direta.net.br/app/public">ir para o login</a>
                      </div>
                    </div>
                  </div>
                </div>                       
                </form>
              </div>
            </div>  
          </div>
        </div>
    <?php
    break;
    case 'editar':
       $iduser = $this->uri->segment(3);
    if ($iduser == NULL) {
      set_msg('msgerro','Escolha um usuário para alterar','erro');
      redirect('usuarios/gerenciar_ativo');
    }?>
    <div class="row">
                <div class="col-md-12 col-sm-8 col-xs-12">
          <?php echo breadcrumb(); ?>
                
                <div class="x_panel tile fixed_height_620">
                <div class="x_title">
                <h2>Alterar usuário</h2>
                <ul class="nav navbar-right panel_toolbox">                                   
                </ul>
                <div class="clearfix"></div>
                </div>
                <div class="x_content">
    <?php 
    if (is_admin(TRUE)|| $iduser == $this->session->userdata('user_id')) {
        $query = $this->usuarios->get_byid($iduser)->row();
        erros_validacao();
        get_msg('msgok');
          echo form_open(current_url(),array('id'=>'demo-form2','class'=>'custom formlogin'));
          //NOME USUARIO
          echo '<div class="form-group espaco">';
          echo '<label class="control-label col-md-1 col-sm-3 col-xs-12">Nome:</label>';   
          echo '<div class="col-md-5 col-sm-6 col-xs-12">';
          echo form_input(array('name'=>'nome','type'=>'text', 'class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Digite Nome'),set_value('nome',$query->nome),'autofocus');
          echo '</div>';
          echo '</div><br /><br />';
          //EMAIL
          echo '<div class="form-group espaco">'; 
          echo '<label class="control-label col-md-1 col-sm-3 col-xs-12">Email:</label>';          
          echo '<div class="col-md-5 col-sm-6 col-xs-12">';
          echo form_input(array('name'=>'email','type'=>'text', 'class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Digite Email','disabled'=>'disabled'),set_value('email',$query->email));
          echo '</div>';
          echo '</div><br /><br />';
          //LOGIN
          echo '<div class="form-group espaco">'; 
          echo '<label class="control-label col-md-1 col-sm-3 col-xs-12">Usuário:</label>';          
          echo '<div class="col-md-4 col-sm-6 col-xs-12">';
          echo form_input(array('name'=>'login','type'=>'text', 'class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Digite Login','disabled'=>'disabled'),set_value('login',$query->login));
          echo '</div>';
          echo '</div><br /><br />';
          //adm
           if(is_admin()){
          echo '<div class="form-group espaco">';        
          echo '<div class="col-md-9 col-sm-9 col-xs-12">';
          echo form_checkbox(array('name'=>'adm','class'=>'flat'),1,($query->adm == 1) ? TRUE : FALSE).'Dar poderes de administrador?<br /><br />';         
          echo '</div>'; 
          echo '</div><br /><br />';
          echo '<div class="form-group espaco">';        
          echo '<div class="col-md-9 col-sm-9 col-xs-12">';
          echo form_checkbox(array('name'=>'ativo','class'=>'flat'),1,($query->ativo == 1) ? TRUE : FALSE).'Permitir o acesso desse usuário ao sistema?<br /><br />';         
          echo '</div>'; 
          echo '</div><br /><br />';
          }    
          //botoes
          echo '<div class="form-group">';        
          echo '<div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">';
          echo anchor('painel','Cancelar',array('class'=>'btn btn-primary'));
          echo form_submit(array('name'=>'cadastrar','class'=>'btn btn-success'),'Salvar'); 
          
          echo '</div>'; 
          echo '</div>';
          echo form_hidden('idusuario',$iduser);
          echo form_close();

          echo'</div>
               </div>
               </div>
               </div>';

      } else {
        redirect('usuarios/gerenciar_ativo');
      }
      break;

      case 'senha_alterar':
      ?>

      <div id="page-wrapper">
      <div class="main-page login-page ">
        <h3 class="title1">SignIn Page</h3>
        <div class="widget-shadow">
          <div class="login-top">
            <h4>Criar Nova senha</h4>
          </div>
          <div class="login-body">
          erros_validacao();
          get_msg('msgerro');
          <?php
          echo form_open('usuarios/nova_senha',array('class'=>'custom formlogin'));
          echo form_input(array('name'=>'senha','type'=>'password', 'class'=>'form-control','placeholder'=>'Nova senha','required'=>''),set_value('senha'),'autofocus');
          echo form_input(array('name'=>'senha2','type'=>'password', 'class'=>'form-control','placeholder'=>'Repita senha','required'=>''),set_value('senha2'),'autofocus');
          echo form_submit(array('name'=>'criar'),'Criar');
          echo anchor('usuarios/login','Voltar ao login');
          ?>
          <div class="forgot-grid">
              <div class="forgot">
                  <?php echo anchor('usuarios/login','Fazer login');
           ?>
                </div>
             </div>
             <div class="clearfix"> </div>
              </div>
            </form>
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