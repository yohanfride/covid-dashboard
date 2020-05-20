<?php include('header.php'); ?>

                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor"><?= $title?></h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url();?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url();?>schedule">Schedule</a></li>
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
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Form Add New Schedule</h4>
                                <h6 class="card-subtitle">This form used to add new schedule</h6>
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
                                        <label class="col-sm-12">Athlete</label>
                                        <div class="col-sm-12">
                                            <select class="form-control form-control-line" name="id_athlete" required="">
                                                <option value="">choose Athlete</option>
                                                <?php foreach ($athlete as $d) { ?>
                                                    <option value="<?= $d->_id?>"><?= $d->fullname?>[<?= $d->username?>]</option>    
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>                                        
                                    <div class="form-group">
                                        <label class="col-md-12">Date Schedule :</label>
                                        <div class="col-md-12">                             
                                            <input type="date" class="form-control" name="date_schedule" value="" id="date1" required="">                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Place</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="" name="place" class="form-control form-control-line" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Information</label>
                                        <div class="col-md-12">
                                            <textarea class="form-control" rows="3" required=""  name="information"></textarea>
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