<?php
// add this file to /var/www/html

	$url=$_SERVER['REQUEST_URI'];
	header("Refresh: 5; URL=$url");  // Refresh the webpage every 5 seconds
?>

<html>
	<head>
    	<title>Viewing Database Content</title>
	</head>
	<body>
    	<h1>Database Values</h1>
		<table border="0" cellspacing="0" cellpadding="4">
  			<tr>
        		<td>ID</td>
        		<td>Timestamp</td>
        		<td>Value</td>
  			</tr>
			<?php
    			// Prepare variables for database connection
    			$dbusername = "user_1";  
    			$dbpassword = "User_1@16";  
    			$server = "localhost"; 
    			$dbname = "mydatabase_1";
    			$tablename = "senor_values";

    			// Connect to your database
    			$dbconn = mysqli_connect($server, $dbusername, $dbpassword, $dbname);

    			// create sql query to retrieve data from db
    			$sql =  "SELECT * FROM " .$tablename. " ORDER BY id DESC";

    			// run the query and save result  
    			$result = mysqli_query($dbconn, $sql);

    			// Process every record
    			while($row = mysqli_fetch_array($result)) {
        			echo "<tr>";
        			echo "<td>" . $row['id'] . "</td>";
        			echo "<td>" . $row['time'] . "</td>";
        			echo "<td>" . $row['value'] . "</td>";
        			echo "</tr>";
    			}

    			// Close the connection   
    			mysqli_close($dbconn);
			?>
    	</table>
	</body>
</html>
