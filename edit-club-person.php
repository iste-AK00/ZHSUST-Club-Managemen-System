<?php
require_once('functions/function.php');
needtologin();
get_header();
get_sidebar();

$select_club = 'SELECT * FROM club ORDER BY club_id DESC';
$clubs = mysqli_query($con, $select_club);

$id = $_GET['e'];
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
                  <b>Update User Information</b>
                </div>
              </div>
            </div>

            <form method="post" action="submit-edit-club-person.php" enctype="multipart/form-data">
              <input type="hidden" name="user_slug" value="<?= $id ?>" required>
              <input type="hidden" name="user_old_photo" value="<?= $data['user_photo'] ?>" required>

              <div class="card-body">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">User Name <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="user_name" value="<?= $data['user_name'] ?>" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">User Email <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="email" class="form-control" name="user_email" value="<?= $data['user_email'] ?>" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">User Mobile <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="user_mobile" value="<?= $data['user_mobile'] ?>" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">User Address <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="user_address" value="<?= $data['user_address'] ?>" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">User NID <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="user_nid" value="<?= $data['user_nid'] ?>" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Qualification <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="qualification" value="<?= $data['qualification'] ?>" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Experience <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="experience" value="<?= $data['experience'] ?>" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Joining Date <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="date" class="form-control" name="user_joining_date" value="<?= $data['user_joining_date'] ?>" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Club <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <select class="form-control" name="club_id" required>
                      <?php foreach ($clubs as $club) { ?>
                        <option value="<?= $club['club_id'] ?>" <?= $club['club_id'] == $data['club_id'] ? 'selected' : '' ?>>
                          <?= $club['club_name'] ?>
                        </option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Batch <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="batch" value="<?= $data['batch'] ?>" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Gender <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <select class="form-control" name="gender" required>
                      <option value="Male" <?= $data['gender'] == 'Male' ? 'selected' : '' ?>>Male</option>
                      <option value="Female" <?= $data['gender'] == 'Female' ? 'selected' : '' ?>>Female</option>
                      <option value="Other" <?= $data['gender'] == 'Other' ? 'selected' : '' ?>>Other</option>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Designation <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="designation" value="<?= $data['designation'] ?>" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">User Photo</label>
                  <div class="col-sm-8">
                    <?php if (!empty($data['user_photo'])) { ?>
                      <img src="uploads/<?= $data['user_photo'] ?>" height="40px" width="40px">
                    <?php } else { ?>
                      <img src="assets/img/avatar.jpg" height="60px" width="60px">
                    <?php } ?>
                    <br><br>
                    <input type="file" name="user_photo" class="form-control" onchange="readURL(this);">
                    <br>
                    <img id="image_preview" src="#" alt="" />
                  </div>
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
  </div>
</div>

<?php
get_footer();
?>
