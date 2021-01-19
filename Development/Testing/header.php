<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>MuiltCloud</title>
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>

        <nav>
            <div class="wrapper">
                <a href="index.php"><img src="img/SOMETHING.png" alt="Logo"></img></a>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <!-- <li><a href="signup.php">Sign up</a></li>
                    <li><a href="login.php">Login</a></li> -->
                    <?php
                        if (isset($_SESSION["useruid"])) {
                            echo "<li><a href='upload.php'>Upload</a></li>";
                            echo "<li><a href='includes/logout.inc.php'>Log out</a></li>";
                        } else {
                            echo "<li><a href='signup.php'>Sign Up</a></li>";
                            echo "<li><a href='login.php'>Log in</a></li>";
                        }
                    ?>
                </ul>
            </div>
        </nav>

    <div class="wrapper">


    

