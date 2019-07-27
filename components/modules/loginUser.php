<?php 
ini_set('display_errors', 1);
require_once($_SERVER["DOCUMENT_ROOT"]."/fundscheme/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');
if(Input::exists()) {
    
    // if(Token::check(Input::get('token'))){

      $validate = new Validation();
      $validation = $validate->check($_POST, array(
        'username' => array('required' => true),
        'password' => array('required' => true)

      ));

      if($validation->passed()) {
        $user = new Admin();

        $remember = (Input::get('remember') === 'on') ? true : false;
        $login = $user->login(Input::get('username'), Input::get('password'), $remember);
        
         if ($login === true){
            if($user->data()->privilege == 1){
               if($user->data()->loginStatues == 1){
                 echo 1;
               } else {
                 echo "Your Account Has Been Deactivated";
               }
            }else if($user->data()->privilege == 2){
              if($user->data()->loginStatues == 1){
                echo 2;
              } else {
                echo "Your Account Has Been Deactivated";
              }
            } 
          }else{
            echo "Invalid Username and Password";
            $_POST[] = array();
          }

      }else{
        foreach($validation->errors() as $error){
          echo $error, "<br>";
        }
      }
    //}
  }

  

  
?>