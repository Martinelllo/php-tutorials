<?php

require("../connection.php");

if(isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $con->prepare("SELECT * FROM users WHERE username=:username");
    $stmt->bindParam(":username", $username);
    $stmt-> execute();

    $existingUsers = $stmt->fetch();

    $checkPassword = false;

    if(isset($existingUsers["password"])) {
        $passwordHashed = $existingUsers["password"];
        $checkPassword = password_verify($password, $passwordHashed);
    }

    if(!$checkPassword) {
        echo "Login fehlgeschlagen";
    } else {

        session_start();

        $_SESSION["username"] = $existingUsers["username"];
        $_SESSION["userid"] = $existingUsers["id"];

        header("Location: ../index.php", true);
    }
}

?>


<html lang="de">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
        <form action="login.php" method="POST">
            <h1>Login</h1>
            <input type="text" placeholder="username" name="username" autocomplete="off">
            <input type="password" placeholder="password" name="password" autocomplete="off">
            <button class="loginBtn" name="submit">Login</button>
            <br>
            <a href="signin.php">Signin -></a>
        </form>
    </body>
</html>