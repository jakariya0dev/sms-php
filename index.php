<?php 
  
  include_once 'config.php';
  
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

        <div class="container bg-white">

            <!-- Header with Nav Start -->
            <?php include_once './section/header-section.php' ?>
            <!-- Header with Nav End -->

            <!-- Banner Slider Start -->
            <?php include_once './section/banner-slider.php' ?>
            <!-- Banner Slider End -->

            <div class="row">
                <div class="col-md-9">
                    <?php include_once './section/about-us.php' ?>
                    <?php include_once './section/speech-section.php' ?>
                    <?php include_once './section/feature-section.php' ?>
                    <?php include_once './section/achievement.php' ?>
                </div>
                <div class="col-md-3">
                    <?php include_once './section/sidebar-right.php' ?>
                </div>
            </div>

            <!-- Photo Gallery Start -->
            <?php include_once './section/photo-gallery.php' ?>
            <!-- Photo Gallery End -->

            <!-- Team Section START  -->
            <?php include_once './section/teacher-slider.php' ?>
            <!-- Team Section END  -->

            <!-- Achievements Start -->
            <?php include_once './section/achievement.php' ?>
            <!-- Achievements End -->

        </div>
        
        
        <?php include_once './section/footer-links.php' ?>

    </body>

</html>