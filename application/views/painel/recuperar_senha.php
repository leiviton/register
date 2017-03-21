<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<html class=" js " style="overflow: hidden;"><head>
<title>Nova Senha|Painel ADM</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" content="Jotasat">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="http://jotasat.com.br/sistema/tema/css/bootstrap.css" rel="stylesheet" type="text/css">
<!-- Custom CSS -->
<link href="http://jotasat.com.br/sistema/tema/css/style.css" rel="stylesheet" type="text/css">
<!-- font CSS -->
<!-- font-awesome icons -->
<link href="http://jotasat.com.br/sistema/tema/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
 <!-- js-->
<script src="http://jotasat.com.br/sistema/tema/js/jquery-1.11.1.min.js"></script>
<script src="http://jotasat.com.br/sistema/tema/js/modernizr.custom.js"></script>
<!--webfonts-->
<link href="//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css">
<!--//webfonts--> 
<!--animate-->
<link href="http://jotasat.com.br/sistema/tema/css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="http://jotasat.com.br/sistema/tema/js/wow.min.js"></script>
  <script>
     new WOW().init();
  </script>
<!--//end-animate-->
<!-- chart -->
<script src="http://jotasat.com.br/sistema/tema/js/Chart.js"></script>
<!-- //chart -->
<!--Calender-->
<link rel="stylesheet" href="http://jotasat.com.br/sistema/tema/css/clndr.css" type="text/css">
<script src="http://jotasat.com.br/sistema/tema/js/underscore-min.js" type="text/javascript"></script>
<script src="http://jotasat.com.br/sistema/tema/js/moment-2.2.1.js" type="text/javascript"></script>
<!--End Calender-->
<!-- Metis Menu -->
<script src="http://jotasat.com.br/sistema/tema/js/metisMenu.min.js"></script>
<script src="http://jotasat.com.br/sistema/tema/js/custom.js"></script>
<link href="http://jotasat.com.br/sistema/tema/css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
<!-- Classie -->
      <!-- Bootstrap Core JavaScript -->
   <script src="http://jotasat.com.br/sistema/tema/js/bootstrap.js"> </script>

</head> 
<body class="cbp-spmenu-push" cz-shortcut-listen="true">
  <div class="main-content">
    <!--left-fixed -navigation-->
        </div>

            <!-- main content start-->
    <div id="page-wrapper" style="min-height: 286px;">
      <div class="main-page login-page ">
        <h3 class="title1">Nova Senha</h3><div class="widget-shadow">
          <div class="login-top">
           </div>
          <div class="login-body">
          <?php
          echo form_open('usuarios/gravar_senha',array('class'=>'custom formlogin'));
          echo '<div>';
          erros_validacao();
          get_msg('msgok');
          get_msg('msgerro');         
         
          echo form_submit(array('name'=>'criar','class'=>'btn btn-default submit'),'Criar');
          echo form_hidden('chave',$chave);
          echo anchor('usuarios/login','Voltar ao login');
          echo '</div>';
          echo form_close();

?>
          </div>
        </div>  
      </div>
    </div>
    
  
      
  
  <script src="http://jotasat.com.br/sistema/tema/js/classie.js"></script>
    <script>
      var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
        showLeftPush = document.getElementById( 'showLeftPush' ),
        body = document.body;
        
      showLeftPush.onclick = function() {
        classie.toggle( this, 'active' );
        classie.toggle( body, 'cbp-spmenu-push-toright' );
        classie.toggle( menuLeft, 'cbp-spmenu-open' );
        disableOther( 'showLeftPush' );
      };
      

      function disableOther( button ) {
        if( button !== 'showLeftPush' ) {
          classie.toggle( showLeftPush, 'disabled' );
        }
      }
    </script>
  <!--scrolling js-->
  <script src="http://jotasat.com.br/sistema/tema/js/jquery.nicescroll.js"></script>
  <script src="http://jotasat.com.br/sistema/tema/js/scripts.js"></script>
  <div id="ascrail2000" class="nicescroll-rails" style="width: 6px; z-index: 1000; cursor: default; position: fixed; top: 0px; height: 100%; right: 0px; opacity: 0; background: rgb(66, 79, 99);"><div style="position: relative; top: 1px; float: right; width: 6px; height: 191px; border: 0px; border-radius: 10px; background-color: rgb(242, 179, 63); background-clip: padding-box;"></div></div><div id="ascrail2000-hr" class="nicescroll-rails" style="height: 6px; z-index: 1000; position: fixed; left: 0px; width: 100%; bottom: 0px; cursor: default; display: none; opacity: 0; background: rgb(66, 79, 99);"><div style="position: relative; top: 0px; height: 6px; width: 1366px; border: 0px; border-radius: 10px; background-color: rgb(242, 179, 63); background-clip: padding-box;"></div></div>
  <!--//scrolling js-->

  
</body></html>

