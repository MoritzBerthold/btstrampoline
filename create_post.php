<!doctype html>
<html lang="de">
  <head>
    <meta charset="utf-8">

    <!-- Always force latest IE rendering engine or request Chrome Frame -->
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Use title if it's in the page YAML frontmatter -->
    <title>Trampolinturnen im BTS</title>

    <link href="stylesheets/normalize.css" rel="stylesheet" type="text/css" />
    <link href="stylesheets/all.css" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="javascripts/all.js"></script>

    <link href="http://www.bayreuther-turnerschaft.de/Hauptverein_Stand_2011_11_22/00%20hauptverein%20-%20images/Internet_Logo_Hauptverein.bmp" rel="icon" type="image/bmp" />

  </head>
  <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "btstrampoline";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
  ?>
  <body>
    <div class="header">
      <a href="/">Home</a>
      <a href="#news">Aktuelles</a>
      <a href="#dates">Termine</a>
      <a href="#team">Team</a>
      <a href="#gallery">Gallerie</a>
      <a href="#contact">Kontakt</a>
    </div>
    <div class="banner"></div>

    <div class="content">
        <form action="?article=submit" method="POST">
            <div><p>Titel</p><input type="text" name="titel"/></div>
            <div><p>Inhalt</p><textarea name="inhalt" cols="80" rows="10"/></textarea></div>
            <div><p>Bilder</p><input type="text" name="bilder"/></div>
            <div><p>Autor</p><input type="text" name="autor"/></div>
            <div><input class="submitbtn" type="submit"/></div>
        </form>
        <?php
            if($_GET['article'] == "submit"){
                if(!empty($_POST['titel'])){
                    $sql = "INSERT INTO `beitraege` (`titel`, `inhalt`, `bilder`, `autor`) 
                    VALUES ('".$_POST['title']."', '".$_POST['inhalt']."','".$_POST['bilder']."','".$_POST['autor']."')";
                    $conn->query($sql) or die($conn->error);
                }
            }
        ?>
    </div>

    <div class="footer">
      <p>Copyright &copy; 2018 Moritz Berthold</p>
    </div>
  </body>
</html>