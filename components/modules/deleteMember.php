<?php 
ini_set('display_errors', 1);
require_once($_SERVER["DOCUMENT_ROOT"]."/fundscheme/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');


if(isset($_GET["id"])){
  $id = $_GET["id"];

} 

try{
    deleteMember('registration_table', $id);
    deleteLoginDetails('login_table',$id);
    echo 'okay';

}catch(Exception $e){
    die($e->getMessage());
}

  

?>