<?php include('header.php'); ?>
    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-security"></i>
                        Ubah Password
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
                        <a style="padding: .5rem;" class="nav-link" href="#"><i style="padding-right: 5px;" class="icon icon-security"></i>Ubah Password</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <div class="animatedParent animateOnce">
        <div class="container-fluid my-3">
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body b-b">
                            <form method="post" >
                                <h4>Form Ubah Password</h4>
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
                                <div class="form-row">
                                    <div class="form-group col-md-6 focused">
                                        <label for="inputOldPassword" class="col-form-label">Password Lama</label>
                                        <input type="password" class="form-control" id="inputOldPassword" placeholder="Masukkan Password Lama" name="old_password"  required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6 focused">
                                        <label for="inputNewPassword" class="col-form-label">Password Baru</label>
                                        <input type="password" class="form-control" id="inputNewPassword" placeholder="Masukkan Password Baru" name="password"  required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Harus mengandung setidaknya satu angka dan satu huruf besar dan kecil, dan setidaknya 6 karakter atau lebih" >
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6 focused">
                                        <label for="inputConfPassword" class="col-form-label">Ulangi Password Baru</label>
                                        <input type="password" class="form-control" id="inputConfPassword" placeholder="Ulangi Password Baru" name="passconf"  required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" name="save" value="save">Update Password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include('footer.php'); ?> 