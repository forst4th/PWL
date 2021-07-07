$(function () {
  $("#tabel").DataTable({
    "responsive": true, 
    "lengthChange": false, 
    "autoWidth": false,
    "buttons": [
      {
        extend: 'excel',
        exportOptions: {
            columns: [ 0, 1, 2, 3, 4, 5 ]
        }
      },
      {
        extend: 'pdf',
        exportOptions: {
            columns: [ 0, 1, 2, 3, 4, 5 ]
        }
      } 
    ]
  }).buttons().container().appendTo('#tabel_wrapper .col-md-6:eq(0)');

  $('.select2').select2({
    theme: 'bootstrap4',
    width: '100%',
  });

});