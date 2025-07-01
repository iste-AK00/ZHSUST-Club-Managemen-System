<?php
require_once('functions/function.php');
needtologin();

if (!empty($_POST)) {

  $slug = $_POST['slug'];
  $club_name = $_POST['club_name'];

  $update = "UPDATE club SET club_name='$club_name' WHERE slug='$slug'";

  $Q = mysqli_query($con, $update);

  if ($Q) {
    $_SESSION['success_alert'] = '2';
    header('Location: all-club.php');
  } else {
    $_SESSION['success_alert'] = '3';
    header("Location: edit-club.php?slug=$slug");
  }
}
?>
