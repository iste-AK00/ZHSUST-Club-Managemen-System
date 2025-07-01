<?php
  require_once('functions/function.php');
  needtologin();
  get_header();
  get_sidebar();


  $select='SELECT * FROM employee_type ORDER BY employee_type_id DESC';
  $employee_type=mysqli_query($con,$select);

  $slug=$_SESSION['emp_slug'];
  $select="SELECT * FROM employee where emp_slug='$slug'";
  $Query=mysqli_query($con,$select);
  $data=mysqli_fetch_assoc($Query);  
  
  if($_SESSION['success_alert']=='1'){
  ?>
  <script>
    swal({title: "Done!", text: "Your Profile Information Updated Successfully!", icon: "success", button: "OK",});
  </script>
  <?php
    $_SESSION['success_alert']='0';

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
                <b>My Profile</b>
              </div>
              <div class="col-md-2 card_header_for_one_button">
                
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
              <table class="table table-striped table-bordered view_table">
                <tr>
                  <td>Name</td>
                  <td>:</td>
                  <td>
                      <?=$data['emp_name']?>
                  </td>
                </tr>
                <tr>
                  <td>Email</td>
                  <td>:</td>
                  <td>
                      <?=$data['emp_email']?>
                  </td>
                </tr>
                <tr>
                  <td>Mobile</td>
                  <td>:</td>
                  <td>
                      <?=$data['emp_mobile']?>
                  </td>
                </tr>
                <tr>
                  <td>Address</td>
                  <td>:</td>
                  <td>
                      <?=$data['emp_address']?>
                  </td>
                </tr>
                <tr>
                  <td>NID</td>
                  <td>:</td>
                  <td>
                      <?=$data['emp_nid']?>
                  </td>
                </tr>
                <tr>
                  <td>Joining Date</td>
                  <td>:</td>
                  <td>
                      <?=$data['emp_joining_date']?>
                  </td>
                </tr>
                <tr>
                  <td>Type</td>
                  <td>:</td>
                  <td>
                    <?php   
                      foreach($employee_type as $emptyp){                    
                        if($emptyp['employee_type_id']==$data['employee_type_id']){
                          
                          echo $emptyp['employee_type_name'];

                        }
                      }
                    ?>
                  </td>
                </tr>
                <tr>
                  <td>Photo</td>
                  <td>:</td>
                  <td>
                  <?php 
                    if($data['emp_photo']!=''){
                  ?>
                      <img src="uploads/<?=$data['emp_photo']?>" height="40px" width="40px">
                  <?php 
                    }else{
                  ?>
                      <img src="assets/img/avatar.jpg" height="40px" width="40px">
                  <?php 
                    }
                  ?>  
                  </td>
                </tr>
              </table>
            </div>
            <div class="col-md-2"></div>
            </div>
          </div>
          <div class="card-footer text-muted">

          </div>
        </div>
      </div>        
      <!-- /.content -->
      </div>
      </div>
      </div>
    <!-- /.content-wrapper -->
  
<?php
  get_footer();
?>