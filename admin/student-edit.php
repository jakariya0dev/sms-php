<?php 

    include_once 'config.php';
    include_once 'auth.php';
   
    $pro_pic_error = false;
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM `student` WHERE `id` = $id";
        $student = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        $student = mysqli_fetch_assoc($student);
    }
    

    if(isset($_POST['update_btn'])){

      // getting form Data
      $id = $_POST['id'];
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
      $image = $_POST['old_image'];
      $old_image = $_POST['old_image'];

      if($_FILES['image']['size'] > 0){

          $pro_pic_dir = "uploads/student/";
          $pro_pic_ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);

          // Check valid Image or not
          if(!in_array($pro_pic_ext, ['jpg', 'jpeg', 'png']) || $_FILES['image']['size'] > 2 * 1024 * 1024){
                $pro_pic_error = true;
          }
          else{
                if (!file_exists($pro_pic_dir)) {
                    mkdir($pro_pic_dir, 0755, true);
                }

                // Upload Profile Picture
                $pro_pic_name = time().'.'.$pro_pic_ext;
                move_uploaded_file($_FILES['image']['tmp_name'], $pro_pic_dir.$pro_pic_name);

                $image = $pro_pic_dir.$pro_pic_name;

                // Delete Old Image
                if(file_exists($old_image)){
                    unlink($old_image);
                }
          }
        
      }
      else{

            $update_sql = "UPDATE `student` SET `full_name`='$full_name', `br_no`='$br_no', `blood_group`='$blood_group', `birth_date`='$birth_date', `gender`='$gender', `phone`='$phone', `email`='$email', `class`='$class', `roll`='$roll ', `section`='$section', `department`='$department', `year`='$year', `f_name`='$f_name', `f_occupation`='$f_occupation', `f_nid`='$f_nid', `f_phone`='$f_phone', `m_name`='$m_name', `m_occupation`='$m_occupation', `m_nid`='$m_nid', `m_phone`='$m_phone', `g_name`='$g_name', `g_email`='$g_email', `g_phone`='$g_phone', `g_relationship`='$g_relationship', `present_address`='$present_address', `permanent_address`='$permanent_address', `image`='$image' WHERE `id` = $id";


            $result = mysqli_query($conn, $update_sql) or die("Query Failed: ". mysqli_error($conn));

            if($result){
                header("Location: student-profile.php?id=".$_POST['id']);
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

            <form action="<?php echo $_SERVER['PHP_SELF'].'?id='.$id ?>" method="post" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-md-8 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Update Student Profile</h4>
                        
                        <p class="card-description"> Home / Student /<code>Edit</code> </p>

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
                                      <input name="full_name" type="text" value="<?php echo $student['full_name'] ?>" class="form-control form-control" required>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group mb-4">
                                      <label>Phone Number:</label>
                                      <input name="phone" type="text" value="<?php echo $student['phone'] ?>" class="form-control form-control" required>
                                  </div>
                              </div>

                            </div>
                            
                            
                            <div class="row">
                                <div class="col">
                                      <div class="form-group mb-4">
                                          <label>Birth Registration No.:</label>
                                          <input name="br_no" type="text" value="<?php echo $student['br_no'] ?>" class="form-control form-control">
                                      </div>
                                </div>

                                <div class="col">
                                      <div class="form-group mb-4">
                                          <label>Email Address:</label>
                                          <input name="email" type="email" value="<?php echo $student['email'] ?>" class="form-control form-control">
                                      </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col">
                                    <div class="form-group mb-4">
                                      <label>Blood Group:</label>
                                      <select id="select" class="form-control" name="blood_group">
                                          <option value="">Select Blood Group</option>
                                          <option value="a+ve" <?php echo !strcmp($student['blood_group'], 'a+ve') ? 'selected' : '' ?> >A+ve</option>
                                          <option value="a-ve" <?php echo !strcmp($student['blood_group'], 'a-ve') ? 'selected' : '' ?> >A-ve</option>
                                          <option value="b+ve" <?php echo !strcmp($student['blood_group'], 'b+ve') ? 'selected' : '' ?> >B+ve</option>
                                          <option value="b-ve" <?php echo !strcmp($student['blood_group'], 'b-ve') ? 'selected' : '' ?> >B-ve</option>
                                          <option value="o+ve" <?php echo !strcmp($student['blood_group'], 'o+ve') ? 'selected' : '' ?> >O+ve</option>
                                          <option value="o-ve" <?php echo !strcmp($student['blood_group'], 'o-ve') ? 'selected' : '' ?> >O-ve</option>
                                          <option value="ab+ve" <?php echo !strcmp($student['blood_group'], 'ab+ve') ? 'selected' : '' ?> >AB+ve</option>
                                          <option value="ab-ve" <?php echo !strcmp($student['blood_group'], 'ab-ve') ? 'selected' : '' ?> >AB-ve</option>
                                      </select>
                                  </div>
                                </div>

                                <div class="col">
                                  <div class="form-group mb-4">
                                      <label>Birth Date:</label>
                                      <input name="birth_date" type="date" value="<?php echo $student['birth_date'] ?>" class="form-control form-control">
                                  </div>
                                </div>

                                <div class="col">
                                  <div class="form-group mb-4">
                                      <label>Gender:</label>
                                      <select id="select" class="form-control" name="gender" required>
                                          <option value="">Select Gender</option>
                                          <option value="male" <?php echo !strcmp($student['gender'], 'male') ? 'selected' : '' ?> >Male</option>
                                          <option value="female" <?php echo !strcmp($student['gender'], 'female') ? 'selected' : '' ?> >Female</option>
                                          <option value="other" <?php echo !strcmp($student['gender'], 'other') ? 'selected' : '' ?> >Other</option>
                                      </select>
                                  </div>
                                </div>

                                <div class="col">
                                    <div class="form-group mb-4">
                                        <label>Session (Year):</label>
                                        <input name="year" type="number" min="2000" max="2050" value="<?php echo $student['year'] ?>" class="form-control form-control" required>
                                    </div>
                                </div>
                                

                            </div>

                            <div class="row">

                                <div class="col">
                                    <div class="form-group mb-4">
                                        <label>Class:</label>
                                        <select id="select" class="form-control" name="class" required>
                                            <option value="">Select Class</option>
                                            <option value="i" <?php echo !strcmp($student['class'], 'i') ? 'selected' : '' ?>>Class-I</option>
                                            <option value="ii" <?php echo !strcmp($student['class'], 'ii') ? 'selected' : '' ?>>Class-II</option>
                                            <option value="iii" <?php echo !strcmp($student['class'], 'iii') ? 'selected' : '' ?>>Class-III</option>
                                            <option value="iv" <?php echo !strcmp($student['class'], 'iv') ? 'selected' : '' ?>>Class-IV</option>
                                            <option value="v" <?php echo !strcmp($student['class'], 'v') ? 'selected' : '' ?>>Class-V</option>
                                            <option value="vi" <?php echo !strcmp($student['class'], 'vi') ? 'selected' : '' ?>>Class-VI</option>
                                            <option value="vii" <?php echo !strcmp($student['class'], 'vii') ? 'selected' : '' ?>>Class-VII</option>
                                            <option value="viii" <?php echo !strcmp($student['class'], 'viii') ? 'selected' : '' ?>>Class-VIII</option>
                                            <option value="ix" <?php echo !strcmp($student['class'], 'ix') ? 'selected' : '' ?>>Class-IX</option>
                                            <option value="x" <?php echo !strcmp($student['class'], 'x') ? 'selected' : '' ?>>Class-X</option>
                                            <option value="xi" <?php echo !strcmp($student['class'], 'xi') ? 'selected' : '' ?>>Class-XI</option>
                                            <option value="xii" <?php echo !strcmp($student['class'], 'xii') ? 'selected' : '' ?>>Class-XII</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group mb-4">
                                        <label>Roll:</label>
                                        <input name="roll" type="number" min="1" value="<?php echo $student['roll'] ?>" class="form-control form-control">
                                    </div>
                                </div>

                                <div class="col">
                                  <div class="form-group mb-4">
                                      <label>Section:</label>
                                      <select id="select" class="form-control" name="section" required>
                                          <option value="">Select Section</option>
                                          <option value="a" <?php echo !strcmp($student['section'], 'a') ? 'selected' : '' ?>>Section-A</option>
                                          <option value="b" <?php echo !strcmp($student['section'], 'b') ? 'selected' : '' ?>>Section-B</option>
                                          <option value="c" <?php echo !strcmp($student['section'], 'c') ? 'selected' : '' ?>>Section-C</option>
                                          <option value="d" <?php echo !strcmp($student['section'], 'd') ? 'selected' : '' ?>>Section-D</option>
                                          <option value="e" <?php echo !strcmp($student['section'], 'e') ? 'selected' : '' ?>>Section-E</option>
                                          <option value="f" <?php echo !strcmp($student['section'], 'f') ? 'selected' : '' ?>>Section-F</option>
                                          <option value="g" <?php echo !strcmp($student['section'], 'g') ? 'selected' : '' ?>>Section-G</option>
                                          <option value="h" <?php echo !strcmp($student['section'], 'h') ? 'selected' : '' ?>>Section-H</option>
                                          <option value="i" <?php echo !strcmp($student['section'], 'i') ? 'selected' : '' ?>>Section-I</option>
                                          <option value="j" <?php echo !strcmp($student['section'], 'j') ? 'selected' : '' ?>>Section-J</option>
                                      </select>
                                  </div>
                                </div>

                                <div class="col">
                                  <div class="form-group mb-4">
                                      <label>Group:</label>
                                      <select id="select" class="form-control" name="department">
                                          <option value="">Select Group</option>
                                          <option value="arts" <?php echo !strcmp($student['department'], 'arts') ? 'selected' : '' ?> >Arts</option>
                                          <option value="science" <?php echo !strcmp($student['department'], 'science') ? 'selected' : '' ?> >Science</option>
                                          <option value="commerce" <?php echo !strcmp($student['department'], 'commerce') ? 'selected' : '' ?> >Commerce</option>
                                          <option value="general" <?php echo !strcmp($student['department'], 'general') ? 'selected' : '' ?> >General</option>
                                          <option value="others" <?php echo !strcmp($student['department'], 'others') ? 'selected' : '' ?> >Others</option>
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
                                    <input name="f_name" type="text" value="<?php echo $student['f_name'] ?>" class="form-control form-control" required>
                                </div>
                            </div>
                            <div class="col"> 
                                <div class="form-group mb-4">
                                    <label>Father's Occupation:</label>
                                    <input name="f_occupation" type="text" value="<?php echo $student['f_occupation'] ?>" class="form-control form-control">
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col"> 
                                  <div class="form-group mb-4">
                                      <label>Father's Nid:</label>
                                      <input name="f_nid" type="text" value="<?php echo $student['f_nid'] ?>" class="form-control form-control">
                                  </div>
                            </div>
                            <div class="col"> 
                                  <div class="form-group mb-4">
                                      <label>Father's Phone:</label>
                                      <input name="f_phone" type="text" value="<?php echo $student['f_phone'] ?>" class="form-control form-control" required>
                                  </div>
                            </div>
                            
                        </div>

                        <div class="row">

                            <div class="col"> 
                                <div class="form-group mb-4">
                                    <label>Mother's Name:</label>
                                    <input name="m_name" type="text" value="<?php echo $student['m_name'] ?>" class="form-control form-control" required>
                                </div>
                            </div>
                            <div class="col"> 
                                <div class="form-group mb-4">
                                    <label>Mother's Occupation:</label>
                                    <input name="m_occupation" type="text" value="<?php echo $student['m_occupation'] ?>" class="form-control form-control">
                                </div>
                            </div>
                            
                        </div>

                        <div class="row">

                            <div class="col"> 
                                <div class="form-group mb-4">
                                    <label>Mother's Nid:</label>
                                    <input name="m_nid" type="text" value="<?php echo $student['m_nid'] ?>" class="form-control form-control">
                                </div>
                            </div>
                            <div class="col"> 
                                  <div class="form-group mb-4">
                                      <label>Mother's Phone:</label>
                                      <input name="m_phone" type="text" value="<?php echo $student['m_phone'] ?>" class="form-control form-control" required>
                                  </div>
                            </div>
                            
                        </div>

                        <div class="row">

                            <div class="col"> 
                                  <div class="form-group mb-4">
                                      <label>Guardian's Name:</label>
                                      <input name="g_name" type="text" value="<?php echo $student['g_name'] ?>" class="form-control form-control">
                                  </div>
                            </div>
                            
                            <div class="col"> 
                                  <div class="form-group mb-4">
                                      <label>Relationship:</label>
                                      <input name="g_relationship" type="text" value="<?php echo $student['g_relationship'] ?>" class="form-control form-control" required>
                                  </div>
                            </div>
                            
                        </div>

                        <div class="row">

                            <div class="col"> 
                                <div class="form-group mb-4">
                                    <label>Guardian's Email:</label>
                                    <input name="g_email" type="text" value="<?php echo $student['g_email'] ?>" class="form-control form-control">
                                </div>
                            </div>
                            <div class="col"> 
                                <div class="form-group mb-4">
                                    <label>Guardian's Phone:</label>
                                    <input name="g_phone" type="text" value="<?php echo $student['g_phone'] ?>" class="form-control form-control" required>
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
                                  <input name="present_address" type="text" value="<?php echo $student['present_address'] ?>" class="form-control form-control">
                              </div>
                              
                              <div class="form-group mb-4">
                                  <label>Permanent Address:</label>
                                  <input name="permanent_address" type="text" value="<?php echo $student['permanent_address'] ?>" class="form-control form-control">
                              </div>

                              <div class="form-group mb-4">
                                  <label>Profile Picture (Max-size: 2MB) : </label>
                                  <input id="inputImage" name="image" type="file" value="<?php echo $student['image'] ?>" class="form-control form-control">
                              </div>

                              <div class="form-group mb-4">
                                  <img id="previewImage" src="<?php echo $student['image'] ?>" class="img-fluid" style="height: 100px; width: 150px">
                              </div>

                              <input name="id" type="hidden" value="<?php echo $student['id'] ?>">
                              <input name="old_image" type="hidden" value="<?php echo $student['image'] ?>">

                              <input type="submit" value="Update" name="update_btn" class="btn btn-primary">

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
