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
      form{padding:.5rem 2rem;}
      .cek-koordinat{
      font-size: .8rem;
      font-weight: 500;
      }
      #Bali,#Bandung,#Bekasi,#Bogor,#Cibubur,#Depok,#Jakarta,#Malang,#Medan,#Palembang,#Semarang,#Surabaya,#Tangerang{
      	width: 100%;display: grid;
      }
   </style>
   <body>
      <div class="mobile-only">
         <img class="logo-myrep" src="https://myrepublic.co.id/wp-content/themes/myrepublic/assets/images/icon/my-republic-brand.png" class="img-fluid" alt="Responsive image">
         <h2>Tracking Ketersediaan HP</h2>

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
            <!-- for branch & cluseter -->
            <div id="allBranch" class="form-group">
               <select class="form-control js-example-basic-single" id="branchName" name="branch" required="" oninvalid="this.setCustomValidity('Pilih branch')" oninput="setCustomValidity('')">
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
            <div id="clusterName">
            	<!-- Bali -->
               <div id="Bali" class="form-group" style="display: none;">
                  <select class="form-control js-example-basic-single" name="nama_cluster" oninvalid="this.setCustomValidity('Pilih Cluster')" oninput="setCustomValidity('')">
                     <option value="" selected disabled hidden>Pilih Nama Cluster</option>
                     <!-- <option value="">Boulevard Fresno</option> -->
                  </select>
               </div>
               <!-- tutup Bali -->

            	<!-- Bandung -->
               <div id="Bandung" class="form-group" style="display: none;">
                  <select class="form-control js-example-basic-single" name="nama_cluster" oninvalid="this.setCustomValidity('Pilih Cluster')" oninput="setCustomValidity('')">
                     <option value="" selected disabled hidden>Pilih Nama Cluster</option>
               <!--       <option value="Boulevard Fresno">Boulevard Fresno</option>
                     <option value="Bumi Anggrek Blok GH">Bumi Anggrek Blok GH</option>
                     <option value="Bumi Anggrek Blok P,Q">Bumi Anggrek Blok P,Q</option> -->
                  </select>
               </div>
               <!-- tutup Bandung -->

               <!-- Bekasi -->
               <div id="Bekasi" class="form-group" style="display: none;">
                  <select class="form-control js-example-basic-single" name="nama_cluster" oninvalid="this.setCustomValidity('Pilih Cluster')" oninput="setCustomValidity('')">
                     <option value="" selected disabled hidden>Pilih Nama Cluster</option>
                     <option value="Boulevard Fresno">Boulevard Fresno</option>
                     <option value="Bumi Anggrek Blok GH">Bumi Anggrek Blok</option>
                     <option value="Bumi Anggrek Blok P,Q">Bumi Anggrek Blok</option>
                     <option value="Bumi Anggrek Blok RS">Bumi Anggrek Blok RS</option>
                     <option value="Bumi Rinjani RW 21">Bumi Rinjani RW 21</option>
                     <option value="Chandra Indah RW 15">Chandra Indah RW 15</option>
                     <option value="Darmawangsa Residence Cluster Borobudur">Darmawangsa Residence Cluster Borobudur</option>
                     <option value="Darmawangsa Residence Cluster Kedaton">Darmawangsa Residence Cluster Kedaton</option>
                     <option value="Darmawangsa Residence Cluster Prambanan">Darmawangsa Residence Cluster Prambanan</option>
                     <option value="De' Oranje">De' Oranje</option>
                     <option value="Delta Mas Cluster Bahama">Delta Mas Cluster Bahama</option>
                     <option value="Delta Mas Cluster Calgary">Delta Mas Cluster Calgary</option>
                     <option value="Delta Mas Cluster Carribean">Delta Mas Cluster Carribean</option>
                     <option value="Delta Mas Cluster Catalonia">Delta Mas Cluster Catalonia</option>
                     <option value="Delta Mas Cluster Catania">Delta Mas Cluster Catania</option>
                     <option value="Delta Mas Cluster El Verde">Delta Mas Cluster El Verde</option>
                  </select>
               </div>
               <!-- tutup Bekasi -->

               <!-- Bogor -->
               <div id="Bogor" class="form-group" style="display: none;">
                  <select class="form-control js-example-basic-single" name="nama_cluster" oninvalid="this.setCustomValidity('Pilih Cluster')" oninput="setCustomValidity('')">
                     <option value="" selected disabled hidden>Pilih Nama Cluster</option>
                     <option value="Anggada">Anggada</option>
                     <option value="Bogor Raya Permai RW 11">Bogor Raya Permai RW 11</option>
                     <option value="Bogor Raya Permai RW 13">Bogor Raya Permai RW 13</option>
                     <option value="Bogor Raya Permai RW 14">Bogor Raya Permai RW 14</option>
                     <option value="Bojong Depok Baru Ii RW 13">Bojong Depok Baru Ii RW 13</option>
                     <option value="Bojong Depok Baru Ii RW 14">Bojong Depok Baru Ii RW 14</option>
                     <option value="Bojong Depok Baru Ii RW 16">Bojong Depok Baru Ii RW 16</option>
                     <option value="Bojong Depok Baru Ii RW 17">Bojong Depok Baru Ii RW 17</option>
                     <option value="Bojong Depok Baru RW 15">Bojong Depok Baru RW 15</option>
                     <option value="Budi Agung">Budi Agung</option>
                     <option value="Bukit Cimanggu Villa">Bukit Cimanggu Villa</option>
                     <option value="Bukit Kayu Manis RW 12">Bukit Kayu Manis RW 12</option>
                     <option value="Bumi Cibinong Endah RW 10">Bumi Cibinong Endah RW 10</option>
                     <option value="Bumi Cibinong Endah RW 11">Bumi Cibinong Endah RW 11</option>
                     <option value="Bumi Cibinong Endah RW 12">Bumi Cibinong Endah RW 12</option>
                     <option value="Bumi Kencana Asri (Dharmais) RW 13">Bumi Kencana Asri (Dharmais) RW 13</option>
                  </select>
               </div>
               <!-- tutup Bogor -->

               <!-- Cibubur -->
               <div id="Cibubur" class="form-group" style="display: none;">
                  <select class="form-control js-example-basic-single" name="nama_cluster" oninvalid="this.setCustomValidity('Pilih Cluster')" oninput="setCustomValidity('')">
                     <option value="" selected disabled hidden>Pilih Nama Cluster</option>
                     <option value="Acropolis Selatan">Acropolis Selatan</option>
                     <option value="Acropolis Utara">Acropolis Utara</option>
                     <option value="America">America</option>
                     <option value="Amsterdam">Amsterdam</option>
                     <option value="Barcelona (Sb)">Barcelona (Sb)</option>
                     <option value="Bellevue">Bellevue</option>
                  </select>
               </div>
               <!-- tutup Cibubur -->

               <!-- Depok -->
               <div id="Depok" class="form-group" style="display: none;">
                  <select class="form-control js-example-basic-single" name="nama_cluster" oninvalid="this.setCustomValidity('Pilih Cluster')" oninput="setCustomValidity('')">
                     <option value="" selected disabled hidden>Pilih Nama Cluster</option>
                     <option value="Anyelir 3">Anyelir 3</option>
                     <option value="Apartemen Taman Melati">Apartemen Taman Melati</option>
                     <option value="Bdn">Bdn</option>
                     <option value="Beji Timur RW 01">Beji Timur RW 01</option>
                     <option value="Beji Timur RW 02">Beji Timur RW 02</option>
                     <option value="Beji Timur RW 03">Beji Timur RW 03</option>
                  </select>
               </div>
               <!-- tutup Depok -->

               <!-- Jakarta -->
               <div id="Jakarta" class="form-group" style="display: none;">
                  <select class="form-control js-example-basic-single" name="nama_cluster" oninvalid="this.setCustomValidity('Pilih Cluster')" oninput="setCustomValidity('')">
                     <option value="" selected disabled hidden>Pilih Nama Cluster</option>
                     <option value="Apartment Ambassador">Apartment Ambassador</option>
                     <option value="Apartment Cempaka Mas">Apartment Cempaka Mas</option>
                     <option value="Apartment Four Seasons">Apartment Four Seasons</option>
                     <option value="Apartment Itc Permata Hijau">Apartment Itc Permata Hijau</option>
                     <option value="Apartment Pakubuwono Residence">Apartment Pakubuwono Residence</option>
                     <option value="Apartment Roxy Mas">Apartment Roxy Mas</option>
                  </select>
               </div>
               <!-- tutup Jakarta -->

               <!-- Malang -->
               <div id="Malang" class="form-group" style="display: none;">
                  <select class="form-control js-example-basic-single" name="nama_cluster" oninvalid="this.setCustomValidity('Pilih Cluster')" oninput="setCustomValidity('')">
                     <option value="" selected disabled hidden>Pilih Nama Cluster</option>
                     <option value="Baiduri Area RT 02">Baiduri Area RT 02</option>
                     <option value="Brantas Area RW 01">Brantas Area RW 01</option>
                     <option value="Brantas Area RW 06">Brantas Area RW 06</option>
                     <option value="Brantas Area RW 7">Brantas Area RW 7</option>
                     <option value="Bukit Dieng RT 08 & 09">Bukit Dieng RT 08 & 09</option>
                     <option value="Bukit Dieng RT 7">Bukit Dieng RT 7</option>
                  </select>
               </div>
               <!-- tutup Malang -->

               <!-- Medan -->
               <div id="Medan" class="form-group" style="display: none;">
                  <select class="form-control js-example-basic-single" name="nama_cluster" oninvalid="this.setCustomValidity('Pilih Cluster')" oninput="setCustomValidity('')">
                     <option value="" selected disabled hidden>Pilih Nama Cluster</option>
                     <option value="Address Cempaka Madani">Address Cempaka Madani</option>
                     <option value="Bekala Asri Residence">Bekala Asri Residence</option>
                     <option value="Cemara Asri Tahap 3">Cemara Asri Tahap 3</option>
                     <option value="Citra Garden - Blok D">Citra Garden - Blok D</option>
                     <option value="Citra Garden - Mansion">Citra Garden - Mansion</option>
                     <option value="Citra Garden - Terrace Garden">Citra Garden - Terrace Garden</option>
                  </select>
               </div>
               <!-- tutup Medan -->

               <!-- Palembang -->
               <div id="Palembang" class="form-group" style="display: none;">
                  <select class="form-control js-example-basic-single" name="nama_cluster" oninvalid="this.setCustomValidity('Pilih Cluster')" oninput="setCustomValidity('')">
                     <option value="" selected disabled hidden>Pilih Nama Cluster</option>
                     <option value="Afilla Permai">Afilla Permai</option>
                     <option value="Alam Raya Residence">Alam Raya Residence</option>
                     <option value="Arisma Sejahtera">Arisma Sejahtera</option>
                     <option value="Aston Villa">Aston Villa</option>
                     <option value="Barangan Indah">Barangan Indah</option>
                     <option value="Batu Hitam">Batu Hitam</option>
                  </select>
               </div>
               <!-- tutup Palembang -->

               <!-- Semarang -->
               <div id="Semarang" class="form-group" style="display: none;">
                  <select class="form-control js-example-basic-single" name="nama_cluster" oninvalid="this.setCustomValidity('Pilih Cluster')" oninput="setCustomValidity('')">
                     <option value="" selected disabled hidden>Pilih Nama Cluster</option>
                     <option value="Afa Permai RW 17">Afa Permai RW 17</option>
                     <option value="Alamanda Cluster">Alamanda Cluster</option>
                     <option value="Area Seroja Kel Karang Kidul">Area Seroja Kel Karang Kidul</option>
                     <option value="Argo Mulyo Mukti Timur">Argo Mulyo Mukti Timur</option>
                     <option value="Banget Ayu">Banget Ayu</option>
                     <option value="Bendan Ngisor RW 01">Bendan Ngisor RW 01</option>
                  </select>
               </div>
               <!-- tutup Semarang -->

               <!-- Surabaya -->
               <div id="Surabaya" class="form-group" style="display: none;">
                  <select class="form-control js-example-basic-single" name="nama_cluster" oninvalid="this.setCustomValidity('Pilih Cluster')" oninput="setCustomValidity('')">
                     <option value="" selected disabled hidden>Pilih Nama Cluster</option>
                     <option value="Babatan Indah RW 04">Babatan Indah RW 04</option>
                     <option value="Babatan Mukti RW 07">Babatan Mukti RW 07</option>
                     <option value="Babatan Pratama RW 08">Babatan Pratama RW 08</option>
                     <option value="Barata Jaya RW 04">Argo Barata Jaya RW 04</option>
                     <option value="Bengawan RW 03">Bengawan RW 03</option>
                     <option value="Bengawan RW 04">Bengawan RW 04</option>
                  </select>
               </div>
               <!-- tutup Surabaya -->

               <!-- Tangerang -->
               <div id="Tangerang" class="form-group" style="display: none;">
                  <select class="form-control js-example-basic-single" name="nama_cluster" oninvalid="this.setCustomValidity('Pilih Cluster')" oninput="setCustomValidity('')">
                     <option value="" selected disabled hidden>Pilih Nama Cluster</option>
                     <option value="A Dream Residence">A Dream Residence</option>
                     <option value="Anggrek Loka Ii-1">Anggrek Loka Ii-1</option>
                     <option value="Anggrek Loka Ii-2">Anggrek Loka Ii-2</option>
                     <option value="Anggrek Loka Ii-3">Anggrek Loka Ii-3</option>
                     <option value="Anthea">Anthea</option>
                     <option value="Arinda Permai 1">Arinda Permai 1</option>
                  </select>
               </div>
               <!-- tutup Tangerang -->


            </div>
            <!-- close branch & cluseter -->

            <div class="form-group">
               <label for="alamat">Alamat</label>
               <textarea class="form-control" id="alamat" name="alamat" required=""></textarea>
            </div>
            <div class="form-group">
               <label for="note">Catatan</label>
               <textarea class="form-control" id="note" name="note"></textarea>
            </div>

	         <div class="alert alert-success alert-dismissible fade show d-none my-alert" role="alert">
	            <strong>Terima kasih!</strong><br>
	            Data yang kamu input telah berhasil disimpan. <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	            <span aria-hidden="true">&times;</span>
	            </button>
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
         
         $("#branchName").change(function(){
         $("#Bali,#Bandung,#Bekasi,#Bogor,#Cibubur,#Depok,#Jakarta,#Malang,#Medan,#Palembang,#Semarang,#Surabaya,#Tangerang").hide();
         if($(this).val() == "Bali"){
         $("#Bali").show();
         }
         else if($(this).val() == "Bandung"){
         $("#Bandung").show();
         }
         else if($(this).val() == "Bekasi"){
         $("#Bekasi").show();
         }
         else if($(this).val() == "Bogor"){
         $("#Bogor").show();
         }
         else if($(this).val() == "Cibubur"){
         $("#Cibubur").show();
         }
         else if($(this).val() == "Depok"){
         $("#Depok").show();
         }
         else if($(this).val() == "Jakarta"){
         $("#Jakarta").show();
         }
         else if($(this).val() == "Malang"){
         $("#Malang").show();
         }
         else if($(this).val() == "Medan"){
         $("#Medan").show();
         }
         else if($(this).val() == "Palembang"){
         $("#Palembang").show();
         }
         else if($(this).val() == "Semarang"){
         $("#Semarang").show();
         }
         else if($(this).val() == "Surabaya"){
         $("#Surabaya").show();
         }
         else if($(this).val() == "Tangerang"){
         $("#Tangerang").show();
         }
         else{
          $("#Tangerangs").show(); 
         }
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
