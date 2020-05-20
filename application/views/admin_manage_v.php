<?php include('header.php'); ?>
    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-account_box"></i>
                        Manajemen Administrator
                    </h4>
                </div>
            </div>
            <div class="row ">
                <ul class="nav responsive-tab">
                    <li class="nav-item" style="padding-left: 7px;">
                        <a style="padding: .5rem;" class="nav-link active" href="<?= base_url(); ?>"><i style="padding-right: 5px;" class="icon icon-home"></i>Halaman Utama</a>
                    </li>
                    <li class="nav-item">
                        <a style="padding: .5rem;" class="nav-link active" href="#"><i style="padding-right: 0px;" class="icon icon-keyboard_arrow_right"></i></a>
                    </li>
                    <li class="nav-item">
                        <a style="padding: .5rem;" class="nav-link" href="#"><i style="padding-right: 5px;" class="icon icon-account_box"></i>Manajemen Administrator</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <div class="animatedParent animateOnce">
        <div class="container-fluid my-3">
            <div class="row">
                <div class="col-md-12">
                    <?php if($error){ ?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size: 14px;">&#10006;</span>
                            </button>
                            <strong>Peringatan!</strong> ulangi lagi.</span><br/><?= $error?> 
                        </div>
                    <?php } if($success){ ?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size: 14px;">&#10006;</span>
                            </button>
                            <strong>Proses Berhasil!</strong> <?= $success;?></span> 
                        </div>
                    <?php } ?>
                    <div class="card no-b">

                        <div class="card-body">
                        <div class="card-title">
                            <h4>Data Administrator</h4> 
                            <a href="<?= base_url()?>admin/add" style="position: absolute; right:35px; top:15px;z-index: 1;">
                                <button type="button" class="btn btn-primary r-20"><i class="icon-plus"></i> Tambah Data</button>
                            </a>
                        </div>
                        <table class="table table-bordered table-hover data-tables"
                               data-options='{"searching":false}'>
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>No. Telp.</th>
                                    <th>Level</th>
                                    <th>Status</th>
                                    <th width="20%">Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>No. Telp.</th>
                                    <th>Level</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>

                            <tbody>
                                <?php foreach ($data as $s) { 
                                    if($s->name =='master-admin1'){
                                        continue;
                                    }
                                    if($user_now->level == 'admin'){
                                        if($s->level == 'admin' || $s->level == 'master-admin'){
                                            continue;
                                        }
                                    }
                                ?>
                                <tr>
                                    <td><?= $s->name ?></td>
                                    <td><?= $s->username ?></td>
                                    <td><?= $s->email ?></td>
                                    <td><?= $s->phone ?></td>
                                    <td><?= ( $s->level!='admin' && $s->level!='master-admin')?'Kec. '.$s->level:$s->level; ?></td>
                                    <td>
                                        <?php if($s->active == 0){ ?>
                                        <span class="badge badge-warning r-20">Belum Verifikasi</span>
                                        <?php } else if($s->active == 1){ ?>
                                        <span class="badge badge-success r-20">Aktif</span>
                                        <?php } else { ?>
                                        <span class="badge badge-danger r-20">Suspend</span> 
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if($s->level != 'master-admin'){ ?>
                                            <?php if($s->active == 0){ ?>
                                            <a href="<?= base_url()?>admin/active/<?= $s->_id?>"><button type="button" class="btn btn-xs btn-success r-20"><i class="icon-check"></i> Verifikasi</button></a>
                                            <?php } else if($s->active == 1){ ?>
                                            <a href="<?= base_url()?>admin/nonactive/<?= $s->_id?>"><button type="button" class="btn btn-xs btn-danger r-20"><i class="icon-ban"></i> Suspend</button></a>
                                            <?php } else { ?>
                                            <a href="<?= base_url()?>admin/active/<?= $s->_id?>"><button type="button" class="btn btn-xs btn-success r-20"><i class="icon-check"></i> Aktifkan</button></a>
                                            <?php } ?>       
                                            <a href="<?= base_url()?>admin/edit/<?= $s->_id?>"><button type="button" class="btn  btn-xs btn-warning r-20"><i class="icon-pencil"></i> Edit</button></a>
                                            <a href="<?= base_url()?>admin/delete/<?= $s->_id?>" class="btn-delete"><button type="button" class="btn btn-xs btn-danger r-20"><i class="icon-trash"></i> Hapus</button></a>
                                        <?php } ?>   
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

<?php include('footer.php'); ?> 