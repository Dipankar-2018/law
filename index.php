<?php

session_start();

$user =  $_SESSION['user'];
if ($user == true) {
} else {
    header('location:login.php');
}

?>
<?php include './includes/side_nav.php'; ?>

<?php

$query = "SELECT * FROM user WHERE email = '$user_profile'";

$data = mysqli_query($conn, $query);

$total = mysqli_num_rows($data);

$result = mysqli_fetch_assoc($data);

$id = $_SESSION['id'] = $result['id'];
?>


<?php

$about_query = "SELECT * FROM profile WHERE USER_ID = '$id'";

$about_data = mysqli_query($conn, $about_query);


$about_result = mysqli_fetch_assoc(($about_data));


?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                    <h1 class="m-0 text-dark"> Welcome :<i> <?php echo $result['user_name']; ?> </i> </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3> <?php echo date("l") ?></h3>

                            <p> <?php echo date("l jS \of F Y") ?></p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-cloud-sun"></i>
                        </div>
                        <?php if($user_type != admission): ?>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        <?php endif;     ?>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>Volunteer</h3>

                            <p>View and Download</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <?php if($user_type != admission): ?>
                        <a href="volunteer.php" class="small-box-footer">Click Here <i class="fas fa-arrow-circle-right"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>President</h3>

                            <p>View and Download </p>
                        </div>
                        <div class="icon">
                            <i class="far fa-newspaper"></i>
                        </div>
                        <?php if($user_type != admission): ?>
                        <a href="president.php" class="small-box-footer">Click Here<i class="fas fa-arrow-circle-right"></i></a>
                        <?php endif;?>

                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>Gallery</h3>

                            <p>View and Download</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                       
                        <a href="gallary.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                     
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
     




            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>



<?php include './includes/footer.php'; ?>