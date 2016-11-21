<?php 
session_start();
$_SESSION['website']= $_SESSION['website'];
$login = $_SESSION['login'];

if (isset($_SESSION['login'])) {
   session_destroy();
   // echo "<br> you are logged out successufuly!";
   // echo "<br/><a href='login.php'>login</a>";
   if($_SESSION['website']==='index.php' || $_SESSION['website']==='about.php'){
   		
   		header ("Location: ". $_SESSION['website']);
   }else{
   		
   		header ("Location: login.php");
   }
   } 
 ?>