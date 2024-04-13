<?php 
  
    include_once 'config.php';
    
    $id = $_GET['id'];
    $sql = "SELECT * FROM `academic` WHERE `id` = $id";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($con));

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Bootstrap demo</title>

        <?php include_once './section/header-links.php' ?>
    </head>

    <body>
        
        <div style="width: 75%; margin:auto">
            <div class="container-fluid bg-white">

                <!-- Header with Nav Start -->
                <?php include_once './section/header-section.php' ?>
                <!-- Header with Nav End -->

                <div class="row mt-4">
                    <div class="col-md-9">
                        <div class="mt-2 table-responsive">
                            

                                    <?php if(mysqli_num_rows($result) > 0) : ?>
            
                                        <?php $i = 1; while($row = mysqli_fetch_assoc($result)): ?>

                                            <nav aria-label="breadcrumb" class="mt-4 position-static">
                                                <ol class="breadcrumb">
                                                    <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none">হোম</a></li>
                                                    <li class="breadcrumb-item"> <?php echo $row['title'] ?> </li>
                                                </ol>
                                            </nav>

                                            <h4 class="mb-4"><?php echo $row['description'] ?></h4>
                                                
                                            <!-- <iframe src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/'.$row['file'] ?>"
                                                frameBorder="0"
                                                scrolling="auto"
                                                height="100%"
                                                width="100%">
                                            </iframe> -->

                                            <object class="pdf" 
                                                    data="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/admin/'.$row['file'] ?>"
                                                    width="100%"
                                                    height="800">
                                            </object>

                                        <?php $i++; endwhile; ?>
                                    <?php else: ?>
                                        <div class="notice-item bg-secondary-subtle d-flex justify-content-between bg-white p-2 mb-1">
                                            <div>
                                                <p class="mb-0">File Not Found</p>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    
                            
                        </div>
                        
                    </div>
                    <div class="col-md-3">
                        <?php include_once './section/sidebar-right.php' ?>
                    </div>
                </div>


                <!-- Footer Section START  -->
                <?php include_once './section/footer-section.php' ?>
                <!-- Footer Section END  -->

            </div>
        </div>
  
        <?php include_once './section/footer-links.php' ?>

    </body>

</html>