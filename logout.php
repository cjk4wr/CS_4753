<?php 
session_start();
$_SESSION['website']= $_SESSION['website'];
$login = $_SESSION['login'];

if (isset($_SESSION['login'])) {
   session_destroy();
   // echo "<br> you are logged out successufuly!";
   // echo "<br/><a href='login.php'>login</a>";
   if($_SESSION['website']==='index.php' || $_SESSION['website']==='about.php'){
   		echo "going somewhere";
   		header ("Location: ". $_SESSION['website']);
   }else{
   		echo "going login";
   		header ("Location: login.php");
   }
   } 
 ?>