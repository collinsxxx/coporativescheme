<?php 
ini_set('display_errors', 1);
require_once($_SERVER["DOCUMENT_ROOT"]."/fundscheme/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');

$record_per_page = 1;

  $count = select_all_count_debt('debtor_table');
  $count_page = ceil($count/$record_per_page);

for($i=1;$i<=$count_page;$i++){
  echo '<button class="debtorsList_link btn btn-default" id="'.$i.'">'.$i.'</button>';
}


// }


?>