<?php 

    include_once 'config.php';

    $image_error = false;

    if(isset($_POST['submit'])){

        if(isset($_FILES['n_file']['name']) && $_FILES['t_picture']['size'] < 5*1024*1024){

          $dir_name = 'uploads/notice/';

          if (!file_exists($dir_name)) {
              mkdir($dir_name, 0755, true);
          }
          $file_name = time() .'.'. pathinfo($_FILES['n_file']['name'], PATHINFO_EXTENSION);
          move_uploaded_file($_FILES['n_file']['tmp_name'], $dir_name.$file_name);

          $n_title = $_POST['n_title'];
          $n_description = $_POST['n_description'];
          $n_date = $_POST['n_date'];
          $n_file = $dir_name.$file_name;

          $sql = "INSERT INTO `notice`(`title`, `description`, `date`, `file`) VALUES ('$n_title','$n_description','$n_date','$n_file')";

          $result = mysqli_query($conn, $sql) or die("Query Failed: ". mysqli_error($conn));

          if($result){
              header("Location: notice-all.php");
              
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
                    <h4 class="card-title">Add New Notice</h4>
                    
                    <p class="card-description"> Home / Notice /<code>New</code> </p>
                    
                    <hr class="mb-5">

                    <?php if ($image_error): ?>
                      <div class="alert alert-warning mb-5" role="alert">
                        <h4>You Have Error!</h4> 
                        Select a valid image file (type: jpg, jpeg, png) with less than 5MB size.
                      </div>
                    <?php endif; ?>

                    
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label>Notice Title</label>
                            <input name="n_title" type="text" class="form-control form-control-lg">
                        </div>
                        
                        <div class="form-group">
                            <label>Notice Description</label>
                            <textarea name="n_description" class="form-control" style="height: 200px"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Notice File</label>
                            <input name="n_file" type="file" class="form-control form-control-lg">
                        </div>

                        <div class="form-group">
                            <label>Notice Date</label>
                            <input name="n_date" type="date" class="form-control form-control-lg">
                        </div>

                        <input type="submit" value="Save Notice" name="submit" class="btn btn-primary">
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
