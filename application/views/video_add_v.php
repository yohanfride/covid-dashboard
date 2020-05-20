<?php include('header.php'); ?>
    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-plus"></i>
                        Tambah Tautan Video
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
                        <a style="padding: .5rem;" class="nav-link" href="<?= base_url(); ?>video"><i style="padding-right: 5px;" class="icon icon-hospital-o"></i>Manajemen Tautan Video</a>
                    </li>
                    <li class="nav-item">
                        <a style="padding: .5rem;" class="nav-link active" href="#"><i style="padding-right: 0px;" class="icon icon-keyboard_arrow_right"></i></a>
                    </li>
                    <li class="nav-item">
                        <a style="padding: .5rem;" class="nav-link" href="#"><i style="padding-right: 5px;" class="icon icon-plus"></i>Tambah</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <div class="animatedParent animateOnce">
        <div class="container-fluid my-3">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body b-b">
                            <form method="post" >
                                <h4>Form Tambah Tautan Video</h4>
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
                                <div class="form-group">
                                    <label for="inputName" class="col-form-label">Link URL Video</label>
                                    <input type="text" class="form-control" id="inputName" placeholder="Type Link URL Video"  name="link" required="">
                                </div>
                                <div class="form-group">
                                    <label for="inputPhone" class="col-form-label">Kelompok Video</label>
                                    <select class="form-control" name="jenis" id="jenis" required>
                                        <option value="informasi" >Informasi</option>
                                        <option value="publikasi" >Publikasi</option>
                                    </select>

                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span class="float-left"><b>Tidak</b> &nbsp;&nbsp;&nbsp;</span>
                                            <div class="material-switch float-left">
                                                <input id="someSwitchOptionSuccess" name="highlight"  type="checkbox"/>
                                                <label for="someSwitchOptionSuccess" class="bg-success"></label>
                                            </div>
                                            <span class="float-left"> &nbsp;&nbsp;&nbsp;<b>Highlight Video</b></span>
                                        </div>
                                        <div class="col-md-6">
                                            <span class="float-left"><b>Tidak Akftif</b> &nbsp;&nbsp;&nbsp;</span>
                                            <div class="material-switch float-left">
                                                <input id="someSwitchOptionSuccess2" name="status"  type="checkbox" checked/>
                                                <label for="someSwitchOptionSuccess2" class="bg-success"></label>
                                            </div>
                                            <span class="float-left"> &nbsp;&nbsp;&nbsp;<b>Aktif</b></span>

                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" name="save" value="save">Tambah</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include('footer.php'); ?> 
