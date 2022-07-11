<?php 
require_once('../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $user = $conn->query("SELECT s.*,d.name as department, c.name as curriculum,CONCAT(lastname,', ',firstname,' ',middlename) as fullname FROM student_list s inner join department_list d on s.department_id = d.id inner join tbl_filieres c on s.curriculum_id = c.id where s.id ='{$_GET['id']}'");
    foreach($user->fetch_array() as $k =>$v){
        $$k = $v;
    }
}
?>
<style>
#uni_modal .modal-footer {
    display: none
}

.student-img {
    object-fit: scale-down;
    object-position: center center;
}
</style>
<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <div class="col-6">
                <center>
                    <img src="<?= validate_image($avatar) ?>" alt="Student Image"
                        class="img-fluid student-img bg-gradient-dark border">
                </center>
            </div>
            <div class="col-6">
                <dl>
                    <dt class="text-navy">Matricule de l'étudiant:</dt>
                    <dd class="pl-4"><?= ($matricule) ?></dd>
                    <dt class="text-navy">Nom d'étudiant:</dt>
                    <dd class="pl-8"><?= ucwords($fullname) ?></dd>
                    <dt class="text-navy">Genre:</dt>
                    <dd class="pl-4"><?= ucwords($gender) ?></dd>
                    <dt class="text-navy">Adresse email:</dt>
                    <dd class="pl-4"><?= $email ?></dd>
                    <dt class="text-navy">Département:</dt>
                    <dd class="pl-4"><?= ucwords($department) ?></dd>
                    <dt class="text-navy">Filière:</dt>
                    <dd class="pl-4"><?= ucwords($curriculum) ?></dd>
                    <dt class="text-navy">État du compte:</dt>
                    <dd class="pl-4">
                        <?php if($status == 1): ?>
                        <span class="badge badge-pill badge-success">Vérifié</span>
                        <?php else: ?>
                        <span class="badge badge-pill badge-primary">Pas Vérifié</span>
                        <?php endif; ?>
                    </dd>
                </dl>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-right">
                <button class="btn btn-dark btn-flat btn-sm" data-dismiss="modal" type="button"><i
                        class="fa fa-times"></i> Fermer</button>
            </div>
        </div>
    </div>
</div>