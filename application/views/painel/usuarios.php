<?php
defined('BASEPATH') OR exit('No direct script access allowed');
switch ($tela) {
	  case 'login':
      	  /*echo '<div class="login">
                <div id="wrapper">
                <div id="login" class="animate form">
                <section class="login_content">';
          echo form_open('usuarios/login',array('class'=>'custom formlogin'));
          echo '<h1><strong>Acesso restrito</strong></h1>
                <div>';
          erros_validacao();
          get_msg('logoffok');
          get_msg('msgok');
          get_msg('msgals');
          get_msg('errolink');
          get_msg('errologin');
          get_msg('msgerro');
          echo form_input(array('name'=>'usuario','type'=>'text', 'class'=>'form-control','placeholder'=>'Usuário'),set_value('usuario'),'autofocus');
          echo form_hidden('redirect',$this->session->userdata('redir_para'));
          echo '</div>';
          echo '<div>';
          echo form_input(array('name'=>'senha','type'=>'password', 'class'=>'form-control','placeholder'=>'Sua senha'),set_value('senha'));
          echo '</div>';
          echo '<div>';         
          echo form_submit(array('name'=>'logar','class'=>'btn btn-default submit'),'Login');
          echo anchor('usuarios/nova_senha','Esqueceu sua senha?');
          echo '</div>';
          echo '<div class="clearfix"></div>
                <div class="separator">
					      <div class="clearfix"></div>
                <br />
                <div>
                <h1>Administração de sistemas!</h1>
					  		</div>
                </div>';
          echo form_close();
          echo '</section>';
          echo'</div>';
          */
          ?>
          <!-- main content start-->
    <div id="page-wrapper">
      <div class="main-page login-page ">
        <h3 class="title1">Acesso Restrito</h3>
        <div class="widget-shadow">
          <div class="login-top">
            <h4>Bem vindo ao JotaSat AdminPanel!</h4>
          </div>
          <div class="login-body">
          <?php erros_validacao();
          get_msg('logoffok');
          get_msg('msgok');
          get_msg('msgals');
          get_msg('errolink');
          get_msg('errologin');
          get_msg('msgerro');
           
             echo form_open('usuarios/login',array('class'=>'custom formlogin')); ?>
              <input type="text" class="user" name="usuario" placeholder="Seu Usuário" required="">
              <input type="password" name="senha" class="lock" placeholder="senha"  required="">
              <?php echo form_submit(array('name'=>'logar'),'Login'); ?>
              <div class="forgot-grid">
                <div class="forgot">
                  <?php echo anchor('usuarios/nova_senha','Esqueceu sua senha?');
           ?>
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
                    <div class="col-md-6 col-md-offset-4">                                       
                      <a class="btn btn-success btn-lg" href="https://direta.net.br/app/public">Ir para o login</a>
                    </div>
                  </div>
                </div>
              </div>         
            
              
            </div>
          </div>  
        </div>
        <?php
      break;
    case 'nova_senha':
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

                  <div class="form-group">
                    <label class="col-md-4 control-label">Seu CPF</label>
                    <div class="col-md-6">
                      <input type="text" class="form-control" name="cpf" placeholder="Digite seu CPF" required="true">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                      <input type="submit" class="btn btn-info" name="enviar" value="Solicitar">                    
                      <a class="btn btn-danger btn-simple" href="#">voltar ao login</a>
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
                    <div class="form-group">
                      <label class="col-md-4 control-label">Seu CPF</label>
                      <div class="col-md-6">
                        <input type="text" class="form-control" name="cpf" placeholder="Digite seu CPF" required="true">
                      </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                      <label class="col-md-4 control-label">Seu Email</label>
                      <div class="col-md-6">
                        <input type="text" class="form-control" name="email" placeholder="Digite seu email" required="true">
                      </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-md-offset-4">
                        <input type="submit" class="btn btn-info" name="enviar" value="Cadastrar">                   
                        <a class="btn btn-danger btn-simple" href="#">voltar ao login</a>
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
    case 'cadastrar':
          echo ' <!-- page content -->
         <div class="row">
                <div class="col-md-12 col-sm-8 col-xs-12">';
          echo breadcrumb();        

          echo '<div class="x_panel tile fixed_height_620">
                <div class="x_title">
                <h2>Cadastrar novo usuário</h2>
                <ul class="nav navbar-right panel_toolbox">                                   
                </ul>
                <div class="clearfix"></div>
                </div>
                <div class="x_content">';           
                
          erros_validacao();
          get_msg('msgok');
          echo form_open('usuarios/cadastrar',array('id'=>'demo-form2','class'=>'custom formlogin'));
          //NOME USUARIO
          echo '<div class="form-group espaco">';
          echo '<label class="control-label col-md-1 col-sm-3 col-xs-12">Nome:</label>';   
          echo '<div class="col-md-5 col-sm-6 col-xs-12">';
          echo form_input(array('name'=>'nome','type'=>'text', 'class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Digite Nome'),set_value('nome'),'autofocus');
          echo '</div>';
          echo '</div><br /><br />';
          //EMAIL
          echo '<div class="form-group espaco">'; 
          echo '<label class="control-label col-md-1 col-sm-3 col-xs-12">Email:</label>';          
          echo '<div class="col-md-5 col-sm-6 col-xs-12">';
          echo form_input(array('name'=>'email','type'=>'text', 'class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Digite Email'),set_value('email'));
          echo '</div>';
          echo '</div><br /><br />';
          //LOGIN
          echo '<div class="form-group espaco">'; 
          echo '<label class="control-label col-md-1 col-sm-3 col-xs-12">Usuário:</label>';          
          echo '<div class="col-md-4 col-sm-6 col-xs-12">';
          echo form_input(array('name'=>'login','type'=>'text', 'class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Digite Login'),set_value('login'));
          echo '</div>';
          echo '</div><br /><br />';
          //SENHA
          echo '<div class="form-group espaco">';    
          echo '<label class="control-label col-md-1 col-sm-3 col-xs-12">Senha:</label>';       
          echo '<div class="col-md-3 col-sm-6 col-xs-12">';
          echo form_input(array('name'=>'senha','type'=>'password', 'class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Digite Senha'),set_value('senha'));
          echo '</div>';
          echo '</div><br /><br />';
          echo '<div class="form-group espaco">';
          echo '<label class="control-label col-md-1 col-sm-3 col-xs-12">Repita a Senha:</label>';       
          echo '<div class="col-md-3 col-sm-6 col-xs-12">';
          echo form_input(array('name'=>'senha2','type'=>'password', 'class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Repita a Senha'),set_value('senha2'));
          echo '</div>';
          echo '</div><br /><br />';
          //ADM
          if(is_admin()){
          echo '<div class="form-group espaco">';        
          echo '<div class="col-md-9 col-sm-9 col-xs-12">';
          echo form_checkbox(array('name'=>'adm','class'=>'flat'),1).'Dar poderes de administrador?<br /><br />';         
          echo '</div>'; 
          echo '</div><br /><br />';
          }
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
               </div>';
    break;
    case 'gerenciar_ativo':
      ?>

          <div class="row">
          
         
            <div class="col-md-12 col-sm-12 col-xs-12">
            <?php echo breadcrumb(); ?>
              <div class="x_panel">
                <div class="x_title">
                  <h2>Gerenciamento de usuários ativos</h2>
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
                          <th>Nome:</th>
                          <th>Login:</th>
                          <th>Email:</th>
                          <th>Ativo / Admin</th>
                          <th class="text-center">Ações:</th>  
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $query = $this->usuarios->get_ativo()->result();
                        foreach ($query as $linha) {
                          echo '<tr>';
                          printf('<td>%s</td>',$linha->nome);
                          printf('<td>%s</td>',$linha->login);
                          printf('<td>%s</td>',$linha->email);
                          printf('<td>%s / %s</td>',($linha->ativo==0) ? 'Não' : 'Sim',($linha->adm==0) ? 'Não' : 'Sim');
                          printf('<td class="text-center">%s%s%s</td>',anchor("usuarios/editar/$linha->id",'&nbsp;&nbsp;&nbsp;&nbsp;',array('class'=>'fa fa-edit','data-toggle'=>'tooltip','data-placement'=>'top','data-original-title'=>'Editar')), anchor("usuarios/alterar_senha/$linha->id",'&nbsp;&nbsp;&nbsp;&nbsp;',array('class'=>'fa fa-cog','data-toggle'=>'tooltip','data-placement'=>'top','data-original-title'=>'Nova Senha')),anchor("usuarios/excluir/$linha->id",' ',array('class'=>'glyphicon glyphicon-off','data-toggle'=>'tooltip','data-placement'=>'top','data-original-title'=>'Excluir')),'');
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
   case 'gerenciar_inativo':
      ?>
          <div class="row">
          <script type="text/javascript">
            $(function(){
              $(".deletereg").click(function(){
                if (confim("Deseja excluir este usuário?\n Ação não poderá ser desfeita!"))return true; else return false;
              });
            });
          </script>
            <div class="col-md-12 col-sm-12 col-xs-12">
          <?php echo breadcrumb(); ?>

              <div class="x_panel">
                <div class="x_title">
                  <h2>Gerenciamento de usuários Inativos</h2>
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
                          <th>Nome:</th>
                          <th>Login:</th>
                          <th>Email:</th>
                          <th>Ativo / Admin</th>
                          <th class="text-center">Ações:</th>  
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $query = $this->usuarios->get_inativo()->result();
                        foreach ($query as $linha) {
                          echo '<tr>';
                          printf('<td>%s</td>',$linha->nome);
                          printf('<td>%s</td>',$linha->login);
                          printf('<td>%s</td>',$linha->email);
                          printf('<td>%s / %s</td>',($linha->ativo==0) ? 'Não' : 'Sim',($linha->adm==0) ? 'Não' : 'Sim');
                          printf('<td class="text-center">%s%s%s</td>',anchor("usuarios/editar/$linha->id",'&nbsp;&nbsp;&nbsp;&nbsp;',array('class'=>'fa fa-edit','data-toggle'=>'tooltip','data-placement'=>'top','data-original-title'=>'Editar')), anchor("usuarios/alterar_senha/$linha->id",'&nbsp;&nbsp;&nbsp;&nbsp;',array('class'=>'fa fa-cog','data-toggle'=>'tooltip','data-placement'=>'top','data-original-title'=>'Nova Senha')),anchor("usuarios/excluir/$linha->id",' ',array('class'=>'glyphicon glyphicon-off','data-toggle'=>'tooltip','data-placement'=>'top','data-original-title'=>'Excluir')),'');
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
  case 'alterar_senha':
    $iduser = $this->uri->segment(3);
    if ($iduser == NULL) {
      set_msg('msgerro','Escolha um usuário para alterar','erro');
      redirect('usuarios/gerenciar_ativo');
    }?>
    <div class="row">
                <div class="col-md-12 col-sm-8 col-xs-12">
                <div class="x_panel tile fixed_height_620">
                <div class="x_title">
                <h2>Alterar Senha usuário</h2>
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
          echo form_input(array('name'=>'nome','type'=>'text', 'class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Digite Nome','disabled'=>'disabled'),set_value('nome',$query->nome));
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
          //SENHA
          echo '<div class="form-group espaco">';    
          echo '<label class="control-label col-md-1 col-sm-3 col-xs-12">Nova Senha:</label>';       
          echo '<div class="col-md-3 col-sm-6 col-xs-12">';
          echo form_input(array('name'=>'senha','type'=>'password', 'class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Digite Senha'),set_value('senha'),'autofocus');
          echo '</div>';
          echo '</div><br /><br />';
          echo '<div class="form-group espaco">';
          echo '<label class="control-label col-md-1 col-sm-3 col-xs-12">Repita a Senha:</label>';       
          echo '<div class="col-md-3 col-sm-6 col-xs-12">';
          echo form_input(array('name'=>'senha2','type'=>'password', 'class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Repita a Senha'),set_value('senha2'),'autofocus');
          echo '</div>';
          echo '</div><br /><br />';    
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