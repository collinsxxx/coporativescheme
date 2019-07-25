<?php 
ini_set('display_errors', 1);
require_once($_SERVER["DOCUMENT_ROOT"]."/fundscheme/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');


  $variable = select_all_count('registration_table');

  echo '<div class="icon"><i class="fa fa-group"></i></div>
            <div class="count">'.$variable.'</div>
                <h3>Total Members</h3>'

?>