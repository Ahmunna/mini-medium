<?php
include('handleDB.php');
function connectDB()
{
    $servername = "127.0.0.1";
    $username = "admin";
    $password = "admin";
    $dbname="blog";
    try
    {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        return $conn;
    }
    catch(PDOException $e)
    {
        
    }
}

?>