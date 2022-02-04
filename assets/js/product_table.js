$(function () {
    $("#product").DataTable({
      "order": [[ 0, "desc" ]],
      dom: 'Bfrtip',
      buttons: [
          {
            extend: 'pdf',
            className: " btn-outline-danger",
            text: 'Export  <i class="far fa-file-pdf"></i>',
          },
          {
            extend: 'excel',
            className: "btn-outline-success",
            text: 'Export  <i class="far fa-file-excel"></i>',
            
          },
          {
            extend: 'print',
            className: "btn-outline-secondary",
            text: 'Print  <i class="fas fa-print"></i>',
            
          },
          {
                extend: 'colvis',
                className: "btn-outline-primary",
                text: '<i class="fas fa-search"> Search by</i> ',
               
            }
          
        ],
       
      "responsive": true, "lengthChange": false, "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });