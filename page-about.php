<?php 
  
    include_once 'config.php';

    $sql = "SELECT * FROM about WHERE id = 1";
    $about = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $about = mysqli_fetch_assoc($about);
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

                <div class="row pt-5">
                    <div class="col-md-9">
                        
                        <div>
                            <p class="title" style="margin-top: 0">আমাদের প্রতিষ্ঠান সম্পর্কে</p>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="about-img mb-4">
                                        <img class="img-fluid w-100 h-100" src="<?php echo 'admin/'.$about['image']; ?>" alt="" />
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="about-content mb-4">
                                        <div style="text-align: justify;">
                                            <?php echo $about['description']; ?>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
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