<?php
ini_set('display_errors', 1);
require_once($_SERVER["DOCUMENT_ROOT"]."/fundscheme/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');


// $mymoney = 100000;
// $contribution = 30000;
// $debt = 20000;

$value = selectNetorDebt('account_table', 'totalContribution', 'token_id', );

// $select = select_limit('registration_table');

// if($contribution >= $debt){
//     $outcome = $contribution-$debt;
//     $debt = 0;
//     $actual = $mymoney + $outcome;
//     echo "contribution =".$outcome."<br/> Debt = ".$debt."<br/> My Money = ".$actual;
    
// }else if($debt > $contribution){
//     $outcome = $debt-$contribution;
//     $contribution = 0;
//     $actual = $mymoney + $contribution;
//     echo "Debt =".$outcome."<br/> contribution = ".$contribution."<br/> My Money = ".$actual;
// }


// $transaction_id = "NAL".rand(10000,99999);

// echo "<br/>".$transaction_id."<br/>";

// echo $select["id"]. " ". $select["token_id"]

// echo $outcome."</br></br>";

// $debt = $outcome;

// if($debt > 0){
//     $contribution = 0;

// }else{
//     $contribution = $contribution;
// }

// echo $contribution;


?>