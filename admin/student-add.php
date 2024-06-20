<?php 

    include_once 'config.php';
    include_once 'auth.php';
   
    $pro_pic_error = false;

    if(isset($_POST['submit'])){

      // Seed Teacher Data to Database
      $full_name = $_POST['full_name'];
      $department = $_POST['department'];
      $br_no = $_POST['br_no'];
      $blood_group = $_POST['blood_group'];
      $birth_date = $_POST['birth_date'];
      $gender = $_POST['gender'];
      $phone = $_POST['phone'];
      $email = $_POST['email'];

      $class = $_POST['class'];
      $roll = $_POST['roll'];
      $section = $_POST['section'];
      $year = $_POST['year'];

      $f_name = $_POST['f_name'];
      $f_occupation = $_POST['f_occupation'];
      $f_nid = $_POST['f_nid'];
      $f_phone = $_POST['f_phone'];

      $m_name = $_POST['m_name'];
      $m_occupation = $_POST['m_occupation'];
      $m_nid = $_POST['m_nid'];
      $m_phone = $_POST['m_phone'];

      $g_name = $_POST['m_name'];
      $g_relationship = $_POST['g_relationship'];
      $g_email = $_POST['g_email'];
      $g_phone = $_POST['m_phone'];

      $present_address = $_POST['present_address'];
      $permanent_address = $_POST['permanent_address'];
      $image = '';

      if($_FILES['image']['size'] < 2*1024*1024 && $_FILES['image']['size'] > 0){

          $pro_pic_dir = "uploads/student/";
          $pro_pic_ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);

          if (!file_exists($pro_pic_dir)) {
              mkdir($pro_pic_dir, 0755, true);
          }

          // Upload Profile Picture
          $pro_pic_name = time().'.'.$pro_pic_ext;
          move_uploaded_file($_FILES['image']['tmp_name'], $pro_pic_dir.$pro_pic_name);

          $image = $pro_pic_dir.$pro_pic_name;

          $sql = "INSERT INTO `student`(`full_name`, `br_no`, `blood_group`, `birth_date`, `gender`, `phone`, `email`, `class`, `roll`, `section`, `department`, `year`, `f_name`, `f_occupation`, `f_nid`, `f_phone`, `m_name`, `m_occupation`, `m_nid`, `m_phone`, `g_name`, `g_email`, `g_phone`, `g_relationship`, `present_address`, `permanent_address`, `image`) VALUES ('$full_name', '$br_no', '$blood_group', '$birth_date', '$gender', '$phone', '$email', '$class', '$roll', '$section', '$department', '$year', '$f_name', '$f_occupation', '$f_nid', '$f_phone', '$m_name', '$m_occupation', '$m_nid', '$m_phone:', '$g_name', '$g_email', '$g_phone', '$g_relationship', '$present_address', '$permanent_address:', '$image')";

            $result = mysqli_query($conn, $sql) or die("Query Failed: ". mysqli_error($conn));

            if($result){
                header("Location: student-all.php");
            }
            else{
                echo "<script>Failed to Add Student";
            }
      }
      else{
            $pro_pic_error = false;
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

            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-md-8 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Add New Student</h4>
                        
                        <p class="card-description"> Home / Student /<code>New</code> </p>

                        <?php if ($pro_pic_error): ?>
                          <div class="alert alert-warning mb-5" role="alert">
                            <h4>You Have Error!</h4> 
                            Select a valid image file (type: jpg, jpeg, png) with less than 2MB size.
                          </div>
                        <?php endif; ?>

                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                    <div class="col-md-8 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        
                        
                            <h4 class="mb-3">Personal Details</h6>
                            <hr class="mb-4">
                            
                            <div class="row">

                              <div class="col-md-8">
                                  <div class="form-group mb-4">
                                      <label>Full Name:</label>
                                      <input name="full_name" type="text" class="form-control form-control" required>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group mb-4">
                                      <label>Phone Number:</label>
                                      <input name="phone" type="text" class="form-control form-control" required>
                                  </div>
                              </div>

                            </div>
                            
                            
                            <div class="row">
                                <div class="col">
                                      <div class="form-group mb-4">
                                          <label>Birth Registration No.:</label>
                                          <input name="br_no" type="text" class="form-control form-control">
                                      </div>
                                </div>

                                <div class="col">
                                    <div class="form-group mb-4">
                                        <label>Email Address:</label>
                                        <input name="email" type="email" class="form-control form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col">
                                    <div class="form-group mb-4">
                                      <label>Blood Group:</label>
                                      <select id="select" class="form-control" name="blood_group">
                                          <option disabled selected>Select Blood Group</option>
                                          <option value="a+ve">A+ve</option>
                                          <option value="a-ve">A-ve</option>
                                          <option value="b+ve">B+ve</option>
                                          <option value="b-ve">B-ve</option>
                                          <option value="o+ve">O+ve</option>
                                          <option value="o-ve">O-ve</option>
                                          <option value="ab+ve">AB+ve</option>
                                          <option value="ab-ve">AB-ve</option>
                                      </select>
                                  </div>
                                </div>

                                <div class="col">
                                  <div class="form-group mb-4">
                                      <label>Birth Date:</label>
                                      <input name="birth_date" type="date" class="form-control form-control">
                                  </div>
                                </div>

                                <div class="col">
                                  <div class="form-group mb-4">
                                      <label>Gender:</label>
                                      <select id="select" class="form-control" name="gender" required>
                                          <option disabled selected>Select Gender</option>
                                          <option value="male">Male</option>
                                          <option value="female">Female</option>
                                          <option value="other">Other</option>
                                      </select>
                                  </div>
                                </div>
                                
                                <div class="col">
                                    <div class="form-group mb-4">
                                        <label>Session(Year):</label>
                                        <input name="year" type="number" min="2000" max="2050" value="<?php echo date('Y'); ?>" class="form-control form-control" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col">
                                    <div class="form-group mb-4">
                                        <label>Class:</label>
                                        <select id="select" class="form-control" name="class" required>
                                            <option disabled selected>Select Class</option>
                                            <option value="i">Class-I</option>
                                            <option value="ii">Class-II</option>
                                            <option value="iii">Class-III</option>
                                            <option value="iv">Class-IV</option>
                                            <option value="v">Class-V</option>
                                            <option value="vi">Class-VI</option>
                                            <option value="vii">Class-VII</option>
                                            <option value="viii">Class-VIII</option>
                                            <option value="ix">Class-IX</option>
                                            <option value="x">Class-X</option>
                                            <option value="xi">Class-XI</option>
                                            <option value="xii">Class-XII</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group mb-4">
                                        <label>Class Roll:</label>
                                        <input name="roll" type="number" min="1" class="form-control form-control">
                                    </div>
                                </div>
                              
                                <div class="col">
                                  <div class="form-group mb-4">
                                      <label>Group:</label>
                                      <select id="select" class="form-control" name="department">
                                          <option disabled selected>Select Group</option>
                                          <option value="arts">Arts</option>
                                          <option value="science">Science</option>
                                          <option value="commerce">Commerce</option>
                                          <option value="general">General</option>
                                          <option value="others">Others</option>
                                      </select>
                                  </div>
                                </div>

                                

                                <div class="col">
                                  <div class="form-group mb-4">
                                      <label>Section:</label>
                                      <select id="select" class="form-control" name="section" required>
                                          <option disabled selected>Select Section</option>
                                          <option value="a">Section-A</option>
                                          <option value="b">Section-B</option>
                                          <option value="c">Section-C</option>
                                          <option value="d">Section-D</option>
                                          <option value="e">Section-E</option>
                                          <option value="f">Section-F</option>
                                          <option value="g">Section-G</option>
                                          <option value="h">Section-H</option>
                                          <option value="i">Section-I</option>
                                          <option value="j">Section-J</option>
                                      </select>
                                  </div>
                                </div>

                            </div>

                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                    <div class="col-md-8 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Guardian Details</h4>
                                            
                        <hr class="mb-4">

                        <div class="row">

                            <div class="col"> 
                                <div class="form-group mb-4">
                                    <label>Father's Name:</label>
                                    <input name="f_name" type="text" class="form-control form-control" required>
                                </div>
                            </div>
                            <div class="col"> 
                                <div class="form-group mb-4">
                                    <label>Father's Occupation:</label>
                                    <input name="f_occupation" type="text" class="form-control form-control">
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col"> 
                                  <div class="form-group mb-4">
                                      <label>Father's Nid:</label>
                                      <input name="f_nid" type="text" class="form-control form-control">
                                  </div>
                            </div>
                            <div class="col"> 
                                  <div class="form-group mb-4">
                                      <label>Father's Phone:</label>
                                      <input name="f_phone" type="text" class="form-control form-control" required>
                                  </div>
                            </div>
                            
                        </div>

                        <div class="row">

                            <div class="col"> 
                                <div class="form-group mb-4">
                                    <label>Mother's Name:</label>
                                    <input name="m_name" type="text" class="form-control form-control" required>
                                </div>
                            </div>
                            <div class="col"> 
                                <div class="form-group mb-4">
                                    <label>Mother's Occupation:</label>
                                    <input name="m_occupation" type="text" class="form-control form-control">
                                </div>
                            </div>
                            
                        </div>

                        <div class="row">

                            <div class="col"> 
                                <div class="form-group mb-4">
                                    <label>Mother's Nid:</label>
                                    <input name="m_nid" type="text" class="form-control form-control">
                                </div>
                            </div>
                            <div class="col"> 
                                  <div class="form-group mb-4">
                                      <label>Mother's Phone:</label>
                                      <input name="m_phone" type="text" class="form-control form-control" required>
                                  </div>
                            </div>
                            
                        </div>

                        <div class="row">

                            <div class="col"> 
                                  <div class="form-group mb-4">
                                      <label>Guardian's Name:</label>
                                      <input name="g_name" type="text" class="form-control form-control">
                                  </div>
                            </div>
                            
                            <div class="col"> 
                                  <div class="form-group mb-4">
                                      <label>Relationship:</label>
                                      <input name="g_relationship" type="text" class="form-control form-control" required>
                                  </div>
                            </div>
                            
                        </div>

                        <div class="row">

                            <div class="col"> 
                                <div class="form-group mb-4">
                                    <label>Guardian's Email:</label>
                                    <input name="g_email" type="text" class="form-control form-control">
                                </div>
                            </div>
                            <div class="col"> 
                                <div class="form-group mb-4">
                                    <label>Guardian's Phone:</label>
                                    <input name="g_phone" type="text" class="form-control form-control" required>
                                </div>
                            </div>
                            
                        </div>

                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                    <div class="col-md-8 grid-margin stretch-card">
                      <div class="card">
                        <div class="card-body">
                          
                              <div class="form-group mb-4">
                                  <label>Present Address:</label>
                                  <input name="present_address" type="text" class="form-control form-control">
                              </div>
                              
                              <div class="form-group mb-4">
                                  <label>Permanent Address:</label>
                                  <input name="permanent_address" type="text" class="form-control form-control">
                              </div>

                              <div class="form-group mb-4">
                                  <label>Profile Picture (Max-size: 2MB) : </label>
                                  <input id="inputImage" name="image" type="file" class="form-control form-control" accept="image/*">
                              </div>

                              <div class="form-group mb-4">
                                  <img id="previewImage" class="img-fluid" style="height: 100px; width: 150px">
                              </div>

                              <input type="submit" value="Save" name="submit" class="btn btn-primary">

                        </div>
                      </div>
                  </div>
                </div>
            
            </form>

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
