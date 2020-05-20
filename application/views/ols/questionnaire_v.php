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
                    <?php if($user_now->role=='Athlete'){ ?>
                    <div class="col-md-7 align-self-center text-right d-none d-md-block">
                        <a href="<?= base_url()?>questionnaire/add"><button type="button" class="btn btn-info"><i class="fa fa-plus-circle"></i> Add Questionniare</button></a>
                    </div>                 
                    <?php } ?>
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
                                <h4 class="card-title">Questions List Data</h4>                                
                                
                                <div class="table-responsive m-t-40">                                    
                                    <table id="example23" class="display nowrap table table-hover table-bordered">
                                        <thead>
                                            <tr>                                                
                                                <th>Date Add</th>
                                                <?php if($user_now->role!='Athlete'){ ?>
                                                <th>Athlete</th>
                                                <?php } ?>
                                                <th>Question Title</th>       
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($data as $s) { ?>
                                            <tr>                                                
                                                <td><?= date( "Y-m-d H:i:s", strtotime( $s->created_date) )?></td>
                                                <?php if($user_now->role!='Athlete'){ ?>
                                                <td><?= $user[$s->id_athlete]['fullname']?> [<?= $user[$s->id_athlete]['username']?>]</td>                                            
                                                <?php } ?>
                                                <td><?= $question[$s->id_kuisoner]?></td>                        
                                                <?php if($user_now->role!='Athlete'){ ?>
                                                <td class="text-nowrap">                            
                                                    <a href="<?= base_url()?>questionnaire/src/<?= $s->_id?>" data-toggle="tooltip" data-original-title="Detail"> <i class="fa fa-search text-info "></i> </a>
                                                </td>
                                                <?php } else { ?>
                                                <td class="text-nowrap">                            
                                                    <a href="<?= base_url()?>questionnaire/edit/<?= $s->_id?>" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                                    <a href="<?= base_url()?>questionnaire/delete/<?= $s->_id?>" data-toggle="tooltip" data-original-title="Close"> <i class="fa fa-close text-danger btn-hapus"></i> </a>
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