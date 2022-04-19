<?php
require("connection.php");

session_start();

// logout
if(isset($_POST['submit']) && $_POST['submit'] === 'Logout') {
    session_unset();
}

?>



<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyPHPHomePage</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- Private Layout -->
<?php if(isset($_SESSION["username"])) { ?>

    <container class="container">
        
        <!-- Page header -->
        <h1>
            Hallo <?php echo $_SESSION["username"] ?>
        </h1>

        <!-- Page content -->
        <?php include 'privateLayout/notesForm.php' ?>

        <!-- Page footer -->
        <footer>--------------------------------------------------------------------</footer>

    </container>


<!-- Public Layout -->
<?php } else { ?>

    <container class="container">

        <h1>
            Hallo sie sind nicht eingelogt.
        </h1>

        <a href="./pages/login.php">
            <button class="loginBtn">Login</button>
        </a>

    </container>

<?php } ?>


</body>
</html>