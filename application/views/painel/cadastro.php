 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

switch ($tela) {
    case 'salvar':
    echo '<div class="x_panel tile fixed_height_620">
                <div class="x_title">
                <h2>Cadastrar novo membro</h2>
                <ul class="nav navbar-right panel_toolbox">                                   
                </ul>
                <div class="clearfix"></div>
                </div>
                <div class="x_content">';

    ?>
    

 <div class="container">
            <div class="row text-center">
            <?php erros_validacao(); 
            get_msg('msgerro');
            get_msg('msgok');
            
            ?>

                    
                <div class="col-lg-12">
                <form enctype="multipart/form-data" id="contactform" action="<?php echo base_url('cadastro/salvar'); ?>" name="contactform" method="post" data-scroll-reveal="enter from the bottom after 0.4s">
                            <fieldset class="fild"><legend><h4>Dados Pessoais</h4></legend>

                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <label class="col-lg-2 control-label">Nome:<span class="required">*</span></label>
                                    <input type="text" name="nome" id="nome" class="form-control" placeholder="Digite seu Nome Completo" autofocus="true"> 
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <label class="col-lg-2 control-label">RG:<span class="required">*</span></label>
                                    <input type="text" name="rg" id="rg" class="form-control" placeholder="Digite seu número de RG"> 
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <label class="col-lg-2 control-label">Email:</label>
                                    <input type="text" name="email" id="email" class="form-control" placeholder="Digite seu email"> 
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <label class="col-lg-4 control-label">Escolaridade:</label>
                                    <input type="text" name="escolaridade" id="escolaridade" class="form-control" placeholder="Nível de escolaridade(EX: Ensino Médio Incompleto)"> 
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-12 col-xs-12">
                                <label class="col-lg-4 control-label">Nascimento:<span class="required">*</span></label>
                                    <input type="text" name="dataNasc" id="dataNasc" class="form-control" placeholder="Data de Nascimento"> 
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-12 col-xs-12">
                                <label class="col-lg-2 control-label">UF:<span class="required">*</span></label>
                                    <select id="estado" name="estado" class="form-control"></select> 
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <label class="col-lg-4 control-label">Cidade:<span class="required">*</span></label>
                                    <select id="cidade" name="cidade" class="form-control"></select>  
                                </div> 

                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <label class="col-lg-4 control-label">Sexo (Selecione):<span class="required">*</span></label>
                                     <select id="sexo" name="sexo" class="form-control">
                                         <option>Masculino</option>
                                         <option>Feminino</option>
                                     </select>
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-12 col-xs-12">
                                <label class="col-lg-4 control-label">Estado Civil:<span class="required">*</span></label>
                                     <select id="estadoCivil" name="estadoCivil" class="form-control">
                                         <option>Solteiro</option>
                                         <option>Casado</option>
                                         <option>Separado</option>
                                     </select> 
                                </div> 
                        <div id="c">                                
                                <div class="col-lg-2 col-md-4 col-sm-12 col-xs-12">
                                <label class="col-lg-4 control-label">Data Casamento:</label>
                                    <input type="text" name="dataCas" id="dataCas" class="form-control" placeholder="Data de casamento">
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <label class="col-lg-4 control-label">Nome Cônjuge:</label>
                                   <input type="text" name="conj" id="conj" class="form-control" placeholder="Nome do Conjuge">  
                                </div>  
                                                            
                        </div>
                            </fieldset>
                            <fieldset class="fild1">
                                <legend><h4>Nome dos Filhos</h4></legend>
                                <div class="col-lg-10 col-md-4 col-sm-12 col-xs-12">
                                    <div class="col-lg-5 col-md-4 col-sm-12 col-xs-12">
                                        <label>Nome do Filho:</label>
                                            <input type="text" name="filho1" id="filho1" class="form-control" placeholder="Nome do Filho"> 
                                    </div>
                                    <div class="col-lg-5 col-md-4 col-sm-12 col-xs-12">
                                        <label>Religião do Filho:</label>
                                            <input type="text" name="religiaoF1" id="religiaoF1" class="form-control" placeholder="Religião do Filho"> 
                                    </div>
                                    <div class="col-lg-5 col-md-4 col-sm-12 col-xs-12">
                                        <label>Nome do Filho:</label>
                                        <input type="text" name="filho2" id="filho2" class="form-control" placeholder="Nome do Filho"> 
                                    </div>
                                    <div class="col-lg-5 col-md-4 col-sm-12 col-xs-12">
                                    <label>Religião do Filho:</label>
                                    <input type="text" name="religiaoF2" id="religiaoF2" class="form-control" placeholder="Religião do Filho"> 
                                    </div>
                                    <div class="col-lg-5 col-md-4 col-sm-12 col-xs-12">
                                        <label>Nome do Filho:</label>
                                        <input type="text" name="filho3" id="filho3" class="form-control" placeholder="Nome do Filho"> 
                                    </div>
                                    <div class="col-lg-5 col-md-4 col-sm-12 col-xs-12">
                                    <label>Religião do Filho:</label>
                                    <input type="text" name="religiaoF3" id="religiaoF3" class="form-control" placeholder="Religião do Filho"> 
                                    </div>
                                    <div class="col-lg-5 col-md-4 col-sm-12 col-xs-12">
                                        <label>Nome do Filho:</label>
                                        <input type="text" name="filho4" id="filho4" class="form-control" placeholder="Nome do Filho"> 
                                    </div>
                                    <div class="col-lg-5 col-md-4 col-sm-12 col-xs-12">
                                    <label>Religião do Filho:</label>
                                    <input type="text" name="religiaoF4" id="religiaoF4" class="form-control" placeholder="Religião do Filho"> 
                                    </div>
                                    <div class="col-lg-5 col-md-4 col-sm-12 col-xs-12">
                                        <label>Nome do Filho:</label>
                                        <input type="text" name="filho5" id="filho5" class="form-control" placeholder="Nome do Filho"> 
                                    </div>
                                    <div class="col-lg-5 col-md-4 col-sm-12 col-xs-12">
                                    <label>Religião do Filho:</label>
                                    <input type="text" name="religiaoF5" id="religiaoF5" class="form-control" placeholder="Religião do Filho"> 
                                    </div>
                                    <div class="col-lg-5 col-md-4 col-sm-12 col-xs-12">
                                        <label>Nome do Filho:</label>
                                        <input type="text" name="filho6" id="filho6" class="form-control" placeholder="Nome do Filho"> 
                                    </div>
                                    <div class="col-lg-5 col-md-4 col-sm-12 col-xs-12">
                                    <label>Religião do Filho:</label>
                                    <input type="text" name="religiaoF6" id="religiaoF6" class="form-control" placeholder="Religião do Filho"> 
                                    </div>
                                </div>                            


                            </fieldset>
                            <fieldset class="fild2"><legend><h4>Filiação</h4></legend>
                                <div class="col-lg-6 col-md-4 col-sm-12 col-xs-12">
                                    <label>Nome do pai:<span class="required">*</span></label>
                                    <input type="text" name="pai" id="pai" class="form-control" placeholder="Nome do pai"> 
                                </div>                                
                                <div class="col-lg-6 col-md-4 col-sm-12 col-xs-12">
                                    <label>Nome da mãe:<span class="required">*</span></label>
                                    <input type="text" name="mae" id="mae" class="form-control" placeholder="Nome da mãe"> 
                                </div>                                
                            </fieldset>
                            <fieldset class="fild3"><legend><h4>Dados eclesiásticos</h4></legend>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <label>Data Batismo:</label>
                                    <input type="text" name="dataBat" id="dataBat" class="form-control" placeholder="Data de Batismo">
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <label>Igreja de batismo:<span class="required">*</span></label>
                                    <input type="text" name="igreja" id="igreja" class="form-control" placeholder="Igreja de Batismo">
                                </div>                                
                            </fieldset>
                            <fieldset class="fild4"><legend><h4>Dados de Contato</h4></legend>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <label>Telefone:</label>
                                    <input type="text" name="telefone" id="fone" class="form-control" placeholder="Telefone"> 
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <label>Celular:</label>
                                    <input type="text" name="celular" id="cel" class="form-control" placeholder="Celular"> 
                                </div>
                             </fieldset> 
                             <br>
                             <fieldset class="fild4"> <legend><h4>Endereço residencial</h4></legend>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <label>Endereço:<span class="required">*</span></label>
                                    <input type="text" name="end" id="end" class="form-control" placeholder="Endereço(Rua,Avenida)"> 
                                
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-12 col-xs-12">
                                <label>Número:<span class="required">*</span></label>
                                    <input type="number" name="num" id="num" class="form-control" placeholder="Número endereço"> 
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <label>Bairro:<span class="required">*</span></label>
                                    <input type="text" name="bairro" id="bairro" class="form-control" placeholder="Bairro"> 
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <label>CEP:<span class="required">*</span></label>
                                    <input type="text" name="cep" id="cep" class="form-control" placeholder="CEP Endereço"> 
                                </div>
                                
                                <div class="col-lg-2 col-md-4 col-sm-12 col-xs-12">
                                <label>UF:<span class="required">*</span></label>
                                    <select id="estado1" name="estado1" class="form-control"></select> 
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <label>Cidade:<span class="required">*</span></label>
                                    <select id="cidade1" name="cidade1" class="form-control"></select>  
                                </div>                         
                             </fieldset> 
                             <fieldset class="fild6"><legend><h4>Carregar Foto</h4></legend>
                                 <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <label class="">Carregue sua foto(jpg,png,jpeg,PNG,JPG,JPEG):<span class="required">*</span></label>
                                    <input type="file" name="arquivo" id="arquivo" class="form-control">
                                 </div>
                             </fieldset> 
                                <div class="clearfix"></div>
                                <div class="text-center">
                                    <button type="submit" value="SALVAR" id="submit" class="btn btn-lg btn-contact btn-success">SALVAR</button>
                                </div>
                            <?php echo form_close(); ?><!--</form> End Form -->
                      </div>      
            </div><!-- end row -->
        </div><!-- end container -->
       
<?php
    echo'</div>
               </div>
               </div>
               </div>';
   
        break;
    case 'gerenciar':
      ?>
          <div class="row"> 
            <div class="col-md-12 col-sm-12 col-xs-12">
            <?php echo breadcrumb(); ?>
              <div class="x_panel">
                <div class="x_title">
                  <h2>Lista de Membros</h2>
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
                          <th>Foto:</th>
                          <th>Nome:</th>
                          <th>Telefone:</th>
                          <th>Sexo:</th>
                          <th>Estado Civil:</th>
                          <th>Foto:</th>                           
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $query = $this->cadastro->get_all()->result();
                        foreach ($query as $linha) {
                          echo '<tr>';
                          printf('<td>%s</td>',thumb($linha->arquivo));
                          printf('<td>%s</td>',$linha->nome);
                          printf('<td class="text-center">%s</td>',$linha->telefone);
                          printf('<td class="text-center">%s</td>',$linha->sexo);
                          printf('<td class="text-center">%s</td>',$linha->estadoCivil);                          
                          printf('<td class="text-center">%s</td>','<a href="http://localhost/home/uploads/'.$linha->arquivo.'" class="fa fa-external-link" data-toggle="tooltip" data-placement="top" data-original-title="Visualizar" target="_blank"></a>');
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
    default:
        echo '<div class="alert alert-error"><p>A tela não existe</p></div>';
        break;
}