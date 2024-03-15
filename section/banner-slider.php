<?php 

    $sql = "SELECT * FROM slider";
    $result = mysqli_query($conn, $sql);

?>

<section id="slider">
        

    <!-- Slider Start -->
    <div class="row">
        <div class="col-md-12">
            <div id="carouselExampleCaptions" class="carousel slide">
                
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true"></button>
                    <?php for($i = 1; $i <= mysqli_num_rows($result); $i++): ?>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $i ?>"></button>
                    <?php endfor; ?>
                </div>

                <div class="carousel-inner">
                    

                    <?php $i=1; while($row = mysqli_fetch_assoc($result)): ?>
                    <div class="carousel-item <?php echo $i==1 ? 'active' : ''; $i++; ?>">
                        <img src="<?php echo './../admin/'.$row['image'] ?>" class="d-block w-100 h-100"/>
                        <div class="carousel-caption d-none d-md-block">
                            <h5><?php echo $row['title'] ?></h5>
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
    <div class="bg-primary-dark text-white my-3 px-2">
        <div class="row">
            <div class="col-auto pt-2">বিশেষ বিজ্ঞপ্তিঃ</div>
            <div class="col w-100 pt-2">
                <marquee behavior="" direction="">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Soluta blanditiis optio non eveniet id, perferendis quam, at
                    officiis et facilis quisquam earum exercitationem accusamus eos
                    nesciunt natus nobis aut tenetur!</marquee>
            </div>
        </div>
    </div>
    <!-- Breaking News End-->
       
    </section>