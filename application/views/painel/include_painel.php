     <script type="text/javascript" src="<?php  echo base_url("assets"); ?>/js/notify/pnotify.core.js"></script>                                        
     <script type="text/javascript" src="<?php echo base_url("assets"); ?>/js/notify/pnotify.buttons.js"></script>
     <script type="text/javascript" src="<?php echo base_url("assets"); ?>/js/notify/pnotify.nonblock.js"></script>

    <script>
        $(function () {
            var cnt = 10; //$("#custom_notifications ul.notifications li").length + 1;
            TabbedNotification = function (options) {
                var message = "<div id='ntf" + cnt + "' class='text alert-" + options.type + "' style='display:none'><h2><i class='fa fa-bell'></i> " + options.title + "</h2><div class='close'><a href='javascript:;' class='notification_close'><i class='fa fa-close'></i></a></div><p>" + options.text + "</p></div>";

                if (document.getElementById('custom_notifications') == null) {
                    alert('doesnt exists');
                } else {
                    $('#custom_notifications ul.notifications').append("<li><a id='ntlink" + cnt + "' class='alert-" + options.type + "' href='#ntf" + cnt + "'><i class='fa fa-bell animated shake'></i></a></li>");
                    $('#custom_notifications #notif-group').append(message);
                    cnt++;
                    CustomTabs(options);
                }
            }

            CustomTabs = function (options) {
                $('.tabbed_notifications > div').hide();
                $('.tabbed_notifications > div:first-of-type').show();
                $('#custom_notifications').removeClass('dsp_none');
                $('.notifications a').click(function (e) {
                    e.preventDefault();
                    var $this = $(this),
                        tabbed_notifications = '#' + $this.parents('.notifications').data('tabbed_notifications'),
                        others = $this.closest('li').siblings().children('a'),
                        target = $this.attr('href');
                    others.removeClass('active');
                    $this.addClass('active');
                    $(tabbed_notifications).children('div').hide();
                    $(target).show();
                });
            }

            CustomTabs();

            var tabid = idname = '';
            $(document).on('click', '.notification_close', function (e) {
                idname = $(this).parent().parent().attr("id");
                tabid = idname.substr(-2);
                $('#ntf' + tabid).remove();
                $('#ntlink' + tabid).parent().remove();
                $('.notifications a').first().addClass('active');
                $('#notif-group div').first().css('display','block');
            });
        })
    </script>

    <script src="<?php echo base_url("assets"); ?>/js/bootstrap.min.js"></script>

    <!-- gauge js -->
    <script type="text/javascript" src="<?php echo base_url("assets"); ?>/js/gauge/gauge.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url("assets"); ?>/js/gauge/gauge_demo.js"></script>
    <!-- chart js -->
    <script src="<?php echo base_url("assets"); ?>/js/chartjs/chart.min.js"></script>
    <!-- bootstrap progress js -->
    <script src="<?php echo base_url("assets"); ?>/js/progressbar/bootstrap-progressbar.min.js"></script>
    <script src="<?php echo base_url("assets"); ?>/js/nicescroll/jquery.nicescroll.min.js"></script>
    <!-- icheck -->
    <script src="<?php echo base_url("assets"); ?>/js/icheck/icheck.min.js"></script>
    <!-- daterangepicker -->
    <script type="text/javascript" src="<?php echo base_url("assets"); ?>/js/moment/moment.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url("assets"); ?>/js/datepicker/daterangepicker.js"></script>

    <script src="<?php echo base_url("assets"); ?>/js/custom.js"></script>
    <!--dataTable-->
    <script src="<?php echo base_url("assets"); ?>/js/datatables/js/jquery.dataTables.js"></script>
    <script src="<?php echo base_url("assets"); ?>/js/datatables/tools/js/dataTables.tableTools.js"></script>
    
    <!-- flot js -->
    <!--[if lte IE 8]><script type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
    <script type="text/javascript" src="<?php echo base_url("assets"); ?>/js/flot/jquery.flot.js"></script>
    <script type="text/javascript" src="<?php echo base_url("assets"); ?>/js/flot/jquery.flot.pie.js"></script>
    <script type="text/javascript" src="<?php echo base_url("assets"); ?>/js/flot/jquery.flot.orderBars.js"></script>
    <script type="text/javascript" src="<?php echo base_url("assets"); ?>/js/flot/jquery.flot.time.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url("assets"); ?>/js/flot/date.js"></script>
    <script type="text/javascript" src="<?php echo base_url("assets"); ?>/js/flot/jquery.flot.spline.js"></script>
    <script type="text/javascript" src="<?php echo base_url("assets"); ?>/js/flot/jquery.flot.stack.js"></script>
    <script type="text/javascript" src="<?php echo base_url("assets"); ?>/js/flot/curvedLines.js"></script>
    <script type="text/javascript" src="<?php echo base_url("assets"); ?>/js/flot/jquery.flot.resize.js"></script>
    <!-- worldmap -->
    <script type="text/javascript" src="<?php echo base_url("assets"); ?>/js/maps/jquery-jvectormap-2.0.3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url("assets"); ?>/js/maps/gdp-data.js"></script>
    <script type="text/javascript" src="<?php echo base_url("assets"); ?>/js/maps/jquery-jvectormap-world-mill-en.js"></script>
    <script type="text/javascript" src="<?php echo base_url("assets"); ?>/js/maps/jquery-jvectormap-us-aea-en.js"></script>
    <!-- pace -->
    <script src="<?php echo base_url("assets"); ?>/js/pace/pace.min.js"></script>   
    <script>
        NProgress.done();

            $(document).ready(function () {
                $('input.tableflat').iCheck({
                    checkboxClass: 'icheckbox_flat-green',
                    radioClass: 'iradio_flat-green'
                });
            });

            var asInitVals = new Array();
            $(document).ready(function () {
                var oTable = $('#example').dataTable({
                    "oLanguage": {
                    "sProcessing":   "Processando...",
                    "sLengthMenu":   "Mostrar _MENU_ registros",
                    "sZeroRecords":  "Não foram encontrados resultados",
                    "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registros",
                    "sInfoFiltered": "",
                    "sInfoPostFix":  "",
                    "sSearch":       "Buscar:",
                    "sUrl":          "",
                    "oPaginate": {
                        "sFirst":    "Primeiro",
                        "sPrevious": "Anterior",
                        "sNext":     "Seguinte",
                        "sLast":     "Último"
                    }
                },
                    'iDisplayLength': 12,
                    "sPaginationType": "full_numbers",
                    });
                $("tfoot input").keyup(function () {
                    /* Filter on the column based on the index of this element's parent <th> */
                    oTable.fnFilter(this.value, $("tfoot th").index($(this).parent()));
                });
                $("tfoot input").each(function (i) {
                    asInitVals[i] = this.value;
                });
                $("tfoot input").focus(function () {
                    if (this.className == "search_init") {
                        this.className = "";
                        this.value = "";
                    }
                });
                $("tfoot input").blur(function (i) {
                    if (this.value == "") {
                        this.className = "search_init";
                        this.value = asInitVals[$("tfoot input").index(this)];
                    }
                });
            });

        
    </script>
    <!-- /datepicker -->
    <!-- /footer content -->