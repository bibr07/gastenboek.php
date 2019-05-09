<?php
session_start();

require ("ingelogd.php");

$plaatsReactie = new Reacties ();
$plaatsReactie -> reactieToevoegen ($_POST["reactie"], $_SESSION['gebruikersnaam'], Date ("y/m/d"), $_POST["verborgenAantalSterren"]);

class Reacties {
    public function reactieToevoegen ($reactie, $gebruikersnaam, $geposteDatum, $rating) {
        $sql = "insert into reacties (reactie, gebruikersnaam, geposteDatum, rating) values (:reactie, :gebruikersnaam, :geposteDatum, :rating)";
        $db = new PDO ("mysql:host=localhost;dbname=gastenboek","root", "");

        $stmt = $db -> prepare ($sql);
        $stmt->execute(array(':reactie'=>$reactie, ':gebruikersnaam'=>$gebruikersnaam, ':geposteDatum'=>$geposteDatum, ':rating'=>$rating));

        $db=null;
    }
}


header("Location: ingelogd.php");
exit();

?>