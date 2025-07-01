<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sign Up - University Counselling System</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="websites-assets/index.css">
  <style>
    body {
      background: #f5f5f5;
      font-family: Arial, sans-serif;
    }

    .signup-container {
      max-width: 500px;
      margin: 100px auto;
      padding: 30px;
      background: #fff;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
      border-radius: 10px;
    }

    .signup-container h2 {
      text-align: center;
      margin-bottom: 30px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }

    .form-group input, .form-group select {
      width: 100%;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    .btn-submit {
      width: 100%;
      padding: 12px;
      background-color: #d32f2f;
      color: #fff;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }

    .btn-submit:hover {
      background-color: #b71c1c;
    }

    .error {
      color: red;
      text-align: center;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>

  <div class="signup-container">
    <h2>Sign Up</h2>

    <?php
    require_once('functions/function.php');

    if (!empty($_POST)) {
        $slug = uniqid('USER');
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $password = md5($_POST['password']);
        $repass = md5($_POST['repassword']);

        if ($password === $repass) {
            $insert = "INSERT INTO user (user_name, gender, user_mobile, user_email, user_password, user_slug, role_id)
                       VALUES ('$name', '$gender', '$mobile', '$email', '$password', '$slug', '3')";

            $signup = mysqli_query($con, $insert);

            $select = "SELECT * FROM user WHERE user_email='$email' AND user_password='$password'";
            $Q = mysqli_query($con, $select);
            $Q_data = mysqli_fetch_assoc($Q);

            if ($signup && $Q_data) {
                $_SESSION['id'] = $Q_data['id'];
                $_SESSION['email'] = $Q_data['email'];
                $_SESSION['name'] = $Q_data['name'];
                $_SESSION['photo'] = $Q_data['photo'];
                $_SESSION['role_id'] = $Q_data['role_id'];
                $_SESSION['slug'] = $Q_data['slug'];
                $_SESSION['password'] = $Q_data['password'];
                $_SESSION['success_alert'] = '0';

                header('Location: club-details-info.php');
            } else {
                echo '<div class="error"><b>Registration failed. Please try again.</b></div>';
            }
        } else {
            echo '<div class="error"><b>Password confirmation did not match.</b></div>';
        }
    }
    ?>

    <form method="post" action="">
      <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" required>
      </div>

      <div class="form-group">
        <label>Gender</label>
        <select name="gender" required>
          <option value="">Select Gender</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
          <option value="Other">Other</option>
        </select>
      </div>

      <div class="form-group">
        <label>Mobile</label>
        <input type="text" name="mobile" required>
      </div>

      <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" required>
      </div>

      <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" required>
      </div>

      <div class="form-group">
        <label>Confirm Password</label>
        <input type="password" name="repassword" required>
      </div>

      <button type="submit" class="btn-submit">Sign Up</button>
    </form>
  </div>

</body>
</html>
