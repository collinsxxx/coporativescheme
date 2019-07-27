<?php 
ini_set('display_errors', 1);
require_once($_SERVER["DOCUMENT_ROOT"]."/fundscheme/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');


if(isset($_GET["id"])){
  $id = $_GET["id"];

}


  $variable = select_profle('registration_table', $id);


  if ($variable != null) {
 

  foreach ($variable as $row) {
    $json[] = [
      "id"                         => $row["id"],
      "surname"                  => $row["surname"],
      "othername"                   => $row["othername"],
      "homeAddress"            => $row["homeAddress"],
      "mobileNumber"             => $row["mobileNumber"],
      "emailAddress"                 => $row["emailAddress"],
      "imageLink"                 => $row["imageLink"],
      "nxtKinName"                    => $row["nxtKinName"],
      "nxtKinNumber"                    => $row["nxtKinNumber"],
      "nxtKinAddress"                    => $row["nxtKinAddress"],
      "bankAccountNumber"                    => $row["bankAccountNumber"],
      "bankName"                    => selectField('banks', 'name', 'id',$row["bankName"]),
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