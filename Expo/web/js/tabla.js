$.extend( true, $.fn.dataTable.defaults, {
    "searching": false,
    "ordering": false
} );
 
 
$(document).ready(function() {
    $('#mi_tabla').DataTable({ "pagingType": "full_numbers" } );
     $('#mi_tabla1').DataTable({ "pagingType": "full_numbers" } );
    $('#mi_tabla4').DataTable({ "pagingType": "full_numbers" } );
    $('#mi_tabla3').DataTable({ "pagingType": "full_numbers" } );
    $('#mi_tabla2').DataTable({ "pagingType": "full_numbers" } );
     $('#mi_tabla5').DataTable({ "pagingType": "full_numbers" } );
    $('#mi_tabla6').DataTable({ "pagingType": "full_numbers" } );
    $('#mi_tabla7').DataTable({ "pagingType": "full_numbers" } );
    $('#mi_tabla8').DataTable({ "pagingType": "full_numbers" } );
} ); 
              