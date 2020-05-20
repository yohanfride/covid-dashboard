<?php include('header.php'); ?>

                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor"><?= $title?></h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url();?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url();?>front/seting">Front Setting</a></li>
                            <li class="breadcrumb-item active"><?= str_replace("Front Setting -", "", $title)  ?></li>
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
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Form <?= $title?></h4>
                                <h6 class="card-subtitle">This form used to seting <?= strtolower( str_replace("Front Setting", "", $title))  ?> section</h6>
                                <form class="form-material m-t-40" method="post" action="" enctype="multipart/form-data" >
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
                                        <label class="col-md-12">Website Title:</label>
                                        <div class="col-md-12">                             
                                            <input type="text" class="form-control" name="head_title" value="<?= $data->head_title?>" id="date1" required="">                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Menu Header Title</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="" name="menu_title" class="form-control form-control-line" value="<?= $data->menu_title?>" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Video Link Emmbed</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="" name="video" class="form-control form-control-line" value="<?= $data->head_title?>" required="">
                                        </div>
                                    </div>                                                                        
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