<div class="container-fluid px-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="logoced">CedCab</div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mx-auto ">
              <li class="nav-item active">
           <a class="nav-link bold" href="admin.php">Dashboard</a>
        </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   Rides
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="ride_request.php">Ride Requests</a>
                    <a class="dropdown-item" href="completed_rides.php">Completed Rides</a>
                    <a class="dropdown-item" href="cancelled_rides.php">Cancelled Rides</a>
                    <a class="dropdown-item" href="all_rides.php">All Rides</a>
                  </div>
                </li>
    
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Users
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <!-- <a class="dropdown-item" href="pending_user_request.php">Pending User Requests</a> -->
                      <!-- <a class="dropdown-item" href="approved _users.php">Approved Users</a> -->
                      <a class="dropdown-item" href="all_users.php">All Users</a>
                    </div>
                  </li>
    
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Location
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="add_location.php">Add New Location</a>
                      <a class="dropdown-item" href="locationlist.php">  Location List</a>
                     
                    </div>
                  </li>
    
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Account
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="admin_change_password.php">Change Password</a>
                      <a class="dropdown-item" href="admin_edit_profile.php">  Edit Profile</a>
                     
                    </div>
                  </li>
              </ul>
              <form class="form-inline my-2 my-lg-0">
                <div class="sessiondecorate"><?php if(isset( $_SESSION['adminlogin'])) echo  $_SESSION['adminlogin']; ?></div>
               <a href="sessiondestroy.php"><input type="button" class="btn btn-outline-danger my-2 my-sm-0" value="Log out"></a>
              </form>
            </div>
          </nav>
    </div>
