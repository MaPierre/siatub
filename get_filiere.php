<?php 

require_once('config.php');

$department_id=$_POST['department_id'];

$filiere=$conn->query("SELECT `id`, `name` FROM `tbl_filieres` WHERE department_id=".$department_id." ORDER BY name ASC");

$html="";
$html.="<option value='0'>Sélectionner</option>";
foreach ($filiere as  $value) {
	# code...
	$html.="<option value='".$value['id']."'>".$value['name']."</option>";

}

echo $html;



?>