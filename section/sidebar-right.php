<?php

    $sql = "SELECT * FROM notice ORDER BY id LIMIT 5";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($con));

?>

    <div class="notice-board mb-5" data-aos="zoom-in">
        <p class="sidebar-header">নোটিশ বোর্ড</p>

        <?php if(mysqli_num_rows($result) > 0) : ?>
            
            <?php    while($row = mysqli_fetch_assoc($result)): ?>
                
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

    <p class="sidebar-header" data-aos="zoom-in">ডাউনলোড কর্নার</p>

    <div class="student-corner mb-5" data-aos="zoom-in">
        <div class="row row-cols-2 g-3">
            <div class="col">
                <div class="bg-info text-center p-4">
                    <i class="fa-solid fa-calendar-days display-5 mb-3"></i>
                    <p class="m-0 sidebar-link">বাংলা ইবুক</p>
                </div>
            </div>

            <div class="col">
                <div class="bg-info text-center p-4">
                    <i class="fa-solid fa-house display-5 mb-3"></i>
                    <p class="m-0 sidebar-link">ইংরেজি ইবুক</p>
                </div>
            </div>

            <div class="col">
                <div class="bg-info text-center p-4">
                    <i class="fa-solid fa-calendar-days display-5 mb-3"></i>
                    <p class="m-0 sidebar-link">নোটিশ</p>
                </div>
            </div>

            <div class="col">
                <div class="bg-info text-center p-4">
                    <i class="fa-solid fa-house display-5 mb-3"></i>
                    <p class="m-0 sidebar-link">শিক্ষক তালিকা</p>
                </div>
            </div>

        </div>
    </div>

    <p class="sidebar-header" data-aos="zoom-in">শিক্ষার্থী কর্নার</p>
    <div class="download-corner mb-5" data-aos="zoom-in">
        <div class="item bg-success text-white mb-2 d-flex justify-content-between align-items-center">
            <span class="me-auto">
                <i class="fa-solid fa-bars-progress"></i>
                &nbsp;একাডেমিক ক্যালেন্ডার
            </span>
            <i class="fa-solid fa-cloud-arrow-down"></i>
        </div>

        <div class="item bg-success text-white mb-2 d-flex justify-content-between align-items-center">
            <span class="me-auto">
                <i class="fa-solid fa-bars-progress"></i>
                &nbsp;ক্লাস রুটিন
            </span>
            <i class="fa-solid fa-cloud-arrow-down"></i>
        </div>

        <div class="item bg-success text-white mb-2 d-flex justify-content-between align-items-center">
            <span class="me-auto">
                <i class="fa-solid fa-bars-progress"></i>
                &nbsp;এক্সাম রুটিন
            </span>
            <i class="fa-solid fa-cloud-arrow-down"></i>
        </div>

        <div class="item bg-success text-white mb-2 d-flex justify-content-between align-items-center">
            <span class="me-auto">
                <i class="fa-solid fa-bars-progress"></i>
                &nbsp;সিলেবাস
            </span>
            <i class="fa-solid fa-cloud-arrow-down"></i>
        </div>

        <div class="item bg-success text-white mb-2 d-flex justify-content-between align-items-center">
            <span class="me-auto">
                <i class="fa-solid fa-bars-progress"></i>
                &nbsp;অভিভাবক গাইডলাইন
            </span>
            <i class="fa-solid fa-cloud-arrow-down"></i>
        </div>

        <div class="item bg-success text-white mb-2 d-flex justify-content-between align-items-center">
            <span class="me-auto">
                <i class="fa-solid fa-bars-progress"></i>
                &nbsp;ড্রেস কোড
            </span>
            <i class="fa-solid fa-cloud-arrow-down"></i>
        </div>
        <div class="item bg-success text-white mb-2 d-flex justify-content-between align-items-center">
            <span class="me-auto">
                <i class="fa-solid fa-bars-progress"></i>
                &nbsp;লেসন প্লান
            </span>
            <i class="fa-solid fa-cloud-arrow-down"></i>
        </div>
        <div class="item bg-success text-white mb-2 d-flex justify-content-between align-items-center">
            <span class="me-auto">
                <i class="fa-solid fa-bars-progress"></i>
                &nbsp;কোড অব কন্ডাক্ট
            </span>
            <i class="fa-solid fa-cloud-arrow-down"></i>
        </div>
    </div>

    <p class="sidebar-header" data-aos="zoom-in">জাতীয় সংগীত</p>
    <iframe class="mb-5" width="100%" height="200" src="https://www.youtube-nocookie.com/embed/ywiu2FF9liA?si=Tcw2KWFXthRNzNUL" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

    <p class="sidebar-header" data-aos="zoom-in">ফেইসবুক পেইজ</p>
    <iframe class="mb-5" src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fbrainstorm21.bd&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="100%" height="300" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>

    <p class="sidebar-header" data-aos="zoom-in">জরুরি হটলাইন</p>
    <img src="./images/sidebar-img.jpg" class="img-fluid">