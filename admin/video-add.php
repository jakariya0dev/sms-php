<?php 

    include_once 'config.php';
    include_once 'auth.php';
    
    $image_error = false;

    if(isset($_POST['submit'])){


            $table_name = "video_gallery";
            $title = $_POST['title'];
            $link = $_POST['link'];

            // Seed Teacher Data to Database
            $sql = "INSERT INTO $table_name (`title`, `link`) VALUES ('$title', '$link')";

            $result = mysqli_query($conn, $sql) or die("Query Failed: ". mysqli_error($conn));

            if($result){
                header("Location: video-all.php");
            }
            else{
                echo "<script>alert('Failed to add link')</script>";
            }

        }


?>

<!DOCTYPE html>
<html lang="en">
  <sc>
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
                    <h4 class="card-title">Add New Video</h4>
                    
                    <p class="card-description"> Home / Video Gallery /<code>New</code> </p>
                    
                    <hr class="mb-5">
                    
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

                        <div class="form-group mb-4">
                            <label class="mb-3">Video Title</label>
                            <input name="title" type="text" class="form-control form-control-lg" Required>
                        </div>

                        <div class="form-group mb-4">
                            <label class="mb-3">Video Link</label>
                            <input name="link" type="text" class="form-control form-control-lg" Required>
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
