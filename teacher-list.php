<?php 
  
    include_once 'config.php';
  
    $sql = "SELECT * FROM teacher";
    $teacher = mysqli_query($conn, $sql) or die(mysqli_error($con));

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

                <nav aria-label="breadcrumb" class="mt-4 position-static">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none">হোম</a></li>
                        <li class="breadcrumb-item"> শিক্ষক তালিকা </li>
                        
                    </ol>
                </nav>
                <div class="row mt-4">
                    <div class="col-md-9">
                        <div class="mt-4">
                            <p class="display-6 text-center mb-3">শিক্ষকমণ্ডলীর তালিকা</p>

                            <?php if(mysqli_num_rows($teacher) > 0) : ?>
                                <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-3">
                                    <?php while ($row = mysqli_fetch_array($teacher)): ?>
                                        
                                        <div class="col">
                                            <a href="<?php echo 'teacher.php?id='.$row['id'] ?>" class="text-decoration-none">
                                                <div class="item mb-5">
                                                    <div class="team-member card">
                                                        <div class="pro-pic card-img-top">
                                                            <img class="img-fluid w-100 h-100" src="<?php echo 'admin./'.$row['image'] ?>" />
                                                        </div>
                                                        <div class="social-icon mb-3">
                                                            <i class="fa-solid fa-phone-volume"></i> &nbsp; <?php echo $row['phone'] ?>
                                                        </div>
                                                        <div class="text-center">
                                                            <h4 class="mb-0"><?php echo $row['name'] ?></h4>
                                                            <p><?php echo $row['designation'] ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                    <?php endwhile; ?>
                                </div>
                            <?php else: ?>
                                <div class="notice-item bg-secondary-subtle d-flex justify-content-between bg-white p-2 mb-1">
                                    <div>
                                        <p class="mb-0">No Notice Found</p>
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