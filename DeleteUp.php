<?php

session_start();
$servername = "localhost"; 
$username = "root"; 
$password = "";
$dbname = "excursionnest"; 

// Create connection 
$conn = mysqli_connect($servername, $username, $password, $dbname); 
// Check connection 
if(!$conn) 
{ 
    die("Connection failed: " . mysqli_connect_error()); 
} 
else{
    $n = $_POST["sl"];
    $sql = "DELETE FROM upcoming WHERE NUM = '$n'";
    $sql2 = "DELETE FROM booked WHERE NUM = '$n'";
                
                if (mysqli_query($conn, $sql)) 
                { 
                    if (mysqli_query($conn, $sql2)){
                        header('location: admin_profile.php');
                    }
                     
                } 
            }
            mysqli_close($conn);

?>