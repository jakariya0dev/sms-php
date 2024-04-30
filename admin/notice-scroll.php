<?php 

    include_once 'config.php';
    include_once 'auth.php';
   
    $sql = "SELECT * FROM scroll_notice WHERE id = 1";

    $result = mysqli_query($conn, $sql) or die("Query Failed: ". mysqli_error($conn));
    $data = mysqli_fetch_assoc($result);

    if(isset($_POST['update_btn'])){

        
        $headline = $_POST['headline'];

        $sql = "UPDATE `scroll_notice` SET `headline`='$headline' WHERE id = 1";
        $result = mysqli_query($conn, $sql) or die("Query Failed: ". mysqli_error($conn));

        if($result){
            header("Location: notice-scroll.php");
        }
        else{
            echo "<script> Failed to Update</script>";
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
                    <h4 class="card-title">Update About Description</h4>
                    
                    <p class="card-description"> Home / Description /<code>Edit</code> </p>
                    
                    <hr class="mb-5">

                    
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                        
                        <div class="form-group">
                            <label>Headline</label>
                            <textarea name="headline" class="form-control custom-text-area" > <?php echo $data['headline'] ?> </textarea>
                        </div>

                        <input type="submit" value="Save Changes" name="update_btn" class="btn btn-primary">
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
