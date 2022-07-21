<?php 
$user = $conn->query("SELECT * FROM users where id ='".$_settings->userdata('id')."'");
foreach($user->fetch_array() as $k =>$v){
	$meta[$k] = $v;
}
?>
<?php if($_settings->chk_flashdata('success')): ?>
<script>
alert_toast("<?php echo $_settings->flashdata('success') ?>", 'success')
</script>
<?php endif;?>
<div class="card card-outline card-primary">
    <div class="card-body">
        <div class="container-fluid">
            <div id="msg"></div>
            <form action="" id="manage-user">
                <input type="hidden" name="id" value="<?php echo $_settings->userdata('id') ?>">
                <div class="form-group">
                    <label for="name">Email</label>
                    <input type="text" name="email" id="email" class="form-control"
                        value="<?php echo isset($meta['email_admin']) ? $meta['email_admin']: '' ?>" required>
                </div>
                <div class="form-group">
                    <label for="name">Prénom</label>
                    <input type="text" name="firstname" id="firstname" class="form-control"
                        value="<?php echo isset($meta['firstname']) ? $meta['firstname']: '' ?>" required>
                </div>
                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" name="lastname" id="lastname" class="form-control"
                        value="<?php echo isset($meta['lastname']) ? $meta['lastname']: '' ?>" required>
                </div>
                <div class="form-group">
                    <label for="username">Nom d'utilisateur</label>
                    <input type="text" name="username" id="username" class="form-control"
                        value="<?php echo isset($meta['username']) ? $meta['username']: '' ?>" required
                        autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password" class="form-control" value=""
                        autocomplete="off">
                    <small class="text-success"><i>Laissez ce champ vide si vous ne souhaitez pas modifier le mot de
                            passe.</i></small>
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Photo de profil</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input rounded-circle" id="customFile" name="img"
                            onchange="displayImg(this,$(this))">
                        <label class="custom-file-label" for="customFile">Choisir un fichier</label>
                    </div>
                </div>
                <div class="form-group d-flex justify-content-center">
                    <img src="<?php echo validate_image(isset($meta['avatar']) ? $meta['avatar'] :'') ?>" alt=""
                        id="cimg" class="img-fluid img-thumbnail">
                </div>
            </form>
        </div>
    </div>
    <div class="card-footer">
        <div class="col-md-12">
            <div class="row">
                <button class="btn btn-sm btn-primary" form="manage-user">Mettre à jour</button>
            </div>
        </div>
    </div>
</div>
<style>
img#cimg {
    height: 15vh;
    width: 15vh;
    object-fit: cover;
    border-radius: 100% 100%;
}
</style>
<script>
function displayImg(input, _this) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#cimg').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
$('#manage-user').submit(function(e) {
    e.preventDefault();
    var _this = $(this)
    start_loader()
    $.ajax({
        url: _base_url_ + 'classes/Users.php?f=save',
        data: new FormData($(this)[0]),
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        type: 'POST',
        success: function(resp) {
            if (resp == 1) {
                location.reload()
            } else {
                $('#msg').html(
                    '<div class="alert alert-danger">Nom d\'utilisateur existe déjà</div>')
                end_loader()
            }
        }
    })
})
</script>