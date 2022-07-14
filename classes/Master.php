<?php
require_once('../config.php');
Class Master extends DBConnection {
	private $settings;
	public function __construct(){
		global $_settings;
		$this->settings = $_settings;
		parent::__construct();
	}
	public function __destruct(){
		parent::__destruct();
	}
	function capture_err(){
		if(!$this->conn->error)
			return false;
		else{
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
			return json_encode($resp);
			exit;
		}
	}
	function save_department(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k =>$v){
			if(!in_array($k,array('id'))){
				if(!is_numeric($v))
					$v = $this->conn->real_escape_string($v);
				if(!empty($data)) $data .=",";
				$data .= " `{$k}`='{$v}' ";
			}
		}
		if(empty($id)){
			$sql = "INSERT INTO `department_list` set {$data} ";
		}else{
			$sql = "UPDATE `department_list` set {$data} where id = '{$id}' ";
		}
		$check = $this->conn->query("SELECT * FROM `department_list` where `name`='{$name}' ".($id > 0 ? " and id != '{$id}'" : ""))->num_rows;
		if($check > 0){
			$resp['status'] = 'failed';
			$resp['msg'] = "Nom du département déjà.";
		}else{
			$save = $this->conn->query($sql);
			if($save){
				$rid = !empty($id) ? $id : $this->conn->insert_id;
				$resp['status'] = 'success';
				if(empty($id))
					$resp['msg'] = "Détails du département ajoutés avec succès.";
				else
					$resp['msg'] = "Les détails du département ont été mis à jour avec succès.";
			}else{
				$resp['status'] = 'failed';
				$resp['msg'] = "An error occured.";
				$resp['err'] = $this->conn->error."[{$sql}]";
			}
		}
		if($resp['status'] =='success')
		$this->settings->set_flashdata('success',$resp['msg']);
		return json_encode($resp);
	}
	function delete_department(){
		extract($_POST);
		$del = $this->conn->query("DELETE FROM `department_list` where id = '{$id}'");
		if($del){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success',"Le département a été supprimé avec succès.");
		}else{
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);

	}
	function save_curriculum(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k =>$v){
			if(!in_array($k,array('id'))){
				if(!is_numeric($v))
					$v = $this->conn->real_escape_string($v);
				if(!empty($data)) $data .=",";
				$data .= " `{$k}`='{$v}' ";
			}
		}
		if(empty($id)){
			$sql = "INSERT INTO `tbl_filieres` set {$data} ";
		}else{
			$sql = "UPDATE `tbl_filieres` set {$data} where id = '{$id}' ";
		}
		$check = $this->conn->query("SELECT * FROM `tbl_filieres` where `name`='{$name}' and `department_id` = '{department_id}' ".($id > 0 ? " and id != '{$id}'" : ""))->num_rows;
		if($check > 0){
			$resp['status'] = 'failed';
			$resp['msg'] = "Le nom du programme existe déjà.";
		}else{
			$save = $this->conn->query($sql);
			if($save){
				$rid = !empty($id) ? $id : $this->conn->insert_id;
				$resp['status'] = 'success';
				if(empty($id))
					$resp['msg'] = "Détails de la Filière d'études ajoutés avec succès.";
				else
					$resp['msg'] = "Les Détails de la Filière ont été mis à jour avec succès.";
			}else{
				$resp['status'] = 'failed';
				$resp['msg'] = "An error occured.";
				$resp['err'] = $this->conn->error."[{$sql}]";
			}
		}
		if($resp['status'] =='success')
		$this->settings->set_flashdata('success',$resp['msg']);
		return json_encode($resp);
	}
	function delete_curriculum(){
		extract($_POST);
		$del = $this->conn->query("DELETE FROM `tbl_filieres` where id = '{$id}'");
		if($del){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success',"Le programme a été supprimé avec succès.");
		}else{
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);

	}
	

		/*$pref= date("Ym");
		$code = sprintf("%'.04d",1);
		while(true){
		$check = $this->conn->query("SELECT * FROM `archive_list` where archive_code = '{$pref}{$code}'")->num_rows;
		if($check > 0){
		$code = sprintf("%'.04d",abs($code)+1);*/
		//FONCTION POUR ENREGISTRER UN ARCHIVE
		function save_archive(){
		if(empty($_POST['id'])){
			$pref= date("Ym");
			$code = uniqid('UB');
			while(true){
				$check = $this->conn->query("SELECT * FROM `archive_list` where archive_code = '{$pref}{$code}'")->num_rows;
				if($check > 0){
					$code = sprintf($pref,$code );
				}else{
					break;
				}
			}
			$_POST['archive_code'] = $pref.$code;
			$_POST['student_id'] = $this->settings->userdata('id');
			$_POST['curriculum_id'] = $this->settings->userdata('curriculum_id');
		}
		if(isset($_POST['abstract']))
		$_POST['abstract'] = htmlentities($_POST['abstract']);
		if(isset($_POST['members']))
		$_POST['members'] = htmlentities($_POST['members']);
		extract($_POST);
		$data = "";
		if(isset($_FILES['pdf']) && !empty($_FILES['pdf']['tmp_name'])){
			$type = mime_content_type($_FILES['pdf']['tmp_name']);
			if($type != "application/pdf"){
				$resp['status'] = "failed";
				$resp['msg'] = "Invalid Document File Type.";
				return json_encode($resp);
			} 
		}
		foreach($_POST as $k =>$v){
			if(!in_array($k,array('id')) && !is_array($_POST[$k])){
				if(!is_numeric($v))
					$v = $this->conn->real_escape_string($v);
				if(!empty($data)) $data .=",";
				$data .= " `{$k}`='{$v}' ";
			}
		}
		if(empty($id)){
			$sql = "INSERT INTO `archive_list` set {$data} ";
		}else{
			$sql = "UPDATE `archive_list` set {$data} where id = '{$id}' ";
		}
		$save = $this->conn->query($sql);
		if($save){
			$aid = !empty($id) ? $id : $this->conn->insert_id;
			$resp['status'] = 'success';
			$resp['id'] = $aid;
			if(empty($id))
				$resp['msg'] = "L'archive a été soumise avec succès";
			else
				$resp['msg'] = "Les détails de l'archive ont été mis à jour avec succès.";

				if(isset($_FILES['img']) && $_FILES['img']['tmp_name'] != ''){
					$fname = 'uploads/banners/archive-'.$aid.'.png';
					$dir_path =base_app. $fname;
					$upload = $_FILES['img']['tmp_name'];
					$type = mime_content_type($upload);
					$allowed = array('image/png','image/jpeg');
					if(!in_array($type,$allowed)){
						$resp['msg'].=" Mais l'image n'a pas pu être téléchargée en raison d'un type de fichier non valide,format .png et .jpeg uniquement autorisé.";
					}else{
						$new_height = 720; 
						$new_width = 1280;  
				
						list($width, $height) = getimagesize($upload);
						$t_image = imagecreatetruecolor($new_width, $new_height);
						imagealphablending( $t_image, false );
						imagesavealpha( $t_image, true );
						$gdImg = ($type == 'image/png')? imagecreatefrompng($upload) : imagecreatefromjpeg($upload);
						imagecopyresampled($t_image, $gdImg, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
						if($gdImg){
								if(is_file($dir_path))
								unlink($dir_path);
								$uploaded_img = imagepng($t_image,$dir_path);
								imagedestroy($gdImg);
								imagedestroy($t_image);
						}else{
						$resp['msg'].=" Mais l'image n'a pas pu être téléchargée pour une raison inconnue.";
						}
					}
					if(isset($uploaded_img)){
						$this->conn->query("UPDATE archive_list set `banner_path` = CONCAT('{$fname}','?v=',unix_timestamp(CURRENT_TIMESTAMP)) where id = '{$aid}' ");
					}
				}
				if(isset($_FILES['pdf']) && $_FILES['pdf']['tmp_name'] != ''){
					$fname = 'uploads/pdf/archive-'.$aid.'.pdf';
					$dir_path =base_app. $fname;
					$upload = $_FILES['pdf']['tmp_name'];
					$type = mime_content_type($upload);
					$allowed = array('application/pdf');
					if(!in_array($type,$allowed)){
						$resp['msg'].=" Mais le fichier de document n'a pas pu être téléchargé en raison d'un type de fichier non valide,format PDF seulement autorisé.";
					}else{
						$uploaded = move_uploaded_file($_FILES['pdf']['tmp_name'],$dir_path);
					}
					if(isset($uploaded)){
						$this->conn->query("UPDATE archive_list set `document_path` = CONCAT('{$fname}','?v=',unix_timestamp(CURRENT_TIMESTAMP)) where id = '{$aid}' ");
					}
				}
			
		}else{
			$resp['status'] = 'failed';
			$resp['msg'] = "An error occured.";
			$resp['err'] = $this->conn->error."[{$sql}]";
		}
		if($resp['status'] =='success')
		$this->settings->set_flashdata('success',$resp['msg']);
		return json_encode($resp);
	}
	function delete_archive(){
		extract($_POST);
		$get = $this->conn->query("SELECT * FROM `archive_list` where id = '{$id}'");
		$del = $this->conn->query("DELETE FROM `archive_list` where id = '{$id}'");
		if($del){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success'," Les enregistrements d'archive ont été supprimés avec succès.");
			if($get->num_rows > 0){
				$res = $get->fetch_array();
				$banner_path = explode("?",$res['banner_path'])[0];
				$document_path = explode("?",$res['document_path'])[0];
				if(is_file(base_app.$banner_path))
					unlink(base_app.$banner_path);
				if(is_file(base_app.$document_path))
					unlink(base_app.$document_path);
			}
		}else{
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);
	}
	function update_status(){
		extract($_POST);
		$update = $this->conn->query("UPDATE `archive_list` set status  = '{$status}' where id = '{$id}'");
		if($update){
			$resp['status'] = 'success';
			$resp['msg'] = "Le statut de l'archive a été mis à jour avec succès.";
		}else{
			$resp['status'] = 'failed';
			$resp['msg'] = "An error occurred. Error: " .$this->conn->error;
		}
		if($resp['status'] =='success')
		$this->settings->set_flashdata('success',$resp['msg']);
		return json_encode($resp);
	}
}

$Master = new Master();
$action = !isset($_GET['f']) ? 'none' : strtolower($_GET['f']);
$sysset = new SystemSettings();
switch ($action) {
	case 'save_department':
		echo $Master->save_department();
	break;
	case 'delete_department':
		echo $Master->delete_department();
	break;
	case 'save_curriculum':
		echo $Master->save_curriculum();
	break;
	case 'delete_curriculum':
		echo $Master->delete_curriculum();
	break;
	case 'save_archive':
		echo $Master->save_archive();
	break;
	case 'delete_archive':
		echo $Master->delete_archive();
	break;
	case 'update_status':
		echo $Master->update_status();
	break;
	case 'save_payment':
		echo $Master->save_payment();
	break;
	case 'delete_payment':
		echo $Master->delete_payment();
	break;
	default:
		// echo $sysset->index();
		break;
}