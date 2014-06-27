<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
	include 'database.php';
// get data van registratie input
	 $firstname = $_POST['firstname'];
	 $insertion = $_POST['Tussenvoegsel'];
	 $lastname = $_POST['Achternaam'];
	 $username = $_POST['Gebruikersnaam'];
	 $password = md5($_POST['pwd']);
	 $passwordrepeat = md5($_POST['pwd2']);
	 
	
	//check of gebruikersnaam al bestaat
// check wachtwoord
$agree=true;
 if($password != $passwordrepeat) {
	$_SESSION['pwd2error'] = "<p class='error1'>De wachtwoorden komen niet overeen.</p>";	
	$agree = false;
 }
 $query="SELECT username FROM user WHERE username='$username'";
				$result=mysqli_query($dbconnect,$query) or die("Error: ".mysqli_error($dbconnect));
				$userdata = mysqli_fetch_array ($result, MYSQLI_ASSOC);
				if(!empty($userdata['username'])) {
					$agree = false;
						
				}
				

if(!$agree)
{
	header('Location: /toets/toetjes/view/registratie.php');
}
else {

	$query2 = "INSERT INTO user (firstname, insertion, lastname, username, password) VALUES ('$username', '$insertion', '$lastname', '$username', '$password')";
	$result2 = mysqli_query($dbconnect,$query2) or die("Error: ".mysqli_error($dbconnect));
	header('Location: /toets/toetjes/view/inloggen.php');
}
 ?>