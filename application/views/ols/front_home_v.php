<?php include('header.php'); ?>

                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor"><?= $title?></h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url();?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url();?>front/setting">Front Setting</a></li>
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
                    <div class="col-12">
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
                                    <div class="row">
                                        <div class="form-group col-6 col-md-6">
                                            <label class="col-md-12">Home Content Title:</label>
                                            <div class="col-md-12">                             
                                                <input type="text" class="form-control" name="title" value="<?= $data->home_content_title?>" id="date1" required="">                            
                                            </div>
                                        </div>
                                        <div class="form-group col-6 col-md-6">
                                            <label class="col-md-12">Home Content </label>
                                            <div class="col-md-12">                                                
                                                 <textarea class="form-control" rows="5"  name="content"><?= $data->home_content?></textarea>
                                            </div>
                                        </div>                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <h3 class="box-title">Column 1 </h3>
                                            <hr class="m-t-0 m-b-40">
                                            <div class="form-group">
                                                <label class="col-md-12">Title</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="" name="p1_title" class="form-control form-control-line" value="<?= $data->home_p1_title?>" >
                                                </div>
                                            </div>                                                                
                                            <div class="form-group">
                                                <label class="col-md-12">Icon</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="" name="p1_icon" class="form-control form-control-line" value="<?= $data->home_p1_icon?>" >
                                                </div>
                                            </div> 
                                             <div class="form-group">
                                                <label class="col-md-12"> Content</label>
                                                <div class="col-md-12">
                                                    <textarea class="form-control" rows="3"  name="p1_content"><?= $data->home_p1_content?></textarea>
                                                </div>
                                            </div>                                                                 
                                            <br/>
                                            <h3 class="box-title">Column 2 </h3>
                                            <hr class="m-t-0 m-b-40">
                                            <div class="form-group">
                                                <label class="col-md-12">Title</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="" name="p2_title" class="form-control form-control-line" value="<?= $data->home_p2_title?>" >
                                                </div>
                                            </div>                                                                
                                            <div class="form-group">
                                                <label class="col-md-12">Icon</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="" name="p2_icon" class="form-control form-control-line" value="<?= $data->home_p2_icon?>" >
                                                </div>
                                            </div> 
                                             <div class="form-group">
                                                <label class="col-md-12">Content</label>
                                                <div class="col-md-12">
                                                    <textarea class="form-control" rows="3"  name="p2_content"><?= $data->home_p2_content?></textarea>
                                                </div>
                                            </div>                                                                 
                                        </div>
                                        <div class="col-6">
                                            <h3 class="box-title">Column 3 </h3>
                                            <hr class="m-t-0 m-b-40">
                                            <div class="form-group">
                                                <label class="col-md-12">Title</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="" name="p3_title" class="form-control form-control-line" value="<?= $data->home_p3_title?>" >
                                                </div>
                                            </div>                                                                
                                            <div class="form-group">
                                                <label class="col-md-12">Icon</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="" name="p3_icon" class="form-control form-control-line" value="<?= $data->home_p3_icon?>" >
                                                </div>
                                            </div> 
                                             <div class="form-group">
                                                <label class="col-md-12"> Content</label>
                                                <div class="col-md-12">
                                                    <textarea class="form-control" rows="3"  name="p3_content"><?= $data->home_p3_content?></textarea>
                                                </div>
                                            </div>                                                                 
                                            <br/>
                                            <h3 class="box-title">Column 4 </h3>
                                            <hr class="m-t-0 m-b-40">
                                            <div class="form-group">
                                                <label class="col-md-12">Title</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="" name="p4_title" class="form-control form-control-line" value="<?= $data->home_p4_title?>" >
                                                </div>
                                            </div>                                                                
                                            <div class="form-group">
                                                <label class="col-md-12">Icon</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="" name="p4_icon" class="form-control form-control-line" value="<?= $data->home_p4_icon?>" >
                                                </div>
                                            </div> 
                                             <div class="form-group">
                                                <label class="col-md-12">Content</label>
                                                <div class="col-md-12">
                                                    <textarea class="form-control" rows="3"  name="p4_content"><?= $data->home_p4_content?></textarea>
                                                </div>
                                            </div>                                                                 
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