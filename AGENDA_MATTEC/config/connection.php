<?php

 $host = "localhost";
 $database = "agenda_mattec";
 $username = "root";
 $password = "";
 $table ="contacts_mattec";
 
 // Create connection
 try{
     $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
     // Check connection
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 }catch (PDOException $e){
    $error = $e->getMessage();
    echo "Connection failed: ". $error;
 }
