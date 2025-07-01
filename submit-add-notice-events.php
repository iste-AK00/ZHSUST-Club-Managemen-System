<?php
require_once('functions/function.php');
needtologin();

if (!empty($_POST)) {
  // Auto-generate slug
  $slug = 'NOTICE_' . time() . '_' . rand(1000, 9999);

  // Collect and escape form data
  $date = $_POST['date'];
  $notice_and_events = mysqli_real_escape_string($con, $_POST['notice_and_events']);

  // SQL insert query
  $insert = "INSERT INTO notice_and_events (notice_date, notice_and_events, slug)
             VALUES ('$date', '$notice_and_events', '$slug')";

  // Execute and check result
  if (mysqli_query($con, $insert)) {
    $_SESSION['success_alert'] = '1'; // Success
    header('Location: all-notice-events.php');
  } else {
    $_SESSION['success_alert'] = '8'; // Failure
    header('Location: add-notice-events.php');
  }
}
?>
