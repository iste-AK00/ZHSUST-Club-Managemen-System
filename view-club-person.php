<?php
require_once('functions/function.php');
needtologin();
get_header();
get_sidebar();

// Fetch all clubs
$select = 'SELECT * FROM club ORDER BY club_id DESC';
$clubs = mysqli_query($con, $select);

// Get user data
$id = $_GET['v'];
$select = "SELECT * FROM user WHERE user_slug='$id'";
$Query = mysqli_query($con, $select);
$data = mysqli_fetch_assoc($Query);
?>
<!-- Main content -->
<div id="main-content">
  <div class="container-fluid">
    <div class="block-header">
      <!-- Main row -->
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header bg-light">
              <div class="row">
                <div class="col-md-10 card_header_text">
                  <b>View Club Person Information</b>
                </div>
                <div class="col-md-2 card_header_for_one_button">
                  <a href="all-club-person.php" class="btn btn-info btn-sm float-sm-right"><i class="fas fa-user-friends"></i> All Club Person</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                  <table class="table table-striped table-bordered view_table">
                    <tr><td>Name</td><td>:</td><td><?= $data['user_name'] ?></td></tr>
                    <tr><td>Email</td><td>:</td><td><?= $data['user_email'] ?></td></tr>
                    <tr><td>Mobile</td><td>:</td><td><?= $data['user_mobile'] ?></td></tr>
                    <tr><td>Address</td><td>:</td><td><?= $data['user_address'] ?></td></tr>
                    <tr><td>NID</td><td>:</td><td><?= $data['user_nid'] ?></td></tr>
                    <tr><td>Joining Date</td><td>:</td><td><?= $data['user_joining_date'] ?></td></tr>
                    <tr><td>Qualification</td><td>:</td><td><?= $data['qualification'] ?></td></tr>
                    <tr><td>Experience</td><td>:</td><td><?= $data['experience'] ?></td></tr>
                    <tr><td>Gender</td><td>:</td><td><?= ucfirst($data['gender']) ?></td></tr>
                    <tr><td>Designation</td><td>:</td><td><?= $data['designation'] ?></td></tr>
                    <tr><td>Batch</td><td>:</td><td><?= $data['batch'] ?></td></tr>
                    <tr>
                      <td>Club Name</td><td>:</td>
                      <td>
                        <?php
                        foreach ($clubs as $club) {
                          if ($club['club_id'] == $data['club_id']) {
                            echo $club['club_name'];
                          }
                        }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td>Photo</td><td>:</td>
                      <td>
                        <?php if (!empty($data['user_photo'])) { ?>
                          <img src="uploads/<?= $data['user_photo'] ?>" height="40px" width="40px">
                        <?php } else { ?>
                          <img src="assets/img/avatar.jpg" height="40px" width="40px">
                        <?php } ?>
                      </td>
                    </tr>
                    <tr>
                      <td>Check-In Status</td><td>:</td>
                      <td><?= $data['user_checkin_status'] == 1 ? 'Checked In' : 'Not Checked In' ?></td>
                    </tr>
                    <tr>
                      <td>Active Status</td><td>:</td>
                      <td><?= $data['user_active_status'] == 1 ? 'Active' : 'Inactive' ?></td>
                    </tr>
                  </table>
                </div>
                <div class="col-md-2"></div>
              </div>
            </div>
            <div class="card-footer text-muted"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.content-wrapper -->

<?php get_footer(); ?>
