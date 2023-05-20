<!DOCTYPE html>
 <html>
 <head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Usun</title>
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

<div class="left">

<form method="POST">
<h3>Wpisz poniżej numer id ksiązki, którą chcesz usunąć</h3>
<input type="number" name="id" placeholder="id"> <input type="submit" value="usun" name="submit">
</form>

</div>

</table>

<?php
if(isset($_POST["submit"])){
    if(isset($_POST["id"])){
$id = $_POST["id"];
$table = "ksiazki";
$delete = "DELETE FROM `$table` WHERE id = $id";
mysqli_query($conn, $delete);}
}

?>

 </body>
 </html>