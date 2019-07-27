<?php 
ini_set('display_errors', 1);
require_once($_SERVER["DOCUMENT_ROOT"]."/fundscheme/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');
$transaction_code = rand(10000000,99999999);
if (Input::exists()){
	// if(Token::check(Input::get('token'))){
		$validate = new Validation();
		$validation = $validate->check($_POST, array(
                    "contributionAmount" 				=>array('required'=>true)
						)
				);
		if ($validation->passed()){

            $members = new Members();
            
            // $id = Input::get("id");
            $unique_id = Input::get("unique_id");
            $fullname = Input::get("fullName");
            $authorised_name = Input::get("authorised_name");
			$contributionAmount = Input::get("contributionAmount");
			$token_id = Input::get("token_id");
			$zero = 0.00;
            

			try{
				$selectTotalcontribution = selectNetorDebt('account_table', 'totalContribution', 'token_id', $token_id);
                $selectDebt = selectNetorDebt('debtor_table', 'debtAmount', 'token_id', $token_id);
                $totalCash = select_Cash('totalcash_table','totalCash');

                $members->create('contribution_table',array(

                    "transaction_code" 			=>	$transaction_code,
                    "date"				        =>	date('Y-m-d'),
                    "unique_id" 				=>	$unique_id,
                    "fullname" 					=>	$fullname,
                    "contributionAmount" 		=>	$contributionAmount,
                    "debtAmount" 			    =>	$selectDebt,
                    "authorised_name" 			=>	$authorised_name,
                    "token_id" 					=>	$token_id

                ));

                if($selectDebt != 0){

                    if($contributionAmount >= $selectDebt){
                        $Balance = $contributionAmount - $selectDebt;
                        $savings = $Balance + $selectTotalcontribution;

                        $totalCashSaving = $contributionAmount + $totalCash;

                        $selectDebt = $zero;
                        update_table('account_table', 'totalContribution', $savings, 'token_id', $token_id);
                        update_table('debtor_table', 'debtAmount', $selectDebt, 'token_id', $token_id);
                        update_cash_table('totalcash_table', 'totalCash', $totalCashSaving);

                        update_table('registration_table', 'netAmount', $savings, 'token_id', $token_id);
                        update_table('registration_table', 'debtAmount', $selectDebt, 'token_id', $token_id);

                    }else if($selectDebt > $contributionAmount){
                        $debtPayment = $selectDebt - $contributionAmount;

                        $savings = $zero + $selectTotalcontribution;

                        $totalCashSaving = $contributionAmount + $totalCash;

                        update_table('account_table', 'totalContribution', $savings, 'token_id', $token_id);
                        update_table('debtor_table', 'debtAmount', $debtPayment, 'token_id', $token_id);
                        update_cash_table('totalcash_table', 'totalCash', $totalCashSaving);

                        update_table('registration_table', 'netAmount', $savings, 'token_id', $token_id);
                        update_table('registration_table', 'debtAmount', $debtPayment, 'token_id', $token_id);

                    }

                }else{

                    $savings = $contributionAmount + $selectTotalcontribution;
                    
                    $totalCashSaving = $contributionAmount + $totalCash;

                    update_table('account_table', 'totalContribution', $savings, 'token_id', $token_id);
                    update_cash_table('totalcash_table', 'totalCash', $totalCashSaving);

                    update_table('registration_table', 'netAmount', $savings, 'token_id', $token_id);
                }

                
                
				
				$_POST[] = array();
				echo 'okay';
			}catch(Exception $e){
				die($e->getMessage());
			}

		}else{
			foreach($validation->errors() as $error){
				echo $error, "<br>";
				$_POST[] = array();
			}
		}
	// }
}else{
	echo "no input found";
}