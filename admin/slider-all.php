<?php 

  include_once 'config.php';
  include_once 'auth.php';
   
  $error = false;

  $sql = "SELECT * FROM slider ORDER BY Id DESC";
  $result = mysqli_query($conn, $sql);

  if(isset($_POST["delete_btn"])){

    $s_id = $_POST["s_id"];
    $sql = "DELETE FROM slider WHERE id = $s_id";
    $result = mysqli_query($conn, $sql);

    unlink($_POST['s_image']);

    if($result){
      header("Location: slider-all.php");
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
                    <h4 class="card-title">All slider List</h4>
                    <p class="card-description"> Home / Slider / <code>All</code></p>
                    
                    <hr class="mb-5">

                    <?php if ($error): ?>
                      <div class="alert alert-warning mb-5" role="alert">
                        <h4>You Have Error!</h4> 
                        Failed to Delete!
                      </div>
                    <?php endif; ?>

                    <a href="slider-add.php" class="btn btn-warning p-2">Add New</a>

                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>SL No.</th>
                            <th>Title</th>
                            <th>Image</th>
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
                            <td><?php echo $row['title'] ?></td>
                            <td> <img src="<?php echo $row['image'] ?>" alt="slider-image"> </td>
                            
                            <td>
                              <a href="<?php echo 'slider-edit.php?id='.$row['id']?>" class="btn btn-primary"> <i class="bi bi-pencil-square"></i> Edit</a>
                              <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="d-inline">
                                <input type="hidden" name="s_id" value="<?php echo $row['id']?>">
                                <input type="hidden" name="s_image" value="<?php echo $row['image']?>">
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
