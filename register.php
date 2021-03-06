<?php require_once('./config.php') ?>
<!DOCTYPE html>
<html lang="fr" class="" style="height: auto;">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="UTF-8">
    <meta name="author" content="Pierre MANIRAKOZE">
</head>
<?php require_once('inc/header.php') ?>

<body class="hold-transition ">
    <!--Cette fonction si je l'enlève la page d'enregistrement s'affiche mais il y a des fonctionnalités envolées-->
    <script>
    start_loader();
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

    /* #login .col-7,#login .col-5{
      width: 100% !important;
      max-width:unset !important
    } */

    .bg-navy {
        background-color: #dc3545;
    }

    img {
        width: 150px;
        display: block;
        margin-left: auto;
        margin-right: auto;
        position: absolute;
        top: 50%;
        transform: translate(0%, -50%);
    }
    </style>
    <div class="h-100 d-flex  align-items-center w-100" id="login">
        <div class="col-6 h-100 d-flex align-items-center justify-content-center">
            <div class="w-100">
                <img src="<?= validate_image($_settings->info('logo')) ?>" alt="">
                <center>
                    <h3 class="py-2 login-title"><?php echo $_settings->info('short_name') ?></h3>
                </center>
            </div>

        </div>

        <div class="col-6 h-100  bg-gradient bg-success">
            <div class="w-100 d-flex justify-content-center align-items-center h-100 text-navy">
                <div class="card card-outline card-primary rounded-0 shadow col-lg-10 col-md-10 col-sm-5">
                    <div class="card text-center bg-red">
                        <div class="card-header">
                            Inscription pour Etudiant
                        </div>
                    </div>
                    <div class="card-body">

                        <form action="" id="registration-form">
                            <input type="hidden" name="id">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="matricule" id="matricule" autofocus
                                            placeholder="Votre matricule" class="form-control form-control-border"
                                            required>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="firstname" id="firstname" autofocus
                                            placeholder="Prénom" class="form-control form-control-border" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="lastname" id="lastname" placeholder="Nom"
                                            class="form-control form-control-border" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="genderMale" name="gender"
                                            value="Male" required checked>
                                        <label for="genderMale" class="custom-control-label">Mâle</label>
                                    </div>
                                </div>
                                <div class="form-group col-auto">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="genderFemale" name="gender"
                                            value="Female">
                                        <label for="genderFemale" class="custom-control-label">Femelle</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <span class="text-navy">Université</span>
                                        <select name="" id="id_universite" onchange="faculte()"
                                            class="form-control form-control-border" required>
                                            <option value="0">Sélectionner</option>
                                            <?php

                                            $univerisite=$conn->query("SELECT `id_universite`, `nom_universite`, `adresse_uni`, `code_postal_uni` FROM `universite` WHERE 1 ORDER BY nom_universite ASC");

                                            foreach ($univerisite as $key) {
                                               echo "<option value='".$key['id_universite']."'>".$key['nom_universite']."</option>";
                                            }
                                            ?>


                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <span class="text-navy">Faculté</span>
                                        <select name="" onchange="departement(this.value)" id="id_faculte"
                                            class="form-control form-control-border" required>
                                            <option value="0">Sélectionner</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <span class="text-navy">Département</span>
                                        <select name="department_id" onchange="filiere()" id="department_id"
                                            class="form-control form-control-border select2" required>

                                            <option value="">Sélectionner</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <span class="text-navy">Filière/Option</span>
                                        <select name="curriculum_id" id="curriculum_id"
                                            class="form-control form-control-border" required>

                                            <option value="">Sélectionner</option>


                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" placeholder="Email"
                                            class="form-control form-control-border" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" placeholder="Mot de passe"
                                            class="form-control form-control-border" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="password" id="cpassword" placeholder="Confirmer le mot passe"
                                            class="form-control form-control-border" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group text-center">
                                        <button class="btn btn-success">S'Inscrire</button>
                                        <a href="index.php" style="text-align:center" class="btn btn-info">Accueil</a>
                                    </div>
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
    // CETTE LIGNE A DES ERREURS IL FAUT VOIR COMMENT LA CORRIGER POUR AFFICHER LE FORMULAIRE D'INSCRIPTION
    $(document).ready(function() {
        end_loader();
        $('.select2').select2({
            width: "100%"
        })



        // Registration Form Submit
        $('#registration-form').submit(function(e) {
            e.preventDefault()
            var _this = $(this)
            $(".pop-msg").remove()
            $('#password, #cpassword').removeClass("is-invalid")
            var el = $("<div>")
            el.addClass("alert pop-msg my-2")
            el.hide()
            if ($("#password").val() != $("#cpassword").val()) {
                el.addClass("alert-danger")
                el.text("Les mots de passe ne correspondent pas.")
                $('#password, #cpassword').addClass("is-invalid")
                $('#cpassword').after(el)
                el.show('slow')
                return false;
            }
            start_loader();
            $.ajax({
                url: _base_url_ + "classes/Users.php?f=save_student",
                method: 'POST',
                data: _this.serialize(),
                dataType: 'json',
                error: err => {
                    console.log(err)
                    el.text(
                        "adresse email déjà prise,veuillez réessayer une autre adresse email"
                    )
                    el.addClass("alert-danger")
                    _this.prepend(el)
                    el.show('slow')
                    end_loader()
                },
                success: function(resp) {
                    if (resp.status == 'success') {
                        location.href = "./login.php"
                    } else if (!!resp.msg) {
                        el.text(resp.msg)
                        el.addClass("alert-danger")
                        _this.prepend(el)
                        el.show('show')
                    } else {
                        el.text(
                            "adresse email déjà prise,veuillez réessayer une autre adresse email"
                        )
                        el.addClass("alert-danger")
                        _this.prepend(el)
                        el.show('show')
                    }
                    end_loader();
                    $('html, body').animate({
                        scrollTop: 0
                    }, 'fast');
                }
            })
        })
    })




    // pour selectionner les facultes dependant des universites

    function faculte() {
        var id_universite = $('#id_universite').val();

        $.post('get_faculte.php', {
            id_universite: id_universite
        }, function(data) {
            $('#id_faculte').html(data);
        })

    }


    function departement() {
        var id_faculte = $('#id_faculte').val();

        $.post('get_departement.php', {
            id_faculte: id_faculte
        }, function(data) {
            $('#department_id').html(data);
        })

    }


    function filiere() {
        var department_id = $('#department_id').val();

        $.post('get_filiere.php', {
            department_id: department_id
        }, function(data) {
            $('#curriculum_id').html(data);
        })

    }
    </script>
</body>

</html>