<?php 
ini_set('display_errors', 1);
require_once($_SERVER["DOCUMENT_ROOT"]."/fundscheme/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');

$transaction_code = rand(10000000,99999999);

if (Input::exists()){
	// if(Token::check(Input::get('token'))){
		$validate = new Validation();
		$validation = $validate->check($_POST, array(
                    "amountRequested" 					=>array('required'=>true),
                    "refundDate" 				=>array('required'=>true)
						)
				);
		if ($validation->passed()){

			$members = new Members();
            $statues = 'pending';
            $amountReceived = 0.00;
            

			try{
				$members->create('loan_table',array(

                    "transaction_code" 			=>	$transaction_code,
                    "date" 				        =>	date('Y-m-d'),
                    "unique_id" 				=>	Input::get('unique_id'),
                    "fullName" 					=>	Input::get('surname')." ".Input::get('othername'),
                    "amountRequested" 			=>	Input::get('amountRequested'),
                    "amountReceived" 		    =>	$amountReceived,
                    "refundDate" 				=>	Input::get('refundDate'),
                    "statues" 				    =>	$statues,
                    "token_id" 					=>	Input::get('token_id2')

                ));


				
				$_POST[] = array();
				echo 'created';
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