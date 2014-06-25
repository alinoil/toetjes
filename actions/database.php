<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "toetjes";
$q = null;
$dbconnect = null;
if (!$dbconnect = mysqli_connect($host, $user, $password, $db))
{
echo "verbinding mislukt";
echo "de foutmelding is:".mysql_connect_error();
};

?>