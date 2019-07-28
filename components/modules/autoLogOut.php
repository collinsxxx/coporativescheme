<?php 
ini_set('display_errors', 1);
require_once($_SERVER["DOCUMENT_ROOT"]."/fundscheme/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');

if(isset($_GET["id"])){

$user = new Admin();
$user->logout();

Redirect::to('index.php');
}