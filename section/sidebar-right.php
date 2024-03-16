<?php

    $sql = "SELECT * FROM notice ORDER BY id LIMIT 5";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($con));
?>

    <div class="notice-board mb-5" data-aos="zoom-in">
        <p class="sidebar-header">নোটিশ বোর্ড</p>

        <?php if(mysqli_num_rows($result) > 0) : ?>
            
            <?php    while($row = mysqli_fetch_assoc($result)): ?>
                
                <div class="notice-item bg-secondary-subtle d-flex justify-content-between bg-white p-2 mb-1">
                    <div>
                        <p class="mb-0"><?php echo $row['title']?></p>
                        <p class="mb-0 text-black-50"><i>Date: <?php echo $row['date']?></i></p>
                    </div>
                </div>

            <?php endwhile; ?>
        <?php else: ?>
            <div class="notice-item bg-secondary-subtle d-flex justify-content-between bg-white p-2 mb-1">
                <div>
                    <p class="mb-0">No Notice Found</p>
                    <p class="mb-0 text-black-50">There is no notice. add new notice</p>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <p class="sidebar-header" data-aos="zoom-in">শিক্ষার্থী কর্নার</p>

    <div class="student-corner mb-5" data-aos="zoom-in">
        <div class="row row-cols-2 g-3">
            <div class="col">
                <div class="bg-info text-center p-4">
                    <i class="fa-solid fa-calendar-days display-5 mb-3"></i>
                    <p class="m-0">ক্লাস রুটিন</p>
                </div>
            </div>

            <div class="col">
                <div class="bg-info text-center p-4">
                    <i class="fa-solid fa-house display-5 mb-3"></i>
                    <p class="m-0">ক্লাস রুটিন</p>
                </div>
            </div>

            <div class="col">
                <div class="bg-info text-center p-4">
                    <i class="fa-solid fa-calendar-days display-5 mb-3"></i>
                    <p class="m-0">ক্লাস রুটিন</p>
                </div>
            </div>

            <div class="col">
                <div class="bg-info text-center p-4">
                    <i class="fa-solid fa-house display-5 mb-3"></i>
                    <p class="m-0">ক্লাস রুটিন</p>
                </div>
            </div>

            <div class="col">
                <div class="bg-info text-center p-4">
                    <i class="fa-solid fa-calendar-days display-5 mb-3"></i>
                    <p class="m-0">ক্লাস রুটিন</p>
                </div>
            </div>

            <div class="col">
                <div class="bg-info text-center p-4">
                    <i class="fa-solid fa-house display-5 mb-3"></i>
                    <p class="m-0">ক্লাস রুটিন</p>
                </div>
            </div>
        </div>
    </div>

    <p class="sidebar-header" data-aos="zoom-in">ডাউনলোড কর্নার</p>
    <div class="download-corner" data-aos="zoom-in">
        <div class="item bg-success text-white mb-2 d-flex justify-content-between align-items-center">
            <span class="me-auto">
                <i class="fa-solid fa-bars-progress"></i>
                &nbsp;বাংলা ইবুক
            </span>
            <i class="fa-solid fa-cloud-arrow-down"></i>
        </div>

        <div class="item bg-success text-white mb-2 d-flex justify-content-between align-items-center">
            <span class="me-auto">
                <i class="fa-solid fa-bars-progress"></i>
                &nbsp;বাংলা ইবুক
            </span>
            <i class="fa-solid fa-cloud-arrow-down"></i>
        </div>

        <div class="item bg-success text-white mb-2 d-flex justify-content-between align-items-center">
            <span class="me-auto">
                <i class="fa-solid fa-bars-progress"></i>
                &nbsp;বাংলা ইবুক
            </span>
            <i class="fa-solid fa-cloud-arrow-down"></i>
        </div>

        <div class="item bg-success text-white mb-2 d-flex justify-content-between align-items-center">
            <span class="me-auto">
                <i class="fa-solid fa-bars-progress"></i>
                &nbsp;বাংলা ইবুক
            </span>
            <i class="fa-solid fa-cloud-arrow-down"></i>
        </div>

        <div class="item bg-success text-white mb-2 d-flex justify-content-between align-items-center">
            <span class="me-auto">
                <i class="fa-solid fa-bars-progress"></i>
                &nbsp;বাংলা ইবুক
            </span>
            <i class="fa-solid fa-cloud-arrow-down"></i>
        </div>

        <div class="item bg-success text-white mb-2 d-flex justify-content-between align-items-center">
            <span class="me-auto">
                <i class="fa-solid fa-bars-progress"></i>
                &nbsp;বাংলা ইবুক
            </span>
            <i class="fa-solid fa-cloud-arrow-down"></i>
        </div>
    </div>

    <p class="sidebar-header" data-aos="zoom-in">জরুরি হটলাইন</p>
    <img src="./images/sidebar-img.jpg" class="img-fluid">