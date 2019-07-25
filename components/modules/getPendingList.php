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


$variable = pendingList('loan_table','statues','pending', $start_from, $record_per_page);


  // $variable = select_all_reverse('logbook');
  if ($variable != null) {
    $output ='';


  foreach ($variable as $row) {
      $output .= '<li class="media event">
      <a class="pull-left border-orange profile_thumb">
      <i class="fa fa-user orange"></i>
      </a>
      <div class="media-body">
      <a class="title" href="#" id="'.$row["id"].'">'.$row["fullName"].'</a>
      <p><strong>'.number_format($row["amountRequested"]).'</strong> <i>'.$row["statues"].'</i> </p>
      <p> <small>'.$row["date"].'</small>
      </p>
      </div>
      </li>';
    }

 echo $output;


}else{
  echo '<h3 class="text-center"> NO PENDING LOAN REQUEST</h3>';
}

?>

