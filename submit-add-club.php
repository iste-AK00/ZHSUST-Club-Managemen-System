<?php
  require_once('functions/function.php');
  needtologin();

  if (!empty($_POST)) {
    // Auto-generate a unique slug for the club (optional: replace with a cleaned slug of the name)
    $slug = uniqid('CLUB');

    $club_name = $_POST['club_name'];
    
    $insert = "INSERT INTO club (club_name, slug) 
               VALUES ('$club_name', '$slug')";

    $Q = mysqli_query($con, $insert);

    if ($Q) {
      $_SESSION['success_alert'] = '1';
      header('Location: all-club.php');
    } else {
      $_SESSION['success_alert'] = '8';
      header('Location: add-club.php');
    }
  }
?>
