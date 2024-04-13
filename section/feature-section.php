<?php 

    include_once("config.php");

    $feature_sql = "SELECT * FROM `feature`";
    $feature_result = mysqli_query($conn, $feature_sql);

?>



<section id="feature">
    <p class="title">প্রতিষ্ঠানের বৈশিষ্ট্য</p>
    <div class="row gx-5">
        <div class="col-md-6">
            <?php while($row = mysqli_fetch_assoc($feature_result)): ?>
            <div class="row mb-5">
                <div class="col-4">
                    <div class="feature-title-img">
                        <img class="h-100 w-100 img-fluid" src="<?php echo 'admin/'.$row['image']?>" />
                    </div>
                </div>

                <div class="col-8 ps-5">
                    <h4><?php echo $row['title']?></h4>
                    <hr class="dotted-hr" />
                    <p><?php echo $row['subtitle']?></p>
                </div>
            </div>
            <?php endwhile; ?>
        </div>

        <div class="col-md-6">
            <div class="feature-img-right">
                <img class="h-100 w-100 img-fluid" src="https://picsum.photos/id/237/300/300" alt="" />
            </div>
        </div>
    </div>
</section>