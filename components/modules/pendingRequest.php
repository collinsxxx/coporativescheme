<?php 
ini_set('display_errors', 1);
require_once($_SERVER["DOCUMENT_ROOT"]."/fundscheme/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');


  $variable = pendingRequest('loan_table','statues','pending');

  echo '<div class="icon"><i class="fa fa-list-ul"></i></div>
        <div class="count">'.$variable.'</div>
            <h3>Loan Request</h3>'

?>