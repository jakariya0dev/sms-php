<?php 

    $sql4gallery = "SELECT * FROM `gallery`";
    $galleryResult = mysqli_query($conn, $sql4gallery) or die(mysqli_error($conn));

?>

<section id="gallery" data-aos="fade-up">
        
    <p class="title">ফটো গ্যালারি</p>

    <div class="photo-gallery">
        <div class="row row-cols-md-4 g-1">

        <?php while($row = mysqli_fetch_assoc($galleryResult)): ?>
            <div class="col">
                <div class="gallery-item">
                    <button  data-bs-toggle="modal" data-bs-target="<?php echo '#staticBackdrop'.$row['id'] ?>">
                        <img class="img-fluid w-100 h-100" src="<?php echo 'admin/'.$row['image'] ?>" alt="" />
                    </button>
                    
                </div>
            </div>

            <!-- Modal Start-->
            <div class="modal fade" id="<?php echo 'staticBackdrop'.$row['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5"><?php echo 'staticBackdrop'.$row['title'] ?></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img src="<?php echo 'admin/'.$row['image'] ?>" class="img-fluid">
                    </div>
                    
                    </div>
                </div>
            </div>

            <!-- Modal End-->
        <?php endwhile; ?>
        </div>
    </div>



        
</section>