<?php 

    include_once 'config.php';
    include_once 'auth.php';
    
    $image_error = false;

    if(isset($_POST['submit'])){

        if($_FILES['image']['size'] < 2*1024*1024 && $_FILES['image']['size'] > 0){

            $image_dir = "uploads/feature/";
            $image_ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);

            // Upload Feature Image
            $image_name = time().'.'.$image_ext;
            move_uploaded_file($_FILES['image']['tmp_name'], $image_dir.$image_name);

            // Seed Slider Data to Database
            $title = $_POST['title'];
            $subtitle = $_POST['subtitle'];
            $image = $image_dir.$image_name;

            $sql = "INSERT INTO `feature`(`title`, `subtitle`, `image`) VALUES ('$title','$subtitle','$image')";

            $result = mysqli_query($conn, $sql) or die("Query Failed: ". mysqli_error($conn));

            if($result){
                header("Location: feature-all.php");
            }
            else{
                echo "<script>Failed to Add Feature</script>";
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
                    <h4 class="card-title">Add New Feature</h4>
                    
                    <p class="card-description"> Home / Feature /<code>New</code> </p>
                    
                    <hr class="mb-5">

                    <?php if ($image_error): ?>
                      <div class="alert alert-warning mb-5" role="alert">
                        <h4>You Have Error!</h4> 
                        Select a valid image file (type: jpg, jpeg, png) with less than 2MB size.
                      </div>
                    <?php endif; ?>
                    
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label>Feature Title</label>
                            <input name="title" type="text" class="form-control form-control-lg" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Feature Subtitle</label>
                            <input name="subtitle" type="text" class="form-control form-control-lg" required>
                        </div>

                        <div class="form-group mb-4">
                            <label>Feature Image</label>
                            <input id="inputImage" name="image" type="file" class="form-control form-control-lg" accept="image/*" required>
                        </div>

                        <div class="form-group mb-4">
                            <img id="previewImage" class="img-fluid" style="height: 100px; width: 150px; display: inline-block">
                        </div>

                        <input type="submit" value="Save Feature" name="submit" class="btn btn-primary">
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
