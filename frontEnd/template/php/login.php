<?php
include 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare the statement
    $stmt = $conn->prepare("SELECT id_user, username, password FROM users WHERE email = ?");
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("s", $email);

    // Execute the statement
    $stmt->execute();

    // Store result
    $stmt->store_result();

    // Check if the user exists
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $username, $hashed_password);
        $stmt->fetch();

        // Verify password
        if ($password == $hashed_password) {
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $username;
            // Redirect to the home page
            header("Location: ../index.php");
            exit();
        } else {
            $_SESSION['error_message'] = "Invalid password!";
            header("Location: ../my-account.php");
            exit();
        }
    } else {
        $_SESSION['error_message'] = "No user found with this email!";
        header("Location: ../my-account.php");
        exit();
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>
