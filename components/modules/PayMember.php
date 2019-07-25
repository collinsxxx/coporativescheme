<?php 
ini_set('display_errors', 1);
require_once($_SERVER["DOCUMENT_ROOT"]."/fundscheme/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');

if (Input::exists()){
	// if(Token::check(Input::get('token'))){
		$validate = new Validation();
		$validation = $validate->check($_POST, array(
                    "amountReceived" 				=>array('required'=>true)
						)
				);
		if ($validation->passed()){

            $members = new Members();
            
            $id = Input::get("id");
			$amountReceived = Input::get("amountReceived");
			$token_id = Input::get("token_id");
			$value = 0.00;
            

			try{
				$members->update('loan_table', 'id', $id, array(

                    "amountReceived"				=>	$amountReceived
				));

				$selectTotalcontribution = selectNetorDebt('account_table', 'totalContribution', 'token_id', $token_id);
				$selectDebt = selectNetorDebt('debtor_table', 'debtAmount', 'token_id', $token_id);
				$totalCash = select_Cash('totalcash_table','totalCash');

				if($selectTotalcontribution >= $amountReceived){

					$Balance = $selectTotalcontribution - $amountReceived;
					$debtPayment = $value + $selectDebt;

					$totalCashSaving = $totalCash - $amountReceived;

				}else if($amountReceived > $selectTotalcontribution){
					$calculate = $amountReceived - $selectTotalcontribution;
					$debtPayment = $selectDebt + $calculate;
					$Balance = $value;

					$totalCashSaving = $totalCash - $amountReceived;

				}
				
				
				update_table('account_table', 'totalContribution', $Balance, 'token_id', $token_id);
				update_table('debtor_table', 'debtAmount', $debtPayment, 'token_id', $token_id);
				update_cash_table('totalcash_table', 'totalCash', $totalCashSaving);

				update_table('registration_table', 'netAmount', $Balance, 'token_id', $token_id);
				update_table('registration_table', 'debtAmount', $debtPayment, 'token_id', $token_id);
				
				
				
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