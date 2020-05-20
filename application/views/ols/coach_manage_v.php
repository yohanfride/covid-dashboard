<?php include('header.php') ?>                
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Coach Management</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url();?>">Home</a></li>
                            <li class="breadcrumb-item active">Coach Management</li>
                        </ol>
                    </div>   
                    <div class="col-md-7 align-self-center text-right d-none d-md-block">
                        <a href="<?= base_url()?>coach/add"><button type="button" class="btn btn-info"><i class="fa fa-plus-circle"></i> Add New Coach</button></a>
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
                                <h4 class="card-title">Data Coach</h4>                                
                                
                                <div class="table-responsive m-t-40">                                    
                                    <table id="example23" class="display nowrap table table-hover table-bordered">
                                        <thead>
                                            <tr>                                                
                                                <th>Date Add</th>
                                                <th>Name</th>                                                
                                                <th>Email</th>                                                
                                                <th width="5%">Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($data as $s) { ?>
                                            <tr>                                                
                                                <td><?= date( "Y-m-d H:i:s", strtotime( $s->created_date) )?></td>
                                                <td><?= (!empty($s->fullname))?$s->fullname:'' ?>[<?= $s->username?>]</td>                                                
                                                <td><?= $s->email?></td>                                                
                                                <td>
                                                    <?php if($s->status == 0){ ?>
                                                    <span class="label label-warning">Not Verification</span>
                                                    <?php } else if($s->status == 1){ ?>
                                                    <span class="label label-success">Active</span>
                                                    <?php } else { ?>
                                                    <span class="label label-danger">Suspend</span> 
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <?php if($s->status == 0){ ?>
                                                    <a href="<?= base_url()?>coach/active/<?= $s->_id?>"><button type="button" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Verification</button></a>
                                                    <?php } else if($s->status == 1){ ?>
                                                    <a href="<?= base_url()?>coach/nonactive/<?= $s->_id?>"><button type="button" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Suspend</button></a>
                                                    <?php } else { ?>
                                                    <a href="<?= base_url()?>coach/active/<?= $s->_id?>"><button type="button" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Active</button></a>
                                                    <?php } ?>         
                                                    <a href="<?= base_url()?>coach/detail/<?= $s->_id?>"><button type="button" class="btn  btn-sm btn-info"><i class="fa fa-search"></i> Detail Info</button></a>
                                                </td>
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