/*$(document).ready(function(){
	$(".data-table").dataTable({
		"oLanguage": {
			"sSearch": "Pesquisar:",
			"sInfo": "Exibindo _START_ a _END_ de _TOTAL_ registros"
		},
		"sScrollY": "400px",
		"sScrollX": "100%",
		"sScrollXInner": "100%",
		"bPaginate": false,
		"aaSorting": [[0,"asc"]]
	});
	$(".dataTables_filter").addClass('row');
	$(".dataTables_filter label").first().focus().addClass('cl-md-6 ssearch');
	$(".dataTables_filter input").first().addClass('form-control pesquisa');

});*/

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

                $(".dataTables_filter").addClass('row');
				$(".dataTables_filter label").first().focus().addClass('cl-md-3 ssearch');
				$(".dataTables_filter input").first().addClass('form-control1 pesquisa');
            });
