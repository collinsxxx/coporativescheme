<?php 
ini_set('display_errors', 1);
require_once($_SERVER["DOCUMENT_ROOT"]."/fundscheme/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');

$record_per_page = 10;

if(isset($_GET["page"])){
  $page = $_GET["page"];

} else { 
  $page = 1;
}

  $start_from = ($page - 1)* $record_per_page;


  $variable = select_all_pagination('contribution_table', $start_from, $record_per_page);


  if ($variable != null) {
 

  foreach ($variable as $row) {
    $json[] = [
      "id"                        => $row["id"],
      "transaction_code"          => $row["transaction_code"],
      "date"                      => $row["date"],
      "unique_id"                 => $row["unique_id"],
      "fullName"                  => $row["fullname"],
      "contributionAmount"        => number_format($row["contributionAmount"]),
      "authorised_name"           =>$row["authorised_name"],
      
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