<?php 

    include_once 'config.php';
    include_once 'auth.php';
    
    $image_error = false;

    if(isset($_GET['id'])){

        $id = $_GET['id'];
        $sql = "SELECT * FROM feature WHERE id = $id";

        $result = mysqli_query($conn, $sql) or die("Query Failed: ". mysqli_error($conn));
        $data = mysqli_fetch_assoc($result);

    }

    if(isset($_POST['update_btn'])){

        // getting data from input field
        $id = $_POST['id'];
        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        $image = $_POST['old_image'];

        // check, has image? 
        if($_FILES['image']['size'] > 0 ){

            $image_dir = "uploads/feature/";
            $image_ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);

            // Check valid Image or not
            if(!in_array($image_ext, ['jpg', 'jpeg', 'png']) || $_FILES['image']['size'] > 2*1024*1024 ){
                $image_error = true;
            }
            else{

                // Upload Profile Picture
                $image_name = time().'.'.$image_ext;
                move_uploaded_file($_FILES['image']['tmp_name'], $image_dir.$image_name);

                $image = $image_dir.$image_name;

                // delete old image
                unlink($_POST['old_image']);

                $sql = "UPDATE `feature` SET `title`='$title',`subtitle`='$subtitle',`image`='$image' WHERE id = $id";
                $result = mysqli_query($conn, $sql) or die("Query Failed: ". mysqli_error($conn));

                if($result){

                    header("Location: feature-all.php");

                }
                else{

                    echo "<script>Failed to Update feature</script>";

                }

            }

        }
        else{

            $sql = "UPDATE `feature` SET `title`='$title',`subtitle`='$subtitle',`image`='$image' WHERE id = $id";
            $result = mysqli_query($conn, $sql) or die("Query Failed: ". mysqli_error($conn));

            if($result){
                header("Location: feature-all.php");
            }
            else{
                echo "<script>Failed to Update feature</script>";
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
                    <h4 class="card-title">Update feature</h4>
                    
                    <p class="card-description"> Home / Feature /<code>Edit</code> </p>
                    
                    <hr class="mb-5">

                    
                    <form action="<?php echo $_SERVER['PHP_SELF'].'?id='.$id ?>" method="post" enctype="multipart/form-data">
                    
                        <div class="form-group">
                            <label>Feature Title</label>
                            <input name="title" type="text" class="form-control form-control-lg" value="<?php echo $data['title'] ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Feature Subtitle</label>
                            <input name="subtitle" type="text" class="form-control form-control-lg" value="<?php echo $data['subtitle'] ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Feature Image</label>
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
