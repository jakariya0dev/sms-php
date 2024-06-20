<?php 

    include_once 'config.php';
    include_once 'auth.php';
   
    $image_error = false;

    if(isset($_GET['id'])){

        $s_id = $_GET['id'];
        $sql = "SELECT * FROM slider WHERE id = $s_id";

        $result = mysqli_query($conn, $sql) or die("Query Failed: ". mysqli_error($conn));
        $data = mysqli_fetch_assoc($result);

    }

    if(isset($_POST['update_btn'])){

        // getting data from input field
        $s_id = $_POST['s_id'];
        $s_title = $_POST['s_title'];
        $s_subtitle = $_POST['s_subtitle'];
        $s_image = $_POST['old_image'];

        // check, has image? 
        if($_FILES['s_image']['size'] > 0 ){

          $image_dir = "uploads/slider/";
          $image_ext = pathinfo($_FILES["s_image"]["name"], PATHINFO_EXTENSION);

          // Check valid Image or not
          if(!in_array($image_ext, ['jpg', 'jpeg', 'png']) || $_FILES['s_image']['size'] > 2*1024*1024){
            
              $image_error = true;
          
          }
          else{

              // Upload Profile Picture
              $image_name = time().'.'.$image_ext;
              move_uploaded_file($_FILES['s_image']['tmp_name'], $image_dir.$image_name);

              $s_image = $image_dir.$image_name;

              // delete old image
              unlink($_POST['old_image']);
              }

        }
        else{

              $sql = "UPDATE `slider` SET `title`='$s_title',`subtitle`='$s_subtitle',`image`='$s_image' WHERE id = $s_id";
              $result = mysqli_query($conn, $sql) or die("Query Failed: ". mysqli_error($conn));

              if($result){
                  header("Location: slider-all.php");
              }
              else{
                  echo "<script>Failed to Update Slider</script>";
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
                    <h4 class="card-title">Update Slider</h4>
                    
                    <p class="card-description"> Home / Slider /<code>Edit</code> </p>
                    
                    <hr class="mb-5">

                    
                    <form action="<?php echo $_SERVER['PHP_SELF'].'?id='.$id ?>" method="post" enctype="multipart/form-data">
                    
                        <div class="form-group">
                            <label>Slider Title</label>
                            <input name="s_title" type="text" class="form-control form-control-lg" value="<?php echo $data['title'] ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Slider Subtitle</label>
                            <input name="s_subtitle" type="text" class="form-control form-control-lg" value="<?php echo $data['subtitle'] ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Slider File</label>
                            <input name="old_image" type="hidden" value="<?php echo $data['image'] ?>">
                            <input id="inputImage" name="s_image" type="file" class="form-control form-control-lg">
                        </div>

                        <div class="form-group">
                            <img id="previewImage" src="<?php echo $data['image'] ?>" alt="slider-image" class="img-fluid" style="height: 100px; width: 150px">
                        </div>
                        
                        <input type="hidden" name="s_id" value="<?php echo $data['id'] ?>">
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
