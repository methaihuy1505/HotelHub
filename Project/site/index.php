<?php 
require "../config.php";
require "../connectDB.php";
//model
require "../bootstrap.php";

session_start();
$c=$_GET["c"]??"home";
$a=$_GET["a"]??"index";
$controllerName=ucfirst($c)."Controller";
require "controller/".$controllerName.".php";
$controller=new $controllerName();
$controller->$a();
?>