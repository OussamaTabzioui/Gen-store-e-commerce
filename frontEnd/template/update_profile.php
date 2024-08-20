<?php
// Include necessary files and start the session
include 'php/user.php';

// Check if the user is logged in, redirect to login if not
if (!isset($_SESSION['username'])) {
    header("Location: php/login.php");
    exit();
}

// Retrieve user ID from session
$user_id = $_SESSION['user_id'];

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Genstore";

// Create a new database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $updates = [];
    $types = "";
    $params = [];

    // Update username if provided
    if (!empty($_POST['username'])) {
        $updates[] = "username = ?";
        $types .= "s";
        $params[] = $_POST['username'];
    }

    // Update email if provided
    if (!empty($_POST['email'])) {
        $updates[] = "email = ?";
        $types .= "s";
        $params[] = $_POST['email'];
    }

    // Update password if provided, hash it securely
    if (!empty($_POST['password'])) {
        $updates[] = "password = ?";
        $types .= "s";
        $params[] = password_hash($_POST['password'], PASSWORD_DEFAULT);
    }

    // Update address if provided
    if (!empty($_POST['address'])) {
        $updates[] = "address = ?";
        $types .= "s";
        $params[] = $_POST['address'];
    }

    // Update phone if provided
    if (!empty($_POST['phone'])) {
        $updates[] = "phone = ?";
        $types .= "s";
        $params[] = $_POST['phone'];
    }

    // Handle profile picture upload if provided
    if (!empty($_FILES['profile_pic']['name'])) {
        $target_dir = "assets/img/author/";
        $target_file = $target_dir . basename($_FILES["profile_pic"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Validate the image file
        $check = getimagesize($_FILES["profile_pic"]["tmp_name"]);
        if ($check === false) {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check file size limit (500KB)
        if ($_FILES["profile_pic"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow only specific image formats
        if (!in_array($imageFileType, ['jpg', 'png', 'jpeg', 'gif'])) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Attempt to upload the image file
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

    // If there are updates, prepare the SQL statement
    if (!empty($updates)) {
        $sql = "UPDATE users SET " . implode(", ", $updates) . " WHERE id_user = ?";
        $types .= "i";
        $params[] = $user_id;

        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            die("Error preparing statement: " . $conn->error);
        }

        // Bind parameters and execute the update
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

    // If the user is a seller, update seller-specific information
    if (isUserSeller($_SESSION['username'])) {
        $sellerUpdates = [];
        $sellerTypes = "";
        $sellerParams = [];

        // Update CNI if provided
        if (isset($_POST['cni'])) {
            $sellerUpdates[] = "cni = ?";
            $sellerTypes .= "s";
            $sellerParams[] = $_POST['cni'];
        }

        // Update bio if provided
        if (isset($_POST['bio'])) {
            $sellerUpdates[] = "bio = ?";
            $sellerTypes .= "s";
            $sellerParams[] = $_POST['bio'];
        }

        // If there are seller updates, prepare the SQL statement
        if (!empty($sellerUpdates)) {
            $sellerSql = "UPDATE seller SET " . implode(", ", $sellerUpdates) . " WHERE username = ?";
            $sellerTypes .= "s";
            $sellerParams[] = $_SESSION['username'];

            $sellerStmt = $conn->prepare($sellerSql);

            if (!$sellerStmt) {
                die("Error preparing seller statement: " . $conn->error);
            }

            // Bind parameters and execute the update
            $sellerStmt->bind_param($sellerTypes, ...$sellerParams);

            if ($sellerStmt->execute()) {
                echo "Seller profile updated successfully!";
            } else {
                echo "Error updating seller profile: " . $sellerStmt->error;
            }

            $sellerStmt->close();
        } else {
            echo "No seller updates to make.";
        }
    }
}

// Close the database connection
$conn->close();

// Redirect to the account page after processing
header("Location: my-account-page.php");
exit();
?>
