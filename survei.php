
application/x-httpd-php survei.php ( HTML document, ASCII text, with CRLF line terminators )
<!DOCTYPE html>
<html>
<head>
<title>Survei Sales</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap" rel="stylesheet">
</head>
<style type="text/css">
html{
	font-family: 'Poppins', sans-serif;
}
@media only screen and (max-width: 768px) {
	.desktop-only{display: none;}
}

@media only screen and (min-width: 769px) {
	.mobile-only{display: none;}
}
h1{text-align: center;color:#888;}
h2{text-align: center;font-size: 1.5rem;padding: 1rem 0;border-bottom: 1px solid #ddd;color:#545b62;}
.latlong{background: darkgray;width: 100%;height: 2rem;}
.blink{
	animation:blinking 1.5s infinite;
	font-weight: bold;
}
@keyframes blinking{
0%{   color: #fff;   }
47%{   color: #fff; }
62%{   color: transparent; }
97%{   color:transparent; }
100%{  color: #fff;   }
}
.logo-myrep{
	width: 80%;margin:0 auto;padding-top:1rem;display: block;
}
.btn-primary{background: #6E2C83!important;margin:0 auto;display: block;}
.btn-info{background: #6E2C83!important;}
/*.btn-info{background: #6E2C83!important;color: #fff!important}*/
label{font-weight: bold;color: #555;}
form{padding:2rem;}
.cek-koordinat{
	font-size: .8rem;
	font-weight: 500;
}
</style>
<body>
	<div class="mobile-only">
	<img class="logo-myrep" src="https://myrepublic.co.id/wp-content/themes/myrepublic/assets/images/icon/my-republic-brand.png" class="img-fluid" alt="Responsive image">
	<h2>Tracking Ketersediaan HP</h2>
<div class="alert alert-success alert-dismissible fade show d-none my-alert" role="alert">
	<strong>Terima kasih!</strong><br>
	 Data yang kamu input telah berhasil disimpan. <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	<span aria-hidden="true">&times;</span>
	</button>
</div>

<form name="submit-to-google-sheet">
	<span class="cek-koordinat">Note : klik tombol "Cek Koordinat" untuk memastikan lokasi terbaru</span>
	<input class="d-none" type="text" name="waktu" value="<?php date_default_timezone_set('Asia/Jakarta');echo date('d-m-Y H:i:s');?>">
	<textarea class="latlong" id="demo" name="latlong" readonly required oninvalid="this.setCustomValidity('Klik tombol cek koordinat terlebih dahulu')" oninput="setCustomValidity('')"></textarea>
	<button type="button" class="btn btn-info btn-block blink" onclick="getLocation()">Cek Koordinat</button>
	  <div class="form-group">
    <label for="nama">Nama</label>
    <input class="form-control" id="nama" type="text" name="nama" required="" oninvalid="this.setCustomValidity('Masukkan nama')" oninput="setCustomValidity('')">
  </div>
	
	<div class="form-group">
		<label for="email">Email</label>
		<input class="form-control" id="email" type="email" name="email" required="" oninvalid="this.setCustomValidity('Masukkan email')" oninput="setCustomValidity('')">
	</div>
	<div class="form-group">
	<select class="form-control js-example-basic-single" id="branch" name="branch" required="" oninvalid="this.setCustomValidity('Pilih branch')" oninput="setCustomValidity('')">

		<option value="" selected disabled hidden>Pilih Branch</option>
		<option value="Bali">Bali</option>
		<option value="Bandung">Bandung</option>
		<option value="Bekasi">Bekasi</option>
		<option value="Bogor">Bogor</option>
		<option value="Cibubur">Cibubur</option>
		<option value="Depok">Depok</option>
		<option value="Jakarta">Jakarta</option>
		<option value="Malang">Malang</option>
		<option value="Medan">Medan</option>
		<option value="Palembang">Palembang</option>
		<option value="Semarang">Semarang</option>
		<option value="Surabaya">Surabaya</option>
		<option value="Tangerang">Tangerang</option>
	</select>
	</div>

	<div class="form-group">
	<select class="form-control js-example-basic-single" id="nama_cluster" name="nama_cluster" required="" oninvalid="this.setCustomValidity('Pilih Cluster')" oninput="setCustomValidity('')">
		<option value="" selected disabled hidden>Pilih Nama Cluster</option>
		<optgroup label="Grup 1">
			<option value="Cluster A">Cluster A</option>
			<option value="Cluster B">Cluster B</option>
			<option value="Cluster C">Cluster C</option>
		</optgroup>
		<optgroup label="Grup 2">
			<option value="Cluster A">Cluster A</option>
			<option value="Cluster B">Cluster B</option>
			<option value="Cluster C">Cluster C</option>
		</optgroup>
		<optgroup label="Grup 3">
			<option value="Cluster A">Cluster A</option>
			<option value="Cluster B">Cluster B</option>
			<option value="Cluster C">Cluster C</option>
		</optgroup>
		
	</select>
	</div>

	<div class="form-group">
		<label for="alamat">Alamat</label>
	    <textarea class="form-control" id="alamat" name="alamat" required=""></textarea>
	</div>
	<div class="form-group">
		<label for="note">Catatan</label>
		<textarea class="form-control" id="note" name="note"></textarea>
	</div>

	<button type="submit" class="btn btn-primary btn-kirim btn-block">Kirim</button>
	<button type="button" class="btn btn-primary btn-loading d-none btn-block" disabled>
	<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
	Loading... </button>
</form>
</div>

<div class="desktop-only blink">
	<img class="logo-myrep" src="https://myrepublic.co.id/wp-content/themes/myrepublic/assets/images/icon/my-republic-brand.png" class="img-fluid" alt="Responsive image">
	<h1>Maaf, kamu hanya bisa mengakses fitur melalui handphone</h1>
</div>
<script>
  const scriptURL = 'https://script.google.com/macros/s/AKfycbz7sldSBaIbJVXS21C6ByppvNqNNc0V3VtBgVpWLhsOi1q7pWSmHmYMRXjPyuOQbS4j/exec'
  const form = document.forms['submit-to-google-sheet'];
  const btnKirim = document.querySelector('.btn-kirim');
  const btnLoading = document.querySelector('.btn-loading');
  const myAlert = document.querySelector('.my-alert');
  form.addEventListener('submit', e => {
    e.preventDefault()
    // ketika klik kirim data
    btnLoading.classList.toggle('d-none');
    btnKirim.classList.toggle('d-none');
    fetch(scriptURL, { method: 'POST', body: new FormData(form)})
      .then(response => {
	  	btnLoading.classList.toggle('d-none');
   		btnKirim.classList.toggle('d-none');
   		// tampilan alert
   		myAlert.classList.toggle('d-none');
   		// reset form
   		form.reset();
      	console.log('Success!', response);
      })
      .catch(error => console.error('Error!', error.message))
  })
</script>
<!-- select2 untuk search di dropdown -->
<script>
    $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>
<script>
var x = document.getElementById("demo");
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Browser tidak support. Gunakan browser modern : Google Chrome, Firefox atau Safari";
  }
}
function showPosition(position) {
  x.innerHTML = position.coords.latitude + "," + position.coords.longitude;
}
</script>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
