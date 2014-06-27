<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$dishname = "";
$dishtime= 9999999;
$dishenergy = 999999;

if(!empty($_POST['dishname']) || !empty($_POST['dishproduct']) || !empty($_POST['dishtime']) || !empty($_POST['dishenergy'])) {
	if(!empty($_POST['dishname'])) {
		$dishname = $_POST['dishname'];
	} 
	if(!empty($_POST['dishtime'])) {
			$dishtime= $_POST['dishtime'];
	}
	if(!empty($_POST['dishenergy'])) {
		$dishenergy = $_POST['dishenergy'];
	}
	if(!empty($_POST['dishproduct'])) {
		$dishproduct= $_POST['dishproduct'];
	}
	
	$query = "SELECT DISTINCT ger.gerechtnaam, ger.bereidingstijd, ger.energiePP
				FROM gerecht AS ger
				LEFT OUTER JOIN ingredient ON ger.gerechtnaam = ingredient.gerechtnaam
				WHERE ger.gerechtnaam LIKE '%$dishname%' AND ger.bereidingstijd<= $dishtime AND ger.energiePP<=$dishenergy AND ingredient.productnaam LIKE '%$dishproduct%' ";
				
	$_SESSION['searchq'] = $query;
	header('Location:../../toetjes/view/main.php');
}
else {
	$_SESSION['searcherror'] = "geen gegevens ingevuld";
	header('Location:../../toetjes/view/main.php');
}
?>