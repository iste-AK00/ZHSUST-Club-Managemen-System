<?php
require_once('functions/function.php');
needtologin();

if (!empty($_POST)) {

  $user_slug = $_POST['user_slug'];
  $user_name = $_POST['user_name'];
  $user_email = $_POST['user_email'];
  $user_mobile = $_POST['user_mobile'];
  $user_address = $_POST['user_address'];
  $user_nid = $_POST['user_nid'];
  $qualification = $_POST['qualification'];
  $experience = $_POST['experience'];
  $user_joining_date = $_POST['user_joining_date'];
  $club_id = $_POST['club_id'];

  if (empty($_FILES['user_photo']['tmp_name']) || !is_uploaded_file($_FILES['user_photo']['tmp_name'])) {

    // No new image uploaded, use the old one
    $imageName = $_POST['user_old_photo'];

    $update = "UPDATE user SET 
                user_name='$user_name',
                user_email='$user_email',
                user_mobile='$user_mobile',
                user_address='$user_address',
                user_nid='$user_nid',
                qualification='$qualification',
                experience='$experience',
                user_joining_date='$user_joining_date',
                user_photo='$imageName',
                club_id='$club_id'
              WHERE user_slug='$user_slug'";

    $Q = mysqli_query($con, $update);

    if ($Q) {
      $_SESSION['success_alert'] = '2'; // updated
      header('Location: all-club-person.php');
    }

  } else {

    // New image uploaded
    $image = $_FILES['user_photo'];
    $imageName = 'user_' . time() . '_' . rand(100000, 1000000) . '.' . pathinfo($image['name'], PATHINFO_EXTENSION);

    $update = "UPDATE user SET 
                user_name='$user_name',
                user_email='$user_email',
                user_mobile='$user_mobile',
                user_address='$user_address',
                user_nid='$user_nid',
                qualification='$qualification',
                experience='$experience',
                user_joining_date='$user_joining_date',
                user_photo='$imageName',
                club_id='$club_id'
              WHERE user_slug='$user_slug'";

    $Q_image = mysqli_query($con, $update);

    if ($Q_image) {
      move_uploaded_file($image['tmp_name'], 'uploads/' . $imageName);
      $_SESSION['success_alert'] = '2'; // updated
      header('Location: all-club-person.php');
    }
  }
}
?>
