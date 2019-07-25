<?php 
ini_set('display_errors', 1);
require_once($_SERVER["DOCUMENT_ROOT"]."/fundscheme/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');


if(isset($_GET["link"])){
  $id = $_GET["link"];

} 

// $id=7;

  $variable = select_single('registration_table', $id);

  if ($variable != null) {
 

  foreach ($variable as $row) {
    $json[] = [
      "unique_id"                        => $row["unique_id"],
      "fullName"                  => $row["surname"]." ".$row["othername"],
      "homeAddress"               => $row["homeAddress"],
      "mobileNumber"                => $row["mobileNumber"],
      "emailAddress"        => $row["emailAddress"],
    ];
  }

  $data['data'] = $json;


echo json_encode($data);


}else{
  $json = 'zero';
  $data['data'] = $json;
  echo json_encode($data);
}

?>