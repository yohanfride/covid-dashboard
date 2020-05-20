<?php include('header.php'); ?>
    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-qrcode "></i>
                        Manajemen QR Code
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
                        <a style="padding: .5rem;" class="nav-link" href="#"><i style="padding-right: 5px;" class="icon icon-qrcode "></i>Manajemen QR Code</a>
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
                            <h4>Data QR Code</h4> 
                        </div>
                        <br/>
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Tanggal Pembuatan</th>
                                                <th>Kode</th>
                                                <th>Status</th>
                                                <th>QR Code</th>
                                                <th width="10%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Tanggal Pembuatan</th>
                                                <th>Kode</th>
                                                <th>Status</th>
                                                <th>QR Code</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </tfoot>

                                        <tbody>
                                            <?php foreach ($data as $s) { ?>
                                            <tr>
                                                <td><?= date( "Y-m-d H:i:s", strtotime( $s->date_add)) ?></td>
                                                <td><?= $s->qrcode ?></td>
                                                <td style="text-align: center;">
                                                    <?php if($s->active == 0){ ?>
                                                    <span class="badge badge-warning r-20">Belum digunakan</span>
                                                    <?php } else if($s->active == 1){ ?>
                                                    <span class="badge badge-success r-20">Aktif</span>
                                                    <?php } ?>
                                                </td>
                                                <td style="text-align: center;">
                                                    <img style="max-width: 80px;" src="<?= $this->config->item('url_node').'qr/'.$s->filename; ?>" alt="">
                                                </td>
                                                <td>
                                                    <?php if($s->active == 0){ ?>
                                                        <a href="<?= base_url()?>qrcode/delete/<?= $s->_id?>" class="btn-delete"><button type="button" class="btn btn-xs btn-danger r-20"><i class="icon-trash"></i> Hapus</button></a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <?= $pagination; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include('footer.php'); ?> 