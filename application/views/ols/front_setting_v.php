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
                                <h4 class="card-title">Frontpage Setting Data</h4>                                
                                
                                <div class="table-responsive m-t-40">                                    
                                    <table id="example23" class="display nowrap table table-hover table-bordered">
                                        <thead>
                                            <tr>                                                
                                                <th>No.</th>                                                
                                                <th>Section</th>       
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no=1; foreach ($data as $s) { ?>
                                            <tr>                                                
                                                <td><?= $no++;?></td>
                                                <td><?= $s?></td>                                            
                                                <td class="text-nowrap">                            
                                                    <a href="<?= base_url()?>front/<?= $link[$no]?>" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>            
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