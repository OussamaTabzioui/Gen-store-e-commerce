<?php
include 'php/user.php';
// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: php/login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Genstore";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $updates = [];
    $types = "";
    $params = [];

    // Check each field and add to updates if it's set and not empty
    if (!empty($_POST['username'])) {
        $updates[] = "username = ?";
        $types .= "s";
        $params[] = $_POST['username'];
    }

    if (!empty($_POST['email'])) {
        $updates[] = "email = ?";
        $types .= "s";
        $params[] = $_POST['email'];
    }

    if (!empty($_POST['password'])) {
        $updates[] = "password = ?";
        $types .= "s";
        $params[] = password_hash($_POST['password'], PASSWORD_DEFAULT);  // Secure password hashing
    }

    if (!empty($_POST['address'])) {
        $updates[] = "address = ?";
        $types .= "s";
        $params[] = $_POST['address'];
    }

    if (!empty($_POST['phone'])) {
        $updates[] = "phone = ?";
        $types .= "s";
        $params[] = $_POST['phone'];
    }

    // Handle profile picture upload
    if (!empty($_FILES['profile_pic']['name'])) {
        $target_dir = "assets/img/author/";
        $target_file = $target_dir . basename($_FILES["profile_pic"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is actual image or fake image
        $check = getimagesize($_FILES["profile_pic"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["profile_pic"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // If everything is ok, try to upload file
        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file)) {
                $updates[] = "profile_pic = ?";
                $types .= "s";
                $params[] = $target_file;
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }

    // Update users table
    if (!empty($updates)) {
        $sql = "UPDATE users SET " . implode(", ", $updates) . " WHERE id_user = ?";
        $types .= "i";
        $params[] = $user_id;

        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            die("Error preparing statement: " . $conn->error);
        }

        $stmt->bind_param($types, ...$params);

        if ($stmt->execute()) {
            echo "Profile updated successfully!";
        } else {
            echo "Error updating profile: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "No updates to make.";
    }

    // If user is a seller, update seller table
    if (isUserSeller($username)) {
        $sellerUpdates = [];
        $sellerTypes = "";
        $sellerParams = [];

        if (isset($_POST['cni'])) {
            $sellerUpdates[] = "cni = ?";
            $sellerTypes .= "s";
            $sellerParams[] = $_POST['cni'];
        }

        if (isset($_POST['bio'])) {
            $sellerUpdates[] = "bio = ?";
            $sellerTypes .= "s";
            $sellerParams[] = $_POST['bio'];
        }

        if (!empty($sellerUpdates)) {
            $sellerSql = "UPDATE seller SET " . implode(", ", $sellerUpdates) . " WHERE username = ?";
            $sellerTypes .= "s";
            $sellerParams[] = $username;

            $sellerStmt = $conn->prepare($sellerSql);

            if (!$sellerStmt) {
                die("Error preparing seller statement: " . $conn->error);
            }

            $sellerStmt->bind_param($sellerTypes, ...$sellerParams);

            if ($sellerStmt->execute()) {
                echo "Seller profile updated successfully!";
            } else {
                echo "Error updating seller profile: " . $sellerStmt->error;
            }
            $            $sellerStmt->close();
        } else {
            echo "No seller updates to make.";
        }
    }
}

$conn->close();
header("Location: my-account-page.php"); // Redirect after processing
exit();
?>


$conn->close();

header("Location: my-account-page.php");
exit();
