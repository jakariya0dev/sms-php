<?php 

    include_once("config.php");

    $contact_sql = "SELECT * FROM `contact` WHERE id = 1";
    $contact_result = mysqli_query($conn, $contact_sql);
    $contact_result = mysqli_fetch_assoc($contact_result);

?>

<section id="#footer">
    <footer class="container">
        <div class="row p-5 text-white">

            <div class="col-md-4 mb-5">
                <p class="rounded-title text-black">যোগাযোদের তথ্য</p>
                <div class="footer-h-rule "></div>
                <div style="color: wheat;">
                    ইমেইল: <?php echo $contact_result['email'] ?> <br>
                    ফোন: <?php echo $contact_result['phone'] ?> <br>
                </div>
                <h4 class="mt-4">ঠিকানাঃ</h4>
                <div style="color: wheat;">
                   <?php echo $contact_result['address'] ?> <br>
                </div>
            </div>

            <div class="col-md-4 mb-5">
                <p class="rounded-title text-black">গুরুত্বপূর্ণ লিংকস</p>
                <div class="footer-h-rule"></div>

                <div class="links">
                    <ul class="important-links">
                        <li><a href="https://muktopaath.gov.bd/" target="_blank">মুক্তপাঠ</a></li>
                        <li><a href="https://www.teachers.gov.bd/" target="_blank">শিক্ষক বাতায়ন</a></li>
                        <li><a href="https://rajshahieducationboard.gov.bd/" target="_blank">রাজশাহী শিক্ষা বোর্ড</a></li>
                        <li><a href="https://dshe.gov.bd/" target="_blank">মাধ্যমিক ও উচ্চশিক্ষা অধিদপ্তর</a></li>
                        <li><a href="http://www.educationboardresults.gov.bd/" target="_blank">শিক্ষা বোর্ড রেজাল্ট</a></li>
                        <li><a href="https://bangldesh.gov.bd/" target="_blank">বাংলাদেশ জাতীয় তথ্য বাতায়ন</a></li>
                        <li><a href="https://banbeis.gov.bd/" target="_blank">বাংলাদেশ শিক্ষাতথ্য ও পরিসংখ্যান ব্যুরো (ব্যানবেইস)</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-4 mb-5">
                <p class="rounded-title text-black">গুগল ম্যাপ</p>
                <div class="footer-h-rule"></div>
                <iframe src="<?php echo $contact_result['map'] ?>" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

        </div>

        <div class="row text-center bg-primary-dark text-white px-3 pt-5">
            <div class="col-md-6 text-center text-md-start">
                কপিরাইট © <?php echo date("Y"); ?> সর্বস্বত্ব সংরক্ষিত <br>
                <p><?php echo $institute_name_bn; ?></p>
            </div>
            <div class="col-md-6 text-center text-md-end">
                কারিগরি সহযোগিতায় <br>
                <a href="<?php echo $dev_company_web; ?>" class="text-decoration-none" style="color: wheat">
                    <h5><?php echo $dev_company_name_bn; ?></h5>
                </a>
            </div>
        </div>

    </footer>
</section>