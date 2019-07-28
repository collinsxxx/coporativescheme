<?php 
ini_set('display_errors', 1);
require_once($_SERVER["DOCUMENT_ROOT"]."/fundscheme/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');


if(isset($_GET["id"])){
  $id = $_GET["id"];

}

// $id = "ed454471ca4881e54f2b5e2acb6f3aa0";


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