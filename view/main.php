<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['userid'])) {
$userid = $_SESSION['userid'];
include 'header.php';
?>
<div class="content">
    <div class="header">
        <h1 id="header_h1">Welkom</h1>
    </div>
    <div class="sideBar">
		<form id="search" method="post" action="../../toetjes/actions/search.php">
        <div id="header_inbox"><i class="fa fa-inbox">Zoeken</i></div>
        <div>Gerechtnaam:<input type="text" name="dishname"></div>
		<div>productnaam:<input type="text" name="dishproduct"></div>
		<div>max. bereidingstijd: <input type="number" name="dishtime"></div>
		<div>max energy pp: <input type="number" name="dishenergy"></div>
		<div><input type="submit" name="search" value="zoeken"></div>
        </form>
		<div><?php if(isset($_SESSION['searcherror'])) {
						echo $_SESSION['searcherror'];} $_SESSION['searcherror']= null; ?> </div>
    </div>

    <div class="innerContent">
        <div id="option_menu">
            <div class="option_item"><i class="fa fa-pencil"></i> frontpage</div>
            <div class="option_item"><a href="/toets/toetjes/actions/logout.php"><i class="fa fa-power-off"></i> Uitloggen</a></div>

        </div>
        <div id="my_profile">
		<table id="maintbl">
		<form id="todetail" method="post" action="../../toetjes/view/detail.php">
		
<?php 
if(isset($_SESSION['searchq'])) {
	$query = $_SESSION['searchq'];
	unset($_SESSION['searchq'])
;}
else {
$query="SELECT gerechtnaam, bereidingstijd FROM gerecht";
}
$result= mysqli_query($dbconnect,$query) or die("Error: ".mysqli_error($dbconnect));
// Output table header
	echo "<thead>
    <tr>
        <th>gerechtnaam:</th>
        <th>bereidingstijd:</th>
    </tr>
	</thead>";
				while($row = mysqli_fetch_array($result)) {
				echo "<tr>";
				  echo "<td><button id='subdish' name='dish' type='submit' value='".$row['gerechtnaam']."'>". $row['gerechtnaam'] . "</td> <td> " .($row['bereidingstijd']." minuten</button></td>");
				  echo "</tr>";
				  
				}

?>
</form>
	</table>
        </div>
    </div>
    <div class="footer">
        <div id="footer_text"><i class="fa fa-info-circle"></i> Versie 1.0 </div>
    </div>
</div>

<?php 
include'footer.php';
} else {
    header('location:/toetjes/index.php');
} ?>