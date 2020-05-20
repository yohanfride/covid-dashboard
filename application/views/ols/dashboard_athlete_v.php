<?php include('header.php'); ?>
	<div class="row page-titles">
	    <div class="col-md-5 align-self-center">
	        <h3 class="text-themecolor"><?= $title?></h3>
	        <ol class="breadcrumb">
	            <li class="breadcrumb-item"><a href="<?= base_url();?>">Home</a></li>
	        </ol>
	    </div>                    
	</div>
	<div class="row">
    	<div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Today's Schedule</h5>
                    <h6 class="card-subtitle">check out your daily schedule</h6>
                    <div class="steamline m-t-40">
                    	<?php if(count($schedule_now) == 0){ ?>
                    	<div class="alert alert-warning">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">x</span> </button>
                            <h3 class="text-warning"><i class="fa fa-exclamation-triangle"></i> Sorry</h3>
                            	No Schedule Today;
                        </div>
                    	<?php } else {
                    	 	foreach ($schedule_now as $s) { ?>
                        <div class="sl-item">
                            <div class="sl-left bg-success"> <i class="ti-user"></i></div>
                            <div class="sl-right">
                                <div class="font-medium">$user[$s->id_athlete]['fullname']?>[<?= $user[$s->id_athlete]['username']?>] <span class="sl-date"><?php $s->date_schedule ?></span></div>
                                <div class="desc">On : <?= $s->place?> <br/> <?= $s->information?></div>
                            </div>
                        </div>
                        <?php } 
                    	} ?>
                    </div>
                </div>
            </div>
        </div>
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
                    <hr> 
                </div>                
            </div>
        </div>
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">                
                <div class="card-body bg-primary band "> 
                    <small class=" text-white">Email address </small><h6 class="text-white"><?= $user_now->email?></h6> 
                    <?php  if($user_now->role == 'Coach'){ ?>
                    <small class=" text-white p-t-30 db">Coach ID</small><h6 class="text-white"><?php if(isset($user_now->coach_code)) echo $user_now->coach_code; else echo 'No Coach ID'; ?></h6> 
                    <?php } ?>
                    <?php  if($user_now->role == 'Athlete'){ ?>
                    <small class="text-white p-t-30 db">Coach</small><h6 class="text-white"><?php if(isset($my_coach->fullname)) echo $my_coach->fullname; else echo $my_coach->username; ?></h6> 
                    <?php } ?>
                    <?php if( ($user_now->role == 'Coach') or ($user_now->role == 'Athlete') ) { ?>
                    <small class="text-white p-t-30 db">Phone</small><h6 class="text-white"><?php if(isset($user_now->phone_number)) echo $user_now->phone_number; else echo 'No Phone Number'; ?></h6> 
                    <small class="text-white p-t-30 db">Address</small><h6 class="text-white"><?php if(isset($user_now->address)) echo $user_now->address; else echo 'No Address'; ?></h6>
                    <?php } ?>
                    <?php if( ($user_now->role == 'Athlete') ) { ?>
                    <small class="text-white p-t-30 db">Date Birth</small><h6 class="text-white"><?php if(isset($user_now->date_birth)) echo $user_now->date_birth; else echo 'No Date Birth'; ?></h6> 
                    <small class="text-white p-t-30 db">Sport</small><h6  class="text-white"><?php if(isset($user_now->sport)) echo $user_now->sport; else echo 'No Sport'; ?></h6>
                    <small class="text-white p-t-30 db">Blood Type</small><h6 class="text-white"><?php if(isset($user_now->blood_type)) echo $user_now->blood_type; else echo 'No Blood Type'; ?></h6>               
                                                             
                    <?php } ?>
                </div>
            </div>
        </div>
    	
    </div>

<?php include('footer.php'); ?>

				