<?php

    class ReactiesLijst {
        public function getLijst ($gekozenRating){
            $lijst = array ();
            $db = new PDO("mysql:host=localhost;dbname=gastenboek","root", "");
            
            if (($gekozenRating == 0) || ($gekozenRating == NULL)) {
                $resultSet = $db->query("select reactienummer, reactie, gebruikersnaam, geposteDatum, rating from reacties order by reactienummer desc");

                foreach ($resultSet as $rij){
                    //var_dump($rij[4]);
                    $reactie = '<em class="rating">' . $rij["rating"] . '</em><br>' .$rij["reactie"] . '<br><i> ' .$rij["gebruikersnaam"] . ', ' .$rij["geposteDatum"] . '</i>';
                    array_push ($lijst, $reactie);
                }
            } else {
                $resultSet = $db->query("select reactienummer, reactie, gebruikersnaam, geposteDatum, rating from reacties where rating='" . $gekozenRating ."' order by reactienummer desc");

                foreach ($resultSet as $rij){
                    $reactie = '<em class="rating">' . $rij["rating"] . '</em><br>' .$rij["reactie"] . '<br><i> ' .$rij["gebruikersnaam"] . ', ' .$rij["geposteDatum"] . '</i>';
                    array_push ($lijst, $reactie);
                }
            }
            
            $db=null;
            return $lijst;
        }
    }

?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset=utf-8>
        <title>Home</title>
        <link rel="stylesheet" href="css/css.css">
        <script type="text/javascript" src="js/ratingTonen.js"></script>
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
        <br><br>
        <h2>De recensies:</h2>
        <div class="filter">
            <h3>Filter</h3>
            
            <form action="index.php" method="POST">
               Rating: &nbsp; &nbsp;
                <select name="keuzeRating">
                    <option value="0" selected>--- Toon alles ---</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select> &nbsp; &nbsp; &nbsp; 
                <label>
                    <input type="submit" value="filter" class="button">
                </label>
            </form>
        </div>
        <?php
            if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){
                $pl = new ReactiesLijst();
                $tab = $pl->getLijst ($_POST["keuzeRating"]);
            } else {
                $pl = new ReactiesLijst();
                $tab = $pl->getLijst ("0");
            }
        ?>
        <div class="recensies">
            <ul>
                <?php
                foreach ($tab as $reactie) {
                    print ("<li>" . $reactie . "</li><br>");
                }?>
            </ul>
        </div>
    </body>
</html>