<?php 
ini_set('display_errors', 1);
require_once($_SERVER["DOCUMENT_ROOT"]."/fundscheme/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');

$rows = select_all_asc('announcer_table');

$output = '<option value="">~~Select Announcer~~</option>';

foreach ($rows as $row) {

 $output .='<option value="'.$row['id'].'">'.$row['announcer'].'</option>';
} 
echo $output;

?>


<?php 