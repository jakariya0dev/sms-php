<?php 

    $sql4gallery = "SELECT * FROM `gallery`";
    $galleryResult = mysqli_query($conn, $sql4gallery) or die(mysqli_error($conn));

?>

<section id="gallery data-aos="fade-up">
        
    <p class="title">ফটো গ্যালারি</p>

    <div class="photo-gallery">
        <div class="row row-cols-4 g-1">

        <?php while($row = mysqli_fetch_assoc($galleryResult)): ?>
            <div class="col">
                <div class="gallery-item">
                    <img class="img-fluid w-100 h-100" src="<?php echo 'admin/'.$row['image'] ?>" alt="" />
                </div>
            </div>
        <?php endwhile; ?>
        </div>
    </div>
        
</section>