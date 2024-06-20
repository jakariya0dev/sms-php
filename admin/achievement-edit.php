<?php 

    include_once 'config.php';
    include_once 'auth.php';
    
    $image_error = false;



    if(isset($_POST['update_btn'])){

        // getting data from input field
        $id = $_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $image = $_POST['old_image'];

        // check image? 
        if($_FILES['image']['size'] > 0 ){

          $image_dir = "uploads/achievement/";
          $image_ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);

          if(!in_array($image_ext, ['jpg', 'jpeg', 'png']) || $_FILES['image']['size'] > 5 * 1024 * 1024){
            $image_error = true;
          }
          else{

            // Upload Profile Picture
            $image_name = time().'.'.$image_ext;
            move_uploaded_file($_FILES['image']['tmp_name'], $image_dir.$image_name);

            $image = $image_dir.$image_name;

            // delete old image
            unlink($_POST['old_image']);

            // Seeding database
            $sql = "UPDATE `achievement` SET `title`='$title',`description`='$description',`image`='$image' WHERE id = $id";
            $result = mysqli_query($conn, $sql) or die("Query Failed: ". mysqli_error($conn));

            if($result){
              header("Location: achievement-all.php");
            }
            else{
                echo "<script>Failed to Update achievement</script>";
            }

          }

        }
        else{

          $sql = "UPDATE `achievement` SET `title`='$title',`description`='$description',`image`='$image' WHERE id = $id";
          $result = mysqli_query($conn, $sql) or die("Query Failed: ". mysqli_error($conn));

          if($result){
              header("Location: achievement-all.php");
          }
          else{
              echo "<script>Failed to Update achievement</script>";
          }

        }


    }

    if(isset($_GET['id'])){

      $id = $_GET['id'];
      $sql = "SELECT * FROM achievement WHERE id = $id";

      $result = mysqli_query($conn, $sql) or die("Query Failed: ". mysqli_error($conn));
      $data = mysqli_fetch_assoc($result);

    }
    else{
      $id = $_POST['id'];
      $sql = "SELECT * FROM achievement WHERE id = $id";

      $result = mysqli_query($conn, $sql) or die("Query Failed: ". mysqli_error($conn));
      $data = mysqli_fetch_assoc($result);
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
                    <h4 class="card-title">Update achievement</h4>
                    
                    <p class="card-description"> Home / achievement /<code>Edit</code> </p>
                    
                    <hr class="mb-5">

                    <?php if ($image_error): ?>
                      <div class="alert alert-warning mb-5" role="alert">
                        <h4>You Have Error!</h4> 
                        Select a valid file (type: jpg, jpeg, png or pdf) with less than 2MB size.
                      </div>
                    <?php endif; ?>

                    
                    <form action="<?php echo $_SERVER['PHP_SELF'].'?id='.$id ?>" method="post" enctype="multipart/form-data">
                    
                        <div class="form-group">
                            <label>Achievement Title</label>
                            <input name="title" type="text" class="form-control form-control-lg" value="<?php echo $data['title'] ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Achievement description</label>
                            <input name="description" type="text" class="form-control form-control-lg" value="<?php echo $data['description'] ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Achievement Image</label>
                            <input name="old_image" type="hidden" value="<?php echo $data['image'] ?>">
                            <input id="inputImage" name="image" type="file" class="form-control form-control-lg">
                        </div>

                        <div class="form-group">
                            <img id="previewImage" src="<?php echo $data['image'] ?? '' ?>" class="img-fluid" style="height: 100px; width: 150px">
                        </div>
                        
                        <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
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
