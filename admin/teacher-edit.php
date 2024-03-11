<?php 

    include_once 'config.php';

    $pro_pic_error = false;

    if(isset($_GET['id'])){

        $t_id = $_GET['id'];
        $sql = "SELECT * FROM teacher WHERE id = $t_id";

        $result = mysqli_query($conn, $sql) or die("Query Failed: ". mysqli_error($conn));
        $data = mysqli_fetch_assoc($result);

    }


    if(isset($_POST['update_btn'])){

        // getting data from input field
        $t_id = $_POST['n_id'];
        $t_name = $_POST['t_name'];
        $t_designation = $_POST['t_designation'];
        $t_phone = $_POST['t_phone'];
        $t_picture = $_POST['old_picture'];

        // check, has image? 
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

          $t_picture = $pro_pic_dir.$pro_pic_name;

          // delete old image
          unlink($_POST['old_picture']);

        }

        

        $sql = "UPDATE `teacher` SET `name`='$t_name',`designation`='$t_designation',`phone`='$t_phone',`picture`='$t_picture' WHERE id = $t_id";
        $result = mysqli_query($conn, $sql) or die("Query Failed: ". mysqli_error($conn));

        if($result){
            header("Location: teacher-all.php");
        }
        else{
            echo "<script>Failed to Update Teacher</script>";
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
                    <h4 class="card-title">Update Teacher</h4>
                    
                    <p class="card-description"> Home / Teacher /<code>Edit</code> </p>
                    
                    <hr class="mb-5">

                    
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                    
                        <div class="form-group mb-4">
                            <label>Teacher Name:</label>
                            <input name="t_name" type="text" class="form-control form-control-lg" value="<?php echo $data['name'] ?>" required>
                        </div>
                        
                        <div class="form-group mb-4">
                            <label>Designation</label>
                            <textarea name="t_designation" class="form-control" rows="8"> <?php echo $data['designation'] ?> </textarea>
                        </div>
                        
                        <div class="form-group mb-4">
                            <label>Phone</label>
                            <input name="t_phone" type="text" class="form-control form-control-lg" value="<?php echo $data['phone'] ?>">
                        </div>
                        
                        <div class="form-group">
                            <label>Profile Picture</label>
                            <input name="old_picture" value="<?php echo $data['picture'] ?>" type="hidden">
                            <input name="t_picture" id="inputPicture" type="file" class="form-control form-control-lg">
                            <img class="img-fluid mt-3 mb-3" id="previewPicture" src="<?php echo $data['picture'] ?>" alt="pro-pic" style="height: 100px; width: 150px">
                        </div>
                        
                        <input type="hidden" name="n_id" value="<?php echo $data['id'] ?>">
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


