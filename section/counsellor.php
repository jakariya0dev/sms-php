<?php 

    $sql4teacher = "SELECT * FROM `teacher`";

    $teacher = mysqli_query($conn, $sql4teacher);
    
?>
<section id="counsellor">
    <p class="title">পৌর কাউন্সিলর</p>

    <div class="container bg-white"">
        
        <div class="row row-cols-md-4">

            <?php while ($row = mysqli_fetch_array($teacher)): ?>
                <a href="<?php echo 'teacher.php?id='.$row['id'] ?>" class="text-decoration-none">
                    <div class="item counsellor">
                        <div class="team-member">
                            <div class="pro-pic">
                                <img class="img-fluid w-100 h-100" src="<?php echo 'admin./'.$row['image'] ?>" />
                            </div>
                            <div class="social-icon mb-3">
                                <i class="fa-solid fa-phone-volume"></i> &nbsp; <?php echo $row['phone'] ?>
                            </div>
                            <div class="text-center">
                                <h4 class="mb-0"><?php echo $row['name'] ?></h4>
                                <!-- <p><?php echo $row['designation'] ?></p> -->
                            </div>
                        </div>
                    </div>
                </a>
            <?php endwhile; ?>
        
        </div>
    </div>
</section>