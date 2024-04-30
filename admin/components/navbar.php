<?php include_once 'auth.php'; ?>
<nav class="navbar p-0 fixed-top d-flex flex-row">
  <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
    <a class="navbar-brand brand-logo-mini" href="index.php">SMS-PHP</a>
  </div>
  <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="mdi mdi-menu"></span>
    </button>
    <ul class="navbar-nav w-100">
      <li class="nav-item w-100">
        <marquee>যে কোনো সমস্যা সমাধানে সাপোর্ট নাম্বারে হোয়াটসঅ্যাপে যোগাযোগ করুন</marquee>
      </li>
    </ul>
    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item dropdown d-none d-lg-block">
        <a class="nav-link btn btn-success create-new-button" href="https://wa.me/+8801521466603" target="_blank">Support: +8801521466603</a>
      </li>
      <li class="nav-item nav-settings d-none d-lg-block">
        <a class="nav-link" href="#">
          <i class="mdi mdi-view-grid"></i>
        </a>
      </li>
      
      
      <li class="nav-item dropdown">
        <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown">
          <div class="navbar-profile">
            <img class="img-xs rounded-circle" src="assets/images/faces/face15.jpg" alt="">
            <p class="mb-0 d-none d-sm-block navbar-profile-name"><?php echo $_SESSION['admin_email']; ?></p>
            <i class="mdi mdi-menu-down d-none d-sm-block"></i>
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
          
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-settings text-success"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject mb-1">Settings</p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-logout text-danger"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <form action="auth.php" method="POST">
                <input type="submit" name="logout" value="Logout" class="btn btn-behance">
              </form>
            </div>
          </a>
          
        </div>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="mdi mdi-format-line-spacing"></span>
    </button>
  </div>
</nav>