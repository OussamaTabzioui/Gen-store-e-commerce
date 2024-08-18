<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $h_password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $stmt = $conn->prepare("INSERT INTO users (username, email, password , h_password) VALUES (?, ?, ?, ?)");
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("ssss", $username, $email, $password , $h_password);

    if ($stmt->execute()) {
        echo "Registration successful!";
        header("Location: ../index.php");
        exit();
    } else {
        $_SESSION['error_message_r'] = "error!";
            header("Location: ../my-account.php");
            exit();
        
    }

    $stmt->close();
}

$conn->close();
?>
