<?php 

    include_once 'config.php';
    include_once 'auth.php';
   
    $image_error = false;

    $sql_president = "SELECT * FROM speech WHERE id = 1";

    $result = mysqli_query($conn, $sql_president) or die("Query Failed: ". mysqli_error($conn));

    $president = mysqli_fetch_assoc($result);

    if(isset($_POST['update_btn'])){

        // getting data from input field
        $name = $_POST['name'];
        $designation = $_POST['designation'];
        $speech = $_POST['speech'];
        $image = $_POST['image_old'];

        // check, has image? 
        if($_FILES['image']['size'] > 0 ){

          if($_FILES['image']['size'] > 5 * 1024 * 1024){
              $image_error = true;
          }
          else{

              $image_dir = "uploads/speech/";
              $image_ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);

              if (!file_exists($image_dir)) { 
                  mkdir($image_dir, 0755, true); 
                }

              // Upload Profile Picture
              $image_name = time().'.'.$image_ext;
              move_uploaded_file($_FILES['image']['tmp_name'], $image_dir.$image_name);

              $image = $image_dir.$image_name;

              $sql = "UPDATE `speech` SET `name`='$name',`designation`='$designation', `speech`='$speech', `image`='$image' WHERE id = 1";
              $result = mysqli_query($conn, $sql) or die("Query Failed: ". mysqli_error($conn));

              // delete old image
              unlink($_POST['image_old']);
          }

        }
        else{

            $sql = "UPDATE `speech` SET `name`='$name',`designation`='$designation', `speech`='$speech', `image`='$image' WHERE id = 1";
            $result = mysqli_query($conn, $sql) or die("Query Failed: ". mysqli_error($conn));

            if($result){
                header("Location: ".$_SERVER['PHP_SELF']);
            }
            else{
                echo "<script>Failed to Update Speech</script>";
            }
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
                    <h4 class="card-title">Update President Speech</h4>
                    
                    <p class="card-description"> Home / Speech /<code>Edit</code> </p>
                    
                    <hr class="mb-5">

                    <?php if ($image_error): ?>
                      <div class="alert alert-warning mb-5" role="alert">
                        <h4>You Have Error!</h4> 
                        Select a valid image file (type: jpg, jpeg, png) with less than 2MB size.
                      </div>
                    <?php endif; ?>
                    
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                    
                        <div class="form-group">
                            <label>President Name:</label>
                            <input name="name" type="text" class="form-control form-control-lg" value="<?php echo $president['name'] ?>" required>
                        </div>
                        
                        
                        <div class="form-group">
                            <label>President Designation</label>
                            <input name="designation" type="text" class="form-control form-control-lg" value="<?php echo $president['designation'] ?>" required>
                        </div>

                        <div class="form-group">
                            <label>President Speech</label>
                            <textarea name="speech" class="form-control custom-text-area"><?php echo $president['speech'] ?></textarea>
                        </div>

                        <div class="form-group">
                            <label>President Image</label>
                            <input name="image_old" type="hidden" value="<?php echo $president['image'] ?>">
                            <input id="inputImage" name="image" type="file" class="form-control form-control-lg" accept="image/*">
                        </div>

                        <div class="form-group">
                            <img id="previewImage" src="<?php echo $president['image'] ?>" alt="por-pic" class="img-fluid" style="height: 100px; width: 150px">
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