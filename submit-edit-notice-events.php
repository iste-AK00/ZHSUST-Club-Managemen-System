<?php
require_once('functions/function.php');
needtologin();

if (!empty($_POST)) {

  $notice_slug = $_POST['notice_slug']; // Get the notice slug from the form
  $notice_date = $_POST['notice_date']; // Get the notice date
  $notice_details = $_POST['notice_details']; // Get the notice details

  // No file upload field is present in the form, so no need for handling image files.

  // Update the notice event in the database
  $update = "UPDATE notice_and_events SET 
              notice_date='$notice_date',
              notice_and_events='$notice_details'
            WHERE slug='$notice_slug'";

  $Q = mysqli_query($con, $update);

  if ($Q) {
    $_SESSION['success_alert'] = '2'; // updated
    header('Location: all-notice-events.php'); // Redirect to the notice/events list page
  }
}
?>
