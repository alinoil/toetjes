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
            <div class="option_item"><i class="fa fa-pencil"></i> frontpage</div>
            <div class="option_item"><a href="/toetjes/logout/"><i class="fa fa-power-off"></i> Uitloggen</a></div>

        </div>
        <div id="my_profile">
		<table>
<?php 
$columns = array(
  'gerechtnaam' => 'gerechtnaam', 
  'bereidingstijd' => 'bereidingstijd',
);
$query="SELECT * FROM gerecht";
$result= mysqli_query($dbconnect,$query);
// Output table header
echo "<table border=\"1px solid black\" width=\"80%\"><tr>";
foreach ($columns as $name => $col_name) {
  echo "<th>$name</th>";
}
echo "</tr>";

// Output rows 
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  foreach ($columns as $name => $col_name) {
    echo "<td style=\"text-align:center;\">". $row[$col_name] . "</td>";
  }
  echo "</tr>";
}
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