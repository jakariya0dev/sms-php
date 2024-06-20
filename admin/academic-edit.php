<?php 

    include_once 'config.php';
    include_once 'auth.php';
    
    $file_error = false;

    if(isset($_GET['id'])){

        $id = $_GET['id'];
        $sql = "SELECT * FROM `academic` WHERE id = $id";

        $result = mysqli_query($conn, $sql) or die("Query Failed: ". mysqli_error($conn));
        $data = mysqli_fetch_assoc($result);

    }


    if(isset($_POST['update_btn'])){

        $id = $_POST['id'];
        $title = $_POST['title'];
        $slug = strtolower(trim($title));
        $slug = str_replace(' ', '-', $slug);
        $description = $_POST['description'];
        $file = $_POST['old_file'];

        if($_FILES['file']['size'] > 0 ){

          if($_FILES['file']['size'] > 5*1024*1024){

            $file_error = true;

          }
          else{

              $dir_name = 'uploads/academic/';
              if (!file_exists($dir_name)) { mkdir($dir_name, 0755, true); }
              $file_name = time() .'.'. pathinfo( $_FILES['file']['name'], PATHINFO_EXTENSION );
              move_uploaded_file($_FILES['file']['tmp_name'], $dir_name.$file_name);

              if(file_exists($_POST['old_file'])){
                unlink($_POST['old_file']);
              }
              
              $file = $dir_name.$file_name;

              $sql = "UPDATE `academic` SET `title`='$title', `slug` = '$slug', `description`='$description', `file`='$file' WHERE `id` = $id";
              $result = mysqli_query($conn, $sql) or die("Query Failed: ". mysqli_error($conn));

              if($result){

                  header("Location: academic-all.php");

              }
              else{

                  echo "<script>Failed to Update </script>";

              }
          }

        }
        else{

            $sql = "UPDATE `academic` SET `title`='$title', `slug` = '$slug', `description`='$description', `file`='$file' WHERE `id` = $id";
            $result = mysqli_query($conn, $sql) or die("Query Failed: ". mysqli_error($conn));

            if($result){

                header("Location: academic-all.php");

            }
            else{

                echo "<script>Failed to Update </script>";
                
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
                    <h4 class="card-title">Update Academic Link</h4>
                    
                    <p class="card-description"> Home / Academic /<code>Update</code> </p>
                    
                    <hr class="mb-5">

                    <?php if ($file_error): ?>
                      <div class="alert alert-warning mb-5" role="alert">
                        <h4>You Have Error!</h4> 
                        Select a valid file (type: jpg, jpeg, png or pdf) with less than 5MB size.
                      </div>
                    <?php endif; ?>

                    
                    <form action="<?php echo $_SERVER['PHP_SELF'].'?id='.$id ?>" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label>Title (Max: 20 character)</label>
                            <input maxlength="20" name="title" type="text" value="<?php echo $data['title'] ?>" class="form-control form-control-lg">
                        </div>
                        
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control custom-text-area"><?php echo $data['description'] ?></textarea>
                        </div>

                        <div class="form-group">
                            <label>File</label>
                            <input id="inputImage" name="file" type="file" class="form-control form-control-lg">
                        </div>

                        <div class="form-group mb-4">
                            <img id="previewImage" class="img-fluid" style="height: 100px; width: 150px" src="<?php echo $data['file'] ? $data['file'] : ''; ?>">
                        </div>

                         <input name="old_file" type="hidden" value="<?php echo $data['file'] ?>">
                         <input name="id" type="hidden" value="<?php echo $data['id'] ?>">

                        <input type="submit" value="Update" name="update_btn" class="btn btn-primary">
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
