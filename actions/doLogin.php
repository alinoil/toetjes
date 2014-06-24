<?php
	include 'database.php';
	$username = $_POST['username'];
	$password = $_POST['password'];
	 
	//reguliere expressie in stukken
	$uppercase = preg_match('@[A-Z]@', $password);
	$lowercase = preg_match('@[a-z]@', $password);
	$number    = preg_match('@[0-9]@', $password);
	
	if(!empty($_POST['username']) && !empty($_POST['password'])) {
		
				$sqli="SELECT * FROM 'users' WHERE username='$username'";
					$result=mysql_query($dbconnect,$sqli,);
						var_dump($result);
			/*if($userdbpass == md5($password)){

				$_SESSION['userId'] = $userid;
				//doorsturen naar main page
				header('Location:../../toetjes/view/main.php');
			}
			else {
				// terugsturen naar inloggen voor verkeerd wachtwoord
				header('Location: ../../toetjes/index.php');
				$_SESSION["error"] = "<p class='error1'>Gegevens zijn onjuist.</p>";
			}
			*/
	}
	
	else
	{
		$_SESSION["error"] = "<p class='error1'>Gegevens zijn onjuist.</p>";
	header('Location: ../../toetjes/index.php');
	}
	
?>