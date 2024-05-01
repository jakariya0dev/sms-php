<?php 
    
    include_once("config.php");
    $sql4achievement = "SELECT * FROM `achievement`";
    $achievement = mysqli_query($conn, $sql4achievement) or die('Query Error!');
    
?>

<section id="achievements">
    
        <p class="title">আমাদের অর্জন</p>

        <div class="row mb-5 mb-md-0" data-aos="fade-up">
            <div class="col-md-6">
                <div class="achievement-img">
                    <img id="achievementImage" class="img-fluid w-100 h-100" src="<?php echo 'admin/'.mysqli_fetch_assoc($achievement)['image'] ?>" alt="" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="accordion accordion-flush" id="accordionExample">
                    
                <?php $i = 1; foreach($achievement as $row): ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button onclick="changeImage('<?php echo $row['image'] ?>')" class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="<?php echo '#achievement'.$row['id'] ?>" aria-expanded="true" aria-controls="<?php echo 'achievement'.$row['id'] ?>">
                                <?php echo $row['title'] ?>
                            </button>
                        </h2>
                        <div id="<?php echo 'achievement'.$row['id'] ?>" class="accordion-collapse collapse <?php echo $i == 1 ? 'show' : '' ?>" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <?php echo $row['description'] ?>
                            </div>
                        </div>
                    </div>
                <?php $i++; endforeach; ?>
                </div>
            </div>
        </div>
</section>

<script>
    function changeImage(imageSrc){

        document.querySelector('#achievementImage').src = 'admin/'+imageSrc;
        // alert(imageSrc);
    }
</script>