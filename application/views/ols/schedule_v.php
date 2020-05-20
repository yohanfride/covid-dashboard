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
                        <a href="<?= base_url()?>schedule/add"><button type="button" class="btn btn-info"><i class="fa fa-plus-circle"></i> Add Schedule</button></a>
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Schedule List Data</h4>                                
                                <div class="table-responsive m-t-40">                                    
                                    <table id="example23" class="display nowrap table table-hover table-bordered">
                                        <thead>
                                            <tr>                                                
                                                <th>Date Add</th>
                                                <th>Athlete</th>       
                                                <th>Coach</th>
                                                <th>Place</th>
                                                <th>Date</th>
                                                <th>Information</th>
                                                <?php if($user_now->role == 'Coach'){ ?>
                                                <th>Action</th>
                                                <?php } ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($data as $s) { ?>
                                            <tr>                                                
                                                <td><?= date( "Y-m-d H:i:s", strtotime( $s->created_date) )?></td>
                                                <td><?= $user[$s->id_athlete]['fullname']?>[<?= $user[$s->id_athlete]['username']?>]</td>
                                                <td><?= $user[$s->id_coach]['fullname']?>[<?= $user[$s->id_coach]['username']?>]</td> 
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
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
<?php include('footer.php') ?>                                