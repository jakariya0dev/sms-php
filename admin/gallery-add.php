<?php 

    include_once 'config.php';

    $image_error = false;

    if(isset($_POST['submit'])){

        if(file_exists($_FILES['image']['tmp_name']) && $_FILES['image']['size'] < 2*1024*1024 ){

            $image_dir = "uploads/gallery/";

            if(!is_dir($image_dir))
            {
                mkdir($image_dir, 0777);
            }

            $image_ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);

            // Check valid Image or not
            if(!in_array($image_ext, ['jpg', 'jpeg', 'png'])){
              $image_error = true;
              return;
            }

            // Upload Profile Picture
            $image_name = time().'.'.$image_ext;
            move_uploaded_file($_FILES['image']['tmp_name'], $image_dir.$image_name);

            // Seed Teacher Data to Database

            $image = $image_dir.$image_name;
            
            $sql = "INSERT INTO `gallery`(`image`) VALUES ('$image')";

            $result = mysqli_query($conn, $sql) or die("Query Failed: ". mysqli_error($conn));

            if($result){
                header("Location: gallery-all.php");
            }
            else{
                $image_error = true;
            }

        }
        else{
            $image_error = true;
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
                    <h4 class="card-title">Add New Teacher</h4>
                    
                    <p class="card-description"> Home / Gallery /<code>New</code> </p>
                    
                    <hr class="mb-5">

                    <?php if ($image_error): ?>
                      <div class="alert alert-warning mb-5" role="alert">
                        <h4>You Have Error!</h4> 
                        Select a valid image file (type: jpg, jpeg, png) with less than 2MB size.
                      </div>
                    <?php endif; ?>
                    
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">

                        <div class="form-group mb-4">
                            <label>Gallery Image</label>
                            <input id="inputImage" name="image" type="file" class="form-control form-control-lg">
                        </div>

                        <div class="form-group mb-4">
                            <img id="previewImage" class="img-fluid" style="height: 100px; width: 150px">
                        </div>

                        <input type="submit" value="Save Image" name="submit" class="btn btn-primary">
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
