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
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30"> <img src="<?= base_url(); ?>/assets/images/users/<?php 
                                                if(!empty($user->photo))
                                                    echo $user->photo;
                                                else 
                                                    echo'default.png';
                                             ?>" class="img-circle" width="150" />
                                    <h4 class="card-title m-t-10"> <?php 
                                        if( isset($user->fullname) ){
                                            echo $user->fullname;
                                        }?>[<?= $user->username;?>]  </h4>
                                    <h6 class="card-subtitle" style="color: #000309;">Join as <b><?= $user->role?> </b></h6>
                                </center>
                            </div>
                            <div>
                                <hr> </div>
                            <div class="card-body"> 
                                <small class="text-muted">Email address </small><h6><?= $user->email?></h6>
                                <small class="text-muted p-t-30 db">Coach</small><h6><?php if(isset($my_coach->fullname)) echo $my_coach->fullname; else echo $my_coach->username; ?></h6>
                                <small class="text-muted p-t-30 db">Phone</small><h6><?php if(isset($user->phone_number)) echo $user->phone_number; else echo 'No Phone Number'; ?></h6> 
                                <small class="text-muted p-t-30 db">Address</small><h6><?php if(isset($user->address)) echo $user->address; else echo 'No Address'; ?></h6>
                                <small class="text-muted p-t-30 db">Date Birth</small><h6><?php if(isset($user->date_birth)) echo $user->date_birth; else echo 'No Date Birth'; ?></h6> 
                                <small class="text-muted p-t-30 db">Sport</small><h6><?php if(isset($user->sport)) echo $user->sport; else echo 'No Sport'; ?></h6>
                                <small class="text-muted p-t-30 db">Blood Type</small><h6><?php if(isset($user->blood_type)) echo $user->blood_type; else echo 'No Blood Type'; ?></h6>               
                                                                         
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Detail Questionnaire </h4>
                                <h6 class="card-subtitle">This form to display questionnaire information detail</h6>
                                <form class="form-horizontal form-material m-t-40" method="post" >
                                    <?php
                                        $no = 1;
                                        foreach($data->kuisoner[0] as $key => $value) { 
                                    ?>
                                    <div class="form-group">
                                        <label class="col-md-12">Questions <?= $no++;?> : <?= $key?></label>
                                        <div class="col-md-12">
                                            <textarea class="form-control" rows="3" required=""  name="konten"><?= $value?></textarea>
                                        </div>
                                    </div>                                 
                                    <?php } ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .row -->

<?php include('footer.php'); ?>                                