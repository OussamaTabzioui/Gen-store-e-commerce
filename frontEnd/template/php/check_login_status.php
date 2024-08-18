<?php


if (!isset($_SESSION['user_id'])) {
    // Redirect to login page or handle the error
    header("Location: my-account.php");
    exit();
}

?>
