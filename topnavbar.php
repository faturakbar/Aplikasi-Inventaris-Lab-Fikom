<?php 
if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}
?>

    <marquee direction="left";
         > 
       
            <h1 style="    font-weight: bolder; font-family: Arial, Helvetica, sans-serif; position: relative;
            top:10px; ">
                <img src="img/logo ustj.jpeg" alt="" style="width:60px; position: relative;
            top:-8px; ">
              APLIKASI INVENTARIS BARANG LABORATORIUM FIKOM USTJ  </h1>
          </marquee>
<!-- Topbar Navbar -->
  <ul class="navbar-nav ml-auto">
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['username']; ?></span>
                <img class="img-profile rounded-circle" src="img/user3.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              
                
          
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->