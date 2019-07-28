<?php
ini_set('display_errors', 1);
require_once($_SERVER["DOCUMENT_ROOT"]."/fundscheme/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');


  // $nexcop_account_no = "NACT".rand(100000,999999);


if (Input::exists()){
	// if(Token::check(Input::get('token'))){
		$validate = new Validation();
		$validation = $validate->check($_POST, array(
						"verificationCode"				=>array('required'=>true),
						)
				);
		if ($validation->passed()){

            $members = new Members();
            $token_id = Input::get('token_id');
            $verificationCodeform = Input::get('verificationCode');

			

			try{
                $id  = selectField('login_table','reg_id','token_id',$token_id);
                $verificationCode  = selectField('login_table','verificationCode','token_id',$token_id);

				if($verificationCode == $verificationCodeform){
                    $members->update('registration_table','id', $id,array(

                        "verificationCode"				=>	$verificationCodeform,
                    ));
                    echo 'okay';
                }else{
                    echo "Invalid Verification code";
                }

				
				$_POST[] = array();
				
			}catch(Exception $e){
				die($e->getMessage());
			}

		}else{
			echo "Verification Code is Required";
		}
	// }
}else{
	echo "no input found";
}