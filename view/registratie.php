<?php
session_start();
include 'header.php';
?>
<title> Registeren</title>
<div class="content">
    <div class="header">
        <h1 id="header_h1">Registeren</h1>
    </div>

    <div class="sideBar">
        <div id="header_inbox"><i class="fa fa-info-circle"></i> Informatie</div>
    </div>

    <div class="innerContent">
        <div id="option_menu">
            <div class="option_item"><i class="fa fa-pencil"></i> <a href="/toets/toetjes/view/inloggen.php">Terug</a> </div>
        </div>
        <div id="form_registrate">
        <form method="post" action="/toets/toetjes/actions/doRegistratie.php">
            <table>
                <tr>
                    <td><strong><i class="fa fa-edit"></i> Persoonlijke gegevens:</strong></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Voornaam</td>
                    <td><input type="text" name="firstname"></td>
                </tr>
                <tr>
                    <td>Tussenvoegsel</td>
                    <td><input type="text" name="Tussenvoegsel"></td>
                </tr>
                <tr>
                    <td>Achternaam</td>   
                    <td><input type="text" name="Achternaam"></td>
                </tr>
                <tr>
                    <td><strong><i class="fa fa-gears"> Account:</strong></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Gebruikersnaam</td>
                    <td><input type="text" name="Gebruikersnaam"></td>
                </tr>
				<tr>
					<td><?php if(isset($_SESSION['usernameex'])){echo $_SESSION['usernameex'];} $_SESSION['usernameex']=NULL;  ?> </td>
				</tr>
                <tr>
					<td><?php if(isset($_SESSION['pwderror'])){echo $_SESSION['pwderror'];} $_SESSION['pwderror']=NULL;  ?></td>
				</tr>
                <tr>
                    <td>Wachtwoord</td>
                    <td><input type="password" name="pwd"></td>
                    <td><i id="question_ww" class="fa fa-question-circle"></td>
                </tr>
				<tr>
					<td><?php if(isset($_SESSION['pwd2error'])){echo $_SESSION['pwd2error'];} $_SESSION['pwd2error']=NULL;  ?> </td>
				</tr>
                <tr>
                    <td>Herhaal wachtwoord</td>
                    <td><input type="password" name="pwd2"></td>
                </tr>
            </table>
            <br />
            <input type="submit" value="Registreren"/>
        </form>
        <br />
        </div>
    </div>

    <div class="footer">
        <div id="footer_text"><i class="fa fa-info-circle"></i> Versie 1.0 </div>
    </div>

</div>        
<?php
include'footer.php';
?>