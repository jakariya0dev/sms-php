<?php 

    include_once 'config.php';
    include_once 'auth.php';
    
    $pro_pic_error = false;

    if(isset($_POST['submit'])){

        // Seed Teacher Data to Database
        $name = $_POST['name'];
        $designation = $_POST['designation'];
        $phone = $_POST['phone'];
        $image = '';
        $email = $_POST['email'];

        if( $_FILES['image']['size'] < 2*1024*1024 && $_FILES['image']['size'] > 0 ){

            $img_dir = "uploads/administration/";
            if (!file_exists($img_dir)) {
                mkdir($img_dir, 0755, true);
            }

            $pro_pic_ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);

            // Upload Profile Picture
            $img_name = time().'.'.$pro_pic_ext;
            move_uploaded_file($_FILES['image']['tmp_name'], $img_dir.$img_name);
            $image = $img_dir.$img_name;

            $sql = "INSERT INTO `administration`(`name`, `designation`, `phone`, `email`, `image`) VALUES ('$name', '$designation', '$phone', '$email', '$image');";

            $result = mysqli_query($conn, $sql) or die("Query Failed: ". mysqli_error($conn));

            if($result){
                header("Location: administration-all.php");
            }
            else{
                echo "<script>failed to Updated</script>";
            }

        }
        else{
            $pro_pic_error = true;
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
                    <h4 class="card-title">Add New Administration</h4>
                    
                    <p class="card-description"> Home / Administration /<code>New</code> </p>
                    
                    <hr class="mb-5">

                    <?php if ($pro_pic_error): ?>
                      <div class="alert alert-warning mb-5" role="alert">
                        <h4>You Have Error!</h4> 
                        Select a valid image file (type: jpg, jpeg, png) with less than 2MB size.
                      </div>
                    <?php endif; ?>
                    
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">

                        <div class="form-group mb-4">
                            <label>Name:</label>
                            <input name="name" type="text" class="form-control form-control-lg" required>
                        </div>
                        
                        <div class="form-group mb-4">
                            <label>Designation:</label>
                            <input name="designation" type="text" class="form-control form-control-lg" required>
                        </div>

                        <div class="form-group mb-4">
                            <label>Phone Number:</label>
                            <input name="phone" type="text" class="form-control form-control-lg">
                        </div>

                        <div class="form-group mb-4">
                            <label>Email Address:</label>
                            <input name="email" type="email" class="form-control form-control-lg">
                        </div>

                        <div class="form-group mb-4">
                            <label>Profile Picture</label>
                            <input id="inputImage" name="image" type="file" class="form-control form-control-lg" accept="image/*" required>
                        </div>

                        <div class="form-group mb-4">
                            <img id="previewImage" class="img-fluid" style="height: 100px; width: 150px">
                        </div>

                        <input type="submit" value="Save" name="submit" class="btn btn-primary">
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
