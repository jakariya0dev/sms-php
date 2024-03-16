<?php 

    include_once 'config.php';

    $image_error = false;

    if(isset($_GET['id'])){

        $id = $_GET['id'];
        $sql = "SELECT * FROM gallery WHERE id = $id";

        $result = mysqli_query($conn, $sql) or die("Query Failed: ". mysqli_error($conn));
        $data = mysqli_fetch_assoc($result);

    }


    if(isset($_POST['update_btn'])){

        // getting data from input field
        $id = $_POST['id'];
        $title = $_POST['title'];
        $image = $_POST['old_image'];

        // check, has image? 
        if(file_exists($_FILES['image']['tmp_name']) && $_FILES['image']['size'] < 2*1024*1024 ){

          $image_dir = "uploads/gallery/";
          $image_ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);

          // Check valid Image or not
          if(!in_array($image_ext, ['jpg', 'jpeg', 'png'])){
            $image_error = true;
            return;
          }

          // Upload Profile image
          $image_name = time().'.'.$image_ext;
          move_uploaded_file($_FILES['image']['tmp_name'], $image_dir.$image_name);

          $image = $image_dir.$image_name;

          // delete old image
          unlink($_POST['old_image']);

        }

        

        $sql = "UPDATE `gallery` SET `title` = '$title', `image`='$image' WHERE id = $id";
        $result = mysqli_query($conn, $sql) or die("Query Failed: ". mysqli_error($conn));

        if($result){
            header("Location: gallery-all.php");
        }
        else{
            echo "<script>Failed to Update gallery</script>";
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
                    <h4 class="card-title">Update Gallery</h4>
                    
                    <p class="card-description"> Home / Gallery /<code>Edit</code> </p>
                    
                    <hr class="mb-5">

                    
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                        
                        <div class="form-group mb-5">
                            <label>Image Title</label>
                            <input name="title" type="text" class="form-control form-control-lg" value="<?php echo $data['title'] ?>">
                        </div>

                        <div class="form-group">
                            <label>Gallery Image</label>
                            <input name="old_image" value="<?php echo $data['image'] ?>" type="hidden">
                            <input name="image" id="inputImage" type="file" class="form-control form-control-lg">
                            <img class="img-fluid mt-3 mb-3" id="previewImage" src="<?php echo $data['image'] ?>" style="height: 100px; width: 150px">
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


