<?php include('header.php'); ?>
    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-plus"></i>
                        Edit Administrator
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
                        <a style="padding: .5rem;" class="nav-link" href="<?= base_url(); ?>admin"><i style="padding-right: 5px;" class="icon icon-account_box"></i>Manajemen Administrator</a>
                    </li>
                    <li class="nav-item">
                        <a style="padding: .5rem;" class="nav-link active" href="#"><i style="padding-right: 0px;" class="icon icon-keyboard_arrow_right"></i></a>
                    </li>
                    <li class="nav-item">
                        <a style="padding: .5rem;" class="nav-link" href="#"><i style="padding-right: 5px;" class="icon icon-pencil"></i>Edit</a>
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
                                <h4>Form Edit Administrator</h4>
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
                                 <?php if($error != "Tidak ada data"){ ?>
                                <div class="row">   
                                    <div class="col-md-6">
                                        <div class="form-group focused">
                                            <label for="inputUsername" class="col-form-label">Username</label>
                                            <input type="text" class="form-control" id="inputUsername" placeholder="Username" name="username" required="" value="<?= $data->username?>" readonly >
                                        </div>
                                        <div class="form-group focused">
                                            <label for="inputEmail" class="col-form-label">Email</label>
                                            <input type="email" class="form-control" id="inputEmail" placeholder="Email"  name="email" value="<?= $data->email?>" required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName" class="col-form-label">Nama</label>
                                            <input type="text" class="form-control" id="inputName" placeholder="Type Name"  name="name"  value="<?= $data->name?>" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputPhone" class="col-form-label">No. Telp</label>
                                            <input type="text" class="form-control" id="inputPhone" placeholder="Phone"  name="phone" value="<?= $data->phone?>" required="">
                                        </div>
                                        <?php if($user_now->level == 'master-admin'){ ?>
                                        <div class="form-group">
                                            <label for="inputPhone" class="col-form-label">Level</label>
                                            <select class="form-control" name="level" id="level" required>
                                                <option value="admin" <?= ($data->level=='admin')?'selected':''; ?> >Administrator Pusat</option>
                                                <option value="admin-kecamatan" <?= ($data->level!='admin')?'selected':''; ?> >Administrator tingkat Kecamatan</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="kecamatan-form" <?= ($data->level=='admin')?'style="display: none;"':''; ?> >
                                        <?php } else { ?>
                                        <input type="hidden" class="form-control" id="level" name="level" value="admin-kecamatan">
                                        <div class="form-group" id="kecamatan-form" >
                                        <?php } ?>
                                            <label for="inputPhone" class="col-form-label">Kecamatan</label>
                                            <select class="form-control" name="kecamatan" id="kecamatan" required>
                                            <?php foreach($kecamatan['Kecamatan'] as $l){ ?>
                                                <option value="<?= $l?>" <?= ($data->level==$l)?'selected':''; ?>  ><?= $l?></option>
                                            <?php } ?>
                                            </select>
                                        </div>
                                        
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary" name="save" value="save">Ubah</button>
                                <?php } ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include('footer.php'); ?> 
<script type="text/javascript">
    
    $("#level").on('change', function() {
        var level = $(this).find(":selected").val();
        if(level != 'admin'){
            $("#kecamatan-form").removeAttr("style");
        } else {
            $("#kecamatan-form").css("display",'none');
        }
    });
</script>