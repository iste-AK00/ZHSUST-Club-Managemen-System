<?php
require_once('functions/function.php');
needtologin();
get_header();
get_sidebar();


$slug = $_SESSION['emp_slug'];
$select = "SELECT * FROM employee WHERE emp_slug='$slug'";

$Query = mysqli_query($con, $select);
$data = mysqli_fetch_assoc($Query);

if ($_SESSION['success_alert'] == '5') {
?>
  <script>
    swal({
      title: "Oops!",
      text: "Your Profile Information Update Process Failed!",
      icon: "error",
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
      <!-- Main row -->
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header bg-light">
              <div class="row">
                <div class="col-md-10 card_header_text">
                  <b>Update Profile Information</b>
                </div>
                <div class="col-md-2 card_header_for_one_button">

                </div>
              </div>
            </div>
            <form method="post" action="submit-update-info-my-profile.php" enctype="multipart/form-data">


              <input type="hidden" class="form-control" id="" name="emp_slug" value="<?= $slug ?>" required>
              <input type="hidden" class="form-control" id="" name="emp_old_photo" value="<?= $data['emp_photo'] ?>" required>
              <div class="card-body">
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">Name <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="" name="emp_name" value="<?= $data['emp_name'] ?>" required>
                  </div>
                  <div class="col-sm-1"></div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">Email <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="email" class="form-control" id="edit_emp_email" name="emp_email" value="<?= $data['emp_email'] ?>" required>
                  </div>
                  <div class="col-sm-1"></div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">Mobile <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="" name="emp_mobile" value="<?= $data['emp_mobile'] ?>" required>
                  </div>
                  <div class="col-sm-1"></div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">Address <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="" name="emp_address" value="<?= $data['emp_address'] ?>" required>
                  </div>
                  <div class="col-sm-1"></div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">NID <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="" name="emp_nid" value="<?= $data['emp_nid'] ?>" required>
                  </div>
                  <div class="col-sm-1"></div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">Photo <span class="text-danger"></span></label>
                  <div class="col-sm-8">
                    <?php
                    if ($data['emp_photo'] != '') {
                    ?>
                      <img src="uploads/<?= $data['emp_photo'] ?>" height="40px" width="40px">
                    <?php
                    } else {
                    ?>
                      <img src="assets/img/avatar.jpg" height="60px" width="60px">
                    <?php
                    }
                    ?>
                    <br>
                    <br>
                    <input type="file" onchange="readURL(this);" class="form-control" id="" name="emp_photo">
                    <br>
                    <img id="image_preview" src="#" alt="" />
                  </div>
                  <div class="col-sm-1"></div>
                </div>
              </div>

              <div class="card-footer text-muted text-center">
                <button type="submit" class="btn btn-success">Update</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php
  get_footer();
  ?>