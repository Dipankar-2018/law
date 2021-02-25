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
                    <h1><i class="fas fa-database"></i> Full Excel Sheet.</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="volunteer.php">Volunteer</a></li>
                        <li class="breadcrumb-item active">DataTables</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <?php

    $result = $conn->query("SELECT * FROM volunteer");
    ?>



    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><button class="btn btn-primary" onclick="exportTableToExcel('tblData', 'members-data')"> <i class="fas fa-edit"></i> Export Table Data To Excel File</button></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" id="tblData">
                    <table class="table table-bordered table-striped">
                            <thead>
                                <tr>

                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Booth Center</th>                  
                                    <th>Address</th>                         
                                </tr>
                            </thead>
                          
                                <tbody>
                                <?php while ($row = $result->fetch_assoc()) : ?>
                                    <tr>
                                        <td><?php echo $row['VOLUNTEER_ID']; ?></td>
                                        <td><?php echo $row['VOLUNTEER_NAME']; ?></td>
                                        <td><?php echo $row['VOLUNTEER_PHONE']; ?></td>
                                        <td><?php echo $row['VOLUNTEER_BOOTH_CENTRE']; ?></td>
                                        <td><?php echo $row['VOLUNTEER_ADDRESS']; ?></td>                                       

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




<script>



function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}

</script>

<?php include './includes/footer.php'; ?>