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


$variable = debtorsList('debtor_table','debtAmount', 0, $start_from, $record_per_page);


  // $variable = select_all_reverse('logbook');
  if ($variable != null) {
    $output ='';


  foreach ($variable as $row) {
      $output .= '<li class="media event">
      <a class="pull-left border-blue profile_thumb">
      <i class="fa fa-user blue"></i>
      </a>
      <div class="media-body">
      <a class="title" href="#" id="'.$row["id"].'">'.$row["fullname"].'</a>
      <p><strong>'.number_format($row["debtAmount"]).'</strong> <i> Outstanding Payemnt</i> </p>
      <p> <small>'.$row["issuedDate"].'</small>
      </p>
      </div>
      </li>';
    }

 echo $output;


}else{
  echo '<h3 class="text-center"> NO DEBTOR</h3>';
}

?>

