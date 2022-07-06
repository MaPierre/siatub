<?php 

require_once('config.php');

$id_universite=$_POST['id_universite'];

$faculte=$conn->query("SELECT `id_faculte`, `id_universite`, `nom_faculte` FROM `faculte` WHERE id_universite=".$id_universite);

$html="";
$html.="<option value='0'>Sélectionner</option>";
foreach ($faculte as  $value) {
	# code...
	$html.="<option value='".$value['id_faculte']."'>".$value['nom_faculte']."</option>";

}

echo $html;



?>