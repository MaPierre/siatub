<?php 
$user = $conn->query("SELECT s.*,d.name as department, c.name as curriculum,CONCAT(lastname,', ',firstname,' ',middlename) as fullname FROM student_list s inner join department_list d on s.department_id = d.id inner join tbl_filieres c on s.curriculum_id = c.id where s.id ='{$_settings->userdata('id')}'");
foreach($user->fetch_array() as $k =>$v){
    $$k = $v;
}
?>
<style>
.student-img {
    object-fit: scale-down;
    object-position: center center;
    height: 200px;
    width: 200px;
}
</style>
<div class="content py-4">
    <div class="card card-outline card-primary shadow rounded-0">
        <div class="card-header rounded-0">
            <h5 class="card-title">Les détails des mises à jour</h5>
        </div>
        <div class="card-body rounded-0">
            <div class="container-fluid">
                <form action="" id="update-form">
                    <input type="hidden" name="id" value="<?= $_settings->userdata('id') ?>">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="matricule" class="control-label text-navy">Matricule</label>
                                <input type="text" name="matricule" id="matricule" placeholder="matricule"
                                    class="form-control form-control-border"
                                    value="<?= isset($matricule) ?$matricule : "" ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="firstname" class="control-label text-navy">Prénom</label>
                                <input type="text" name="firstname" id="firstname" autofocus placeholder="Firstname"
                                    class="form-control form-control-border"
                                    value="<?= isset($firstname) ?$firstname : "" ?>" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="middlename" class="control-label text-navy">Surnom</label>
                                <input type="text" name="middlename" id="middlename" placeholder="Surnom (optionnel)"
                                    class="form-control form-control-border"
                                    value="<?= isset($middlename) ?$middlename : "" ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="lastname" class="control-label text-navy">Nom</label>
                                <input type="text" name="lastname" id="lastname" placeholder="Nom"
                                    class="form-control form-control-border"
                                    value="<?= isset($lastname) ?$lastname : "" ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-auto">
                            <label for="" class="control-label text-navy">Genre</label>
                        </div>
                        <div class="form-group col-auto">
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="genderMale" name="gender"
                                    value="Male" required <?= isset($gender) && $gender == "Male" ? "checked" : "" ?>>
                                <label for="genderMale" class="custom-control-label">Mâle</label>
                            </div>
                        </div>
                        <div class="form-group col-auto">
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="genderFemale" name="gender"
                                    value="Female" <?= isset($gender) && $gender == "Female" ? "checked" : "" ?>>
                                <label for="genderFemale" class="custom-control-label">Femelle</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="email" class="control-label text-navy">Adresse Email</label>
                                <input type="email" name="email" id="email" placeholder="Adresse Email"
                                    class="form-control form-control-border" required
                                    value="<?= isset($email) ?$email : "" ?>">
                            </div>
                            <div class="form-group">
                                <label for="password" class="control-label text-navy">Nouveau Mot de passe</label>
                                <input type="password" name="password" id="password" placeholder="Nouveau Mot de passe"
                                    class="form-control form-control-border">
                            </div>

                            <div class="form-group">
                                <label for="cpassword" class="control-label text-navy">Confirmer le nouveau mot de
                                    passe</label>
                                <input type="password" id="cpassword" placeholder="Confirmer le nouveau mot de passe"
                                    class="form-control form-control-border">
                            </div>
                            <small class='text-muted'>Laissez le nouveau mot de passe et confirmer le nouveau mot de
                                passe vides si vous ne souhaitez pas modifier votre mot de passe.</small>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="img" class="control-label text-muted">Choisir l'image</label>
                                <input type="file" id="img" name="img" class="form-control form-control-border"
                                    accept="image/png,image/jpeg" onchange="displayImg(this,$(this))">
                            </div>

                            <div class="form-group text-center">
                                <img src="<?= validate_image(isset($avatar) ? $avatar : "") ?>" alt="Ma photo de profil"
                                    id="cimg" class="img-fluid student-img bg-gradient-dark border">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="oldpassword">Veuillez entrer votre mot de passe actuel</label>
                                <input type="password" name="oldpassword" id="oldpassword"
                                    placeholder="Mot de passe actuel" class="form-control form-control-border" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group text-center">
                                <button class="btn btn-default bg-navy btn-flat"> Mettre à jour</button>
                                <a href="./?page=profile" class="btn btn-light border btn-flat"> Annuler</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
function displayImg(input, _this) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#cimg').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    } else {
        $('#cimg').attr('src', "<?= validate_image(isset($avatar) ? $avatar : "") ?>");
    }
}
$(function() {
    // Update Form Submit
    $('#update-form').submit(function(e) {
        e.preventDefault()
        var _this = $(this)
        $(".pop-msg").remove()
        $('#password, #cpassword').removeClass("is-invalid")
        var el = $("<div>")
        el.addClass("alert pop-msg my-2")
        el.hide()
        if ($("#password").val() != $("#cpassword").val()) {
            el.addClass("alert-danger")
            el.text("Password does not match.")
            $('#password, #cpassword').addClass("is-invalid")
            $('#cpassword').after(el)
            el.show('slow')
            return false;
        }
        start_loader();
        $.ajax({
            url: _base_url_ + "classes/Users.php?f=save_student",
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            dataType: 'json',
            error: err => {
                console.log(err)
                el.text("Une erreur s'est produite lors de l'enregistrement des données")
                el.addClass("alert-danger")
                _this.prepend(el)
                el.show('slow')
                end_loader()
            },
            success: function(resp) {
                if (resp.status == 'success') {
                    location.href = "./?page=profile"
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