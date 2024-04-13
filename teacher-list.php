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


                <div class="row mt-4">
                    <div class="col-md-9">
                        <div class="mt-4">
                            <p class="display-6 text-center mb-3">শিক্ষকমণ্ডলীর তালিকা</p>

                            <?php if(mysqli_num_rows($teacher) > 0) : ?>
                                <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-3">
                                    <?php while ($row = mysqli_fetch_array($teacher)): ?>
                                        
                                        <div class="col">
                                            <a href="<?php echo 'teacher.php?id='.$row['id'] ?>">
                                                <div class="item mb-5">
                                                <div class="team-member">
                                                    <div class="pro-pic">
                                                        <img class="img-fluid img-thumbnail w-100 h-100" src="<?php echo 'admin./'.$row['image'] ?>" />
                                                    </div>
                                                    <div class="social-icon mb-3">

                                                        <i class="bi bi-telephone-plus"></i> &nbsp; <?php echo $row['phone'] ?>
                                                        <!-- <a href=""><i class="fa-brands fa-facebook-f"></i></a>
                                                        <a href=""><i class="fa-brands fa-twitter"></i></a>
                                                        <a href=""><i class="fa-brands fa-linkedin-in"></i></a>
                                                        <a href=""><i class="fa-brands fa-google-plus-g"></i></a> -->
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