<?php
ini_set('display_errors', 1);
require_once($_SERVER["DOCUMENT_ROOT"]."/fundscheme/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');


  // $nexcop_account_no = "NACT".rand(100000,999999);


if (Input::exists()){
	// if(Token::check(Input::get('token'))){
		$validate = new Validation();
		$validation = $validate->check($_POST, array(
						"surname"				=>array('required'=>true),
						"othername"			=>array('required'=>true),
						"homeAddress"		   	=>array('required'=>true),
						"mobileNumber"			   	=>array('required'=>true),
						"emailAddress"		=>array('required'=>true),
						"nxtKinName"			=>array('required'=>true),
						"nxtKinNumber"			=>array('required'=>true),
						"nxtKinAddress"			=>array('required'=>true)
						)
				);
		if ($validation->passed()){

			$members = new Members();
			
			// $password = 'password';
			// $salt = Hash::salt(32);
			// $balance = 0;
			
			$id = Input::get('id_no');

			

			try{
				$members->update('registration_table','id', $id,array(

							"surname"				=>	Input::get('surname'),
							"othername"	 	        =>	Input::get('othername'),
							"homeAddress"		    => 	Input::get('homeAddress'),
							"mobileNumber"			=>	Input::get('mobileNumber'),
							"emailAddress"			=>	Input::get('emailAddress'),
							"imageLink"				=>	Input::get('img_show'),
							"nxtKinName"			=>	Input::get('nxtKinName'),
							"nxtKinNumber"			=>	Input::get('nxtKinNumber'),
                            "nxtKinAddress"			=>	Input::get('nxtKinAddress')
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