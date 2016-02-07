	<footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2015 <a href="http://islingtoncollege.edu.np" title="Islington College" target="_blank">Islington College.</a></strong> All rights reserved.
      </footer>
	<script>
        var url = "<?php echo URL; ?>";
    </script>
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo URL; ?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo URL; ?>assets/bootstrap/js/bootstrap.min.js"></script>
        <!-- DataTables -->
    <script src="<?php echo URL; ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo URL; ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo URL; ?>assets/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo URL; ?>assets/dist/js/app.min.js"></script>
    <!-- Sparkline -->
    <script src="<?php echo URL; ?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="<?php echo URL; ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="<?php echo URL; ?>assets/dist/js/jquery.validate.min.js"></script>
    <script type="text/javascript">
    jQuery(document).ready(function() {
        // jQuery("#add-counselor").validate({
        //         rules: {
        //             firstname: "required",
        //             lastname: "required",
        //             user_name: {
        //                 required: true,
        //                 minlength: 2
        //             },
        //             password: {
        //                 required: true,
        //                 minlength: 5
        //             },
        //             confirm_password: {
        //                 required: true,
        //                 minlength: 5,
        //                 equalTo: "#password"
        //             },
        //             first_name: {
        //                 required: true,
        //             },
        //             last_name: {
        //                 required: true,
        //             },
        //             email: {
        //                 required: true,
        //                 email: true
        //             },
        //             phone_no: {
        //                 required: true,
        //                 phone: true
        //             },
        //             address: {
        //                 required: true,
        //             }
        //         }
        //     }
        // );
    });
    </script>
    <script>
      $(function () {
        $('.data-table').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true,
        });
        $('#all_counselors').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
        });
      });
    </script>
    <script src="<?php echo URL; ?>assets/dist/js/demo.js"></script>
  </body>
</html>
</body>
</html>
