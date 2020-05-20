<?php include('header.php'); ?>

                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor"><?= $title?></h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url();?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url();?>/questionnaire ">Questionnaire </a></li>
                            <li class="breadcrumb-item active"><?= $title?></li>
                        </ol>
                    </div>                    
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->                    
                    <!-- Column -->
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add New Questionnaire </h4>
                                <h6 class="card-subtitle">This form to add new questionnaire</h6>
                                <form class="form-horizontal form-material m-t-40" method="post" >
                                     <?php if(!empty($error)){ ?>
                                        <div class="alert alert-warning">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">x</span> </button>
                                            <h3 class="text-warning"><i class="fa fa-exclamation-triangle"></i> Warning</h3>
                                            <?= $error;?>
                                            <span class="text-semibold">try submitting again</span><br/>
                                        </div>
                                        <?php } if(!empty($success)){ ?>
                                        <div class="alert alert-success">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">x</span> </button>
                                            <h3 class="text-success"><i class="fa fa-check-circle"></i> Success</h3>
                                            <?= $success;?>                                                 
                                        </div>
                                    <?php } ?>                                    
                                    <div class="form-group">
                                        <label class="col-sm-12">Questionnaire Title</label>
                                        <div class="col-sm-12">
                                            <select class="form-control form-control-line"  id="qtitle" onchange="gettitle()"  name="id_kuisoner" required="">
                                                <option value="">let choose</option>
                                                <?php foreach ($question as $key) { ?>
                                                <option value="<?= $key->_id?>"><?= $key->Title?></option>
                                                <?php  } ?>                                                
                                            </select>                                            
                                        </div>                                        
                                    </div>
                                    <div id="hasilforms"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .row -->
<script type="text/javascript">
    function gettitle(){
        var d = $('#qtitle').val(); 
        $.ajax({
           type: "GET",
           url: '<?= base_url()?>questionnaire/question_detail/'+d,
           data: {},
           success: function(data)
           {
               if(data != 'failed'){
                   $('#hasilforms').html(data);
               } else {
                    $('#hasilforms').html(' ');
               }
           }
        });
    }

</script>                                
<?php include('footer.php'); ?>
