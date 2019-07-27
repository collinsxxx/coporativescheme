<?php 
ini_set('display_errors', 1);
require_once($_SERVER["DOCUMENT_ROOT"]."/fundscheme/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');

if(isset($_GET["id"])){
    $id = $_GET["id"];
}


  $variable = selectIndividualCash('debtor_table', 'debtAmount', $id);

  echo '<div class="icon"><i class="fa fa-money"></i></div>
            <div class="count"> N '.number_format($variable).'</div>
            <h3>Outstanding Debt</h3>'

?>