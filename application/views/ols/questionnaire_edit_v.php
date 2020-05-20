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
                                            <input class="form-control form-control-line" name="id_kuisoner" required="" readonly="true" value="<?= $data_t[0]->Title?>" />    
                                        </div>                                        
                                    </div>
                                    <?php
                                        $no = 1;
                                        $k = json_decode(json_encode($data->kuisoner[0]), true);
                                        foreach($question as $key) { 
                                    ?>
                                    <div class="form-group">
                                        <label class="col-md-12">Questions <?= $no++;?> : <?= $key->Title?></label>
                                        <div class="col-md-12">
                                            <textarea class="form-control" rows="3" required=""  name="<?= $key->field?>"><?= $k[$key->field]?></textarea>
                                        </div>
                                    </div>                                 
                                    <?php } ?>
                                     <div class="text-xs-right">
                                        <button type="submit" name="save" value="save" class="btn btn-info">Submit</button>
                                        <button type="reset" class="btn btn-inverse">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .row -->
<?php include('footer.php'); ?>
