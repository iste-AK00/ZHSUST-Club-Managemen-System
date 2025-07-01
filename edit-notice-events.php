<?php
require_once('functions/function.php');
needtologin();
get_header();
get_sidebar();

$id = $_GET['e']; // Retrieve the notice/event ID (slug)
$select = "SELECT * FROM notice_and_events WHERE slug='$id'"; // Fetch the data based on the slug
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
                  <b>Update Notice/Event Information</b>
                </div>
              </div>
            </div>

            <form method="post" action="submit-edit-notice-events.php">
              <!-- Hidden field to pass the slug for updating the correct notice -->
              <input type="hidden" name="notice_slug" value="<?= $id ?>" required>

              <div class="card-body">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Notice/Event Date <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="date" class="form-control" name="notice_date" value="<?= $data['notice_date'] ?>" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Details <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <textarea class="form-control" name="notice_details" rows="4" required><?= $data['notice_and_events'] ?></textarea>
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
