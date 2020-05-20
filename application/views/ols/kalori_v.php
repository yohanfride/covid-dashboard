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
                                <h4 class="card-title">Histori Kalori</h4>
                                    <h2><?php echo date('l, d M Y'); ?></h2>                                
                                <div class="table-responsive m-t-40">                                    
                                    <table id="example24" class="display nowrap table table-hover table-bordered">
                                        <thead>
                                            <tr>                                                
                                                <th>Date Add</th>
                                                <th>Nama Makanan</th>
                                                <th>Total Kalori (Kkal)</th>       
                                                <th>Karbohidrat (g)</th>
                                                <th>Lemak (g)</th>
                                                <th>Protein (g)</th>
                                                <th>Information</th>
                                                <?php if($user_now->role == 'Athlete'){ ?>
                                                <th>Action</th>
                                                <?php } ?>
                                            </tr> 
                                        </thead>
                                        <tbody>
                                            <?php foreach ($data as $s) { ?>
                                            <tr>                                                
                                                <td><?= date( "Y-m-d", strtotime( $s->created_date) )?></td>
                                                <td><?= $s->makanan ?></td>
                                                <td><?= $s->kalori_total ?></td>
                                                <td><?= $s->karbohidrat ?></td> 
                                                <td><?= $s->lemak ?></td>
                                                <td><?= $s->protein ?></td>
                                                <td><?= $s->waktumakan ?></td>
                                                <?php if($user_now->role == 'Athlete'){ ?>
                                                <td class="text-nowrap">                            
                                                    <a href="<?= base_url()?>kalori/edit/<?= $s->_id?>" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                                    <a href="<?= base_url()?>kalori/delete/<?= $s->_id?>" data-toggle="tooltip" data-original-title="Close"> <i class="fa fa-close text-danger btn-hapus"></i> </a>
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