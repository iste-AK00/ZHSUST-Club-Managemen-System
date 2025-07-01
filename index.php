<?php
// Database connection
require_once('functions/function.php');

// Fetch notices from the notice_and_events table
$query = "SELECT * FROM notice_and_events ORDER BY notice_date DESC";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>University Club Management System</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    /* Reset and Box Sizing */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    /* Body and General Styles */
    body {
      font-family: Arial, sans-serif;
      line-height: 1.6;
      background: #fff;
      color: #333;
    }

    /* Navbar */
    .navbar {
      background: #000;
      color: #fff;
      padding: 15px 30px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .navbar h1 {
      color: #d32f2f;
      font-size: 24px;
    }

    .navbar ul {
      list-style: none;
      display: flex;
      gap: 20px;
    }

    .navbar ul li {
      display: inline;
    }

    .navbar ul li a {
      text-decoration: none;
      color: #fff;
      font-weight: bold;
      transition: color 0.3s;
    }

    .navbar ul li a:hover {
      color: #d32f2f;
    }

    /* Hero Section */
    .hero {
      background: linear-gradient(to right, #b71c1c, #d32f2f);
      color: #fff;
      padding: 80px 30px;
      text-align: center;
    }

    .hero h2 {
      font-size: 40px;
      margin-bottom: 20px;
    }

    .hero p {
      font-size: 20px;
      max-width: 700px;
      margin: 0 auto;
    }

    /* About Section */
    .about {
      padding: 60px 30px;
      background: #f5f5f5;
      text-align: center;
    }

    .about h3 {
      color: #d32f2f;
      font-size: 28px;
      margin-bottom: 20px;
    }

    .about p {
      max-width: 800px;
      margin: 0 auto;
      font-size: 18px;
    }

    /* Notice Section */
    .notice {
      padding: 60px 30px;
      background: #fff;
      text-align: center;
    }

    .notice h3 {
      color: #d32f2f;
      font-size: 28px;
      margin-bottom: 20px;
    }

    .notice ul {
      list-style: none;
      padding: 0;
    }

    .notice li {
      margin-bottom: 20px;
      text-align: left;
      max-width: 800px;
      margin: 0 auto;
    }

    .notice li strong {
      display: block;
      font-size: 20px;
      margin-bottom: 5px;
    }

    .notice li em {
      display: block;
      font-size: 14px;
      margin-bottom: 10px;
      color: #777;
    }

    /* Contact Section */
    .contact {
      padding: 60px 30px;
      text-align: center;
    }

    .contact h3 {
      color: #d32f2f;
      font-size: 28px;
      margin-bottom: 20px;
    }

    .contact-info {
      font-size: 18px;
      line-height: 1.8;
    }

    /* Footer */
    .footer {
      background: #000;
      color: #fff;
      text-align: center;
      padding: 20px;
    }

    @media (max-width: 600px) {
      .navbar {
        flex-direction: column;
        text-align: center;
      }

      .navbar ul {
        flex-direction: column;
        gap: 10px;
      }

      .hero h2 {
        font-size: 32px;
      }
    }
  </style>
</head>
<body>

  <!-- Navigation Bar -->
  <div class="navbar">
    <!-- <img src="path_to_logo.png" alt="UniClub Logo" style="height: 50px;"> -->
    <h1>ZHSUST CSE CLUBS</h1>
    <ul>
      <li><a href="#">Home</a></li>
      <li><a href="#about">About</a></li>
      <li><a href="#notice">Notices</a></li>
      <li><a href="#contact">Contact</a></li>
      <li><a href="login.php">Login</a></li>
      <li><a href="sign-up.php">Sign Up</a></li>
    </ul>
  </div>

  <!-- Hero Section -->
  <div class="hero">
    <h2>Connect. Collaborate. Celebrate.</h2>
    <p>Welcome to the ZHSUST CSE Club Management System – your one-stop platform to manage, join, and explore university clubs effortlessly.</p>
  </div>

  <!-- About Section -->
  <div id="about" class="about">
    <h3>About the Platform</h3>
    <p>
    "Connect, Engage, and Grow – Seamless Club Management Made Easy!"
    The objectives of the project are to make it easier to manage members, organize events, and share announcements. By integrating user-friendly navigation and real-time updates, the system enhances communication and engagement among club members.

    </p>
  </div>

  <!-- Notice Section -->
  <div id="notice" class="notice">
    <h3>Latest Notices & Events</h3>
    <?php if (mysqli_num_rows($result) > 0): ?>
      <ul>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
          <li>
            <em><?php echo date('F j, Y', strtotime($row['notice_date'])); ?></em>
            <strong><?php echo htmlspecialchars($row['notice_and_events']); ?></strong>
          </li>
        <?php endwhile; ?>
      </ul>
    <?php else: ?>
      <p>No notices available at the moment.</p>
    <?php endif; ?>
  </div>

  <!-- Contact Section -->
  <div id="contact" class="contact">
    <h3>Contact Us</h3>
    <div class="contact-info">
      📧 Email: isteakahmed540@gmail.com<br>
      📞 Phone: 01935959643<br>
      📍 Campus Address: Madhupur, Post Office: Kartikpur, Police Station: Bhedarganj, District: Shariatpur – 8024, Bangladesh
    </div>
  </div>

  <!-- Footer -->
  <div class="footer">
    &copy; University Club Management System by Isteak Ahmed Joy 2025. All rights reserved.
  </div>

</body>
</html>

<?php
// Close the database connection
mysqli_free_result($result);
mysqli_close($con);
?>
