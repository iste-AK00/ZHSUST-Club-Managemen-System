<?php
require_once('functions/function.php');
needtologin();
get_header();
get_sidebar();

if ($_SESSION['success_alert'] == '8') {
?>
  <script>
    Toastr({
      title: "Oops!",
      text: "Failed to add notice or event. Please try again.",
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
            <i class="fa fa-arrow-left"></i></a> Add Notice or Event</h2>
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php"><i class="icon-home"></i></a></li>
          <li class="breadcrumb-item active">Add Notice or Event</li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header bg-light">
              <div class="row">
                <div class="col-md-10 card_header_text"><b>Add Notice/Event Information</b></div>
              </div>
            </div>
            <form method="post" action="submit-add-notice-events.php">
              <div class="card-body">

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Date <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="date" class="form-control" name="date" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Notice / Event Details <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <textarea class="form-control" name="notice_and_events" rows="5" required></textarea>
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
