<?php 
include("redirect1.php");
//login Detail
$email= $_SESSION['email'];    
$query = "SELECT * FROM login WHERE email='$email'  ";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    #img2{
      width: 20%;
      height:100%;
    }
    </style>
</head>
<body>
     <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i>
        <span class="brand-text font-weight-white">Easy Tron</span>
        </a>
        
      </li>
      
    </ul>

   
  </nav>
  <!-- /.navbar -->

     <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dash.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.jpg" alt="Easy Tron Logo" class="brand-image img-circle elevation-3" style="opacity: 2">
      <span class="brand-text font-weight-white">Easy Tron</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $user['Name']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item ">
            <a href="dash.php" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
           
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Profile
                    <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="profile.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="updateprofile.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Upload Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="changepassword.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reset Password</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fab fa-btc"></i>
              <p>
               Add Fund
                    <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="AddFund.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Fund</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="Fundhistory.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Fund History</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Team
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="tree1.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tree View</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="Team.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Downline</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-dollar-sign"></i>
              <p>
                Topup
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="topup.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Topup ID</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pin.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Topup History</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fab fa-btc"></i>
              <p>
               Income
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="levelincome.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Level Income</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="levelhistory.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Level Income Details</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="autopool.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Autopool Income</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="autopoolhistory.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Autopool Income Details</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="autopoolhistory.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ROI Income Details</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-dollar-sign"></i>
              <p>
                Transfer
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="w2p.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Wallet To PinWallet</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="w2t.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Wallet To TrxWallet</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="Transferhistory.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Transfer History</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon fas fa-window-close"></i>
              <p>
                Logout
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            
          </li>
          
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  
</body>
</html>