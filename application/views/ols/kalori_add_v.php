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
                        <div class="card-body">
                            <h4 class="card-title">Form Add Food</h4>
                            <h6 class="card-subtitle">This form are used for Athlete to add food consumption</h6>
                            <form class="form-material m-t-40" method="post" action="" enctype="multipart/form-data">
                                <?php if(!empty($error)) {?>
                                    <div class="alert alert-warning">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">x</span> </button>
                                            <h3 class="text-warning"><i class="fa fa-exclamation-triangle"></i> Warning</h3>
                                            <?= $error;?>
                                            <span class="text-semibold">try submitting again</span><br/> 
                                    </div>
                                <?php }if(!empty($success)) {?>
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">x</span> </button>
                                    <h3 class="text-success"><i class="fa fa-check-circle"></i>Success</h3>
                                    <?= $success;?>
                                </div>
                                <?php } ?>
                                <div class="form-group">
                                    <label class="col-md-12">Add Food</label>
                                    <div class="col-md-12">
                                        <select class="form-control form-control-line" name="id_makanan" required="">
                                            <option value="">Choose Food from list</option>
                                            <?php foreach ($makanan as $d) { ?>
                                                <option value="<?= $d->_id?>"><?= $d->nama?>[Total kalori : <?= $d->total_kalori?> g]</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Serving Size</label>
                                    <div class="col-md-12">
                                        <input type="number" placeholder="" name="sajian" min="1" max="5" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Information</label>
                                    <div class="col-md-12">
                                        <select class="form-control form-control" name="waktumakan" required="">
                                            <option>As eat for</option>
                                            <optgroup>
                                                <option value="Breakfast">Breakfast</option>
                                                <option value="Lunch">Lunch</option>
                                                <option value="Dinner">Dinner</option>
                                                <option value="Snacks">Snacks</option>
                                            </optgroup>
                                        </select>
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

<?php include('footer.php'); ?> 