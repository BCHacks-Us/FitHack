<?php
session_start();


$dbName = 'fithack';
$dbHost = 'localhost';
$dbuser = 'fithack';
$dbpassword = 'BCHacks01!';

    try {

        $databaseConn = new PDO("mysql:host=" . $dbHost . "; dbname=" . $dbName . "", $dbuser, $dbpassword);

    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }

if(isset($_POST["submit"]))
{
   $email = $_POST["email"];
   $password = $_POST["pass"];

    $sql = "SELECT count(*) FROM users WHERE email = :email AND password = :password";

    $stmt = $databaseConn->prepare($sql);
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
    $stmt->bindParam(":password", $password, PDO::PARAM_STR);
    $stmt->execute();

    $result = $stmt->fetch();

    $isUserExistAndValid = $stmt->rowCount() > 0;

    if ($isUserExistAndValid){

        $_SESSION["isLoggedIn"] = true;
        header("Location: loggedin.php");

    } else {
        echo "your code is still broke";
    }
}

?>

<form action="index.html" method="post">
    email: <input type="text" name="email" '>
    password: <input type="text" name="pass">
    <input type="submit" name="submit">
</form>