<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?= base_url(); ?>assets/img/basic/favicon.ico" type="image/x-icon">
    <title>Login - Administrator</title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/app.css">
    <style>
        .loader {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: #F5F8FA;
            z-index: 9998;
            text-align: center;
        }

        .plane-container {
            position: absolute;
            top: 50%;
            left: 50%;
        }
    </style>
</head>
<body class="light">
<!-- Pre loader -->
<div id="loader" class="loader">
    <div class="plane-container">
        <div class="preloader-wrapper small active">
            <div class="spinner-layer spinner-blue">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-yellow">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-green">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>
        </div>
    </div>
</div>
<div id="app">
<main>
    <div id="primary" class="p-t-b-100 height-full ">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mx-md-auto">
                    <div class="text-center">
                        <img src="<?= base_url(); ?>assets/img/dummy/u1.png" alt="">
                        <h3 class="mt-2">Lupa Password</h3>
                        <p class="p-t-b-20">Silahkan masuk menggunakan email yang telah terdaftar sebelumnya</p>
                    </div>
                    <form method="post" >
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
                                <strong>Permintaan Berhasil!</strong> Silahkan cek inbox email anda untuk melanjutkan proses lupa password.</span> 
                            </div>
                        <?php } ?>
                        <div class="form-group has-icon"><i class="icon-mail-envelope-closed"></i>
                            <input type="email" name="email" class="form-control form-control-lg" placeholder="Email" required>
                        </div>
                         <div class="form-group has-icon"><i class="icon-flag3"></i>
                            <select type="password" name="role" class="form-control form-control-lg" placeholder="Role" style="padding-left:68px; height: calc(2.875rem + 5px);">
                                <option value="administrator">Masuk sebagai Administrator</option>
                                <option value="gugus-tugas">Masuk sebagai Gugus Tugas</option>           
                            </select>
                        </div>
                        <input type="submit" class="btn btn-success btn-lg btn-block" name="save" value="Lupa Password">
                        <p class="forget-pass">Masuk ke halaman login? <a href="<?= base_url(); ?>auth/login">Klik Disini</a></p> 
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- #primary -->
</main>

<!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
<div class="control-sidebar-bg shadow white fixed"></div>
</div>
<!--/#app -->
<script src="<?= base_url(); ?>assets/js/app.js"></script>
</body>
</html>