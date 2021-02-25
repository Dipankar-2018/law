<?php

session_start();

$user =  $_SESSION['user'];
if ($user == true) {
} else {
    header('location:login.php');
}

?>
<?php include './includes/side_nav.php'; ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-database"></i> DataTables of President.</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="president.php">President</a></li>
                        <li class="breadcrumb-item active">DataTables</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <?php

    $result = $conn->query("SELECT * FROM  `president`");
    ?>


    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <!-- <h3 class="card-title"> <i class="fas fa-edit"></i> You can go back to the IQAC update section by click notice button on right</h3> -->
                        <a href="president_excel.php" class="btn btn-primary">Download Full Excel</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>

                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Booth Center</th>                  
                                    <th>Constituency</th> 
                                    <th>Delete</th>                        
                                </tr>
                            </thead>
                          
                                <tbody>
                                <?php while ($row = $result->fetch_assoc()) : ?>
                                    <tr>
                                        <td><?php echo $row['PRESIDENT_ID']; ?></td>
                                        <td><?php echo $row['PRESIDENT_NAME']; ?></td>
                                        <td><?php echo $row['PRESIDENT_PHONE']; ?></td>
                                        <td><?php echo $row['PRESIDENT_BOOTH_CENTRE']; ?></td>
                                        <td><?php echo $row['PRESIDENT_CONSTITUENCY']; ?></td>  
                                        <td><a href="backend/president_delete.php?id=<?php echo $row['PRESIDENT_ID']; ?>" class="btn btn-danger">Delete</a></td>                                     

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




    <!-- /.content -->
</div>


<?php include './includes/footer.php'; ?>