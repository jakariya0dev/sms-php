<?php 

  include_once 'config.php';

    session_start();
    $error = false;

    if(isset($_SESSION['admin_email'])){
          header('Location: index.php');
    }

    if(isset($_GET['error'])){
          $error = true;
    }


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <title>Corona Admin</title>
    <?php include './components/header-links.php' ?>
  </head>
  <body>
    
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-3 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-center mb-4">Admin Login</h3>
                <?php if($error): ?>
                <div class="alert alert-danger">
                    Wrong email or password
                </div>
                <?php endif; ?>

                <form action="auth.php" method="POST">
                  <div class="form-group">
                    <label>Admin email *</label>
                    <input name="email" type="email" class="form-control p_input" required>
                  </div>
                  <div class="form-group">
                    <label>Password *</label>
                    <input name="password" type="password" class="form-control p_input" required>
                  </div>
                  
                  <div class="text-center mt-4">
                    <button name="login" type="submit" class="w-100 btn btn-primary btn-block enter-btn">Login</button>
                  </div>
                  <hr>
                  <p class="sign-up">
                    Don't have an Account or Forgot Password? <br>
                    <span>Contact: +880152146603 (Support)</span>
                  </p>
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>

    <?php include './components/footer-links.php'?>
  </body>
</html>
