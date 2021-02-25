<?php

session_start();

$user =  $_SESSION['user'];
if ($user == true) {
} else {
    header('location:login.php');
}

?>
<?php include './includes/side_nav.php'; ?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Photo Gallary:</h1>                    
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Gallary</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->


    <div class="container">


        <!-- right column -->
        <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title text-darker">
                       PLEASE COMPRESS IMAGES BEFORE POSTING IT: <a href="https://tinypng.com/" target="_blank"><button class="ui green small button">COMPRESS HERE </button></a>
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <form action="backend/gallary.php" method="POST" enctype="multipart/form-data" role="form">                 
                    <div class="form-group">
                            <label>Image Title</label>
                            <input class="form-control" type="text" name="title" placeholder="Image Title">
                        
                        </div>      
                        
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="photo" required>
                                <label class="custom-file-label" for="customFile">Choose Photo</label>
                            </div>
                        </div>  
                                      
                    
                        <input type="submit" name="gallary" class="ui primary button" value="Submit">
                </div>
                </form>
              
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>



    <!-- Gallary SEction ------------------------------------------------------------------------------------->
<?php 

$result = $conn->query("SELECT * FROM gallery");



?>

<section class="gallery-block grid-gallery">
            <div class="container">
                <div class="heading">
                    <h2>Gallery</h2>
                </div>
                <div class="row">
                    <?php while($row = $result->fetch_assoc()): ?>
                    <div class="col-md-6 col-lg-4 item">
                        <a class="lightbox" href="doc/gallary/<?php echo $row['IMAGE_URL']?>">
                            <img class="img-fluid image scale-on-hover" src="doc/gallary/<?php echo $row['IMAGE_URL'] ?>">
                           
                        </a>
                    <a href="backend/gallary.php?id=<?php echo $row['GALLERY_ID']?>"><button class="btn btn-danger mt-2">Delete</button></a>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>


</div>


<!-- /.content -->
</div>

<?php include './includes/footer.php'; ?>