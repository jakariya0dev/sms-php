<?php 
  
    include_once 'config.php';

    $sql = "SELECT * FROM notice ORDER BY id DESC";
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

                <nav aria-label="breadcrumb" class="mt-4 position-static">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none">হোম</a></li>
                        <li class="breadcrumb-item"> সব নোটিশ</li>
                    </ol>
                </nav>

                <div class="row mt-4">
                    <div class="col-md-9">
                        <div class="mt-5 table-responsive">
                            <table class="table caption-top">
                                <caption class="display-6 text-center">সব বিজ্ঞপ্তি</caption>
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Notice</th>
                                        <th scope="col">File</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">

                                    <?php if(mysqli_num_rows($result) > 0) : ?>
            
                                        <?php $i = 1; while($row = mysqli_fetch_assoc($result)): ?>
                                            
                                            <tr>
                                                <th scope="row"> <?php echo $i.'.'; ?> </th>
                                                <td>
                                                    <a href="<?php echo 'notice.php?id='.$row['id'] ?>" class="text-decoration-none">
                                                        <?php echo $row['title']?><br><i>Date: <?php echo $row['date']?></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/admin/'.$row['file'] ?>" target="_blank">
                                                        <i class="bi bi-file-earmark-pdf h2"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                        <?php $i++; endwhile; ?>
                                    <?php else: ?>
                                        <div class="notice-item bg-secondary-subtle d-flex justify-content-between bg-white p-2 mb-1">
                                            <div>
                                                <p class="mb-0">No Notice Found</p>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    
                                </tbody>
                            </table>
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