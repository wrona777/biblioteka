<!DOCTYPE html>
 <html>
 <head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Edytuj</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
 </head>
 <style>
body{
    background-color: wheat;
}

table{
    border: 1px dotted black;
}
th,td{
    border: 1px solid black;

}
tr:hover{

    background-color: lightgray;

}

button:hover{
    background-color: lightblue;
}
.left{
    float: right;
}
 </style>
 <body>
    <?php
    session_start();
    if($_SESSION["login"] != "root" or $_SESSION["haslo"] != "admin"){
        header("Location: login.php");
    }
    ?>

    <a href="index.php"><button>powrót</button></a><br><br>
    <table>
<tr>
    <th>id</th>
    <th>tytuł</th>
    <th>autor</th>
    <th>rokWydania</th>
</tr>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "biblioteka");
    $select = "Select * from ksiazki";
    $result = mysqli_query($conn, $select);

    while($row=mysqli_fetch_row($result)){
    echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td></tr>";
    }
    
?>
    </table>

<div class="left">

<h3>Wpisz id książki którą chcesz zedytowac, następnie poniżej nowe dane książki</h3>

<form method="post">
<input type="number" name="id" placeholder="id"><br><br>
<input type="text" name="title" placeholder="nowy tytul"><br><br>
<input type="text" name="author" placeholder="nowy autor"><br><br>
<input type="number" name="data" placeholder="nowy rok wydania"><br><br>
<input type="submit" value="zatwierdz" name="submit">
</form>

</div>

<?php
if(isset($_POST["submit"])){
    if(isset($_POST["id"]) and isset($_POST["title"]) and isset($_POST["author"]) and isset($_POST["data"]))
    $data = $_POST["data"];
    $title = $_POST["title"];
    $author = $_POST["author"];
    $id = $_POST["id"];
    $table = "ksiazki";

    $update = "UPDATE `$table` SET tytul = '$title',autor = '$author', rokWydania='$data' WHERE id = '$id'";
    mysqli_query($conn, $update);

}
?>

 </body>
 </html>