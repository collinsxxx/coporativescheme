<?php 
ini_set('display_errors', 1);
require_once($_SERVER["DOCUMENT_ROOT"]."/fundscheme/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');

if (Input::exists()){
	// if(Token::check(Input::get('token'))){
		$validate = new Validation();
		$validation = $validate->check($_POST, array(
                    "subject" 				=>array('required'=>true),
                    "message" 				=>array('required'=>true),
                    "announcer" 			=>array('required'=>true)
						)
				);
		if ($validation->passed()){

			$members = new Members();
            

			try{
				$members->create('announcement_table',array(

                    "subject" 				=>	Input::get('subject'),
                    "announcementDay" 		=>	Input::get('announcementDay'),
                    "announcementMonth" 	=>	Input::get('announcementMonth'),
                    "message" 				=>	Input::get('message'),
                    "announcer" 			=>	Input::get('announcer')
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