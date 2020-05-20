<?php include('header.php'); ?>

                
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Profile</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div>
                    
                  
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30"> <img src="<?= base_url(); ?>/assets/images/users/<?php 
                                                if(!empty($user_now->photo))
                                                    echo $user_now->photo;
                                                else 
                                                    echo'default.png';
                                             ?>" class="img-circle" width="150" />
                                    <h4 class="card-title m-t-10"> <?php 
                                        if( isset($user_now->fullname) ){
                                            echo $user_now->fullname;
                                        }?>[<?= $user_now->username;?>]  </h4>
                                    <h6 class="card-subtitle" style="color: #000309;">Join as <b><?= $user_now->role?> </b></h6>
                                </center>
                            </div>
                            <div>
                                <hr> </div>
                            <div class="card-body"> 
                                <small class="text-muted">Email address </small><h6><?= $user_now->email?></h6> 
                                <?php  if($user_now->role == 'Coach'){ ?>
                                <small class="text-muted p-t-30 db">Coach ID</small><h6><?php if(isset($user_now->coach_code)) echo $user_now->coach_code; else echo 'No Coach ID'; ?></h6> 
                                <?php } ?>
                                <?php  if($user_now->role == 'Athlete'){ ?>
                                <small class="text-muted p-t-30 db">Coach</small><h6><?php if(isset($my_coach->fullname)) echo $my_coach->fullname; else echo $my_coach->username; ?></h6> 
                                <?php } ?>
                                <?php if( ($user_now->role == 'Coach') or ($user_now->role == 'Athlete') ) { ?>
                                <small class="text-muted p-t-30 db">Phone</small><h6><?php if(isset($user_now->phone_number)) echo $user_now->phone_number; else echo 'No Phone Number'; ?></h6> 
                                <small class="text-muted p-t-30 db">Address</small><h6><?php if(isset($user_now->address)) echo $user_now->address; else echo 'No Address'; ?></h6>
                                <?php } ?>
                                <?php if( ($user_now->role == 'Athlete') ) { ?>
                                <small class="text-muted p-t-30 db">Date Birth</small><h6><?php if(isset($user_now->date_birth)) echo $user_now->date_birth; else echo 'No Date Birth'; ?></h6> 
                                <small class="text-muted p-t-30 db">Sport</small><h6><?php if(isset($user_now->sport)) echo $user_now->sport; else echo 'No Sport'; ?></h6>
                                <small class="text-muted p-t-30 db">Blood Type</small><h6><?php if(isset($user_now->blood_type)) echo $user_now->blood_type; else echo 'No Blood Type'; ?></h6>               
                                                                         
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">                                
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#settings" role="tab">Settings</a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">                                
                                <div class="tab-pane active" id="settings" role="tabpanel">
                                    <div class="card-body">
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
                                        <form class="form-horizontal form-material" method="post" action="" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label class="col-md-12">Full Name</label>
                                                <div class="col-md-12">
                                                    <input type="text" value="<?= (isset($user_now->fullname))?$user_now->fullname:'';?>" placeholder="" name="name" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Username</label>
                                                <div class="col-md-12">
                                                    <input type="text" value="<?= $user_now->username?>" placeholder="" name="username" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="example-email" class="col-md-12">Email</label>
                                                <div class="col-md-12">
                                                    <input type="email" value="<?= $user_now->email?>" name="email"   class="form-control form-control-line" >
                                                </div>
                                            </div>
                                            
                                            <?php if( ($user_now->role == 'Coach') or ($user_now->role == 'Athlete') ) { ?>
                                            <div class="form-group">
                                                <label class="col-md-12">Phone Number</label>
                                                <div class="col-md-12">
                                                    <input type="text" value="<?= (isset($user_now->phone_number))?$user_now->phone_number:''?>" name="phone" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Address</label>
                                                <div class="col-md-12">
                                                    <input type="text"  value="<?= (isset($user_now->address))?$user_now->address:''; ?>" name="address" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <?php } ?>
                                            
                                            <?php if( ($user_now->role == 'Athlete') ) { ?>
                                            <div class="form-group">
                                                <label class="col-md-12">Date Birth :</label>
                                                <div class="col-md-12">                             
                                                    <input type="date" value="<?=(isset($user_now->date_birth))?$user_now->date_birth:'' ?>" class="form-control" name="birth" value="" id="date1">                            
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Sport</label>
                                                <div class="col-md-12">
                                                    <input type="text" value="<?= (isset($user_now->sport))?$user_now->sport:'' ?>" name="sport" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-12">Blood Type</label>
                                                <div class="col-sm-12">
                                                    <select class="form-control form-control-line" name="blood">
                                                        <option value="not checked">not checked</option>
                                                        <option <?= (isset($user_now->blood_type))?(($user_now->blood_type=='A')?'selected':''):''; ?> value="A">A</option>
                                                        <option <?= (isset($user_now->blood_type))?(($user_now->blood_type=='B')?'selected':''):''; ?> value="B">B</option>
                                                        <option <?= (isset($user_now->blood_type))?(($user_now->blood_type=='O')?'selected':''):''; ?> value="O">O</option>
                                                        <option <?= (isset($user_now->blood_type))?(($user_now->blood_type=='AB')?'selected':''):''; ?> value="AB">AB</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <?php } ?>

                                            <input type="hidden" name="curr_img" value="<?= (isset($user_now->photo))?$user_now->photo:'' ?>">

                                            <div class="form-group">
                                                <label class="col-sm-12">Photo Profile</label>
                                                <div class="col-sm-12">
                                                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                        <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                                        <input type="hidden">
                                                        <input type="file" name="file"> </span> <a href="javascript:void(0)" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success" type="submit" value="save" name="save">Update Profile</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
            
<?php include('footer.php'); ?>                