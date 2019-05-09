<?php

    class Gebruikers {
        public function gebruikerToevoegen ($gebruikersnaam, $emailadres, $wachtwoord) {
            $db = new PDO("mysql:host=localhost;dbname=gastenboek","root", "");
            $sql = "select * from gasten where emailadres='" . $emailadres . "'";
            
            $stmt = $db->prepare ($sql);
            $stmt->execute(array());
            $resultSet = $stmt -> fetchAll (PDO::FETCH_ASSOC);

            if (sizeof($resultSet)  > 0) {
                print ("Het emailadres is al geregistreerd. <br> Klik ");
                print("<a href='login.php'>hier</a> om in te loggen. <br><br>");
            } else {
                print ("Je bent succesvol geregistreerd. <br> Klik ");
                print("<a href='login.php'>hier</a> om in te loggen. <br><br>");
                
                $sql = "insert INTO gasten (gebruikersnaam, emailadres, wachtwoord) VALUES (:gebruikersnaam, :emailadres, :wachtwoord)";

                $stmt = $db -> prepare ($sql);
                $stmt -> execute (array(':gebruikersnaam'=>$gebruikersnaam, ':emailadres'=>$emailadres, ':wachtwoord'=>$wachtwoord));
            }
            $db=null;
        }
    }
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset=utf-8>
        <link rel="stylesheet" href="css/css.css">
        <title>Registreer</title>
        <script>
            function controleWachtwoord(str) {
                let wachtwoord1 = document.getElementById("wachtwoord");
                let wachtwoord2 = document.getElementById("herhaalWachtwoord");

                if (wachtwoord.value === wachtwoord2.value) {
                     wachtwoord2.setCustomValidity('');
                } else {
                    wachtwoord2.setCustomValidity('Het wachtwoord is niet gelijk');
                }
                console.log('wachtwoord2 customError ', document.getElementById('wachtwoord2').validity.customError);
                console.log('wachtwoord2 validationMessage ', document.getElementById('wachtwoord2').validationMessage);
            }
        </script>
    </head>
    <body>
        <header>
            <div id="titel">
                <h1>Beach Cottage <br> Resort</h1>
            </div>
            <ul>
                <li><a href="registreren.php">Registreer</a></li>
                <li><a href="login.php">Log in</a></li>
            </ul>
        </header>
        <h2>Registreer</h2>
        <div class="kader">
            Vul dit formulier in om een gebruiker aan te maken.
            <br><br>
            <?php
                if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){
                    $registratie = new Gebruikers ();
                    $registratie -> gebruikerToevoegen ($_POST["gebruikersnaam"], $_POST["emailadres"], $_POST["wachtwoord"]);
                }
            ?>
            <form action="registreren.php" method="POST">
                <label>
                    <div class="col">Gebruikersnaam:</div> 
                    <div class="col"><input type="text" name="gebruikersnaam" required></div>
                </label>
                <br>
                <label>
                    <div class="col">E-mailadres: </div>
                    <div class="col"><input type="email" name="emailadres" required></div>
                </label>
                <br>
                <label>
                    <div class="col">Wachtwoord: </div>
                    <div class="col"><input type="password" name="wachtwoord" id="wachtwoord" oninput="controleWachtwoord()" required ></div>
                </label>
                <br>
                <label>
                    <div class="col">Herhaal wachtwoord: </div>
                    <div class="col"><input type="password" name="herhaalWachtwoord" id="herhaalWachtwoord" oninput="controleWachtwoord()" required></div>
                </label>
                <br><br>
                <label>
                    <input type="submit" value="registreer" class="button">
                </label>
                
                <br><br>
                Heb je al een account? <a href="registreren.php">Log hier in</a>.
            </form>
        </div>
    </body>
</html>