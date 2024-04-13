<?php 
  
    include_once 'config.php';
  
    $id = $_GET['id'];
    $sql = "SELECT * FROM teacher WHERE `id` = $id";
    $teacher = mysqli_query($conn, $sql) or die(mysqli_error($con));
    $teacher = mysqli_fetch_assoc($teacher);

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Bootstrap demo</title>

        <?php include_once './section/header-links.php' ?>
    </head>

    <body>
        
        <div style="width: 75%; margin:auto">
            <div class="container-fluid bg-white">

                <!-- Header with Nav Start -->
                <?php include_once './section/header-section.php' ?>
                <!-- Header with Nav End -->

                <nav aria-label="breadcrumb" class="mt-4 position-static">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none">হোম</a></li>
                        <li class="breadcrumb-item"><a href="teacher-list.php" class="text-decoration-none">শিক্ষক তালিকা</a></li>
                        <li class="breadcrumb-item active" aria-current="page">শিক্ষক</li>
                    </ol>
                </nav>

                <div class="row">

                    <div class="col-md-9">
                        <div class="mt-2">
                                
                            <div class="card mb-3">
                                <div class="row gx-3">
                                    <div class="col-md-4">
                                        <img class="img-fluid w-100 p-3" src="<?php echo 'admin/'.$teacher['image']?>" alt="Profile Picture" style="height: 220px;">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="d-flex flex-column justify-content-center h-100">
                                            <p class="card-title display-6"><?php echo $teacher['name']?></p>
                                            <h4 class="card-text"><?php echo $teacher['designation']?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                
                            <table class="table m-2">
                                
                                <tbody>
                                    <tr>
                                        <th scope="row">Email</th>
                                        <td>:&nbsp; <?php echo $teacher['email']?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Phone</th>
                                        <td>:&nbsp; <?php echo $teacher['phone']?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Index-Number</th>
                                        <td>:&nbsp; <?php echo $teacher['index_number']?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Qualification</th>
                                        <td>:&nbsp; <?php echo $teacher['qualification']?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Department</th>
                                        <td>:&nbsp; <?php echo $teacher['department']?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Blood-Group</th>
                                        <td>:&nbsp; <?php echo $teacher['blood_group']?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Birth-Date</th>
                                        <td>:&nbsp; <?php echo $teacher['birth_date']?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Joining-Date</th>
                                        <td>:&nbsp; <?php echo $teacher['joining_date']?></td>
                                    </tr>
                                </tbody>

                                <tfoot>
                                        <tr>
                                        <th scope="row">Present-Address</th>
                                        <td>:&nbsp; <?php echo $teacher['present_address']?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Permanent-Address</th>
                                        <td>:&nbsp; <?php echo $teacher['permanent_address']?></td>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                        
                    </div>

                    <div class="col-md-3">
                        <?php include_once './section/sidebar-right.php' ?>
                    </div>
                </div>


                <!-- Footer Section START  -->
                <?php include_once './section/footer-section.php' ?>
                <!-- Footer Section END  -->

            </div>
        </div>
  
        <?php include_once './section/footer-links.php' ?>

    </body>

</html>