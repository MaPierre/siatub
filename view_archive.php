<?php 
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT a.* FROM `archive_list` a where a.id = '{$_GET['id']}'");
    if($qry->num_rows){
        foreach($qry->fetch_array() as $k => $v){
            if(!is_numeric($k))
            $$k = $v;
        }
    }
    $submitted = "N/A";
    if(isset($student_id)){
        $student = $conn->query("SELECT * FROM student_list where id = '{$student_id}'");
        if($student->num_rows > 0){
            $res = $student->fetch_array();
            $submitted = $res['email'];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage des archives</title>
    <style>
    #document_field{
        min-height:80vh
    }
</style>
</head>
<body>
    
</body>
</html>

<div class="content py-4">
    <div class="col-12">
        <div class="card card-outline card-primary shadow rounded-0">
            <div class="card-header">
                <h3 class="card-title">
                    Archive - <?= isset($archive_code) ? $archive_code : "" ?>
                </h3>
            </div>
            <div class="card-body rounded-0">
                <div class="container-fluid">
                    <h2><b><?= isset($title) ? $title : "" ?></b></h2>
                    <small class="text-muted">Mise en ligne par <b class="text-info"><?= $submitted ?></b> au  <?= date("F d, Y h:i A",strtotime($date_created)) ?></small>
                    <?php if(isset($student_id) && $_settings->userdata('login_type') == "2" && $student_id == $_settings->userdata('id')): ?>
                        <div class="form-group">
                            <a href="./?page=submit-archive&id=<?= isset($id) ? $id : "" ?>" class="btn btn-flat btn-default bg-navy btn-sm"><i class="fa fa-edit"></i> Editer</a>
                            <button type="button" data-id = "<?= isset($id) ? $id : "" ?>" class="btn btn-flat btn-danger btn-sm delete-data"><i class="fa fa-trash"></i>Effacer</button>
                        </div>
                    <?php endif; ?>
                    <hr>
                    <center>
                        <img src="<?= validate_image(isset($banner_path) ? $banner_path : "") ?>" alt="Image de bannière" id="banner-img" class="img-fluid border bg-gradient-dark">
                    </center>
                    <fieldset>
                        <legend class="text-navy">Année du projet:</legend>
                        <div class="pl-4"><large><?= isset($year) ? $year : "----" ?></large></div>
                    </fieldset>
                    <fieldset>
                        <legend class="text-navy">Résumé:</legend>
                        <div class="pl-4"><large><?= isset($abstract) ? html_entity_decode($abstract) : "" ?></large></div>
                    </fieldset>
                    <fieldset>
                        <legend class="text-navy">Membres:</legend>
                        <div class="pl-4"><large><?= isset($members) ? html_entity_decode($members) : "" ?></large></div>
                    </fieldset>
                    <fieldset>
                        <legend class="text-navy">Document du projet:</legend>
                        <div class="pl-4">
                            <iframe src="<?= isset($document_path) ? base_url.$document_path : "" ?>" frameborder="0" id="document_field" class="text-center w-100">Chargement du document ...</iframe>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        $('.delete-data').click(function(){
            _conf("Êtes-vous sûr de vouloir supprimer <b>Archive-<?= isset($archive_code) ? $archive_code : "" ?></b>","delete_archive")
        })
    })
    function delete_archive(){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_archive",
			method:"POST",
			data:{id: "<?= isset($id) ? $id : "" ?>"},
			dataType:"json",
			error:err=>{
				console.log(err)
				alert_toast("An error occured.",'error');
				end_loader();
			},
			success:function(resp){
				if(typeof resp== 'object' && resp.status == 'success'){
					location.replace("./");
				}else{
					alert_toast("An error occured.",'error');
					end_loader();
				}
			}
		})
	}
</script>