<?php 

  include_once 'config.php';
  include_once 'auth.php';

  if(isset($_POST["delete_btn"])){

  $id = $_POST["id"];
  $sql = "DELETE FROM `student` WHERE id = $id";
  $result = mysqli_query($conn, $sql);

  if(file_exists($_POST['image'])){
    unlink($_POST['image']);
  }

  if($result){
    header("Location: student-all.php");
  }
  else{
    echo "<script>Failed to Delete</script>";
  }

}

  if(isset($_GET['id'])){
      $id = $_GET['id'];
      $sql = "SELECT * FROM `student` WHERE `Id` = $id";
      $result = mysqlI_query($conn, $sql);
      $student = mysqli_fetch_assoc($result);
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

              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Student Profile</h4>
                    <p class="card-description"> Home / Student / <code>Profile</code></p>

                  </div>
                </div>
              </div>

            </div>

            <div class="row">

            <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                          <div class="text-center">
                            <img class="img-fluid mb-4" src="<?php echo $student['image']; ?>" alt="pro-pic" style="height: 180px; width: 200px">
                            <h4 class="card-title mb-2"> <span style="color: wheat">Name:</span> <?php echo $student['full_name']; ?></h4>
                            <p class="card-title"> <span style="color: wheat">Student ID:</span> <?php echo $student['id']; ?></p>
                            
                          </div>
                          <h4 class="mt-5"> Contact Information:</h4>
                          <hr class="m-0 mb-2">
                          <p class="mb-2"> <span style="color: wheat">Phone:</span> <?php echo $student['phone']; ?></p>
                          <p class="mb-2"> <span style="color: wheat">Email:</span> <?php echo $student['email']; ?></p>
                          
                          <h4 class="mt-4"> Educational Information:</h4>
                          <table class="table table-bordered table-sm">
                            <tr>
                              <td>
                                  <span style="color: wheat">Class:</span> <?php echo strtoupper($student['class']); ?>
                              </td>
                              <td>
                                  <span style="color: wheat">Roll:</span> <?php echo $student['roll']; ?>
                              </td>
                            </tr>
                            <tr>
                              <td>       
                                  <span style="color: wheat">Section:</span> <?php echo strtoupper($student['section']); ?>
                              </td>
                              
                              <td> 
                                  <span style="color: wheat">Session:</span> <?php echo $student['year']; ?>
                              </td>
                            </tr>
                            <tr>
                                <td colspan="2"> 
                                  <span style="color: wheat">Group:</span> <?php echo ucwords($student['department']); ?>
                              </td>
                            </tr>
                          </table>

                          <h4 class="mt-4"> Personal Information:</h4>
                          <table class="table table-bordered table-sm">
                            <tr>
                              <td>
                                  <span style="color: wheat">Blood Group:</span> <?php echo $student['blood_group']; ?>
                              </td>
                              <td>       
                                  <span style="color: wheat">Gender:</span> <?php echo $student['gender']; ?>
                              </td>
                              
                              
                            </tr>
                            <tr>
                              
                              <td colspan="2">       
                                  <span style="color: wheat">Birth Date:</span> <?php echo $student['birth_date']; ?>
                              </td>
                            </tr>
                          </table>
                
                          

                          <div class="text-center m-5">
                              <a href="student-all.php" class="btn btn-warning p-2 mb-2">Back</a>
                              <a href="student-edit.php?id=<?php echo $student['id']; ?>" class="btn btn-info p-2 mb-2">Edit</a>
                              <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="d-inline">
                                <input type="hidden" name="id" value="<?php echo $student['id']?>">
                                <input type="hidden" name="image" value="<?php echo $student['image']?>">
                                <button type="submit" name="delete_btn" class="btn btn-danger p-2 mb-2">Delete</i></i></button>
                              </form>
                          </div>

                          
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">

                          <table class="table">
                              <thead class="thead-dark">
                                  <tr>
                                      <th colspan="2"><h4>Father's Information:</h4></th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <th>
                                          Name:
                                      </th>
                                      <td> 
                                          <?php echo $student['f_name']; ?>
                                      </td>
                                  </tr>
                                  <tr>
                                      <th>
                                          Occupation:
                                      </th>
                                      <td> 
                                          <?php echo $student['f_occupation']; ?>
                                      </td>
                                  </tr>
                                  <tr>
                                      <th>
                                          NID Number:
                                      </th>
                                      <td> 
                                          <?php echo $student['f_nid']; ?>
                                      </td>
                                  </tr>
                                  <tr>
                                      <th>
                                          Phone:
                                      </th>
                                      <td> 
                                          <?php echo $student['f_phone']; ?>
                                      </td>
                                  </tr>
                              </tbody>
                          </table>

                          <table class="table mt-5">
                              <thead class="thead-dark">
                                  <tr>
                                      <th colspan="2"><h4>Mother's Information:</h4></th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <th>
                                          Name:
                                      </th>
                                      <td> 
                                          <?php echo $student['m_name']; ?>
                                      </td>
                                  </tr>
                                  <tr>
                                      <th>
                                          Occupation:
                                      </th>
                                      <td> 
                                          <?php echo $student['m_occupation']; ?>
                                      </td>
                                  </tr>
                                  <tr>
                                      <th>
                                          NID Number:
                                      </th>
                                      <td> 
                                          <?php echo $student['m_nid']; ?>
                                      </td>
                                  </tr>
                                  <tr>
                                      <th>
                                          Phone:
                                      </th>
                                      <td> 
                                          <?php echo $student['m_phone']; ?>
                                      </td>
                                  </tr>
                              </tbody>
                          </table>

                          <table class="table mt-5">
                              <thead class="thead-dark">
                                  <tr>
                                      <th colspan="2"><h4>Guardian's Information:</h4></th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <th>
                                          Name:
                                      </th>
                                      <td> 
                                          <?php echo $student['g_name']; ?>
                                      </td>
                                  </tr>
                                  <tr>
                                      <th>
                                          Relationship:
                                      </th>
                                      <td> 
                                          <?php echo $student['g_relationship']; ?>
                                      </td>
                                  </tr>
                                  <tr>
                                      <th>
                                          Email:
                                      </th>
                                      <td> 
                                          <?php echo $student['g_email']; ?>
                                      </td>
                                  </tr>
                                  <tr>
                                      <th>
                                          Phone:
                                      </th>
                                      <td> 
                                          <?php echo $student['g_phone']; ?>
                                      </td>
                                  </tr>
                              </tbody>
                          </table>

                          <table class="table mt-5">
                              <thead class="thead-dark">
                                  <tr>
                                      <th colspan="2"><h4>Present Address:</h4></th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td> 
                                          <?php echo $student['present_address']; ?>
                                      </td>
                                  </tr>
                              </tbody>
                          </table>

                          <table class="table mt-5">
                              <thead class="thead-dark">
                                  <tr>
                                      <th colspan="2"><h4>Permanent Address:</h4></th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td> 
                                          <?php echo $student['permanent_address']; ?>
                                      </td>
                                  </tr>
                              </tbody>
                          </table>

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