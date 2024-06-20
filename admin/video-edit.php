<?php 

    include_once 'config.php';
    include_once 'auth.php';

    $table_name = "video_gallery";
   
    if(isset($_GET['id'])){

        $id = $_GET['id'];
        $sql = "SELECT * FROM $table_name WHERE id = $id";

        $result = mysqli_query($conn, $sql) or die("Query Failed: ". mysqli_error($conn));
        $data = mysqli_fetch_assoc($result);

    }


    if(isset($_POST['update_btn'])){

        $id = $_POST['id'];
        $title = $_POST['title'];
        $link = $_POST['link'];

        $sql = "UPDATE $table_name SET `title`='$title',`link`='$link' WHERE id = $id";
        $result = mysqli_query($conn, $sql) or die("Query Failed: ". mysqli_error($conn));

        if($result){
            header("Location: video-all.php");
        }
        else{
            echo "<script>Failed To Update</script>";
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
                    <h4 class="card-title">Update Notice</h4>
                    
                    <p class="card-description"> Home / Notice /<code>Edit</code> </p>
                    
                    <hr class="mb-5">

                    
                    <form action="<?php echo $_SERVER['PHP_SELF'].'?id='.$id ?>" method="post" enctype="multipart/form-data">
                    
                        <div class="form-group mb-5">
                            <label>Video Title</label>
                            <input name="title" type="text" class="form-control form-control-lg" value="<?php echo $data['title'] ?>" required>
                        </div>
                        
                       <div class="form-group mb-5">
                            <label>Video Link</label>
                            <input name="link" type="text" class="form-control form-control-lg" value="<?php echo $data['link'] ?>" required>
                        </div>
                        
                        <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
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
