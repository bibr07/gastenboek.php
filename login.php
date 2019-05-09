<?php
session_start();

if (!empty($_POST["emailadres"])) {
    setcookie("ingevuldeEmail", $_POST["emailadres"], time() + 60);
    $naam = $_POST["emailadres"];
} else {
    $naam="";
    if (isset($_COOKIE["ingevuldeEmail"])) {
        $naam = $_COOKIE["ingevuldeEmail"];
    }
}

class Gebruikers {
    
    public function login ($email, $wachtwoord) {
        $db = new PDO("mysql:host=localhost;dbname=gastenboek","root", "");
        $sql = "select * from gasten where emailadres= :emailadres and wachtwoord= :wachtwoord ";
        //$sql = "select * from gasten where emailadres='test@gmail.com' and wachtwoord='1235' or 1=1;--'";
       

        $stmt = $db->prepare ($sql);
        $stmt->execute(array(':emailadres' => $email, ':wachtwoord' => $wachtwoord));
        $resultSet = $stmt -> fetchAll (PDO::FETCH_ASSOC);

        if (sizeof($resultSet)  > 0) {
                $selectie = "select gebruikersnaam from gasten where emailadres= :emailadres";
                $lijst = $db->prepare ($selectie);
                $lijst->execute(array(':emailadres' => $email));
                $result = $lijst -> fetchAll (PDO::FETCH_ASSOC);
                $_SESSION['gebruikersnaam'] = $result[0]["gebruikersnaam"];
            
            header("Location:ingelogd.php");
            exit();
        } else {
            $melding = "Foute combinatie van e-mailadres en wachtwoord";
        }
        print "<script type='text/javascript'>alert('$melding');</script>";
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="css/css.css">
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
        <h2>Login</h2>
        <div class="kader">
            Vul uw gegevens in om in te loggen
            <br><br>
            <form action="login.php" method="post">
                <label>
                    <div class="col">E-mailadres: </div>
                    <div class="col"><input type="email" name="emailadres" required value="<?php print($naam);?>"></div>
                </label>
                <br>
                <label>
                    <div class="col">Wachtwoord: </div> 
                    <div class="col"><input type="password" name="wachtwoord" id="wachtwoord" required></div>
                </label>
                <br><br>
                <label>
                    <input type="submit" value="login" class="button">
                </label>
                <br>

                <?php
                    if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){
                        $login = new Gebruikers ();
                        $login -> login ($_POST["emailadres"], $_POST["wachtwoord"]);
                    }
                ?>

                <br>
                Nog geen account? <a href="registreren.php">Registreer hier</a>.
            </form>
        </div>
    </body>
</html>