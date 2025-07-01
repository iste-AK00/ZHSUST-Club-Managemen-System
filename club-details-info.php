<?php
require_once('functions/function.php');
needtologin();
get_header();
get_sidebar();

// Fetch clubs and users joined
$query = "
    SELECT 
        user.user_id,
        user.user_official_id,
        user.user_name,
        user.user_email,
        user.user_mobile,
        user.user_address,
        user.user_nid,
        user.gender,
        user.designation,
        user.batch,
        user.user_password,
        user.user_photo,
        user.user_joining_date,
        user.club_id,
        user.role_id,
        user.user_slug,
        user.user_checkin_status,
        user.user_active_status,
        user.checkin_inserted_id,
        user.qualification,
        user.experience,
        club.club_name
    FROM 
        user
    JOIN 
        club 
    ON 
        user.club_id = club.club_id
    WHERE 
        user.user_active_status = 1  -- Ensure active users are fetched
";
$users_query = mysqli_query($con, $query);
$users = [];
while ($user = mysqli_fetch_assoc($users_query)) {
    // Group users by their club_id
    $users[$user['club_id']]['club_name'] = $user['club_name'];
    $users[$user['club_id']]['members'][] = $user;
}

// Fetch all clubs
$select_clubs = "SELECT * FROM club";  // Replace 'club' with your actual clubs table
$clubs_query = mysqli_query($con, $select_clubs);
?>

<!-- Main content -->
<div id="main-content">
  <div class="container-fluid">
    <div class="block-header">
      <div class="row">
        <div class="col-lg-5 col-md-6 col-sm-12">
          <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Clubs</h2>
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
            <li class="breadcrumb-item active">Clubs</li>
          </ul>
        </div>
      </div>
      <hr>

      <!-- List of Clubs -->
      <div id="clubs-list" class="row">
        <?php while($club = mysqli_fetch_assoc($clubs_query)): ?>
          <div class="col-md-4">
            <button class="btn btn-primary club-btn" onclick="showClubMembers(<?php echo $club['club_id']; ?>)">
              <?php echo $club['club_name']; ?> <!-- Display club name -->
            </button>
          </div>
        <?php endwhile; ?>
      </div>

      <!-- Club Members Info Display -->
      <div id="club-members" class="row mt-4">
        <!-- Members will be displayed here dynamically based on club selection -->
      </div>

    </div>
  </div>
</div>
<!-- /.content-wrapper -->

<?php get_footer(); ?>

<!-- JavaScript to handle club members info -->
<script>
  // Store all the users grouped by club_id
  const allUsers = <?php echo json_encode($users); ?>;

  function showClubMembers(clubId) {
    const clubData = allUsers[clubId];
    const membersContainer = document.getElementById('club-members');

    // Clear previous club members display
    membersContainer.innerHTML = '';

    if (clubData && clubData.members.length > 0) {
      clubData.members.forEach(member => {
        // Create card for each member
        const memberCard = document.createElement('div');
        memberCard.classList.add('col-md-3', 'mb-4');
        memberCard.innerHTML = `
          <div class="card">
            <img src="uploads/${member.user_photo}" class="card-img-top" alt="Member Photo">
            <div class="card-body">
              <h5 class="card-title">${member.user_name}</h5>
              <p class="card-text"><strong>User ID:</strong> ${member.user_official_id}</p>
              <p class="card-text"><strong>Batch:</strong> ${member.batch}</p>
              <p class="card-text"><strong>Gender:</strong> ${member.gender}</p>
              <p class="card-text"><strong>Club:</strong> ${member.club_name}</p>
              <p class="card-text"><strong>Designation:</strong> ${member.designation}</p>
              <p class="card-text"><strong>Contact Number:</strong> ${member.user_mobile}</p>
              <p class="card-text"><strong>Email:</strong> ${member.user_email}</p>
            </div>
          </div>
        `;
        membersContainer.appendChild(memberCard);
      });
    } else {
      membersContainer.innerHTML = '<p>No members found for this club.</p>';
    }
  }
</script>
