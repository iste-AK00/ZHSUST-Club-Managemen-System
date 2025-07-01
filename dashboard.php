<?php
require_once('functions/function.php');
needtologin();
get_header();
get_sidebar();

$id = $_SESSION['id'];  // Retrieve the user's ID from the session
$select = "SELECT * FROM user WHERE user_id='$id'";  // Query the 'user' table using the 'user_id'
$Query = mysqli_query($con, $select);
$data = mysqli_fetch_assoc($Query);  // Fetch user data from the database

?>
<!-- Main content -->
<div id="main-content">
  <div class="container-fluid">
    <div class="block-header">

      <div class="row">
        <div class="col-lg-5 col-md-6 col-sm-12">
          <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Dashboard</h2>
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ul>
        </div>
      </div>
      <hr>

      <!-- Small boxes (Stat box) -->

      <!-- /.row -->
      <!-- Main row -->

    </div>
  </div>
</div>
<!-- /.content-wrapper -->

<?php
get_footer();
?>
