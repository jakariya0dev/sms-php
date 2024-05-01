<?php 

    $president_sql = "SELECT * FROM speech where id = 1";
    $principal_sql = "SELECT * FROM speech where id = 2";

    $president = mysqli_query($conn, $president_sql) or die(mysqli_error($conn));
    $president = mysqli_fetch_assoc($president);
    
    $principal = mysqli_query($conn, $principal_sql) or die(mysqli_error($conn));
    $principal = mysqli_fetch_assoc($principal);

?>

<section id="speech">
    <p class="title">সভাপতির বাণী</p>

    <div class="speech-item">
        <div class="row">
            <div class="col-md-4">
                <div class="speech-img text-center">
                    <img src="<?php echo 'admin/'.$president['image'] ?>" class="img-thumbnail img-fluid w-100 mb-3" />
                    <h3 class="mb-0"><?php echo $president['name'] ?></h3>
                    <p><?php echo $president['designation'] ?></p>
                </div>
            </div>
            <div class="col-md-8">
                <div class="speech-content">
                    <p> <?php echo $president['speech'] ?> </p>
                    <div class="see-more">
                        <p class=""><a class="text-decoration-none" href="page-speech.php">বিস্তারিত পড়ুন</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <p class="title">অধ্যক্ষ্যের বাণী</p>

    <div class="speech-item">
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="speech-img text-center">
                    <img src="<?php echo 'admin/'.$principal['image'] ?>" class="img-thumbnail img-fluid w-100 mb-3" />
                    <h3 class="mb-0"><?php echo $principal['name'] ?></h3>
                    <p><?php echo $principal['designation'] ?></p>
                </div>
            </div>
            <div class="col-md-8 mb-3">
                <div class="speech-content">
                    <p> <?php echo $principal['speech'] ?> </p>
                    
                    <div class="see-more">
                        <p class=""><a class="text-decoration-none" href="page-speech.php">বিস্তারিত পড়ুন</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>