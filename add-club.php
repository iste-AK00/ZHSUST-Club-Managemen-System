<?php
require_once('functions/function.php');
needtologin();
get_header();
get_sidebar();

if ($_SESSION['success_alert'] == '8') {
?>
  <script>
    swal({
      title: "Opps!",
      text: "Club add process failed.",
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
      <div class="col-lg-5 col-md-6 col-sm-12">
        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Club</h2>
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php"><i class="icon-home"></i></a></li>
          <li class="breadcrumb-item active">Add Club</li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header bg-light">
              <div class="row">
                <div class="col-md-10 card_header_text">
                  <b>Add Club</b>
                </div>
                <div class="col-md-2 card_header_for_one_button">

                </div>
              </div>
            </div>
            <form method="post" action="submit-add-club.php" enctype="multipart/form-data">

              <div class="card-body">
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">Club <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="" name="club_name" required>
                  </div>
                  <div class="col-sm-1"></div>
                </div>
              </div>

              <div class="card-footer text-muted text-center">
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