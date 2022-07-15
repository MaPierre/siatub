<?php require_once('./config.php') ?>
<!DOCTYPE html>
<html lang="fr" class="" style="height: auto;">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="UTF-8">
    <meta name="author" content="Pierre MANIRAKOZE">
    <style>
    a:link,
    a:visited {
        color: white;
        padding: 14px 25px;
        text-align: center;
        text-decoration: none;
    }


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

    /* #login{
      flex-direction:column !important
    } */
    #login {
        direction: rtl
    }

    #login>* {
        direction: ltr
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
    </style>
</head>

<?php require_once('inc/header.php') ?>

<body class="hold-transition ">
    <script>
    start_loader()
    </script>


    <?php if($_settings->chk_flashdata('success')): ?>
    <script>
    alert_toast("<?php echo $_settings->flashdata('success') ?>", 'success')
    </script>
    <?php endif;?>
    <div class="h-100 d-flex  align-items-center w-100" id="login">
        <div class="col-7 h-100 d-flex align-items-center justify-content-center">
            <div class="w-100 h-100">
                <center><img src="<?= validate_image($_settings->info('logo')) ?>" alt="" id="logo-img"></center>
                <h1 style="text-align:center;color:white;text-shadow: 2px 2px 8px #FF0000;">
                    <b><?php echo $_settings->info('short_name') ?> - Etudiants</b>
                </h1>
            </div>

        </div>
        <div class="col-5 h-100 bg-danger bg-gradient">
            <div class="w-100 d-flex justify-content-center align-items-center h-100 text-navy">
                <div class="card card-outline card-primary rounded-0 shadow col-lg-10 col-md-10 col-sm-5">
                    <div class="card-header">
                        <h5 class="card-title text-center text-dark"><b>Connexion</b></h5>
                    </div>
                    <div class="card-body">
                        <form action="" id="slogin-form">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" placeholder="Email"
                                            class="form-control form-control-border" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" placeholder="Mot de passe"
                                            class="form-control form-control-border" autocomplete="off" required>
                                    </div>
                                    <div>
                                        <input type="checkbox" onclick="myFunction()"> Montre-moi
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 py-2">
                                    <button class="btn btn-success btn-block">Connexion</button>
                                </div>
                                <div class="col-lg-12"> <button class="btn btn-secondary btn-block"><a href="index.php">
                                            Retour</a></button>
                                </div>
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
    <!-- Select2 -->
    <script src="<?php echo base_url ?>plugins/select2/js/select2.full.min.js"></script>

    <script>
    $(document).ready(function() {
        end_loader();
        // Registration Form Submit
        $('#slogin-form').submit(function(e) {
            e.preventDefault()
            var _this = $(this)
            $(".pop-msg").remove()
            $('#password, #cpassword').removeClass("is-invalid")
            var el = $("<div>")
            el.addClass("alert pop-msg my-2")
            el.hide()
            start_loader();
            $.ajax({
                url: _base_url_ + "classes/Login.php?f=student_login",
                method: 'POST',
                data: _this.serialize(),
                dataType: 'json',
                error: err => {
                    console.log(err)
                    el.text("An error occured while saving the data")
                    el.addClass("alert-danger")
                    _this.prepend(el)
                    el.show('slow')
                    end_loader();
                },
                success: function(resp) {
                    if (resp.status == 'success') {
                        location.href = "./"
                    } else if (!!resp.msg) {
                        el.text(resp.msg)
                        el.addClass("alert-danger")
                        _this.prepend(el)
                        el.show('show')
                    } else {
                        el.text(
                            "Une erreur s'est produite lors de l'enregistrement des données"
                        )
                        el.addClass("alert-danger")
                        _this.prepend(el)
                        el.show('show')
                    }
                    end_loader();
                    $('html, body').animate({
                        scrollTop: 0
                    }, 'fast')
                }
            })
        })
    })
    </script>
    <script>
    function myFunction() {
        var motdepasse = document.getElementById("password");
        if (motdepasse.type === "password") {
            motdepasse.type = "text";
        } else {
            motdepasse.type = "password";
        }
    }
    </script>
</body>

</html>