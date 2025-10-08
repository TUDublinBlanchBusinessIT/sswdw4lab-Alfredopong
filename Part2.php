<?php
ini_set('display_errors',1);
error_reporting(E_ALL);

$host = "127.0.0.1";
$user = "root";
$pass = "pass";
$port = 3306;
$db   = "tennisclub";

$conn = mysqli_connect($host, $user, $pass, $db, $port);
if (!$conn) {
    die("DB connection failed: " . mysqli_connect_error());
}

$first = trim($_POST['firstname'] ?? '');
$sur   = trim($_POST['surname'] ?? '');

if ($first === '' || $sur === '') {
    die("Both fields are required.");
}

$stmt = mysqli_prepare($conn, "INSERT INTO member (firstname, surname) VALUES (?, ?)");
mysqli_stmt_bind_param($stmt, "ss", $first, $sur);

if (mysqli_stmt_execute($stmt)) {
    echo "Member added: " . htmlspecialchars("$first $sur");
    echo "<br><a href='newMember.html'>Add another</a>";
} else {
    echo "Insert failed: " . mysqli_error($conn);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
