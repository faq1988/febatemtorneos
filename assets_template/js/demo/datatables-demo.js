// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({

  "language": {
  		"lengthMenu": "Mostrar _MENU_ filas",  
  		"info": "Página _PAGE_ de _PAGES_",
  		"zeroRecords": "No se encuentra información",
        "infoEmpty": "No se encuentra información",
        "sSearch":"Buscar:", 
        "oPaginate": {              
                	"sNext":    "Siguiente",
                	"sPrevious": "Anterior"                          
                	},
            }
     })
});
