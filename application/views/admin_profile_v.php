<?php include('header.php'); ?>
    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-umbrella"></i>
                        Ubah Profile
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
                        <a style="padding: .5rem;" class="nav-link" href="#"><i style="padding-right: 5px;" class="icon icon-umbrella"></i>Ubah Profile</a>
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
                                <h4>Form Ubah Profil</h4>
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
                                        <label for="inputUsername" class="col-form-label">Username</label>
                                        <input type="text" class="form-control" id="inputUsername" placeholder="Username" name="username" value="<?= $user_now->username?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6 focused">
                                        <label for="inputEmail" class="col-form-label">Email</label>
                                        <input type="email" class="form-control" id="inputEmail" placeholder="Email"  name="email"  value="<?= $user_now->email?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-form-label">Nama</label>
                                    <input type="text" class="form-control" id="inputName" placeholder="Type Name"  name="name"  value="<?= $user_now->name?>">
                                </div>
                                <div class="form-group">
                                    <label for="inputPhone" class="col-form-label">No. Telp</label>
                                    <input type="text" class="form-control" id="inputPhone" placeholder="Phone"  name="phone"  value="<?= $user_now->phone?>">
                                </div>
                                <button type="submit" class="btn btn-primary" name="save" value="save">Update Profil</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include('footer.php'); ?> 