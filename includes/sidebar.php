<div id="left-sidebar" class="sidebar">
    <div class="">
        <div class="user-account">
            <?php
            if ($_SESSION['photo'] != '') {
            ?>
                <img src="uploads/<?= $_SESSION['photo'] ?>" alt="User photo" class="rounded-circle user-photo">

            <?php
            } else {
            ?>

                <img src="./assets/images/user.png" class="rounded-circle user-photo" alt="User Profile Picture">

            <?php
            }
            ?>
            <h5 class="user-name"><?= $_SESSION['name']; ?></h5>
            <?php
            if ($_SESSION['role_id'] == '1') {
            ?>

                <h6 class="">Admin</h6>

            <?php
            } else {
            ?>
                <h6 class="">User</h6>
            <?php
            }
            ?>
        </div>

        <!-- Nav tabs -->
        <!-- Tab panes -->
        <div class="tab-content p-l-0 p-r-0">
            <div class="tab-pane active" id="menu">
                <nav id="left-sidebar-nav" class="sidebar-nav">
                <ul id="main-menu" class="metismenu">
                        <?php
                        if ($_SESSION['role_id'] == '2') {
                        ?>
                        
                            <li><a href="dashboard.php" class="menul"><i class="fa-solid fa-table-columns"></i> Dashboard </a></li>
                        <?php
                        }
                        if ($_SESSION['role_id'] == '1') {
                        ?>
                            <!-- start dropdown menu -->
                            <li><a data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="icon-user"></i> Club Person </a>
                                <ul id="homeSubmenu1">
                                    <li><a href="all-club-person.php"> <i class="icon-users"></i> All Club Person </a></li>
                                    <li><a href="add-club-person.php"> <i class="icon-plus"></i> Add Club Person </a></li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="icon-user"></i> Club </a>
                                <ul id="homeSubmenu2">
                                    <li><a href="all-club.php"> <i class="icon-user"></i> All Club </a></li>
                                    <li><a href="add-club.php"> <i class="fas fa-pencil"></i> Add Club </a></li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="icon-user"></i> Notice and Events </a>
                                <ul id="homeSubmenu3">
                                    <li><a href="all-notice-events.php"> <i class="icon-user"></i> All Notice and Events </a></li>
                                    <li><a href="add-notice-events.php"> <i class="fas fa-pencil"></i> Add Notice and Events </a></li>
                                </ul>
                            </li>
                            
                           
                            <!-- end dropdown menu -->
                        <?php
                        }
                        ?>
                        <?php
                        if ($_SESSION['role_id'] == '2' || $_SESSION['role_id'] == '3') {
                        ?>
                        <?php
                        }
                        ?>
                        <li><a href="club-details-info.php" class="menul"><i class="fa-solid fa-power-off"></i> Club Details Info </a></li>
                        <li><a href="index.php" class="menul"><i class="fa-solid fa-power-off"></i> Website </a></li>
                        <li><a href="logout.php" class="menul"><i class="fas fa-sign-out-alt"></i> Log out </a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>


