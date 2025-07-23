<?php
include 'CONNECTOR.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    mysqli_select_db($conn, DIVINE_DB);
    $sql = "INSERT INTO user_table1 (username,password) VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        header("location:http://localhost/DEV/LOGIN.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>