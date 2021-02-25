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
                    <h1>Upload Youtube Videos</h1>                    
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="youtube.php">Home</a></li>
                        <li class="breadcrumb-item active">Youtube</li>
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
                        Please insert youtube video link
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <form action="backend/youtube.php" method="POST">                 
                        <div class="form-group">  
                            <label>Video Title</label>                         
                            <input type="text" class="form-control" placeholder="Youtube video Title" name="title">
                        </div>   
                        <div class="form-group">     
                        <label>Video Link</label>                       
                            <input type="text" class="form-control" placeholder="Youtube video link" name="link">
                        </div>                     
                    
                        <input type="submit" name="youtube" class="ui primary button" value="Submit">
                </div>
                </form>
              
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>




    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"> <i class="fas fa-edit"></i> Delete Videos</h3>
                       
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>

                                    <th>id</th>
                                    <th>Video Title</th>
                                    <th>Video Link</th>
                                    <th>Delete</th>                 
                                                    
                                </tr>
                            </thead>
                          
                            <?php

                                $result = $conn->query("SELECT * FROM  `videos`");
                                ?>


                                <tbody>
                                <?php while ($row = $result->fetch_assoc()) : ?>
                                    <tr>
                                        <td><?php echo $row['VIDEO_ID']; ?></td>
                                        <td><?php echo $row['VIDEO_URL']; ?></td>
                                        <td><?php echo $row['VIDEO_TITLE']; ?></td>                                     
                                        <td><a href="backend/youtube_delete.php?id=<?php echo $row['VIDEO_ID']; ?>" class="btn btn-danger">Delete</a></td>                                     

                                    </tr>
                             <?php endwhile; ?>


                                </tbody>

                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>




</div>


<!-- /.content -->
</div>

<?php include './includes/footer.php'; ?>