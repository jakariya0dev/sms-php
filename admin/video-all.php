<?php 

  include_once 'config.php';
  include_once 'auth.php';
    
  $table_name = "video_gallery";

  $sql = "SELECT * FROM $table_name ORDER BY Id DESC";
  $result = mysqli_query($conn, $sql);


  // Delete video 

  if(isset($_POST['id'])){

    $id = $_POST['id'];
    $sqlToDrop = "DELETE FROM $table_name WHERE id = $id";
    $resultToDrop = mysqli_query($conn, $sqlToDrop);
    
    if($resultToDrop){
      header("Location: {$_SERVER['PHP_SELF']}");
      echo "<script> alert('Link Deleted Successfully')";
    }else{
      header("Location: {$_SERVER['PHP_SELF']}");
      echo "<script> alert('Failed to Delete Link')";
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
                    <h4 class="card-title">All Video List</h4>
                    <p class="card-description"> Home / Video / <code>All</code></p>
                    
                    <hr class="mb-3">

                    <a href="feature-add.php" class="btn btn-warning p-2 mb-3">Add New</a>

                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>SL No.</th>
                            <th>Title</th>
                            <th>Link</th>
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
                            <td><?php echo $row['link'] ?></td>
                            
                            <td>
                              <a href="<?php echo 'video-edit.php?id='.$row['id']?>" class="btn btn-primary"> <i class="bi bi-pencil-square"></i> Edit</a>
                              <form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>" class="d-inline">
                                <input type="hidden" value="<?php echo $row['id']?>" name="id">
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
