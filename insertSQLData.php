<?php
$host = "127.0.0.1";
$user = "root";
$pass = "pass";
$port = 3306;
$db   = "tennisclub";

$conn = mysqli_connect($host, $user, $pass, $db, $port);

if (!$conn) {
    die("DB connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO member (firstname, surname) VALUES ('Alfred', 'Ukpong')";
if (mysqli_query($conn, $sql)) {
    echo "Inserted Alfred Ukpong into Member.";
} else {
    echo "Insert failed: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
