<?php
   ob_start();
   session_start();

	if(isset($_SESSION["password"]))
	{}
else
{
	
   echo 'Wait Redirecting to login';
	 header('Refresh: 1; URL = login.php');
	 die();
}

?>



<?php include 'pagetop.php'?>

  <!-- Main Sidebar Container -->
<?php include 'MainSideBar.php';
error_reporting(E_ERROR | E_PARSE);
?>
  <!-- Content Wrapper. Contains page content -->



  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><a href="logout" >Logout</a></li>
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

    <div class="col-12">
           
           <div class="card">
             <div class="card-header">
               <h3 class="card-title">
			   <form  method="get" action="#">
				  <label for="birthday">Select Date:</label>
				  <input type="date" id="date" name="date">
				  <input type="submit">
				</form>
			   </h3>
             </div>
             <!-- /.card-header -->
             <div class="card-body">
               <table id="example1" class="table table-bordered table-striped">
                 <thead>
                 <tr>
                   <th>SNO</th>
                   <th>Name</th>
                   <th>RFID</th>
                   <th>Balance</th>
                   <th>Action</th>
                 </tr>
                 </thead>
                 <tbody>
                <?php
                include 'conn.php';
                $sql = "SELECT * FROM `user` ORDER BY `name` DESC;";
				//echo($sql);
                $result = $conn->query($sql);
                if ($result->num_rows > 0) 
				{
                  $sno = 1;
                  while($row = $result->fetch_assoc()) {
			
					//echo($sql);
                    echo("
						<tr>
						<form mathod=\"get\" action=\"userdetails\">
						<td>$sno</td>
						<td>" . $row['name']. "</td>
						<td class = \"id\">" . $row	['rfid'] . "</td>
						<td>" .$row['balance']. "</td>
						<input name=\"d_id\" value=\"" . $row['rfid'] . "\" type=\"hidden\">
						<td><button type=\"submit\" class=\"btn btn-primary row-address\">Show</button></td>  </form>
						</tr>
						");
						$sno = $sno + 1;
                  }
                }

				function secToHR($seconds) {
					$hours = floor($seconds / 3600);
					$minutes = floor(($seconds / 60) % 60);
					$seconds = $seconds % 60;
					return "$hours:$minutes:$seconds";
				}				
                ?>

                 </tbody>
                 <tfoot>
                 <tr>
                   <th>SNO</th>
                   <th>Name</th>
                   <th>RFID</th>
                   <th>Balance</th>
                   <th>Action</th>
                 </tr>
                 </tfoot>
               </table>
             </div>
             <!-- /.card-body -->
           </div>
           <!-- /.card -->
         </div>

    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


 <!-- /.content-wrapper -->
 
<?php include 'footer.php';?>

  <!-- Control Sidebar -->
<?php include 'controlSidebar.php';?>+
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": true,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    // $('#example2').DataTable({
    //   "paging": true,
    //   "lengthChange": false,
    //   "searching": false,
    //   "ordering": true,
    //   "info": true,
    //   "autoWidth": false,
    //   "responsive": true,
    // });
  });

  $(".row-address").click(function() {
    var $row = $(this).closest("tr");    // Find the row

    console.log($row.find('.id').text());


    // var $tds = $row.find("td");
    // $.each($tds, function() {
    //     console.log($(this).text());
    // });
    
});
</script>
</body>
</html>
