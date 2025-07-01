<?php
require_once('functions/function.php');
needtologin();

if (!empty($_POST)) {
  $user_slug = uniqid('USR');

  // Collect form data
  $user_name = $_POST['emp_name']; // Name from the form
  $user_email = $_POST['emp_email']; // Email from the form
  $user_mobile = $_POST['emp_mobile']; // Mobile from the form
  $user_address = $_POST['emp_address']; // Address from the form
  $user_nid = $_POST['emp_nid']; // NID from the form
  $experience = $_POST['experience']; // Experience from the form
  $qualification = $_POST['qualification']; // Qualification from the form
  $user_joining_date = $_POST['emp_joining_date']; // Joining Date from the form
  $password = md5($_POST['emp_password']); // Password from the form
  $repass = md5($_POST['repassword']); // Confirm Password from the form
  $club_id = $_POST['club_id']; // User type ID (Assumed, modify as needed)
  $batch = $_POST['batch']; // Batch from the form
  $gender = $_POST['gender']; // Gender from the form
  $designation = $_POST['designation']; // Designation from the form
  //$club_name = $_POST['club_name']; // Club from the form

  // Handle the file upload for photo
  $image = $_FILES['emp_photo']; // Photo input from the form
  $imageName = 'user_' . time() . '_' . rand(100000, 1000000) . '.' . pathinfo($image['name'], PATHINFO_EXTENSION);

  if ($password == $repass) {
    // SQL query to insert user data into the users table
    $insert = "INSERT INTO user (user_name, user_email, user_mobile, user_address, user_nid, qualification, experience, user_joining_date, user_password, user_photo, club_id, user_slug, batch, gender, designation) 
               VALUES ('$user_name', '$user_email', '$user_mobile', '$user_address', '$user_nid', '$qualification', '$experience', '$user_joining_date', '$password', '$imageName', '$club_id', '$user_slug', '$batch', '$gender', '$designation')";

    // Execute the query and handle the result
    if (mysqli_query($con, $insert)) {
      // Move the uploaded image to the correct directory
      move_uploaded_file($image['tmp_name'], 'uploads/' . $imageName);
      $_SESSION['success_alert'] = '1'; // Success alert ID
      header('Location: all-club-person.php'); // Redirect to all users page
    } else {
      $_SESSION['success_alert'] = '9'; // Custom alert ID for failure
      header('Location: add-club-person.php'); // Redirect back to the add club-person page
    }
  } else {
    $_SESSION['success_alert'] = '8'; // Password mismatch error
    header('Location: add-club-person.php'); // Redirect back to the add user page
  }
}
?>
