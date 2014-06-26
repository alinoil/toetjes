<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
	include 'database.php';
	$username = $_POST['username'];
	$password = $_POST['password'];
	 
	//reguliere expressie in stukken
	$uppercase = preg_match('@[A-Z]@', $password);
	$lowercase = preg_match('@[a-z]@', $password);
	$number    = preg_match('@[0-9]@', $password);
	
	if(!empty($_POST['username']) && !empty($_POST['password'])) {
		
				$query="SELECT ID, username, password FROM user WHERE username='$username'";
				$result=mysqli_query($dbconnect,$query);
				$userdata = mysqli_fetch_array ($result, MYSQLI_ASSOC);
				$dbpassword = $userdata['password'];

			if($dbpassword == md5($password)){

				//doorsturen naar main page
				$_SESSION['userid']=$userdata['ID'];
				header('Location:../../toetjes/view/main.php');
			}
			
			else {
				// terugsturen naar inloggen voor verkeerd wachtwoord
				header('Location: ../../toetjes/index.php');
				$_SESSION["error"] = "<p class='error1'>Gegevens zijn onjuist.</p>";
			}
			
	}
	
	else
	{
		$_SESSION["error"] = "<p class='error1'>Gegevens zijn onjuist.</p>";
	header('Location: ../../toetjes/index.php');
	}
	
?>