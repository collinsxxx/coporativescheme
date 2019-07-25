<?php 
ini_set('display_errors', 1);
require_once($_SERVER["DOCUMENT_ROOT"]."/fundscheme/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');


  $variable = select_Cash('totalcash_table','totalCash');

  echo '<div class="icon"><i class="fa fa-money"></i></div>
            <div class="count"> N '.number_format($variable).'</div>
                <h3>Total Cash</h3>'

?>