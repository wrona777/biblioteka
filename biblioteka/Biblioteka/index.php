 <!DOCTYPE html>
 <html>
 <head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>index</title>
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
 </style>

 <body>
<?php
 
session_start();

if($_SESSION["login"] != "root" or $_SESSION["haslo"] != "admin"){
    header("Location: login.php");
}

 ?>

<a href="logout.php"><button>Wyloguj</button></a> <a href="add.php"><button>Dodaj ksiazke</button></a> <a href="delete.php"><button>Usun ksiazke</button></a> <a href="edit.php"><button>Edytuj ksiazke</button></a>
<br><br>

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
 </body>
 </html>