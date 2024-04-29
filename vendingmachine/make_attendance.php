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





<?php header('Access-Control-Allow-Origin: *'); ?>
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
               <form action="http://192.168.0.10:4444" method="post" enctype="multipart/form-data">
			   <label for="birthday">Select Month:</label>
				  <input type="date" id="date" name="date"><br>1
				  <input type="date" id="date1" name="date1"><br>
			  Select image to upload:
			  <input type="file" name="file" id="file">
			  <input type="submit" value="upload" name="submit">
			</form>
<div class="jumbotron" style="margin-top:20px;padding:20px;">    
    <p><span id="errorMsg"></span></p>    
    <div class="row">    
        <div class="col-lg-6">    
            <!-- Here we streaming video from webcam -->    
            <h4>    
                Video coming from Webcam  <button class="btn btn-primary" id="btnCapture">Capture to Canvas >></button>    
            </h4>    
            <video id="video" playsinline autoplay></video>    
        </div>    
    
        <div class="col-lg-6">    
            <h4>    
                Captured image from Webcam <input type="button" class="btn btn-primary" id="btnSave" name="btnSave" value="Save the canvas(image) to server" />    
            </h4>    
            <!-- Webcam video snapshot -->    
            <canvas style="border:solid 1px #ddd;background-color:white;" id="canvas" width="475" height="475"></canvas>    
        </div>    
    </div>    
</div> 


<form method="post" action="http://localhost:4444"  onsubmit="prepareImg();">
  <input id="inp_img" name="file" type="hidden" value="">
  <input id="name" name="file" type="hidden" value="nikhil">
  <input id="bt_upload" type="submit" value="Upload">
</form>
<button onclick = "prepareImg();"></button>
			   
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

<script>
    
  var canvas = document.getElementById('canvas');
  var context = canvas.getContext('2d');

  context.arc(100, 100, 50, 0, 2 * Math.PI);
  context.lineWidth = 5;
  context.fillStyle = '#EE1111';
  context.fill();	
  context.strokeStyle = '#CC0000';
  context.stroke();
	
	
  function prepareImg() {
     var canvasimg = document.getElementById('canvas');
	 console.log(canvasimg.toDataURL());
     document.getElementById('inp_img').value = canvasimg.toDataURL();
  }
  
</script>

<!-- Page specific script -->
<script type="text/javascript">  
    var video = document.querySelector("#video");  
  
    // Basic settings for the video to get from Webcam  
    const constraints = {  
        audio: false,  
        video: {  
            width: 475, height: 475  ,
			facingMode: "environment"
        }  ,
		advanced: [{
            facingMode: "environment"
        }]
    };  
  
    // This condition will ask permission to user for Webcam access  
    if (navigator.mediaDevices.getUserMedia) {  
        navigator.mediaDevices.getUserMedia(constraints)  
            .then(function (stream) {  
                video.srcObject = stream;  
            })  
            .catch(function (err0r) {  
                console.log("Something went wrong!");  
            });  
    }  
  
    function stop(e) {  
        var stream = video.srcObject;  
        var tracks = stream.getTracks();  
  
        for (var i = 0; i < tracks.length; i++) {  
            var track = tracks[i];  
            track.stop();  
        }  
        video.srcObject = null;  
    }  
</script>  
  
<script type="text/javascript">  
    // Below code to capture image from Video tag (Webcam streaming)  
    $("#btnCapture").click(function () {  
        var canvas = document.getElementById('canvas');  
        var context = canvas.getContext('2d');  
  
        // Capture the image into canvas from Webcam streaming Video element  
        context.drawImage(video, 0, 0);  
    });  
  
    // Upload image to server - ajax call - with the help of base64 data as a parameter  
    $("#btnSave").click(function () {  
  
        // Below new canvas to generate flip/mirron image from existing canvas  
        var destinationCanvas = document.createElement("canvas");  
        var destCtx = destinationCanvas.getContext('2d');  
  
  
        destinationCanvas.height = 500;  
        destinationCanvas.width = 500;  
  
        destCtx.translate(video.videoWidth, 0);  
        destCtx.scale(-1, 1);  
        destCtx.drawImage(document.getElementById("canvas"), 0, 0);  
  
        // Get base64 data to send to server for upload  
        var imagebase64data = destinationCanvas.toDataURL("image/png");  
        imagebase64data = imagebase64data.replace('data:image/png;base64,', '');  
        $.ajax({  
            type: 'POST',  
            url: 'http://localhost:4444',  
            data: '{ "imageData" : "' + imagebase64data + '" }',  
            contentType: 'application/json; charset=utf-8',  
            dataType: 'text',  
            success: function (out) {  
                alert('Image uploaded successfully..');  
            }  
        });  
    });  
</script>

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
