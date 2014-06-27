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
            <div class="option_item"><a href="/toets/toetjes/view/main.php"><i class="fa fa-pencil"></i> terug</a></div>
            <div class="option_item"><a href="/toets/toetjes/actions/logout.php"><i class="fa fa-power-off"></i> Uitloggen</a></div>

        </div>
        <div id="my_profile">
	<?php			
					$persons = 1;
					if(!empty($_POST['dishname'])) {
						$dish = $_POST['dishname'];
						$persons = $_POST['persons'];
					}
					else {
				$dish = $_POST['dish'];
					}

				$query="SELECT gerechtnaam,bereidingstijd, bereidingswijze, energiePP FROM gerecht WHERE gerechtnaam='$dish'";
							
				
				$result= mysqli_query($dbconnect,$query) or die("Error: ".mysqli_error($dbconnect));
				$dishdata = mysqli_fetch_array($result, MYSQLI_ASSOC);
				$dishname = $dishdata['gerechtnaam'];
				$dishtime = $dishdata['bereidingstijd'];
				$dishprocces = $dishdata['bereidingswijze'];
				$dishenergy = $dishdata['energiePP'];				
	?>
		<div><h2><?php echo $dishname; ?> </h2></div>
		<div>bereidingstijd: <?php echo $dishtime; ?> </div>
		<div>energie per persoon: <?php echo $dishenergy ?> </div>
		<div>bereidingswijze: <br> <?php echo $dishprocces ?> </div>
		<form id="persons" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<div>aantal personen: <input type="number" min="1" max="100" name="persons"><input type="hidden" name="dishname" value="<?php echo $dish; ?>"> </div>
		<input type="submit" value="toon">
        </form>
		<div> <?php
			
			$query2 = "SELECT productnaam, hoeveelheidPP
				FROM ingredient
				WHERE gerechtnaam ='$dish'";
				$result2= mysqli_query($dbconnect,$query2) or die("Error: ".mysqli_error($dbconnect));
				while($row = mysqli_fetch_array($result2)) {
				  echo $row['productnaam'] . " " .($row['hoeveelheidPP']*$persons);
				  echo "<br>";
				}
			?></div>
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