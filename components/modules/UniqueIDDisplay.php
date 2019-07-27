<?php 
ini_set('display_errors', 1);
require_once($_SERVER["DOCUMENT_ROOT"]."/fundscheme/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');

if(isset($_GET["id"])){
    $id = $_GET["id"];
}


  $variable = selectIndividualCash('registration_table', 'unique_id', $id);

  echo '<div class="icon"><i class="fa fa-qrcode"></i></div>
            <div class="count">'.($variable).'</div>
            <h3>Unique ID</h3>'

?>