<?php
 ini_set("display_errors", 1);
 ini_set("track_errors", 1);
 ini_set("html_errors", 1);
 error_reporting(E_ALL);
 error_reporting(E_ERROR | E_WARNING | E_PARSE); 


if (empty($_POST["name"])){
    die("Name is required"); 
}

if (! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
    die("Valid email is reuired");
}

if (strlen($_POST["password"]<8)){
    die("Password must be at least 8 characters"); 
}
$password= $_POST["password"]; 
if (! preg_match("/a[a-z]/i", $_POST["password"])){
    die("password must contain at least one letter"); 
}
if (! preg_match("/[0-9]/", $_POST["password"])){
    die("password must contain at least one number"); 
}

if ($_POST["password"]!==$_POST["password_confirm"]){
    die("Password must match"); 
}

if (empty($_POST["institution"])){
    die("Please add the institution"); 
}

if (empty ($_POST["gender"])){
    die ("Please add the gender "); 
}
if (empty ($_POST["race"])){
    die ("Please add the race"); 
}

if (empty ($_POST["skills"])){
    die ("Please add skills"); 
}
if (empty ($_POST["suggest"])){
    die ("Please add suggestions"); 
}






$password_hash= password_hash($_POST["password"], PASSWORD_DEFAULT); 

$mysqli= require __DIR__ . "/database.php";
 
 
$sql= "INSERT INTO medo (nam,email,race,gender,suggest,password_hash,institution,member,skills)
                          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"; 

$stmt= $mysqli->prepare($sql); 

$stmt->bind_param("sssssssis", $_POST["name"], 
                         $_POST["email"], 
                         $_POST["race"], 
                         $_POST["gender"], 
                         $_POST["suggest"],
                         $password_hash, 
                         $_POST["institution"], 
                         $_POST["status"], 
                         $_POST["skills"]
                         ); 

                    


            
if ($stmt->execute()){
    header("Location: signUp_success.html");
    exit; 
   
} 

if   ($mysqli->errno === 1062){
    die ("email already taken"); 
}







?>