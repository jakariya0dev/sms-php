<?php 

    include_once 'config.php';
    include_once 'auth.php';
  
    $sql = "SELECT * FROM contact WHERE id = 1";

    $result = mysqli_query($conn, $sql) or die("Query Failed: ". mysqli_error($conn));
    $data = mysqli_fetch_assoc($result);




    if(isset($_POST['update_btn'])){

        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $map = $_POST['map'];

        $sql = "UPDATE `contact` SET `phone`='$phone', `email`='$email', `address` = '$address', `map`='$map' WHERE id = 1";
        $result = mysqli_query($conn, $sql) or die("Query Failed: ". mysqli_error($conn));

        if($result){
            header("Location: contact.php");
        }
        else{
            echo "<script>Failed to Update</script>";
        }

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

      <!-- partial:partials/_sidebar.html -->
      <?php include './components/sidebar.php'?>
      <!-- partial -->

      <div class="container-fluid page-body-wrapper">
        
        <!-- partial:partials/_navbar.html -->
        <?php include './components/navbar.php'?>

        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
                <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Update Contact Information </h4>
                    
                    <p class="card-description"> Home / Contact /<code>Edit</code> </p>
                    
                    <hr class="mb-5">

                    
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                        
                        <div class="form-group">
                            <label>Mobile Number</label>
                            <input name="phone" type="text" class="form-control form-control-lg" value="<?php echo $data['phone'] ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Email Address</label>
                            <input name="email" type="text" class="form-control form-control-lg" value="<?php echo $data['email'] ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <input name="address" type="text" class="form-control form-control-lg" value="<?php echo $data['address'] ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Google Map Link</label>
                            <input name="map" type="text" class="form-control form-control-lg" value="<?php echo $data['map'] ?>" required>
                        </div>

                        <input type="submit" value="Save Changes" name="update_btn" class="btn btn-primary">
                    </form>


                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <?php include './components/footer.php'?>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->

      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <?php include './components/footer-links.php'?>
    
  </body>
</html>
