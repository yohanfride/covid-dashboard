        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?= base_url(); ?>assets/node_modules/jquery/jquery.min.js"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="<?= base_url(); ?>assets/node_modules/bootstrap/js/popper.min.js"></script>
    <script src="<?= base_url(); ?>assets/node_modules/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?= base_url(); ?>assets/node_modules/ps/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="<?= base_url(); ?>assets/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?= base_url(); ?>assets/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?= base_url(); ?>assets/js/custom.min.js"></script>
    <!-- ============================================================== -->
    
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="<?= base_url(); ?>assets/node_modules/raphael/raphael-min.js"></script>
    <script src="<?= base_url(); ?>assets/node_modules/morrisjs/morris.min.js"></script>    

    <script src="<?= base_url(); ?>assets/node_modules/toast-master/js/jquery.toast.js"></script>
    <!-- Chart JS -->
    
    <!-- <script src="<?= base_url(); ?>/assets/js/dashboard1.js"></script> 
        ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="<?= base_url(); ?>/assets/node_modules/styleswitcher/jQuery.style.switcher.js"></script>

    <?php if( ($title=="Profile") || ($title=="Athlete Add") || ($title=="Coach Add") || ($title == "Schedule Add") || ( $title == 'Front Setting - User Guide') || ( $title == 'Front Setting - About')  )  { ?>
    <!--stickey kit -->
    <script src="<?= base_url(); ?>assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="<?= base_url(); ?>assets/node_modules/sparkline/jquery.sparkline.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/jasny-bootstrap.js"></script>
    <script src="<?= base_url(); ?>assets/node_modules/moment/min/moment.min.js"></script>
    <?php } ?>    
    <?php if( ($title=="Coach Add") )  { ?>
    <script src="<?= base_url(); ?>assets/node_modules/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/node_modules/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <?php } ?> 

    <?php if ( ($title == 'Coach Management' ) || ($title == 'Athlete Management' ) || ($title == 'Question List') || 
    ( $title == 'Questionnaire List') || ( $title == 'Schedule List') ) { ?>
    <!-- This is data table -->
    <script src="<?= base_url(); ?>/assets/node_modules/datatables/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
    <?php } ?>

    <?php if ( ($title == 'Coach Management' ) || ($title == 'Athlete Management' ) || ($title == 'Question List') || 
    ( $title == 'Questionnaire List') || ( $title == 'Schedule List') || ($title == 'Athlete Detail') ) { ?>
    <script type="text/javascript">    
        $('#example23').DataTable();
    </script>
    <?php } if(($title == 'Athlete Detail')){ ?>
    <script type="text/javascript">    
        $('#example24').DataTable();
    </script>
    <?php } ?>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".btn-hapus").click(function(){
            return confirm('Are you sure delete this item?');          
        });
        });    
    </script>
</body>

</html>