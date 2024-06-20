<?php 
    
    include_once("config.php");
    $sql4about = "SELECT * FROM `about` LIMIT 1";
    $about = mysqli_query($conn, $sql4about) or die('Query Error!');
    $about = mysqli_fetch_assoc($about);
    
?>

<section id="about">
    <div>
        <p class="title" style="margin-top: 0"> <?php echo $ins_name_bn ?> </p>

        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="about-img">
                    <img class="img-fluid w-100 h-100" src="<?php echo 'admin/'.$about['image']; ?>" alt="" />
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="about-content">
                    <div class="about-description mb-3">
                        <?php echo $about['description']; ?>
                    </div>
                    
                    <div class="see-more">
                        <p class=""><a class="text-decoration-none" href="about.php">বিস্তারিত পড়ুন</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
