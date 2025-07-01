<?php
require_once('functions/function.php');
needtologin();
get_header();
get_sidebar();

// Query to select all users
$select = 'SELECT * FROM user ORDER BY user_id DESC';
$Query = mysqli_query($con, $select);

// Query to select clubs for fetching club names
$select_clubs = 'SELECT * FROM club ORDER BY club_id DESC';
$clubs = mysqli_query($con, $select_clubs);

// Alert handling for various actions
if ($_SESSION['success_alert'] == '1') {
?>
  <script>
    swal({
      title: "Done!",
      text: "User registration successful!",
      icon: "success",
      button: "OK",
    });
  </script>
<?php
  $_SESSION['success_alert'] = '0';
} elseif ($_SESSION['success_alert'] == '2') {
?>
  <script>
    swal({
      title: "Done!",
      text: "User information updated successfully!",
      icon: "success",
      button: "OK",
    });
  </script>
<?php
  $_SESSION['success_alert'] = '0';
} elseif ($_SESSION['success_alert'] == '3') {
?>
  <script>
    swal({
      title: "Done!",
      text: "User deleted successfully!",
      icon: "success",
      button: "OK",
    });
  </script>
<?php
  $_SESSION['success_alert'] = '0';
} elseif ($_SESSION['success_alert'] == '4') {
?>
  <script>
    swal({
      title: "Done!",
      text: "User blocked successfully!",
      icon: "success",
      button: "OK",
    });
  </script>
<?php
  $_SESSION['success_alert'] = '0';
} elseif ($_SESSION['success_alert'] == '5') {
?>
  <script>
    swal({
      title: "Done!",
      text: "User unblocked successfully!",
      icon: "success",
      button: "OK",
    });
  </script>
<?php
  $_SESSION['success_alert'] = '0';
}
?>

<!-- Main content -->
<div id="main-content">
  <div class="container-fluid">
    <div class="block-header">
      <div class="col-lg-5 col-md-6 col-sm-12">
        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Users</h2>
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php"><i class="icon-home"></i></a></li>
          <li class="breadcrumb-item active">All Users</li>
        </ul>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header bg-light">
              <div class="row">
                <div class="col-md-10 card_header_text">
                  <b>All Users</b>
                </div>
                <div class="col-md-2 card_header_for_one_button">
                  <!-- Add button if needed -->
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered" id="dataTable">
                  <thead>
                    <tr>
                      <th>User Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Joining Date</th>
                      <th>Club Name</th> <!-- Changed from User Type to Club Name -->
                      <th>Batch</th>
                      <th>Gender</th>
                      <th>Designation</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($Query as $data) {
                    ?>
                      <tr>
                        <td><?= $data['user_name']; ?></td>
                        <td><?= $data['user_email']; ?></td>
                        <td><?= $data['user_mobile']; ?></td>
                        <td><?= $data['user_joining_date']; ?></td>
                        <td>
                          <?php
                          foreach ($clubs as $club) {
                            if ($club['club_id'] == $data['club_id']) {
                              echo $club['club_name']; // Display club name
                            }
                          }
                          ?>
                        </td>
                        <td><?= $data['batch']; ?></td> <!-- Batch Column -->
                        <td><?= $data['gender']; ?></td> <!-- Gender Column -->
                        <td><?= $data['designation']; ?></td> <!-- Designation Column -->
                        <td>
                          <a href="view-club-person.php?v=<?= $data['user_slug']; ?>" class="btn btn-success btn-sm">View</a>
                          <a href="edit-club-person.php?e=<?= $data['user_slug']; ?>" class="btn btn-info btn-sm">Edit</a>
                          <!-- <?php
                          if ($data['user_active_status'] == '1') {
                          ?>
                            <a href="block-user.php?b=<?= $data['user_slug']; ?>" class="btn btn-dark btn-sm">Block</a>
                          <?php
                          } elseif ($data['user_active_status'] == '0') {
                          ?>
                            <a href="unblock-user.php?un_block=<?= $data['user_slug']; ?>" class="btn btn-success btn-sm">Unblock</a>
                          <?php
                          }
                          ?> -->
                          <a href="delete-club-person.php?d=<?= $data['user_slug']; ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer text-muted">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>

<script>
  $(document).ready(function() {
    $('#dataTable').DataTable();
  });
</script>
