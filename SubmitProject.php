<?php
 ini_set("display_errors", 1);
 ini_set("track_errors", 1);
 ini_set("html_errors", 1);
 error_reporting(E_ALL);
 error_reporting(E_ERROR | E_WARNING | E_PARSE); 


if (empty($_POST["project_name"])){
    die("Name is required"); 
}

if (empty($_POST["email"])){
  die("email is required");
}

if (empty($_POST["project_description"])){
  die("Description of project is required"); 
}

if (empty($_POST["project_skills"])){
  die("Please list required skills"); 
}

$mysqli= require __DIR__ . "/database.php";

$sql= "INSERT INTO submitproject (name,description,skills,email,start, end)
                          VALUES (?, ?, ?, ?, ?, ?)"; 

$stmt= $mysqli->prepare($sql); 

$stmt->bind_param("ssssss", $_POST["project_name"], 
                         $_POST["project_description"], 
                         $_POST["project_skills"], 
                         $_POST["email"],
                         $_POST["startdate"],
                         $_POST["enddate"]
                         ); 

if ($stmt->execute()){
    header("Location: signUp_success.html");
    exit; 
   
} 

?>
