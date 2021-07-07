$(function () {
  $("#tabel").DataTable({
    "responsive": true, 
    "lengthChange": false, 
    "autoWidth": false,
    "buttons": [
      {
        extend: 'excel',
        exportOptions: {
            columns: [ 0, 1, 2 ]
        }
      },
      {
        extend: 'pdf',
        exportOptions: {
            columns: [ 0, 1, 2]
        }
      } 
    ]
  }).buttons().container().appendTo('#tabel_wrapper .col-md-6:eq(0)');
});