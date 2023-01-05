<?php
ini_set("display_errors", 1);
ini_set("track_errors", 1);
ini_set("html_errors", 1);
error_reporting(E_ALL);

session_start(); 

if (isset($_SESSION["medo_id"])){
    $mysqli = require __DIR__ . "/database.php"; 

    $sql= "SELECT *FROM medo
        WHERE id= {$_SESSION["medo_id"]}"; 

        $result= $mysqli->query($sql); 

        $user= $result->fetch_assoc(); 

        

}

?>
<!DOCTYPE html> 

<html>
    <head>
        <title>Home</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    </head>

    <body>
        <h1>Home</h1>

        <?php if (isset($user)): ?>
            <p>Hello <?= htmlspecialchars($user["nam"])  ?></p>
            <p><a href= "logout.php">Log out</a><p>
            <?php else: ?>
                <p><a href="login.php">Log in</a> or <a href="MedsoCreateAccount.html">sign up </a></p>
                <?php endif; ?>
    </body>
    </html>