<?php
require_once('functions/function.php');
needtologin();
get_header();
get_sidebar();

// Fetch all notices/events
$select = 'SELECT * FROM notice_and_events ORDER BY id DESC';
$Query = mysqli_query($con, $select);

// Handle alerts
if ($_SESSION['success_alert'] == '1') {
?>
  <script>
    swal({
      title: "Done!",
      text: "Notice/Event added successfully!",
      icon: "success",
      button: "OK",
    });
  </script>
<?php
  $_SESSION['success_alert'] = '0';
} elseif ($_SESSION['success_alert'] == '8') {
?>
  <script>
    swal({
      title: "Error!",
      text: "Something went wrong. Please try again.",
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
        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Notice & Events</h2>
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php"><i class="icon-home"></i></a></li>
          <li class="breadcrumb-item active">All Notices</li>
        </ul>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header bg-light">
              <div class="row">
                <div class="col-md-10 card_header_text">
                  <b>All Notice & Events</b>
                </div>
                <div class="col-md-2 card_header_for_one_button text-right">
                  <a href="add-notice-events.php" class="btn btn-sm btn-info">Add New</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered" id="dataTable">
                  <thead>
                    <tr>
                      <th>Date</th>
                      <th>Details</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($Query as $data) { ?>
                      <tr>
                        <td><?= date('d M, Y', strtotime($data['notice_date'])); ?></td>
                        <td><?= htmlspecialchars($data['notice_and_events']); ?></td>
                        <td>
                          <a href="edit-notice-events.php?e=<?= $data['slug']; ?>" class="btn btn-info btn-sm">Edit</a>
                          <a href="delete-notice-events.php?d=<?= $data['slug']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                        </td>
                      </tr>
                    <?php } ?>
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
