<?php 

  include_once 'config.php';
  include_once 'auth.php';
    
  $error = false;

  if(isset($_POST["delete_btn"])){

    $id = $_POST["id"];
    $sql = "DELETE FROM `administration` WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    unlink($_POST['image']);

    if($result){
      header("Location: administration-all.php");
    }
    else{
      $error = true;
    }

  }

  $sql = "SELECT * FROM `administration` ORDER BY Id";
  $result = mysqlI_query($conn, $sql);

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
                    <h4 class="card-title">All Teacher List</h4>
                    <p class="card-description"> Home / Teacher / <code>All</code></p>
                    
                    <hr class="mb-5">

                    <?php if ($error): ?>
                      <div class="alert alert-warning mb-5" role="alert">
                        <h4>You Have Error!</h4> 
                        Failed to Delete!
                      </div>
                    <?php endif; ?>

                    <a href="administration-add.php" class="btn btn-warning p-2">Add New</a>
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>SL No.</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Picture</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>

                        <?php 
                            $i = 1;
                            while ($row = mysqli_fetch_assoc($result)){

                            
                        ?>
                          <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['designation'] ?></td>
                            <td> <img src="<?php echo $row['image'] ?>" alt="pro-pic"> </td>
                            
                            <td>
                              <a href="<?php echo 'administration-edit.php?id='.$row['id']?>" class="btn btn-primary"> <i class="bi bi-pencil-square"></i> Edit</a>
                              <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="d-inline">
                                <input type="hidden" name="id" value="<?php echo $row['id']?>">
                                <input type="hidden" name="image" value="<?php echo $row['image']?>">
                                <button type="submit" name="delete_btn" class="btn btn-danger"><i class="bi bi-trash3"></i> Delete</button>
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
