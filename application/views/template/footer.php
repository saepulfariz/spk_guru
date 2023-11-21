<!-- Bootstrap core JavaScript-->
<script src="<?= base_url(); ?>assets/sbadmin2/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url(); ?>assets/sbadmin2/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url(); ?>assets/sbadmin2/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url(); ?>assets/sbadmin2/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url(); ?>assets/sbadmin2/js/demo/chart-area-demo.js"></script>
<script src="<?= base_url(); ?>assets/sbadmin2/js/demo/chart-pie-demo.js"></script>

<script type="text/javascript" src="<?= base_url(); ?>assets/DataTables/datatables.min.js"></script>

<?= $this->alert->init('jquery'); ?>


<script>
  var table = $('#table2').DataTable({
    responsive: true,
    "dom": 'Bflrtip',
    buttons: [
      //   {
      //   extend: 'pdf',
      //   customize: function(doc) {
      //     var colCount = new Array();
      //     doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');
      //   },
      //   footer: true,
      //   exportOptions: {
      //     columns: [0, 1, 2, 3, 4, 5]
      //   }
      // }, {
      //   extend: 'copy',
      //   footer: false,
      //   exportOptions: {
      //     columns: [0, 1, 2, 3, 4, 5]
      //   }

      // },
      {
        extend: 'excel',
        footer: false,
        // exportOptions: {
        //   columns: [0, 1, 2, 3, 4, 5]
        // }
      }
    ],
    "pageLength": 5,
    "lengthMenu": [
      [5, 100, 1000, -1],
      [5, 100, 1000, "ALL"],
    ],

  })
</script>