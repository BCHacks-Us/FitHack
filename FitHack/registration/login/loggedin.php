<?php
    session_start();

    if (!isset($_SESSION["isLoggedIn"]) && $_SESSION["isLoggedIn"] != true) {
        header("Location: login.php");
    }

    if (isset($_POST["logout"])){
        session_destroy();
    }

?>

<h1>YOU ARE AUTHORIZED!!!!!!</h1>

<form method="post" action="">
    <input type="submit" name="logout">
</form>
