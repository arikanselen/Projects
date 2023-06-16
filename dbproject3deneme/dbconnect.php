
<?php
    $dbhost = 'localhost:3306';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'project2';
    
    $conn=mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);
    if (!$conn) {
        die('not connected:' . mysqli_error());
    } else {

    }

?>