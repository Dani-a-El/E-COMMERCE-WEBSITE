<?php
session_start();
include 'CONNECTOR.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sqli = "SELECT * FROM user_table1 WHERE username='$username'";
    $result = $conn->query($sqli);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            header("Location:http://localhost/DEV/HOME.html");
        } else {
            echo "Invalid password";
        }
    } else {
        echo "No user found with that username";
    }

    $conn->close();
}
?>