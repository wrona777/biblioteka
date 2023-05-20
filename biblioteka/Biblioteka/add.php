<!DOCTYPE html>
 <html>
 <head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Dodaj</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
 </head>
 <style>
body{
    background-color: wheat;
}


 </style>
 <body>
    <?php
    session_start();
    if($_SESSION["login"] != "root" or $_SESSION["haslo"] != "admin"){
        header("Location: login.php");
    }

    

    ?>

    <form method="POST">
        <input type="text" name="title" placeholder="tytuł"><br><br>
        <input type="text" name="autor" placeholder="autor"><br><br>
        <input type="number" name="wydania" placeholder="rokWydania"><br><br>
        <input type="submit" value="Dodaj" name="dodaj"><br><br>
    </form>
    <a href="index.php"><button>powrót</button></a>

    <?php
    $conn = mysqli_connect("localhost", "root", "", "biblioteka");

if(isset($_POST["dodaj"])){
    if(isset($_POST["title"]) and isset($_POST["autor"]) and isset($_POST["wydania"])){
        $title = $_POST["title"];
        $author = $_POST["autor"];
        $year = $_POST["wydania"];
        $table = "ksiazki";

        $insert = "INSERT INTO `$table` VALUES(null, '$title','$author','$year');";
        mysqli_query($conn, $insert);
        }
    }
?>
 </body>
 </html>