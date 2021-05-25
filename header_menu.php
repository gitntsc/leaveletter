<ul class="navbar-nav ml-auto">

  <!-- Nav Item - Search Dropdown (Visible Only XS) -->

  <!-- Nav Item - Alerts -->

  <!-- Nav Item - Messages -->


  <div class="topbar-divider d-none d-sm-block"></div>

  <!-- Nav Item - User Information -->
  <?php
  include "connect.php";
  $strSQL6 = "SELECT * FROM member WHERE username = '".$_SESSION['username']."'";
  $objQuery6 = mysqli_query($objCon,$strSQL6);
  $objResult6 = mysqli_fetch_array($objQuery6,MYSQLI_ASSOC);
   ?>
  <li class="nav-item dropdown no-arrow">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php  echo $objResult6['username']; ?></span>

    </a>
    <!-- Dropdown - User Information -->
    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">


      <a class="dropdown-item" href="logout.php">
        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
        Logout
      </a>
    </div>
  </li>

</ul>

</nav>
<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">
