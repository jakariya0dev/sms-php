<?php 

    $sql4video = "SELECT * FROM `video_gallery`";
    $galleryResult = mysqli_query($conn, $sql4video) or die(mysqli_error($conn));

?>

<section id="gallery" data-aos="fade-up">
        
    <p class="title">ভিডিও গ্যালারি</p>

    <div class="photo-gallery mb-5">
        <div class="row row-cols-md-2 ">

        <?php while($row = mysqli_fetch_assoc($galleryResult)): ?>
            <div class="col">
                <div class="item g-1 overflow-hidden">

                    <iframe width="100%" height="315" src="<?php echo $row['link'] ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

                </div>
            </div>

        <?php endwhile; ?>
        </div>
    </div>

</section>
