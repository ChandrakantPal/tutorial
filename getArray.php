

<?php

    $arrayToPass = array();

    $dbusername = "user_1";  
    $dbpassword = "User_1@16";  
    $server = "localhost";
    $dbname = "mydatabase_1";
    $tablename = "senor_values";

    // Connect to your database
    $dbconn = mysqli_connect($server, $dbusername, $dbpassword, $dbname);

    // create sql query to retrieve data from db
    $sql =  "SELECT * FROM " .$tablename. " ORDER BY id DESC LIMIT 20";

    // run the query and save result  
    $result = mysqli_query($dbconn, $sql);

    // Process every record
    while($row = mysqli_fetch_array($result)) {
        //processing string $row['time'] = "2018-09-20 19:23:36" to get interger values in variables
        //explode() is used to split a string and returns an array
        $date_n_time = explode(" ", $row['time']);
        $date = explode("-", $date_n_time[0]);
        $time = explode(":", $date_n_time[1]);

        $temp = array(
            (int)$date[0],
            (int)$date[1],
            (int)$date[2],
            (int)$time[0],
            (int)$time[1],
            (int)$time[2],
            (int)$row['value']
        );

        array_push($arrayToPass, $temp);
    }

    // Close the connection
    mysqli_close($dbconn);

    /*arrayToPass = [ [year,month,day,hrs,mins,secs,dataValue], [year,month,day,hrs,mins,secs,dataValue], ......]
    example: arrayToPass = [[2018,9,20,19,23,36,501], [2018,9,21,15,45,12,450], [..], ......]

    this 2-dimensional array is passed to the JAVASCRIPT $.post(....funtion(data){..}) as the "data" parameter
    using echo as shown below after converting to JSON(text equivalent of the 2D array)
    */
    echo json_encode($arrayToPass);
 ?>
