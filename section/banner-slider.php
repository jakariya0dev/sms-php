<?php 

    $sql = "SELECT * FROM slider";
    $result = mysqli_query($conn, $sql);

?>

<section id="slider">
        

    <!-- Slider Start -->
    <div class="row">
        <div class="col-md-12">
            <div id="carouselExampleCaptions" class="carousel slide carousel-fade bg-primary" data-bs-ride="carousel">
                
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true"></button>
                    <?php for($i = 1; $i <= mysqli_num_rows($result); $i++): ?>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $i ?>"></button>
                    <?php endfor; ?>
                </div>

                <div class="carousel-inner">
                    

                    <?php $i=1; while($row = mysqli_fetch_assoc($result)): ?>
                    <div class="carousel-item <?php echo $i==1 ? 'active' : ''; $i++; ?>">
                        <img src="<?php echo './../admin/'.$row['image'] ?>" class="d-block w-100 h-100 banner-img"/>
                        <div class="carousel-caption d-none d-md-block">
                            <h2><?php echo $row['title'] ?></h5>
                            <p><?php echo $row['subtitle'] ?></p>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
    <!-- Slider End -->

    <!-- Breaking News Start-->
    <div class="container">
        <div class="row my-3">
            <div class="col-auto d-inline-block pt-2 breaking-title">বিশেষ বিজ্ঞপ্তি</div>
            <div class="col pt-2 grey-light">
                <marquee>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Soluta blanditiis optio non eveniet id, perferendis quam, at
                    officiis et facilis quisquam earum exercitationem accusamus eos
                    nesciunt natus nobis aut tenetur!
                </marquee>
            </div>
        </div>
    </div>
    <!-- Breaking News End-->
       
</section>