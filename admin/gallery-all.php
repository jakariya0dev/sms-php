<?php 

  include_once 'config.php';

  $sql = "SELECT * FROM gallery ORDER BY Id DESC";
  $result = mysqlI_query($conn, $sql);

  if(isset($_POST["delete_btn"])){

    $id = $_POST["id"];
    $sql = "DELETE FROM `gallery` WHERE id = $id";

    if(file_exists($_POST['image'])){
      unlink($_POST['image']);
    }

    $result = mysqli_query($conn, $sql);

    if($result){
      header("Location: gallery-all.php");
    }
    else{
      echo "<script>alert('Failed to Delete')</script>";
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
                    <h4 class="card-title">All Gallery Photo</h4>
                    <p class="card-description"> Home / Gallery / <code>All</code></p>
                    
                    <hr class="mb-5">

                    <a href="gallery-add.php" class="btn btn-warning p-2 mb-3">Add New</a>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>SL No.</th>
                            <th>Title</th>
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
                            <td><?php echo $row['title'] ?></td>
                            <td> <img src="<?php echo $row['image'] ?>" alt="pro-pic"> </td>
                            <td>
                              <a href="<?php echo 'gallery-edit.php?id='.$row['id']?>" class="btn btn-primary"> <i class="bi bi-pencil-square"></i>Edit</a>
                              <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="d-inline">
                                <input type="hidden" name="id" value="<?php echo $row['id']?>">
                                <input type="hidden" name="image" value="<?php echo $row['image']?>">
                                <button type="submit" name="delete_btn" class="btn btn-danger"><i class="bi bi-trash3"></i>Delete</button>
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
