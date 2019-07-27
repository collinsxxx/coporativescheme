<?php 
ini_set('display_errors', 1);
require_once($_SERVER["DOCUMENT_ROOT"]."/fundscheme/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');


if(isset($_GET["id"])){
  $id = $_GET["id"];

}

$id = "0b415cda2fa4f288e675c20d743e9f16";


$variable = select_profle('registration_table', $id);

if ($variable != null) {
 

    foreach ($variable as $row) {
      $json[] = [
        "imageLink"                        => $row["imageLink"],
        
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