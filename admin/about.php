<?php 

    include_once 'config.php';
    include_once 'auth.php';

  
    $sql = "SELECT * FROM about WHERE id = 1";

    $result = mysqli_query($conn, $sql) or die("Query Failed: ". mysqli_error($conn));
    $data = mysqli_fetch_assoc($result);

    if(isset($_POST['update_btn'])){

        
        $name = $_POST['name'];
        $image = $_POST['old_image'];
        $description = $_POST['description'];

        if(isset($_FILES['image']['name'])){

          $dir_name = 'uploads/about/';
          if (!file_exists($dir_name)) { mkdir($dir_name, 0755, true); }
          $file_name = time() .'.'. pathinfo( $_FILES['image']['name'], PATHINFO_EXTENSION );
          move_uploaded_file($_FILES['image']['tmp_name'], $dir_name.$file_name);
          if(file_exists($_POST['old_file'])){
            unlink($_POST['old_file']);
          }

          $image = $dir_name.$file_name;

        }

        

        $sql = "UPDATE `about` SET `name`='$name', `description`='$description', `image`='$image' WHERE id = 1";
        $result = mysqli_query($conn, $sql) or die("Query Failed: ". mysqli_error($conn));

        if($result){
            header("Location: about.php");
        }
        else{
            echo "<script>Update Added Failed </script>";
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
                    <h4 class="card-title">Update About Description</h4>
                    
                    <p class="card-description"> Home / Description /<code>Edit</code> </p>
                    
                    <hr class="mb-5">

                    
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                        
                        <div class="form-group">
                            <label>Institution Name</label>
                            <input name="institute_name" class="form-control" value="<?php echo $data['institute_name'] ?>"> 
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control custom-text-area" style=""> 
                              <?php echo $data['description'] ?> 
                            </textarea>
                        </div>

                        <div class="form-group">
                            <label>Notice File</label>
                            <input name="old_image" type="hidden" value="<?php echo $data['image'] ?>">
                            <input id="inputImage" name="image" type="file" class="form-control form-control-lg">
                        </div>

                        <div class="form-group mb-4">
                            <img id="previewImage" src="<?php echo $data['image'] ?>" class="img-fluid" style="height: 100px; width: 150px; display: inline-block">
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
