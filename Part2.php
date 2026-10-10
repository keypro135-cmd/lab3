<?php

$servername = "localhost";
$username = "root";
$password = "Pass4!";
$dbname = "tennisclub";
$port = 3306;

date_default_timezone_set('Europe/Dublin');

$conn = mysqli_connect($servername, $username, $password, $dbname, $port);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $firstName = trim($_POST["firstname"] ?? "");
    $surname = trim($_POST["surname"] ?? "");

    if ($firstName === "" || $surname === "") {
        die("Please enter both first name and surname.");
    }

    $sql = "INSERT INTO member (firstname, surname) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "ss", $firstName, $surname);

    if (mysqli_stmt_execute($stmt)) {
        echo "New member added successfully!";
    } else {
        echo "Error adding member.";
    }

    mysqli_stmt_close($stmt);
} else {
    echo "Please submit the new member form.";
}

mysqli_close($conn);

?>