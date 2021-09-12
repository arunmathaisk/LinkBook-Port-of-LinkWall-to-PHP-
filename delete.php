<?php
 require 'rb-sqlite.php';
  session_start();
 if(!isset($_SESSION['AUTH']))
 {
	 header("location:login.php");
     exit;
 }
 $cur_dir = getcwd();
 $cur_dir = "sqlite:". $cur_dir . "/linkbook.db"; 
 R::setup($cur_dir);
 $link = R::dispense( 'link' );
 
	$id = $_GET['id'];
	$link = R::load("link", $id);
    R::trash($link);
	header("location:index.php");
    exit;

?>
