<?php 

require_once('config.php');

$id_faculte=$_POST['id_faculte'];

$departement=$conn->query("SELECT `id`, `name` FROM `department_list` WHERE id_faculte=".$id_faculte." ORDER BY name ASC");

$html="";
$html.="<option value='0'>Sélectionner</option>";
foreach ($departement as  $value) {
	# code...
	$html.="<option value='".$value['id']."'>".$value['name']."</option>";

}

echo $html;



?>