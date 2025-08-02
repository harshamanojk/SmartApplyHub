<nav class="navbar fixed-top">
  <div class="container d-flex justify-content-between align-items-center" style="height: 100%;">

    <!-- Brand -->
    <a href="HOME PAGE.php" class="logo">SmartApplyHub</a>

    <!-- Nav Links -->
    <div class="d-flex align-items-center gap-3">
      <a href="HOME PAGE.php" class="nav-link custom-link">HOME</a>
      <a href="OPENINGS.php" class="nav-link custom-link" target="_blank">JOB OPENINGS</a>
      <a href="CONTACT.php" class="nav-link custom-link" target="_blank">TIMING AND CONTACT</a>
      <a href="ABOUT US.php" class="nav-link custom-link" target="_blank">ABOUT US</a>
    </div>

    <!-- User Dropdown (hover version) -->
    <div class="dropdown nav-item position-relative">
      <div class="d-flex align-items-center dropbtn">
        <?php if (isset($thisuser['img']) && $thisuser['img'] != "") { ?>
          <img src="<?= $thisuser['img'] ?>" alt="User Image" width="32" height="32" class="rounded-circle me-2">
        <?php } else { ?>
          <img src="imgs/profiles/user.png" alt="Default Image" width="32" height="32" class="rounded-circle me-2">
        <?php } ?>
        <span>Welcome back, <?= $_SESSION['fullname'] ?></span>
      </div>

      <!-- Hover menu -->
      <div class="dropdown-content">
        <a class="dropdown-item" href="ACCOUNT.php" target="_blank">Account</a>
        <a class="dropdown-item" href="TRACKER.php" target="_blank">Application Tracker</a>
        <a class="dropdown-item" href="LOGOUT.php">Logout</a>
      </div>
    </div>

  </div>
</nav>
