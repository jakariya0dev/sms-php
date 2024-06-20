<?php 

    include_once 'config.php';
    include_once 'auth.php';
   
    $pro_pic_error = false;

    if(isset($_GET['id'])){

        $id = $_GET['id'];
        $sql = "SELECT * FROM teacher WHERE id = $id";

        $result = mysqli_query($conn, $sql) or die("Query Failed: ". mysqli_error($conn));
        $data = mysqli_fetch_assoc($result);

    }


    if(isset($_POST['update_btn'])){

        // getting data from input field
        $id = $_POST['id'];
        $name = $_POST['name'];
        $designation = $_POST['designation'];
        $phone = $_POST['phone'];
        $image = $_POST['old_image'];

        // check, has image? 
        if($_FILES['image']['size'] > 0  ){

          $pro_pic_dir = "uploads/teacher/";
          $pro_pic_ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);

          // Check valid Image or not
          if(!in_array($pro_pic_ext, ['jpg', 'jpeg', 'png']) || $_FILES['image']['size'] > 2*1024*1024 ){
            
              $pro_pic_error = true;

          }
          else{

              // Upload Profile Picture
              $pro_pic_name = time().'.'.$pro_pic_ext;
              move_uploaded_file($_FILES['image']['tmp_name'], $pro_pic_dir.$pro_pic_name);

              $image = $pro_pic_dir.$pro_pic_name;

              // delete old image
              unlink($_POST['old_image']);

              // Seeding database
              $sql = "UPDATE `teacher` SET `name`='$name',`designation`='$designation',`phone`='$phone',`image`='$image' WHERE id = $id";
              $result = mysqli_query($conn, $sql) or die("Query Failed: ". mysqli_error($conn));

              if($result){
                  header("Location: teacher-all.php");
              }
              else{
                  echo "<script>Failed to Update Teacher</script>";
              }

          }

          

        }
        else{

            $sql = "UPDATE `teacher` SET `name`='$name',`designation`='$designation',`phone`='$phone',`image`='$image' WHERE id = $id";
            $result = mysqli_query($conn, $sql) or die("Query Failed: ". mysqli_error($conn));

            if($result){
                header("Location: teacher-all.php");
            }
            else{
                echo "<script>Failed to Update Teacher</script>";
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
                    <h4 class="card-title">Update Teacher</h4>
                    
                    <p class="card-description"> Home / Teacher /<code>Edit</code> </p>
                    
                    <hr class="mb-5">

                    
                    <form action="<?php echo $_SERVER['PHP_SELF'].'?id='.$id ?>" method="post" enctype="multipart/form-data">
                    
                        <div class="form-group mb-4">
                            <label>Teacher Name:</label>
                            <input name="name" type="text" class="form-control form-control-lg" value="<?php echo $data['name'] ?>" required>
                        </div>
                        
                        <div class="form-group mb-4">
                            <label>Designation</label>
                            <input name="designation" type="text" class="form-control form-control-lg" value="<?php echo $data['designation'] ?>" required>
                        </div>
                        
                        <div class="form-group mb-4">
                            <label>Phone</label>
                            <input name="phone" type="text" class="form-control form-control-lg" value="<?php echo $data['phone'] ?>">
                        </div>
                        
                        <div class="form-group">
                            <label>Profile Picture</label>
                            <input name="old_image" value="<?php echo $data['image'] ?>" type="hidden">
                            <input name="image" id="inputImage" type="file" class="form-control form-control-lg">
                            <img class="img-fluid mt-3 mb-3" id="previewImage" src="<?php echo $data['image'] ?>" alt="pro-pic" style="height: 100px; width: 150px">
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


