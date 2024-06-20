<?php

    $notice_sql = "SELECT * FROM `notice` ORDER BY id LIMIT 5";
    $notice = mysqli_query($conn, $notice_sql) or die(mysqli_error($con));

    $academic_sql = "SELECT * FROM `academic` ORDER BY id LIMIT 5";
    $academic = mysqli_query($conn, $academic_sql) or die(mysqli_error($con));

?>

    <div class="notice-board mb-5" data-aos="zoom-in">
        <p class="sidebar-header">নোটিশ বোর্ড</p>

        <?php if(mysqli_num_rows($notice) > 0) : ?>
            
            <?php    while($row = mysqli_fetch_assoc($notice)): ?>
                
                <div class="notice-item bg-secondary-subtle d-flex justify-content-between bg-white p-2 mb-1">
                    <a href="<?php echo 'notice.php?id='.$row['id'] ?>" class="text-decoration-none">
                        <div>
                            <p class="mb-0 nb-title"><?php echo $row['title']?></p>
                            <p class="mb-0 text-black-50"><i>Date: <?php echo $row['date']?></i></p>
                        </div>
                    </a>
                </div>

            <?php endwhile; ?>
        <?php else: ?>
            <div class="notice-item bg-secondary-subtle d-flex justify-content-between bg-white p-2 mb-1">
                <div>
                    <p class="mb-0">No Notice Found</p>
                </div>
            </div>
        <?php endif; ?>

        <div class="text-end">
            <div class="hr-rule"></div>
            <p class="sidebar-see-all d-inline-block py-1 px-4">
                <a href="notice-list.php" class="text-decoration-none text-black">সব নোটিশ</a>
            </p>
        </div>
    </div>

    <p class="sidebar-header" data-aos="zoom-in"> নাগরিক সেবা </p>

    <div class="student-corner mb-5" data-aos="zoom-in">
        <div class="row row-cols-2 g-3">
            <div class="col">
                <a href="#" class="text-decoration-none text-dark">
                    <div class="sc-item">
                        <i class="fa-solid fa-book display-6 mb-3"></i>
                        <p class="m-0 sidebar-link"> ট্রেড লাইসেন্স</p>
                    </div>
                </a>
                
            </div>

            <div class="col">
                <a href="#" class="text-decoration-none text-dark">
                    <div class="sc-item">
                        <i class="fa-solid fa-pen-nib display-6 mb-3"></i>
                        <p class="m-0 sidebar-link">প্রত্যয়ন পত্র</p>
                    </div>
                </a>
            </div>

            <div class="col">
                <a href="#" class="text-decoration-none text-dark">
                    <div class="sc-item">
                        <i class="fa-solid fa-user-tie display-6 mb-3"></i>
                        <p class="m-0 sidebar-link">ওয়ারিশ সনদ</p>
                    </div>
                </a>
            </div>

            <div class="col">
                <a href="#" class="text-decoration-none text-dark">
                    <div class="sc-item">
                        <i class="fa-solid fa-calendar-days display-6 mb-3"></i>
                        <p class="m-0 sidebar-link">চারিত্রিক সনদ</p>
                    </div>
                </a>
            </div>

            <div class="col">
                <a href="#" class="text-decoration-none text-dark">
                    <div class="sc-item">
                        <i class="fa-solid fa-person-chalkboard display-6 mb-3"></i>
                        <p class="m-0 sidebar-link">নাগরিক আবেদন</p>
                    </div>
                </a>
            </div>

            <div class="col">
                <a href="#" class="text-decoration-none text-dark">
                    <div class="sc-item">
                        <i class="fa-solid fa-address-card display-6 mb-3"></i>
                        <p class="m-0 sidebar-link">ইমারত আবেদন</p>
                    </div>
                </a>
            </div>

        </div>
    </div>

    <p class="sidebar-header" data-aos="zoom-in">জাতীয় সংগীত</p>
    <iframe data-aos="zoom-in" class="mb-5" width="100%" height="200" src="https://www.youtube-nocookie.com/embed/ywiu2FF9liA?si=Tcw2KWFXthRNzNUL" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

    <p class="sidebar-header" data-aos="zoom-in">ফেইসবুক পেইজ</p>
    <iframe data-aos="zoom-in" class="mb-5" src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fbrainstorm21.bd&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="100%" height="300" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>

    <p class="sidebar-header" data-aos="zoom-in">জরুরি হটলাইন</p>
    <img data-aos="zoom-in" src="./images/sidebar-img.jpg" class="img-fluid">