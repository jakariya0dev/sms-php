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
                <h4 class="mt-4">অফিস অ্যাড্রেসঃ</h4>
                <div style="color: wheat;">
                   <?php echo $contact_result['address'] ?> <br>
                </div>
            </div>

            <div class="col-md-4 mb-5">
                <p class="rounded-title text-black">গুরুত্বপূর্ণ লিংকস</p>
                <div class="footer-h-rule"></div>

                <div class="links">
                    <ul class="important-links">
                        <li><a href="http://www.pmo.gov.bd/" target="_blank">প্রধানমন্ত্রীর কার্যালয়</a></li>
                        <li><a href="https://bangabhaban.gov.bd/" target="_blank">রাষ্ট্রপতির কার্যালয়</a></li>
                        <li><a href="http://bris.lgd.gov.bd/pub/?pg=verify_br" target="_blank">জন্ম নিবন্ধন যাচাই</a></li>
                        <li><a href="https://www.mopa.gov.bd/" target="_blank">জনপ্রশাসন মন্ত্রণালয়</a></li>
                        <li><a href="https://bangldesh.gov.bd/" target="_blank">জাতীয় তথ্য বাতায়ন</a></li>
                        <li><a href="https://cabinet.gov.bd/" target="_blank">মন্ত্রীপরিষদ বিভাগ</a></li>
                        <li><a href="https://lgd.gov.bd/" target="_blank">স্থানীয় সরকার বিভাগ</a></li>
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
                <p><?php echo $ins_name_bn; ?></p>
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