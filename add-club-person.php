<?php
require_once('functions/function.php');
needtologin();
get_header();
get_sidebar();

$club_q = mysqli_query($con, "SELECT * FROM club ORDER BY club_id ASC");

if ($_SESSION['success_alert'] == '8') {
?>
  <script>
    Toastr({
      title: "Oops!",
      text: "User registration failed! Password confirmation didn't match.",
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
      <div class="col-lg-5 col-md-6 col-sm-12">
        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth">
            <i class="fa fa-arrow-left"></i></a> Add Club Person</h2>
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php"><i class="icon-home"></i></a></li>
          <li class="breadcrumb-item active">Add Club Person</li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header bg-light">
              <div class="row">
                <div class="col-md-10 card_header_text"><b>Add Club Person Information</b></div>
              </div>
            </div>
            <form method="post" action="submit-add-club-person.php" enctype="multipart/form-data">
              <div class="card-body">

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Student ID <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="emp_official_id" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Name <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="emp_name" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Email <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="email" class="form-control" name="emp_email" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Mobile <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="emp_mobile" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Gender <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <select name="gender" class="form-control" required>
                      <option value="">Select Gender</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                      <option value="Other">Other</option>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Batch <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="batch" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Designation <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="designation" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Address <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="emp_address" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">NID <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="emp_nid" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Club <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <select class="form-control" name="club_id" required>
                      <option value="">Select Club</option>
                      <?php while($club = mysqli_fetch_assoc($club_q)){ ?>
                        <option value="<?= $club['club_id'] ?>"><?= $club['club_name'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Qualification <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="qualification" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Experience <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="experience" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Joining Date <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="date" class="form-control" name="emp_joining_date" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Password <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="password" class="form-control" name="emp_password" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Confirm Password <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="password" class="form-control" name="repassword" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Photo <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="file" class="form-control" name="emp_photo" required>
                  </div>
                </div>

              </div>
              <div class="card-footer text-center">
                <button type="submit" class="btn btn-success">Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
get_footer();
?>
