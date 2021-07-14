<?php

$nama = $_POST['nama'];
$jabatan = $_POST['jabatan'];
$phone = $_POST['phone'];

// buka
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    // echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  // echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  // echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    echo "<p>Silahkan capture dan simpan gambar</p>";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
$gambar = htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]));
// tutup

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <script src="jquery.min.js"></script>    
    <script src="html2canvas.js"></script> 
    <title>Templage Generator</title>
</head>
<style>
*{font-family: 'Poppins', sans-serif;}
.background{
    background-image:url("fix.svg");
    background-repeat:no-repeat;
}
.nama{
    font-family: 'Poppins', sans-serif;
    margin-top:-12rem;
    font-size:20px;
    font-weight:bold;
    margin-left:10rem;
    font-weight:bold;
}
.preview{
    margin-top:0;
}
.penutup{
    margin-top:18rem;
}
img.coba{
    width:50%;
}
h1{
    /* margin-top:-17rem; */
    margin-top:0;
    font-size:1.5rem;
    color:#fff;
    text-align:center;
}
h2{
    text-align:center;
    font-size:1.3rem;
    color:#fff;
    font-weight:lighter;
    margin-top:-.5rem;
}
h3{
    text-align:center;
    font-size:1.5rem;
    color:#fff;
    margin-top:0.9rem;
}
.container{
    width:1000px;
}
img.pp{
    width:15.5%;
    margin-top:-26.2rem;
    border-radius:100%;
    display:block;
    height:9.2rem;
}
a.kembali{
  display:block;
  margin-top:-8rem;
}
</style>
<body>
<center>
<div style="margin-top:20px"></div>
<div class="container">
<div id="html-content-holder"> 
    <div class="backgrounds">
    <img class="coba" src="fix1.svg" alt="">

    <!-- <div class="nama">testing</div> -->
    <img src="/template_generator/uploads/<?php echo $gambar;?>" class="pp">
    <h1><?php echo $nama;?></h1>
    <h2><?php echo $jabatan;?></h2>
    <h3><?php echo $phone;?></h3>
    <p class="penutup">&nbsp;</p>
    </div>
</div>
<a href="/template_generator/" class="kembali">Back</a>
<!-- <input class="preview btn btn-primary" id="btn-Preview-Image" type="button" value="Preview" />   -->
<div id="previewImage"></div> 

</div>

<script> 
        $(document).ready(function() { 
           
            // Global variable 
            var element = $("#html-content-holder");  
           
            // Global variable 
            var getCanvas;  
            $("#btn-Preview-Image").on('click', function() { 
                html2canvas(element, { 
                onrendered: function(canvas) { 
                        $("#previewImage").append(canvas); 
                        getCanvas = canvas; 
                    } 
                }); 
            }); 
            $("#btn-Convert-Html2Image").on('click', function() { 
                var imgageData =  
                    getCanvas.toDataURL("image/png",1); 
               
                // Now browser starts downloading  
                // it instead of just showing it 
                var newData = imgageData.replace( 
                /^data:image\/png/, "data:application/octet-stream"); 
               
                $("#btn-Convert-Html2Image").attr( 
                "download", "template.png").attr( 
                "href", newData); 
            }); 
        }); 
    </script> 
    </center>
</body>
</html>
