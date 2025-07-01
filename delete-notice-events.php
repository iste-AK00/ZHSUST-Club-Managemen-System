<?php
require_once('functions/function.php');
needtologin();

if (isset($_GET['d'])) {
    $id = $_GET['d'];

    // Prepare the DELETE query
    $delete = "DELETE FROM notice_and_events WHERE slug='$id'";

    // Execute the query
    if (mysqli_query($con, $delete)) {
        $_SESSION['success_alert'] = '3'; // Record deleted successfully
    } else {
        $_SESSION['error_alert'] = '3'; // Error deleting record
    }

    // Redirect to the list page
    header('Location: all-notice-events.php');
    exit;
} else {
    // If no ID is provided, redirect to the list page
    header('Location: all-notice-events.php');
    exit;
}
?>
