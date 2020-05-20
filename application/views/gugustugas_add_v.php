<?php include('header.php'); ?>
    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-plus"></i>
                        Tambah Gugus Tugas
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
                        <a style="padding: .5rem;" class="nav-link" href="<?= base_url(); ?>gugustugas"><i style="padding-right: 5px;" class="icon icon-account_box"></i>Manajemen Gugus Tugas</a>
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
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body b-b">
                            <form method="post" >
                                <h4>Form Tambah Gugus Tugas 
                                    <?php if($user_now->level != 'master-admin' && $user_now->level != 'admin'){ echo '- Kecamatan '.$user_now->level; } ?>
                                </h4>
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
                                        <input type="text" class="form-control" id="inputUsername" placeholder="Username" name="username" required="">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6 focused">
                                        <label for="inputNewPassword" class="col-form-label">Password</label>
                                        <input type="password" class="form-control" id="inputNewPassword" placeholder="Masukkan Password" name="password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Harus mengandung setidaknya satu angka dan satu huruf besar dan kecil, dan setidaknya 6 karakter atau lebih" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6 focused">
                                        <label for="inputConfPassword" class="col-form-label">Ulangi Password</label>
                                        <input type="password" class="form-control" id="inputConfPassword" placeholder="Ulangi Password" name="passconf"  required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6 focused">
                                        <label for="inputEmail" class="col-form-label">Email</label>
                                        <input type="email" class="form-control" id="inputEmail" placeholder="Email"  name="email" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-form-label">Nama</label>
                                    <input type="text" class="form-control" id="inputName" placeholder="Type Name"  name="name" required="">
                                </div>
                                <div class="form-group">
                                    <label for="inputPhone" class="col-form-label">No. Telp</label>
                                    <input type="text" class="form-control" id="inputPhone" placeholder="Phone"  name="phone" required="">
                                </div>
                                <div class="form-group">
                                    <label for="inputPhone" class="col-form-label">Keterangan</label>
                                    <textarea class="form-control r-0" id="exampleFormControlTextarea2" rows="3" style="resize: none;" name="keterangan"></textarea>
                                </div>
                                <?php if($user_now->level == 'master-admin' || $user_now->level == 'admin'){ ?>
                                <div class="form-group" id="kecamatan-form" >
                                    <label for="inputPhone" class="col-form-label">Kecamatan</label>
                                    <select class="form-control" name="level" id="level" required>
                                    <option value="pusat" > Pusat </option>
                                    <?php foreach($kecamatan['Kecamatan'] as $l){ ?>
                                        <option value="<?= $l?>" >Kecamatan <?= $l?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                                <?php } else { ?>
                                    <input type="hidden" name="level"  value="<?= $user_now->level?>">
                                <?php } ?>
                                <div class="form-group">
                                   <div class="form-check">
                                       <label class="form-check-label">
                                           <input class="form-check-input" type="checkbox" name="sendmail" checked> Kirim username dan password ke email Gugus Tugas
                                       </label>
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
<script type="text/javascript">
    ////Validation Password////
    var password = document.getElementById("inputNewPassword")
        ,confirm_password = document.getElementById("inputConfPassword");

    function validatePassword(){
      if(password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Passwords Tidak Sama");
      } else {
        confirm_password.setCustomValidity('');
      }
    }
</script>