<?php


$dbName = 'fithack';
$dbHost = 'localhost';
$dbuser = 'fithack';
$dbpassword = 'BCHacks01!';

try {

    $databaseConn = new PDO("mysql:host=" . $dbHost . "; dbname=" . $dbName . "", $dbuser, $dbpassword);

} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}




if (isset($_POST["submit"])) {


    $password = $_POST["pass"];
    $firstName = $_POST["fname"];
    $lastName =  $_POST["lname"];
    $email = $_POST["email"];
    echo $email;
    $sql = "INSERT into users (firstname, lastname, email, password) VALUES (:fname, :lname, :email, :pass)";

    $stmt = $databaseConn->prepare($sql);
    $stmt->bindParam(":fname", $firstName, PDO::PARAM_STR);
    $stmt->bindParam(":lname", $lastName, PDO::PARAM_STR);
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
    $stmt->bindParam(":pass", $password, PDO::PARAM_STR);
    $stmt->execute();

    echo $stmt->errorInfo()[2];

}
?>


<form method="post" action="">

    <ul>
        <li>First Name: <input type="text" name="fname"><br></li>
        <li>Last Name: <input type="text" name="lname"><br></li>
        <li>Email: <input type="email" name="email"><br></li>
        <li>Password: <input type="text" name="pass"></li>
        <li><input type="submit" name="submit"></li>
    </ul>

</form>