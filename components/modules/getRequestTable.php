<?php 
ini_set('display_errors', 1);
require_once($_SERVER["DOCUMENT_ROOT"]."/fundscheme/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');

$record_per_page = 1;

if(isset($_GET["page"])){
  $page = $_GET["page"];

} else { 
  $page = 1;
}

  $start_from = ($page - 1)* $record_per_page;


  $variable = select_all_pagination('loan_table', $start_from, $record_per_page);


  if ($variable != null) {
 

  foreach ($variable as $row) {
    $json[] = [
      "id"                         => $row["id"],
      "serialNo"                   => $row["transaction_code"],
      "date"                       => $row["date"],
      "unique_id"                  => $row["unique_id"],
      "fullName"                   => $row["fullName"],
      "amountRequested"            => number_format($row["amountRequested"]),
      "amountReceived"             => number_format($row["amountReceived"]),
      "refundDate"                 => $row["refundDate"],
      "token_id"                 => $row["token_id"],
      "statues"                    => strtoupper($row["statues"]),
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