<?php
$servername = "localhost";
    $username = "user_1";
    $password = "User_1@16";
    $dbname = "mydatabase_1";
    $mysqli = new mysqli($servername, $username, $password, $dbname);
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    /* Prepared statement, stage 1: prepare */
    if (!($stmt = $mysqli->prepare("INSERT INTO senor_values (value) VALUES ('".$_GET["value"]."')") {
         echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
    }

    /* Prepared statement, stage 2: bind and execute */

    if (!$stmt->bind_param("i", $val1)) {
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    }
 if (!$stmt->bind_param("s", $val2)) {
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    }
if (!$stmt->bind_param("i", $val3)) {
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    }

    if (!$stmt->execute()) {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    }

    /* explicit close recommended */
    $stmt->close();
    ?>