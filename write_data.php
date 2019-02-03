<?php
// add this file to /var/www/html

    // Prepare variables for database connection
    $dbusername = "user_1";  
    $dbpassword = "User_1@16";  
    $server = "localhost";
    $dbname = "mydatabase_1";


    // Connect to your database
    $dbconn = mysqli_connect($server, $dbusername, $dbpassword, $dbname);

    // Prepare the SQL statement
    $sql = "INSERT INTO senor_values (value) VALUES ('".$_GET["value"]."')";

    // Execute SQL statement
    mysqli_query($dbconn, $sql);
?>
