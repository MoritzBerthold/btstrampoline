<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "btstrampoline";


    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully"; 
    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
  ?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Post</title>

    <link rel="stylesheet" href="stylesheets/normalize.css"><link rel="stylesheet" href="stylesheets/new_post.css">
</head>

<body>
    <header id="showcase" class="grid">
        <div class="bg-image"></div>
        <div class="content-wrap">
            <h1 class="content-title">Neuen Post erstellen</h1>
            <div class="content-text">
                <p>Erstelle einen neuen Post, der später auf der Website angezeigt weren soll.</p>
            </div>
            <a href="index.html"><button type="button">Get back Home</button></a>
        </div>
    </header>

    <main id="main">

        <!-- Section Eingabe -->
        <section id="input" class="grid">
            <div class="content-wrap">
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST"){
                        $title = $content = $img = $author = "";
                        if(!empty($_POST["title"])){
                            $title = $_POST["title"];
                            if(!empty($_POST["content"])){
                                $content = $_POST["content"];
                            }
                            if(!empty($_POST["img"])){
                                $img = $_POST["img"];
                            }
                            if(!empty($_POST["author"])){
                                $author = $_POST["author"];
                            }
                
                            $sql = "INSERT INTO beitraege (titel, inhalt, bilder, autor) VALUES ('$title', '$content', '$img', '$author')";
                            $conn->exec($sql);
                            echo "<p class='success'>Neuen Post erfolgreich in der Datenbank abgelegt!</p>";
                        }else{
                            echo "<p class='error'>Ein Post ohne Titel? Ich glaube kaum.</p>";
                        }
                    }
                ?>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" enctype="multipart/form-data">
                Titel: <input type="text" name="title" placeholder="Who's yo daddy?"><br><br>
                Inhalt: <textarea name="content" rows="10" cols="40" placeholder="FILL ME UP!"></textarea><br><br>
                Bild <!--hochladen: <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
                oder -->via URL: <input type="url" name="img" placeholder="Bitte eine URL eingeben"><br><br>
                Author: <select name="author">
                            <option value="Moritz Berthold">Moritz Berthold</option>
                        </select><br><br>
                <input type="submit">
                </form>
            </div>
        </section>
    </main>
</body>

</html>

<?php $conn = null; ?>