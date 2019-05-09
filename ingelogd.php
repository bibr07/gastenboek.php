<?php
  require ("toonReacties.php");      
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset=utf-8>
        <title>Welkom</title>
        <link rel="stylesheet" href="css/css.css">
        <script type="text/javascript" src="js/js_na_inloggen.js"></script>
    </head>
    <body>
        <header>
            <div id="titel">
                <h1>Beach Cottage <br> Resort</h1>
            </div>
            <ul>
                <li><a href="index.php">Log uit</a></li>
            </ul>
        </header>
        <div class="reactiePlaatsen">
            <form action="plaatsreactie.php" method="POST">
                <label>
                    <h2>Plaats een reactie</h2>
                    <br>
                    <div class="col"><textarea name="reactie" rows="5" cols="50" required></textarea></div>
                </label>
                <br><br>
                <div class="stars" data-rating="3">
                    Rating: &nbsp; &nbsp;
                    <span class="star">&nbsp;</span>
                    <span class="star">&nbsp;</span>
                    <span class="star">&nbsp;</span>
                    <span class="star">&nbsp;</span>
                    <span class="star">&nbsp;</span>
                </div>
                <br><br>
                <label>
                    <input type="submit" value="Insturen" class="button">
                </label><br>
                <input type="hidden" id="verborgenAantalSterren" name="verborgenAantalSterren">
            </form>
        </div>
        
        
        
        
        <br><br>
        <h2>De laatste recensies:</h2>
        <div class="filter">
            <h3>Filter</h3>
            
            <form action="ingelogd.php" method="POST">
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