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
        <div id="header_inbox"><i class="fa fa-inbox"></i></div>
        
        
    </div>

    <div class="innerContent">
        <div id="option_menu">
            <div class="option_item"><a href="/toets/toetjes/view/main.php"><i class="fa fa-pencil"></i> frontpage</a></div>
            <div class="option_item"><a href="/toets/toetjes/actions/logout.php"><i class="fa fa-power-off"></i> Uitloggen</a></div>

        </div>
        <div id="my_profile">
		<table>
<?php
$dish = $_POST['dish'];

$query="SELECT gerechtnaam,bereidingstijd, bereidingswijze FROM gerecht WHERE gerechtnaam='$dish'";
				$result= mysqli_query($dbconnect,$query) or die("Error: ".mysqli_error($dbconnect));
				$dishdata = mysqli_fetch_array($result, MYSQLI_ASSOC);
				$dishname = $dishdata['gerechtnaam'];
				$dishtime = $dishdata['bereidingstijd'];
				$dishprocces = $dishdata['bereidingswijze'];
?>
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