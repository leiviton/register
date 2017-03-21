<?php
defined('BASEPATH') OR exit('No direct script access allowed');
switch ($tela) {
	  case 'conteudo':
    $query = $this->cliente->count_clientes();
    $queryF = $this->fornecedor->count_fornecedor();
    $queryP = $this->produto->count_produto();
	  		?>
	  	<!-- //header-ends -->
    <!-- main content start-->
    <div id="page-wrapper">
      <div class="main-page">
        <div class="row-one">
          <div class="col-md-4 widget">
            <div class="stats-left ">
              <h5>Gerenciar</h5>
              <a href="cliente/gerenciar_ativo"><h4>Clientes</h4></a>
            </div>
            <div class="stats-right">
              <label><?php printf('<p>%d</p>',$query); ?></label>
            </div>
            <div class="clearfix"> </div> 
          </div>
          <div class="col-md-4 widget states-mdl">
            <div class="stats-left">
              <h5>Gerenciar</h5>
              <a href="fornecedor/gerenciar"><h4>Fornecedores</h4></a>
            </div>
            <div class="stats-right">
              <label><?php printf('<p>%d</p>',$queryF); ?></label>
            </div>
            <div class="clearfix"> </div> 
          </div>
          <div class="col-md-4 widget states-last">
            <div class="stats-left">
              <h5>Gerenciar</h5>
              <a href="produto/cadastrar"><h4>Produtos</h4></a>
            </div>
            <div class="stats-right">
              <label><?php printf('<p>%d</p>',$queryP); ?></label>
            </div>
            <div class="clearfix"> </div> 
          </div>
          
          <div class="clearfix"> </div> 
        </div>
        <div class="charts">
          <div class="clearfix"> </div>
                            
        </div>
        <div class="row">
          <div class="col-md-4 stats-info widget">
            <div class="stats-title">
              <h4 class="title">Browser Stats</h4>
            </div>
            <div class="stats-body">
              <ul class="list-unstyled">
                <li>GoogleChrome <span class="pull-right">85%</span>  
                  <div class="progress progress-striped active progress-right">
                    <div class="bar green" style="width:85%;"></div> 
                  </div>
                </li>
                <li>Firefox <span class="pull-right">35%</span>  
                  <div class="progress progress-striped active progress-right">
                    <div class="bar yellow" style="width:35%;"></div>
                  </div>
                </li>
                <li>Internet Explorer <span class="pull-right">78%</span>  
                  <div class="progress progress-striped active progress-right">
                    <div class="bar red" style="width:78%;"></div>
                  </div>
                </li>
                <li>Safari <span class="pull-right">50%</span>  
                  <div class="progress progress-striped active progress-right">
                    <div class="bar blue" style="width:50%;"></div>
                  </div>
                </li>
                <li>Opera <span class="pull-right">80%</span>  
                  <div class="progress progress-striped active progress-right">
                    <div class="bar light-blue" style="width:80%;"></div>
                  </div>
                </li>
                <li class="last">Others <span class="pull-right">60%</span>  
                  <div class="progress progress-striped active progress-right">
                    <div class="bar orange" style="width:60%;"></div>
                  </div>
                </li> 
              </ul>
            </div>
          </div>
          <div class="col-md-8 stats-info stats-last widget-shadow">
            <table class="table stats-table ">
              <thead>
                <tr>
                  <th>S.NO</th>
                  <th>PRODUCT</th>
                  <th>STATUS</th>
                  <th>PROGRESS</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Lorem ipsum</td>
                  <td><span class="label label-success">In progress</span></td>
                  <td><h5>85% <i class="fa fa-level-up"></i></h5></td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Aliquam</td>
                  <td><span class="label label-warning">New</span></td>
                  <td><h5>35% <i class="fa fa-level-up"></i></h5></td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>Lorem ipsum</td>
                  <td><span class="label label-danger">Overdue</span></td>
                  <td><h5  class="down">40% <i class="fa fa-level-down"></i></h5></td>
                </tr>
                <tr>
                  <th scope="row">4</th>
                  <td>Aliquam</td>
                  <td><span class="label label-info">Out of stock</span></td>
                  <td><h5>100% <i class="fa fa-level-up"></i></h5></td>
                </tr>
                <tr>
                  <th scope="row">5</th>
                  <td>Lorem ipsum</td>
                  <td><span class="label label-success">In progress</span></td>
                  <td><h5 class="down">10% <i class="fa fa-level-down"></i></h5></td>
                </tr>
                <tr>
                  <th scope="row">6</th>
                  <td>Aliquam</td>
                  <td><span class="label label-warning">New</span></td>
                  <td><h5>38% <i class="fa fa-level-up"></i></h5></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="clearfix"> </div>
        </div>
        <div class="row">
          <div class="col-md-8 map widget-shadow">
            <h4 class="title">Visitors Map </h4>
            <div class="map_container"><div id="vmap" style="width: 100%; height: 354px;"></div></div>
            <!--map js-->
            <link href="<?php echo base_url('tema/css/jqvmap.css');?>" rel='stylesheet' type='text/css' />
            <script src="<?php echo base_url('tema/js/jquery.vmap.js');?>"></script>
            <script src="<?php echo base_url('tema/js/jquery.vmap.sampledata.js');?>" type="text/javascript"></script>
            <script src="<?php echo base_url('tema/js/jquery.vmap.world.js');?>" type="text/javascript"></script>
            <script type="text/javascript">
              jQuery(document).ready(function() {
                jQuery('#vmap').vectorMap({
                  map: 'world_en',
                  backgroundColor: '#fff',
                  color: '#696565',
                  hoverOpacity: 0.8,
                  selectedColor: '#696565',
                  enableZoom: true,
                  showTooltip: true,
                  values: sample_data,
                  scaleColors: ['#585858', '#696565'],
                  normalizeFunction: 'polynomial'
                });
              });
            </script>
            <!-- //map js -->
          </div>
          <div class="col-md-4 social-media widget-shadow">
            <div class="wid-social twitter">
              <div class="social-icon">
                <i class="fa fa-twitter text-light icon-xlg "></i>
              </div>
              <div class="social-info">
                <h3 class="number_counter bold count text-light start_timer counted">3.1 K</h3>
                <h4 class="counttype text-light">Tweets</h4>
              </div>
            </div>
            <div class="wid-social google-plus">
              <div class="social-icon">
                <i class="fa fa-google-plus text-light icon-xlg "></i>
              </div>
              <div class="social-info">
                <h3 class="number_counter bold count text-light start_timer counted">523</h3>
                <h4 class="counttype text-light">Circles</h4>
              </div>
            </div>
            <div class="wid-social facebook">
              <div class="social-icon">
                <i class="fa fa-facebook text-light icon-xlg "></i>
              </div>
              <div class="social-info">
                <h3 class="number_counter bold count text-light start_timer counted">1.06K</h3>
                <h4 class="counttype text-light">Likes</h4>
              </div>
            </div>
            <div class="wid-social dribbble">
              <div class="social-icon">
                <i class="fa fa-dribbble text-light icon-xlg "></i>
              </div>
              <div class="social-info">
                <h3 class="number_counter bold count text-light start_timer counted">1.6 K</h3>
                <h4 class="counttype text-light">Subscribers</h4>
              </div>
            </div>
            <div class="wid-social vimeo">
              <div class="social-icon">
                <i class="fa fa-vimeo-square text-light icon-xlg"> </i>
              </div>
              <div class="social-info">
                <h3 class="number_counter bold count text-light start_timer counted">2.1 m</h3>
                <h4 class="counttype text-light">Contacts</h4>
              </div>
            </div>
            <div class="wid-social xing">
              <div class="social-icon">
                <i class="fa fa-xing text-light icon-xlg "></i>
              </div>
              <div class="social-info">
                <h3 class="number_counter bold count text-light start_timer counted">2525</h3>
                <h4 class="counttype text-light">Connections</h4>
              </div>
            </div>
            <div class="wid-social flickr">
              <div class="social-icon">
                <i class="fa fa-android text-light icon-xlg"></i>
              </div>
              <div class="social-info">
                <h3 class="number_counter bold count text-light start_timer counted">1221</h3>
                <h4 class="counttype text-light">Media</h4>
              </div>
            </div>
            <div class="wid-social yahoo">
              <div class="social-icon">
                <i class="fa fa-yahoo text-light icon-xlg"> Y!</i>
              </div>
              <div class="social-info">
                <h3 class="number_counter bold count text-light start_timer counted">2525</h3>
                <h4 class="counttype text-light">Connections</h4>
              </div>
            </div>
            <div class="wid-social rss">
              <div class="social-icon">
                <i class="fa fa-rss text-light icon-xlg"></i>
              </div>
              <div class="social-info">
                <h3 class="number_counter bold count text-light start_timer counted">1523</h3>
                <h4 class="counttype text-light">Subscribers</h4>
              </div>
            </div>
            <div class="wid-social youtube">
              <div class="social-icon">
                <i class="fa fa-youtube text-light icon-xlg"></i>
              </div>
              <div class="social-info">
                <h3 class="number_counter bold count text-light start_timer counted">1523</h3>
                <h4 class="counttype text-light">Subscribers</h4>
              </div>
            </div>
            <div class="clearfix"> </div>
          </div>
          <div class="clearfix"> </div>
        </div>
        <div class="row calender widget-shadow">
          <h4 class="title">Calender</h4>
          <div class="cal1">
            
          </div>
        </div>
        <div class="clearfix"> </div>
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