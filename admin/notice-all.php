<?php 

  include_once 'config.php';

  $sql = "SELECT * FROM notice ORDER BY Id DESC";
  $result = mysqlI_query($conn, $sql);

  if(isset($_POST["delete_btn"])){

    $n_id = $_POST["n_id"];
    $sql = "DELETE FROM notice WHERE id = $n_id";

    if(file_exists($_POST['n_file'])){
      unlink($_POST['n_file']);
    }
    $result = mysqli_query($conn, $sql);

    if($result){
      header("Location: notice-all.php");
    }
    else{
      echo 'Delete Failed';
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
                    <h4 class="card-title">All Notice</h4>
                    <p class="card-description"> Home / Notice / <code>All</code>
                    </p>
                    
                    <a href="notice-add.php" class="btn btn-warning p-2">Add New</a>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>SL No.</th>
                            <th>Title</th>
                            <th>Date</th>
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
                            <!-- <td><?php echo $row['title'] ?></td> -->

                            
                            <td><?php echo substr($row['title'], 0, 120)  ?></td>
                            <td><?php echo $row['date'] ?></td>
                            
                            <td>
                              <a href="<?php echo 'notice-edit.php?id='.$row['id']?>" class="btn btn-primary"> <i class="bi bi-pencil-square"></i> Edit</a>
                              <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="d-inline">
                                <input type="hidden" name="n_id" value="<?php echo $row['id']?>">
                                <input type="hidden" name="n_file" value="<?php echo $row['file']?>">
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
