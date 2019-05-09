<?php
if (isset($_POST["keuzeRating"])){
        $pl = new ReactiesLijst();
        $tab = $pl->getLijst ($_POST["keuzeRating"]);
} else {
    $pl = new ReactiesLijst();
    $tab = $pl->getLijst ("0");
}



    class ReactiesLijst {
        public function getLijst ($gekozenRating){
            $lijst = array ();    
            $db = new PDO("mysql:host=localhost;dbname=gastenboek","root", "");
            if ($gekozenRating == 0) {
                $resultSet = $db->query("select reactienummer, reactie, gebruikersnaam, geposteDatum, rating from reacties order by reactienummer desc");

                foreach ($resultSet as $rij){
                    //var_dump($rij[4]);
                    $reactie = '<em class="rating">' . $rij["rating"] . '</em><br>' .strip_tags($rij["reactie"]) . '<br><i> ' .$rij["gebruikersnaam"] . ', ' .$rij["geposteDatum"] . '</i>';
                    array_push ($lijst, $reactie);
                }
            } else {
                $resultSet = $db->query("select reactienummer, reactie, gebruikersnaam, geposteDatum, rating from reacties where rating='" . $gekozenRating ."' order by reactienummer desc");

                foreach ($resultSet as $rij){
                    $reactie = '<em class="rating">' . $rij["rating"] . '</em><br>' .strip_tags($rij["reactie"]) . '<br><i> ' .$rij["gebruikersnaam"] . ', ' .$rij["geposteDatum"] . '</i>';
                    array_push ($lijst, $reactie);
                }
            }
            $db=null;
            return $lijst;
            
            print ("<ul>");
            foreach ($tab as $reactie) {
                print ("<li>" . $reactie . "</li><br>");
            print("</ul>");
            }   
        }
    }

?>