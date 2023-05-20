<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Login</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<style>
form{
    text-align: center;
}

body{
    background-color: wheat;
}

p{
    text-align: center;
}

</style>
<body>

<form method="post">

<input type="text" placeholder="login" name="login" autocomplete="on"><br>
<br>
<input type="text" placeholder="haslo" name="haslo" autocomplete="off"><br>
<br>
<input type="submit" value="wyslij" name="submit">
<br>
</form>

<?php
session_start();
//login i hasło
$LoginT = "root";
$HasloT = "admin";

    if(isset($_POST["login"]) and isset($_POST["haslo"])){
        $login = $_POST["login"];
        $haslo = $_POST["haslo"];

        if($LoginT == $login and $HasloT == $haslo){

            $_SESSION["login"] = $login;
            $_SESSION["haslo"] = $haslo;

            header("Location: index.php");

        } else {
            echo "<p>"."Niepoprawny login i/lub haslo"."</p>";
        }
    }


?>
</body>
</html>