<?php 
ini_set('display_errors', 1);
require_once($_SERVER["DOCUMENT_ROOT"]."/fundscheme/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');

if(isset($_GET["reg_id"])){

    $id = $_GET["reg_id"];

    $members = new Members();
			
    $value = 1;

    try{
        $members->update('login_table', 'reg_id', $id, array(

                    "loginStatues"				=>	$value
        ));
        
        $_POST[] = array();
    
        echo 'okay';
    }catch(Exception $e){
        die($e->getMessage());
    }

}



?>