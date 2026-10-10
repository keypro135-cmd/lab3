<?php

$servername = "localhost";
$username = "root";
$password = "Pass4!";
$dbname = "tennisclub";
$port = 3306;

date_default_timezone_set('Europe/Dublin');

// Connect to database
$conn = mysqli_connect($servername, $username, $password, $dbname, $port);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Select all members
$sql = "SELECT * FROM member";
$result = mysqli_query($conn, $sql);

// Display members
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row["firstname"] . ", " . $row["surname"] . "<br>";
    }
} else {
    echo "No members found.";
}

mysqli_close($conn);

?>