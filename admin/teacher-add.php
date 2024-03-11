<?php 

    include_once 'config.php';

    $pro_pic_error = false;

    if(isset($_POST['submit'])){

        if(file_exists($_FILES['t_picture']['tmp_name']) && $_FILES['t_picture']['size'] < 2*1024*1024 ){

            $pro_pic_dir = "uploads/teacher/";
            $pro_pic_ext = pathinfo($_FILES["t_picture"]["name"], PATHINFO_EXTENSION);

            // Check valid Image or not
            if(!in_array($pro_pic_ext, ['jpg', 'jpeg', 'png'])){
              $pro_pic_error = true;
              return;
            }

            // Upload Profile Picture
            $pro_pic_name = time().'.'.$pro_pic_ext;
            move_uploaded_file($_FILES['t_picture']['tmp_name'], $pro_pic_dir.$pro_pic_name);

            // Seed Teacher Data to Database
            $t_name = $_POST['t_name'];
            $t_designation = $_POST['t_designation'];
            $t_phone = $_POST['t_phone'];
            $t_picture = $pro_pic_dir.$pro_pic_name;
            
            $sql = "INSERT INTO `teacher`(`name`, `designation`, `phone`, `picture`) VALUES ('$t_name','$t_designation','$t_phone','$t_picture')";

            $result = mysqli_query($conn, $sql) or die("Query Failed: ". mysqli_error($conn));

            if($result){
                header("Location: teacher-all.php");
            }
            else{
                $pro_pic_error = true;
            }

        }
        else{
            $pro_pic_error = true;
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
                    <h4 class="card-title">Add New Teacher</h4>
                    
                    <p class="card-description"> Home / Teacher /<code>New</code> </p>
                    
                    <hr class="mb-5">

                    <?php if ($pro_pic_error): ?>
                      <div class="alert alert-warning mb-5" role="alert">
                        <h4>You Have Error!</h4> 
                        Select a valid image file (type: jpg, jpeg, png) with less than 2MB size.
                      </div>
                    <?php endif; ?>
                    
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">

                        <div class="form-group mb-4">
                            <label>Teacher Name</label>
                            <input name="t_name" type="text" class="form-control form-control-lg" required>
                        </div>
                        
                        <div class="form-group mb-4">
                            <label>Teacher Designation</label>
                            <input name="t_designation" type="text" class="form-control form-control-lg" required>
                        </div>

                        <div class="form-group mb-4">
                            <label>Teacher Phone</label>
                            <input name="t_phone" type="text" class="form-control form-control-lg" required>
                        </div>

                        <div class="form-group mb-4">
                            <label>Teacher Picture</label>
                            <input name="t_picture" type="file" class="form-control form-control-lg">
                        </div>

                        <div class="form-group mb-4">
                            <img id="previewImage" src="<?php echo $data['image'] ?>" alt="teacher-image" class="img-fluid" style="height: 100px; width: 150px">
                        </div>

                        <input type="submit" value="Save Teacher" name="submit" class="btn btn-primary">
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
