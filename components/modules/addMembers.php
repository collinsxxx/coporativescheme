<?php 
ini_set('display_errors', 1);
require_once($_SERVER["DOCUMENT_ROOT"]."/fundscheme/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');

$unique_id = "NAL".rand(10000,99999);
$token_id = Token::generate();

if (Input::exists()){
	// if(Token::check(Input::get('token'))){
		$validate = new Validation();
		$validation = $validate->check($_POST, array(
                    "surname" 					=>array('required'=>true),
                    "othername" 				=>array('required'=>true),
                    "homeAddress" 				=>array('required'=>true),
                    "mobileNumber" 				=>array('required'=>true),
                    "sex" 						=>array('required'=>true),
                    "emailAddress" 				=>array('required'=>true),
                    "location" 					=>array('required'=>true),
                    "contributionAmount" 		=>array('required'=>true),
                    "nxtKinName" 				=>array('required'=>true),
                    "nxtKinNumber" 				=>array('required'=>true),
                    "nxtKinAddress"				=>array('required'=>true), 
                    "nxtKinSex" 				=>array('required'=>true),
                    "nxtKinRelationship" 		=>array('required'=>true),
                    "bankAccountNumber" 		=>array('required'=>true),
                    "bankName" 					=>array('required'=>true)
						)
				);
		if ($validation->passed()){

			$members = new Members();
            
            $netAmount = 0.00;
            $debtAmount = 0.00;
            $password = 'password';
            $salt = Hash::salt(32);
            $privilege = 1;
            $login_statues = 1;
            $imageLink = "user.png";
            

			try{
				$members->create('registration_table',array(

                    "unique_id" 				=>	$unique_id,
                    "surname" 					=>	Input::get('surname'),
                    "othername" 				=>	Input::get('othername'),
                    "homeAddress" 				=>	Input::get('homeAddress'),
                    "mobileNumber" 				=>	Input::get('mobileNumber'),
                    "sex" 						=>	Input::get('sex'),
                    "emailAddress" 				=>	Input::get('emailAddress'),
                    "location" 					=>	Input::get('location'),
                    "contributionAmount" 		=>	Input::get('contributionAmount'),
                    "imageLink" 				=>	$imageLink,
                    "nxtKinName" 				=>	Input::get('nxtKinName'),
                    "nxtKinSex" 				=>	Input::get('nxtKinSex'),
                    "nxtKinRelationship" 		=>	Input::get('nxtKinRelationship'),
                    "nxtKinNumber"				=>	Input::get('nxtKinNumber'),
                    "nxtKinAddress" 		    =>	Input::get('nxtKinAddress'),
                    "bankAccountNumber" 		=>	Input::get('bankAccountNumber'),
                    "bankName" 					=>	Input::get('bankName'),
                    "netAmount" 				=>	$netAmount,
                    "debtAmount"				=>	$debtAmount,
                    "dateJoined"				=>	date('Y-m-d'),
                    "token_id" 					=>	$token_id

                ));

				
                $select = select_limit('registration_table');

                $members->create('login_table',array(

                    "username" 				    =>	$unique_id,
                    "password" 					=>	Hash::make($password, $salt),
                    "salt" 				        =>	$salt,
                    "token_id" 				    =>	$select['token_id'],
                    "privilege" 				=>	$privilege,
                    "loginStatues" 			    =>	$login_statues,
                    "reg_id" 				    =>	$select['id']
                ));

                $members->create('debtor_table',array(

                    "unique_id" 				=>	$unique_id,
                    "fullname" 					=>	Input::get('surname')." ".Input::get('othername'),
                    "debtAmount" 				=>	$debtAmount,
                    "token_id" 				    =>	$select['token_id'],
                    "issuedDate" 				=>	date('Y-m-d')
                ));

                $members->create('account_table',array(

                    "unique_id" 				=>	$unique_id,
                    "reg_id" 					=>	$select['id'],
                    "token_id" 				    =>	$select['token_id'],
                    "totalContribution" 		=>	$netAmount
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