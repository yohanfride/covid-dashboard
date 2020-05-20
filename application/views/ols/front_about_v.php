<?php include('header.php'); ?>

                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor"><?= $title?></h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url();?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url();?>front/Setting">Front Setting</a></li>
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
                                        <label class="col-md-12">Subtitle Content</label>
                                        <div class="col-md-12">
                                            <textarea class="form-control" rows="5"  name="top_content" required=""><?= $data->about_top_content?></textarea>
                                        </div>
                                    </div>                                                                 

                                    <div class="form-group">
                                        <label class="col-md-12">Right Content</label>
                                        <div class="col-md-12">
                                            <textarea class="form-control" rows="8"  name="right_content" required=""><?= $data->about_right_content?></textarea>
                                        </div>
                                    </div>  
                                    <?php if(!empty($data->about_image)){ ?>                      
                                    <div class="form-group" style="text-align: center;">
                                        <img class="img-responsive" style="max-height: 300px; max-width: 80%; border: 2px #ddd solid; " src="<?= base_url()?>assets_front/img/<?= $data->about_image?>" alt="project image"/>
                                    </div>
                                    <?php } ?>
                                    <input type="hidden" name="curr_img" value="<?= $data->userg_image?>">
                                    <div class="form-group">
                                        <label class="col-sm-12">Image Content</label>
                                        <div class="col-sm-12">
                                            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                                <input type="hidden">
                                                <input type="file" name="file"> </span> <a href="javascript:void(0)" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
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