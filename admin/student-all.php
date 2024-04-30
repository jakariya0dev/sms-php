<?php 

  include_once 'config.php';
  include_once 'auth.php';
   
  $error = false;

  $sql = "SELECT * FROM `student` ORDER BY Id DESC";
  $result = mysqlI_query($conn, $sql);

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
      $error = true;
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

              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">All Student List</h4>
                    <p class="card-description"> Home / Student / <code>All</code></p>
                    
                    <hr class="mb-4">

                    <?php if ($error): ?>
                      <div class="alert alert-warning mb-5" role="alert">
                        <h4>You Have Error!</h4> 
                        Failed to Delete!
                      </div>
                    <?php endif; ?>

                    <a href="student-add.php" class="btn btn-warning p-2 mb-4">Add New Student</a>

                    <div class="table-responsive">
                      <table id="myTable" class="table mt-4">
                        <thead>
                          <tr>
                            <th> SL No. </th>
                            <th> Student Name </th>
                            <th> Student id </th>
                            <th> Class </th>
                            <th> Section </th>
                            <th> Group </th>
                            <th> Session </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody>

                        <?php 
                            $i = 1;
                            while ($row = mysqli_fetch_assoc($result)){

                            
                        ?>
                          <tr>
                            <td><?php echo $i ?></td>
                            <td>
                              <img src="<?php echo $row['image'] ?>" alt="pro-pic">
                              <span class="ps-2"><?php echo $row['full_name'] ?></span>
                            </td>
                            <td> <?php echo $row['id'] ?> </td>
                            <td> <?php echo $row['class'] ?> </td>
                            <td> <?php echo $row['section'] ?> </td>
                            <td> <?php echo $row['department'] ?> </td>
                            <td> <?php echo $row['year'] ?> </td>
                            <td>
                              <a href="<?php echo 'student-profile.php?id='.$row['id']?>" class="btn btn-warning"> <i class="fa-solid fa-eye"></i></i> </a>
                              <a href="<?php echo 'student-edit.php?id='.$row['id']?>" class="btn btn-primary"> <i class="fa-solid fa-pen-to-square"></i> </a>
                              <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="d-inline">
                                <input type="hidden" name="id" value="<?php echo $row['id']?>">
                                <input type="hidden" name="image" value="<?php echo $row['image']?>">
                                <button type="submit" name="delete_btn" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></i></button>
                              </form>
                            </td>
                          </tr>
                        <?php $i++; } ?>
                        </tbody>
                      </table>
                    </div>
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