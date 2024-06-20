<?php 

    include_once 'config.php';
    include_once 'auth.php';
   
    $pro_pic_error = false;

    if(isset($_POST['submit'])){

        if($_FILES['image']['size'] < 2*1024*1024 && $_FILES['image']['size'] > 0){

            $pro_pic_dir = "uploads/teacher/";
            $pro_pic_ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);

            // Upload Profile Picture
            $pro_pic_name = time().'.'.$pro_pic_ext;
            move_uploaded_file($_FILES['image']['tmp_name'], $pro_pic_dir.$pro_pic_name);

            // Seed Teacher Data to Database
            $name = $_POST['name'];
            $designation = $_POST['designation'];
            $phone = $_POST['phone'];
            $image = $pro_pic_dir.$pro_pic_name;
            $email = $_POST['email'];
            $index_number = $_POST['index_number'];
            $qualification = $_POST['qualification'];
            $department = $_POST['department'];
            $blood_group = $_POST['blood_group'];
            $birth_date = $_POST['birth_date'];
            $joining_date = $_POST['joining_date'];
            $present_address = $_POST['present_address'];
            $permanent_address = $_POST['permanent_address'];
            
            $sql = "INSERT INTO `teacher`(`name`, `designation`, `phone`, `image`, `email`, `index_number`, `qualification`, `department`, `blood_group`, `birth_date`, `joining_date`, `present_address`, `permanent_address`) VALUES ('$name', '$designation', '$phone', '$image', '$email', '$index_number', '$qualification', '$department', '$blood_group', '$birth_date', '$joining_date', '$present_address', '$permanent_address');";

            $result = mysqli_query($conn, $sql) or die("Query Failed: ". mysqli_error($conn));

            if($result){
                header("Location: teacher-all.php");
            }
            else{
                echo "<script>Failed to Add Teacher</script>";
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
                            <label>Name:</label>
                            <input name="name" type="text" class="form-control form-control-lg" required>
                        </div>
                        
                        <div class="form-group mb-4">
                            <label>Designation:</label>
                            <input name="designation" type="text" class="form-control form-control-lg" required>
                        </div>

                        <div class="form-group mb-4">
                            <label>Phone Number:</label>
                            <input name="phone" type="text" class="form-control form-control-lg" required>
                        </div>

                        <div class="form-group mb-4">
                            <label>Email Address:</label>
                            <input name="email" type="email" class="form-control form-control-lg">
                        </div>

                        <div class="form-group mb-4">
                            <label>Index Number:</label>
                            <input name="index_number" type="text" class="form-control form-control-lg">
                        </div>
                        
                        <div class="form-group mb-4">
                            <label>Qualification:</label>
                            <input name="qualification" type="text" class="form-control form-control-lg">
                        </div>

                        <div class="form-group mb-4">
                            <label>Department:</label>
                            <input name="department" type="text" class="form-control form-control-lg">
                        </div>

                        <div class="form-group mb-4">
                            <label>Blood Group:</label>
                            <select id="select" class="form-control" name="blood_group">
                                <option value="">Select Blood Group</option>
                                <option value="A+ve">A+ve</option>
                                <option value="A-ve">A-ve</option>
                                <option value="B+ve">B+ve</option>
                                <option value="B-ve">B-ve</option>
                                <option value="O+ve">O+ve</option>
                                <option value="O-ve">O-ve</option>
                                <option value="AB+ve">AB+ve</option>
                                <option value="AB-ve">AB-ve</option>
                            </select>
                        </div>

                        <div class="form-group mb-4">
                            <label>Birth Date:</label>
                            <input name="birth_date" type="date" class="form-control form-control-lg">
                        </div>
                        
                        <div class="form-group mb-4">
                            <label>Joining Date:</label>
                            <input name="joining_date" type="date" class="form-control form-control-lg">
                        </div>

                        <div class="form-group mb-4">
                            <label>Present Address:</label>
                            <input name="present_address" type="text" class="form-control form-control-lg">
                        </div>

                        <div class="form-group mb-4">
                            <label>Permanent Address:</label>
                            <input name="permanent_address" type="text" class="form-control form-control-lg">
                        </div>

                        <div class="form-group mb-4">
                            <label>Teacher Picture</label>
                            <input id="inputImage" name="image" type="file" class="form-control form-control-lg">
                        </div>

                        <div class="form-group mb-4">
                            <img id="previewImage" class="img-fluid" style="height: 100px; width: 150px">
                        </div>

                        <input type="submit" value="Save" name="submit" class="btn btn-primary">
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
