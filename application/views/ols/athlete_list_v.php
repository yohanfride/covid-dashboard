<?php include('header.php') ?>                
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor"><?= $title?></h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url();?>">Home</a></li>
                            <li class="breadcrumb-item active"><?= $title?></li>
                        </ol>
                    </div>   
                    <div class="col-md-7 align-self-center text-right d-none d-md-block">
                        <a href="<?= base_url()?>athlete/add"><button type="button" class="btn btn-info"><i class="fa fa-plus-circle"></i> Add New Athlete</button></a>
                    </div>                                  
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                                <?php if(!empty($error)){ ?>
                                         <div class="alert alert-danger">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">x</span> </button>
                                            <h3 class="text-danger"><i class="fa fa-exclamation-triangle"></i> Error</h3>
                                                    <?= $error;?>                                                   
                                        </div>
                                <?php } if(!empty($success)){ ?>
                                        <div class="alert alert-success">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">x</span> </button>
                                            <h3 class="text-success"><i class="fa fa-check-circle"></i> Success</h3>
                                                    <?= $success;?>                                                 
                                        </div>
                                <?php } ?>
                <div class="row">                    
                    <?php foreach ($data as $user) { ?>
                    <div class="col-md-6 col-lg-6 col-xlg-4">
                        <div class="card card-body">
                            <div class="row">
                                <div class="col-md-4 col-lg-3 text-center">
                                    <a href="app-contact-detail.html"><img src="../assets/images/users/<?php 
                                            if(!empty($user->photo))
                                                echo $user->photo;
                                            else 
                                                echo'default.png';
                                         ?>" alt="user" class="img-circle img-responsive"></a>
                                </div>
                                <div class="col-md-8 col-lg-9">
                                    <h3 class="box-title m-b-0"><?php 
                                        if( isset($user->fullname) ){
                                            echo $user->fullname;
                                        }?>[<?= $user->username;?>]</h3> 
                                    <small><span class="label label-info label-rounded"><?php if(isset($user->sport)) echo $user->sport; else echo 'No Sport'; ?></span></small>
                                    <address>
                                        <?php if(isset($user->address)) echo $user->address; else echo 'No address'; ?>
                                        <br>
                                        <br>
                                        <abbr title="Phone">Phone : </abbr> <?php if(isset($user->phone_number)) echo $user->phone_number; else echo 'No phone number'; ?>
                                    </address>
                                    <div class="d-flex m-t-20">
                                        <div class="col-lg-5 col-md-6 col-sm-6">
                                            <a href="<?= base_url()?>athlete/detail/<?= $user->_id; ?>"><button type="button" class="btn btn-info btn-sm" style="font-size: 14px;">
                                                <i class="fa fa-serach"></i>Detail Info
                                            </button></a>
                                        </div>
                                       
                                        <div class="btn-group col-lg-7 col-md-6 col-sm-6 right" style="float: right;">
                                            <button type="button" class="btn btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 14px;">
                                                <i class="fa fa-address-card"></i>Performance
                                            </button>
                                            <div class="dropdown-menu animated flipInY" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 40px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                <a class="dropdown-item" href="#">Schedule</a>
                                                <a class="dropdown-item" href="#">Motion Sensor</a>
                                                <a class="dropdown-item" href="#">Hearth Sensor</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-lg-4">
                        <div class="card">
                            <div class="up-img" style="background-image:url(../assets/images/users/<?php 
                                            if(!empty($user->photo))
                                                echo $user->photo;
                                            else 
                                                echo'default.png';
                                         ?>)"></div>
                            <div class="card-body">
                                <h5 class=" card-title"><?php 
                                        if( isset($user->fullname) ){
                                            echo $user->fullname;
                                        }?>[<?= $user->username;?>]</h5>
                                <span class="label label-info label-rounded"><?php if(isset($user->sport)) echo $user->sport; else echo 'No Sport'; ?></span>
                                <p class="m-b-0 m-t-20"></p>
                                <div class="d-flex m-t-20">
                                    <div class="col-lg-5 col-md-6 col-sm-6">
                                        <a href="<?= base_url()?>athlete/detail/<?= $user->_id; ?>"><button type="button" class="btn btn-info btn-sm" style="font-size: 14px;">
                                            <i class="fa fa-serach"></i>Detail Info
                                        </button></a>
                                    </div>
                                   
                                    <div class="btn-group col-lg-7 col-md-6 col-sm-6 right" style="float: right;">
                                        <button type="button" class="btn btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 14px;">
                                            <i class="fa fa-address-card"></i>Performance
                                        </button>
                                        <div class="dropdown-menu animated flipInY" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 40px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <a class="dropdown-item" href="#">Schedule</a>
                                            <a class="dropdown-item" href="#">Motion Sensor</a>
                                            <a class="dropdown-item" href="#">Hearth Sensor</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                           -->
                    <?php } ?>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
<?php include('footer.php') ?>                                