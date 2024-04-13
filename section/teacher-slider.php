<?php 

    $sql4teacher = "SELECT * FROM `teacher`";

    $teacher = mysqli_query($conn, $sql4teacher);
    
?>
<section id="teachers">
    <p class="title">শিক্ষক মণ্ডলী</p>

    <div class="container bg-white" data-aos="fade-up">
        
        <div class="owl-carousel owl-theme">

            <?php while ($row = mysqli_fetch_array($teacher)): ?>
                <a href="<?php echo 'teacher.php?id='.$row['id'] ?>" class="text-decoration-none">
                    <div class="item">
                        <div class="team-member">
                            <div class="pro-pic">
                                <img class="img-fluid w-100 h-100" src="<?php echo 'admin./'.$row['image'] ?>" />
                            </div>
                            <div class="social-icon mb-3">
                                <i class="fa-solid fa-phone-volume"></i> &nbsp; <?php echo $row['phone'] ?>
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
            <?php endwhile; ?>
        
        </div>
    </div>
</section>