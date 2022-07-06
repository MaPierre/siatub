<?php  
include("./config.php");
$sql = "SELECT `id`,`firstname`,`lastname`,`email`,`gender` FROM `student_list`";  
$setRec = mysqli_query($conn, $sql);  
$columnHeader = '';  
$columnHeader = "NUMERO" . "\t" . "PRENOM" . "\t" . "NOM" . "\t". "EMAIL". "\t" . "GENRE";  
$setData = '';  
  while ($rec = mysqli_fetch_row($setRec)) {  
    $rowData = '';  
    foreach ($rec as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= trim($rowData) . "\n";  
}  
   
  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=etudiants.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

  echo ucwords($columnHeader) . "\n" . $setData . "\n";  
 ?> 
