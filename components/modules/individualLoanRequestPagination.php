<?php 
ini_set('display_errors', 1);
require_once($_SERVER["DOCUMENT_ROOT"]."/fundscheme/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');

if(isset($_GET["id"])){
    $id = $_GET["id"];
  
}

$record_per_page = 10;

  $count = select_all_count_indiviual_contribution('loan_table',$id);
  $count_page = ceil($count/$record_per_page);

for($i=1;$i<=$count_page;$i++){
  echo '<button class="individualLoanRequestTable_link btn btn-default" id="'.$i.'">'.$i.'</button>';
}


// }


?>