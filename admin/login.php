<?php require_once('../config.php') ?>
<!DOCTYPE html>
<html lang="fr" class="" style="height: auto;">
<?php require_once('inc/header.php') ?>

<body class="hold-transition ">
    <script>
    start_loader()
    </script>
    <style>
    html,
    body {
        height: calc(100%) !important;
        width: calc(100%) !important;
    }

    body {
        background-image: url("<?php echo validate_image($_settings->info('cover')) ?>");
        background-size: cover;
        background-repeat: no-repeat;
    }

    .login-title {
        text-shadow: 2px 2px black
    }

    #login {
        flex-direction: column !important
    }

    #logo-img {
        height: 150px;
        width: 150px;
        object-fit: scale-down;
        object-position: center center;
        border-radius: 100%;
    }

    #login .col-7,
    #login .col-5 {
        width: 100% !important;
        max-width: unset !important
    }

    h2 {

        text-align: center;
        color: green;
        font-family: Fantasy;
        font-style: bold;
        font-size: 3em;
        text-shadow: 3px 3px #ff0000;

    }
    </style>
    <div class="h-75 d-flex align-items-center w-100" id="login">
        <div class="col-7 h-50 d-flex align-items-center justify-content-center">
            <div class="w-50">
                <center><img src="<?= validate_image($_settings->info('logo')) ?>" alt="" id="logo-img"></center>
                <h2><?php echo $_settings->info('short_name') ?> - Administration</h2>
            </div>

        </div>
        <div class="col-5 h-75 bg-gradient">
            <div class="d-flex w-100 h-75 justify-content-center align-items-center">
                <div class="card col-sm-12 col-md-6 col-lg-3 card-outline card-primary">
                    <div class="card-header">
                        <h4 class="text-purle text-center"><b>Connexion</b></h4>
                    </div>
                    <div class="card-body">
                        <form id="login-frm" action="" method="post">
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                                <input type="text" class="form-control" autofocus name="username"
                                    placeholder="Nom d'admin">

                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span>
                                            <i class="fa fa-key"></i>
                                        </span>

                                    </div>
                                </div>
                                <input type="password" class="form-control" name="password" placeholder="Mot de passe">

                            </div>
                            <div class="row">
                                <!-- /.col -->
                                <div class="col-12 py-1">
                                    <button type="submit" class="btn btn-success btn-block">Authentification</button>
                                </div>
                                <div class="col-12">
                                    <a href="<?php echo base_url ?>" class="btn btn-info btn-block">Accueil</a>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>

    <script>
    $(document).ready(function() {
        end_loader();
    })
    </script>
</body>

</html>