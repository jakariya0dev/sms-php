<?php 
  
    include_once 'config.php';
  
    $president_sql = "SELECT * FROM speech where id = 1";
    $principal_sql = "SELECT * FROM speech where id = 2";

    $president = mysqli_query($conn, $president_sql) or die(mysqli_error($conn));
    $president = mysqli_fetch_assoc($president);

    $principal = mysqli_query($conn, $principal_sql) or die(mysqli_error($conn));
    $principal = mysqli_fetch_assoc($principal);

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
                            <p class="title" style="margin-top: 0">সভাপতির বাণী</p>

                            <div class="card mb-3">
                                    <div class="row gx-3">
                                        <div class="col-md-4">
                                            <img class="img-fluid w-100 p-3" src="<?php echo 'admin/'.$president['image'] ?>" alt="">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="d-flex flex-column justify-content-center h-100">
                                                <p class="card-title display-6"><?php echo $president['name'] ?></p>
                                                <h4 class="card-text"><?php echo $president['designation'] ?></h4>
                                            </div>
                                        </div>
                                    </div>
                            </div>

                            <div class="row">
                            
                                <div class="col-md-12">
                                    <div class="about-content mb-4">
                                        <div style="text-align: justify;">
                                            <?php echo $president['speech'] ?>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5">
                            <p class="title" style="margin-top: 0">অধ্যক্ষের বাণী</p>

                            <div class="card mb-3">
                                    <div class="row gx-3">
                                        <div class="col-md-4">
                                            <img class="img-fluid w-100 p-3" src="<?php echo 'admin/'.$principal['image'] ?>" alt="">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="d-flex flex-column justify-content-center h-100">
                                                <p class="card-title display-6"><?php echo $principal['name'] ?></p>
                                                <h4 class="card-text"><?php echo $principal['designation'] ?></h4>
                                            </div>
                                        </div>
                                    </div>
                            </div>

                            <div class="row">
                            
                                <div class="col-md-12">
                                    <div class="about-content mb-4">
                                        <div style="text-align: justify;">
                                            <?php echo $principal['speech'] ?>
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