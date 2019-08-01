<?php 
ini_set('display_errors', 1);
require_once($_SERVER["DOCUMENT_ROOT"]."/fundscheme/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');


if (Input::exists()){
	// if(Token::check(Input::get('token'))){
		$validate = new Validation();
		$validation = $validate->check($_POST, array(
                    "password1" 				=>array('required'=>true),
                    "password2" 				=>array('required'=>true)
						)
				);
		if ($validation->passed()){

            $members = new Members();
       
            
            $password = Input::get('password1');
            $salt = Hash::salt(32);
            $id = Input::get('id');

            

			try{

                $members->update('login_table','id', $id,array(

                    "password" 					=>	Hash::make($password, $salt),
                    "salt" 				        =>	$salt

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