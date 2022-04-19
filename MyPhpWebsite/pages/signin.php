<?php

require('../connection.php');

if(isset($_POST["submit"])) {

    var_dump($_POST); // shows the variable no matter what is in it

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = PASSWORD_HASH($_POST["password"], PASSWORD_DEFAULT); // Password Hashing

    $stmt = $con->prepare("SELECT * FROM users WHERE username=:username OR email=:email"); // statement = $stmt

    $stmt->bindParam(":username", $username); // bind variables to statement
    $stmt->bindParam(":email", $email);

    $stmt->execute();

    $userExists = $stmt->fetchColumn(); // returns the first hit

    if(!$userExists) {
        $existingUsers = registerUser($username, $email, $password);

        session_start();

        $_SESSION["username"] = $existingUsers["username"];
        $_SESSION["userid"] = $existingUsers["id"];
    
        header("Location: ../index.php", true); // redirect to the link or file
    } else{
        echo "User Exists";
    }

}

function registerUser($username, $email, $password) {
    global $con;
    // Create user
    $stmt = $con->prepare("INSERT INTO users (username, email, password) VALUES(:username, :email, :password)");
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":password", $password);
    $stmt->execute();

    // Get user with id
    $stmt = $con->prepare("SELECT * FROM users WHERE username=:username AND password=:password");
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":password", $password);
    $stmt-> execute();

    return $stmt->fetch();
}    

?>

<html lang="de">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registrieren</title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
        <form action="./signin.php" method="POST">
            <h1>Account erstellen</h1>
            <input type="text" placeholder="username" name="username" autocomplete="off">
            <input type="text" placeholder="email" name="email" autocomplete="off">
            <input type="password" placeholder="password" name="password" autocomplete="off">
            <button class="loginBtn" name="submit">Erstellen</button>
            <br>
            <a href="login.php">Login -></a>
        </form>
    </body>
</html>