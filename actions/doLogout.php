<?php


if(isset($_SESSION['error'])){
  unset($_SESSION['error']);
}

if(isset($_SESSION['userid'])){
  unset($_SESSION['userid']);
}

	
session_destroy();

header('Location: /toets/toetjes/index.php');
?>