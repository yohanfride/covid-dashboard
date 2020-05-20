<?php include('header.php'); ?>

                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor"><?= $title?></h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url();?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url();?>/athlete/list ">Athlete List </a></li>
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
                    <div class="col-lg-4">
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
                    
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Questionnaire List Data</h4>                                
                                <div class="table-responsive m-t-40">                                    
                                    <table id="example23" class="display nowrap table table-hover table-bordered">
                                        <thead>
                                            <tr>                                                
                                                <th>Date Add</th>                                                
                                                <th>Question Title</th>       
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($kuisoner as $s) { ?>
                                            <tr>                                                
                                                <td><?= date( "Y-m-d H:i:s", strtotime( $s->created_date) )?></td>
                                                <td><?= $question[$s->id_kuisoner]?></td>                        
                                                <td class="text-nowrap">                            
                                                    <a href="<?= base_url()?>questionnaire/src/<?= $s->_id?>" data-toggle="tooltip" data-original-title="Detail"> <i class="fa fa-search text-info "></i> </a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                        
                                    </table>
                                </div>
                            </div>
                        </div><br/><br/>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Schedule List Data</h4>                                
                                <div class="table-responsive m-t-40">                                    
                                    <table id="example24" class="display nowrap table table-hover table-bordered">
                                        <thead>
                                            <tr>                                                
                                                <th>Date Add</th>                                                
                                                <th>Place</th>
                                                <th>Date</th>
                                                <th>Information</th>
                                                <?php if($user_now->role == 'Coach'){ ?>
                                                <th>Action</th>
                                                <?php } ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($schedule as $s) { ?>
                                            <tr>                                                
                                                <td><?= date( "Y-m-d H:i:s", strtotime( $s->created_date) )?></td>
                                                <td><?= $s->place?></td>
                                                <td><?= date( "Y-m-d H:i:s", strtotime( $s->date_schedule) )?></td>
                                                <td><?= $s->information?></td>
                                                <?php if($user_now->role == 'Coach'){ ?>
                                                <td class="text-nowrap">                            
                                                    <a href="<?= base_url()?>schedule/edit/<?= $s->_id?>" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                                    <a href="<?= base_url()?>schedule/delete/<?= $s->_id?>" data-toggle="tooltip" data-original-title="Close"> <i class="fa fa-close text-danger btn-hapus"></i> </a>
                                                </td>
                                                <?php } ?>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                        
                                    </table>
                                </div>
                            </div>
                        </div> 
                    </div>

                </div>
                <!-- .row -->

<?php include('footer.php'); ?>                                