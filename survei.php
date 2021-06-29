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
                     <option value="Boulevard Fresno">Boulevard Fresno | HP:69 | FAT:42</option>
                     <option value="Bumi Anggrek Blok GH">Bumi Anggrek Blok | HP:235 | FAT:70</option>
                     <option value="Bumi Anggrek Blok P,Q">Bumi Anggrek Blok | HP:393 | FAT:174</option>
                     <option value="Bumi Anggrek Blok RS">Bumi Anggrek Blok RS | HP:468 | FAT:163</option>
                     <option value="Bumi Rinjani RW 21">Bumi Rinjani RW 21 | HP:288 | FAT:85</option>
                     <option value="Chandra Indah RW 15">Chandra Indah RW 15 | HP:277 | FAT:66</option>
                     <option value="Darmawangsa Residence Cluster Borobudur">Darmawangsa Residence Cluster Borobudur | HP:766 | FAT:217</option>
                     <option value="Darmawangsa Residence Cluster Kedaton">Darmawangsa Residence Cluster Kedaton | HP:598 | FAT:101</option>
                     <option value="Darmawangsa Residence Cluster Prambanan">Darmawangsa Residence Cluster Prambanan | HP:694 | FAT:146</option>
                     <option value="De' Oranje">De' Oranje | HP:201 | FAT:92</option>
                     <option value="Delta Mas Cluster Bahama">Delta Mas Cluster Bahama | HP:129 | FAT:47</option>
                     <option value="Delta Mas Cluster Calgary">Delta Mas Cluster Calgary | HP:179 | FAT:36</option>
                     <option value="Delta Mas Cluster Carribean">Delta Mas Cluster Carribean | HP:219 | FAT:87</option>
                     <option value="Delta Mas Cluster Catalonia">Delta Mas Cluster Catalonia | HP:159 | FAT:48</option>
                     <option value="Delta Mas Cluster Catania">Delta Mas Cluster Catania | HP:236 | FAT:56</option>
                     <option value="Delta Mas Cluster El Verde">Delta Mas Cluster El Verde | HP:120| FAT:43</option>
					<option value="Delta Mas Cluster Freshno">Delta Mas Cluster Freshno | HP:208 | FAT:73</option>
					<option value="Delta Mas Cluster Hawai">Delta Mas Cluster Hawai | HP:249 | FAT:67</option>
					<option value="Delta Mas Cluster Malibu">Delta Mas Cluster Malibu | HP:90 | FAT:56</option>
					<option value="Delta Mas Cluster Nice">Delta Mas Cluster Nice | HP:229 | FAT:76</option>
					<option value="Delta Mas Cluster Parthenon">Delta Mas Cluster Parthenon | HP:97 | FAT:46</option>
					<option value="Delta Mas Cluster Pasadena">Delta Mas Cluster Pasadena | HP:267 | FAT:111</option>
					<option value="Delta Mas Cluster Rivera">Delta Mas Cluster Rivera | HP:93 | FAT:34</option>
					<option value="Delta Mas Cluster Roseville">Delta Mas Cluster Roseville | HP:290 | FAT:77</option>
					<option value="Graha Prima Baru RW 20">Graha Prima Baru RW 20 | HP:1138 | FAT:445</option>
					<option value="Graha Prima Baru RW 25">Graha Prima Baru RW 25 | HP:852 | FAT:262</option>
					<option value="Graha Prima Baru">Graha Prima Baru RW 27 | HP:420 | FAT:132</option>
					<option value="Graha Taman Kebayoran RW 13 (FDT 1)">Graha Taman Kebayoran RW 13 (FDT 1) | HP:263 | FAT:15</option>
					<option value="Graha Taman Kebayoran RW 13 (FDT 2)">Graha Taman Kebayoran RW 13 (FDT 2) | HP:298 | FAT:22</option>
					<option value="Grand Wisata - Cluster Cherry Ville">Grand Wisata - Cluster Cherry Ville | HP:170 | FAT:94</option>
					<option value="Grand Wisata Cluster Garden Terrace">Grand Wisata Cluster Garden Terrace | HP:226 | FAT:121</option>
					<option value="Greenleaf">Greenleaf | HP:32 | FAT:7</option>
					<option value="Griya Asri RW 30">Griya Asri RW 30 | HP:356 | FAT:117</option>
					<option value="Griya Harapan Permai RW 32">Griya Harapan Permai RW 32 | HP:266 | FAT:83</option>
					<option value="Harapan Baru Regency RW 13 (FDT 1)">Harapan Baru Regency RW 13 (FDT 1) | HP:208 | FAT:35</option>
					<option value="Harapan Baru Regency RW 13 (FDT 2)">Harapan Baru Regency RW 13 (FDT 2) | HP:332 | FAT:88</option>
					<option value="Harapan Baru Regency RW 14 (FDT 1)">Harapan Baru Regency RW 14 (FDT 1) | HP:283 | FAT:83</option>
					<option value="Harapan Baru Regency RW 14">Harapan Baru Regency RW 14 (FDT 2) | HP:261 | FAT:98</option>
					<option value="Inkoppol">Inkoppol | HP:194 | FAT:39</option>
					<option value="Jati Kramat Indah 2 (FDT 1)">Jati Kramat Indah 2 (FDT 1) | HP:374 | FAT:79</option>
					<option value="Jati Kramat Indah 2 (FDT 2)">Jati Kramat Indah 2 (FDT 2) | HP:169 | FAT:35</option>
					<option value="Jatibening Permai">Jatibening Permai | HP:337 | FAT:26</option>
					<option value="Jl Bayan (Fe Ext)">Jl Bayan (Fe Ext) | HP:1 | FAT:5</option>
					<option value="Jl Kaliabang (Fe Ext)">Jl Kaliabang (Fe Ext) | HP:2 | FAT:4</option>
					<option value="Jl Pengasinan Jatimulya (Fe Ext)">Jl Pengasinan Jatimulya (Fe Ext) | HP:7 | FAT:6</option>
					<option value="Komplek Bekasi Regensi 1 RW 07">Komplek Bekasi Regensi 1 RW 07 | HP:426 | FAT:159</option>
					<option value="Kota Legenda Dukuh Zamrud">Kota Legenda Dukuh Zamrud | HP:174 | FAT:69</option>
					<option value="Kota Legenda RW 10 (Dukuh Zamrud)">Kota Legenda RW 10 (Dukuh Zamrud) | HP:288 | FAT:104</option>
					<option value="La Residence 16B">La Residence 16B | HP:60 | FAT:7</option>
					<option value="Lemonade Garden">Lemonade Garden | HP:226 | FAT:107</option>
					<option value="Mutiara Sanggraha And Mutiara Platinum">Mutiara Sanggraha And Mutiara Platinum | HP:180 | FAT:64</option>
					<option value="Patria Jaya RW 13">Patria Jaya RW 13 | HP:94 | FAT:11</option>
					<option value="Patria Jaya RW 14">Patria Jaya RW 14 | HP:292 | FAT:19</option>
					<option value="Perum Aren Jaya RW 10">Perum Aren Jaya RW 10 | HP:784 | FAT:214</option>
					<option value="Perum Aren Jaya RW 11">Perum Aren Jaya RW 11 | HP:580 | FAT:215</option>
					<option value="Perum Bulak Kapal Permai">Perum Bulak Kapal Permai RW 14 | HP:628 | FAT:253</option>
					<option value="Perum Bumi Lestari RW 14">Perum Bumi Lestari RW 14 | HP:688 | FAT:232</option>
					<option value="Perum Duta Bumi 2 RW 29">Perum Duta Bumi 2 RW 29 | HP:222 | FAT:23</option>
					<option value="Perum Jati Mulya RW 15">Perum Jati Mulya RW 15 | HP:1073 | FAT:217</option>
					<option value="Perum Pondok Hijau RW 11">Perum Pondok Hijau RW 11 | HP:286 | FAT:89</option>
					<option value="Perum Pondok Hijau RW 25">Perum Pondok Hijau RW 25 | HP:261 | FAT:90</option>
					<option value="Perum Sinar Kompas Indah RW 01">Perum Sinar Kompas Indah RW 01 | HP:607 | FAT:223</option>
					<option value="Perum Taman Aster RW 07">Perum Taman Aster RW 07 | HP:1113 | FAT:90</option>
					<option value="Perum Taman Aster RW 09">Perum Taman Aster RW 09 | HP:417 | FAT:153</option>
					<option value="Perum Taman Kota">Perum Taman Kota | HP:693 | FAT:293</option>
					<option value="Perum Tridaya 3 RW 05">Perum Tridaya 3 RW 05 | HP:366 | FAT:110</option>
					<option value="Perumahan Bunga Raya 10">Perumahan Bunga Raya 10 | HP:140 | FAT:65</option>
					<option value="Perumahan Dpr Bumi Sanggraha">Perumahan Dpr Bumi Sanggraha | HP:128 | FAT:48</option>
					<option value="Perumahan Duta Bumi 1 RW 28">Perumahan Duta Bumi 1 RW 28 | HP:132 | FAT:18</option>
					<option value="Perumahan Pondok Molek Dan Raya Housing">Perumahan Pondok Molek Dan Raya Housing | HP:288 | FAT:102</option>
					<option value="Perumahan Rawalumbu RW 37">Perumahan Rawalumbu RW 37 | HP:423 | FAT:99</option>
					<option value="Perumnas Rawalumbu RW 28">Perumnas Rawalumbu RW 28 | HP:277 | FAT:69</option>
					<option value="Perumnas Rawalumbu RW 29">Perumnas Rawalumbu RW 29 | HP:322 | FAT:122</option>
					<option value="Perumnas Rawalumbu RW 31">Perumnas Rawalumbu RW 31 | HP:271 | FAT:51</option>
					<option value="Pesona Anggrek RW 27">Pesona Anggrek RW 27 | HP:479 | FAT:68</option>
					<option value="Pesona Mustika">Pesona Mustika | HP:57 | FAT:18</option>
					<option value="Pondok Mitra Lestari">Pondok Mitra Lestari (FDT 1) | HP:292 | FAT:103</option>
					<option value="Pondok Mitra Lestari (FDT 2)">Pondok Mitra Lestari (FDT 2) | HP:310 | FAT:88</option>
					<option value="Prima Harapan Regency RW 09 (FDT 2)">Prima Harapan Regency RW 09 (FDT 2) | HP:279 | FAT:29</option>
					<option value="Prima Harapan Regency RW 09 (FDT 3)">Prima Harapan Regency RW 09 (FDT 3) | HP:293 | FAT:33</option>
					<option value="Prima Harapan Regency RW 09 (FDT1)">Prima Harapan Regency RW 09 (FDT1) | HP:335 | FAT:23</option>
					<option value="Puri Juanda Regency">Puri Juanda Regency | HP:300 | FAT:94</option>
					<option value="River Town">River Town | HP:188 | FAT:79</option>
					<option value="Royal Platinum Residences">Royal Platinum Residences | HP:27 | FAT:13</option>
					<option value="Ruko Coral Blue">Ruko Coral Blue | HP:14 | FAT:14</option>
					<option value="Ruko Grand Wisata Blok AA10">Ruko Grand Wisata Blok AA10 | HP:66 | FAT:28</option>
					<option value="Ruko Grand Wisata Blok AA11">Ruko Grand Wisata Blok AA11 | HP:75 | FAT:41</option>
					<option value="Ruko Grand Wisata Blok AA12">Ruko Grand Wisata Blok AA12 | HP:83 | FAT:48</option>
					<option value="Ruko Grand Wisata Blok AA15">Ruko Grand Wisata Blok AA15 | HP:41 | FAT:25</option>
					<option value="Ruko Grand Wisata Blok AA3 Dan AA5">Ruko Grand Wisata Blok AA3 Dan AA5 | HP:56 | FAT:43</option>
					<option value="Ruko Grand Wisata Blok AA9">Ruko Grand Wisata Blok AA9 | HP:64 | FAT:37</option>
					<option value="Ruko Notre Dame">Ruko Notre Dame | HP:116 | FAT:72</option>
					<option value="Ruko Palais De Paris">Ruko Palais De Paris | HP:116 | FAT:77</option>
					<option value="Ruko Pasadena">Ruko Pasadena | HP:22 | FAT:12</option>
					<option value="Ruko Porto Square">Ruko Porto Square | HP:45 | FAT:14</option>
					<option value="Ruko Spanish Square">Ruko Spanish Square | HP:48 | FAT:22</option>
					<option value="Sapta Pesona">Sapta Pesona | HP:329 | FAT:110</option>
					<option value="Sme - Grand Wisata - Market Place">Sme - Grand Wisata - Market Place | HP:107 | FAT:68</option>
					<option value="Taman Harapan Baru 5 RW 27 (FDT 2)">Taman Harapan Baru 5 RW 27 (FDT 2) | HP:243 | FAT:31</option>
					<option value="Taman Harapan Baru RW 23 (FDT 1)">Taman Harapan Baru RW 23 (FDT 1) | HP:423 | FAT:141</option>
					<option value="Taman Harapan Baru RW 23 (FDT 2)">Taman Harapan Baru RW 23 (FDT 2) | HP:188 | FAT:48</option>
					<option value="Taman Juanda">Taman Juanda | HP:307 | FAT:63</option>
					<option value="Taman Kebalen Indah RW 16">Taman Kebalen Indah RW 16 | HP:581 | FAT:181</option>
					<option value="Taman Kebalen Indah RW 19">Taman Kebalen Indah RW 19 | HP:818 | FAT:228</option>
					<option value="Taman Narogong Indah RW 07">Taman Narogong Indah RW 07 | HP:492 | FAT:128</option>
					<option value="Taman Narogong Indah RW 12">Taman Narogong Indah RW 12 | HP:402 | FAT:68</option>
					<option value="Taman Narogong Indah RW 13">Taman Narogong Indah RW 13 | HP:444 | FAT:75</option>
					<option value="Taman Narogong Indah RW 14">Taman Narogong Indah RW 14 | HP:449 | FAT:92</option>
					<option value="Taman Narogong Indah RW 16">Taman Narogong Indah RW 16 | HP:292 | FAT:66</option>
					<option value="Taman Pondok Gede">Taman Pondok Gede | HP:189 | FAT:60</option>
					<option value="Taman Wisma Asri 2 RW 23">Taman Wisma Asri 2 RW 23 | HP:294 | FAT:26</option>
					<option value="Taman Wisma Asri 2 RW 27">Taman Wisma Asri 2 RW 27 | HP:351 | FAT:62</option>
					<option value="Taman Wisma Asri RW 12 (Ext)">Taman Wisma Asri RW 12 (Ext) | HP:27 | FAT:0</option>
					<option value="Taman Wisma Asri RW 13">Taman Wisma Asri RW 13 | HP:332 | FAT:51</option>
					<option value="Taman Wisma Asri RW 16">Taman Wisma Asri RW 16 | HP:325 | FAT:101</option>
					<option value="Taman Wisma Asri RW 18">Taman Wisma Asri RW 18 | HP:334 | FAT:53</option>
					<option value="Taman Wisma Asri RW 31">Taman Wisma Asri RW 31 | HP:182 | FAT:31</option>
					<option value="Taman Wisma Asri RW 32">Taman Wisma Asri RW 32 | HP:500 | FAT:127</option>
					<option value="Town House Taman Kota">Town House Taman Kota | HP:13 | FAT:6</option>
					<option value="Tridaya Indah 2 RW 03">Tridaya Indah 2 RW 03 | HP:322 | FAT:40</option>
					<option value="Tridaya Indah 4 RW 11">Tridaya Indah 4 RW 11 | HP:363 | FAT:131</option>
					<option value="Tridaya Indah 4 RW 12">Tridaya Indah 4 RW 12 | HP:350 | FAT:98</option>
					<option value="Unggul Graha Permai RW 13">Unggul Graha Permai RW 13 | HP:411 | FAT:87</option>
					<option value="Villa Mas Indah">Villa Mas Indah | HP:266 | FAT:38</option>
					<option value="Villa Nusa Indah 2 RW 22">Villa Nusa Indah 2 RW 22 | HP:214 | FAT:67</option>
					<option value="Water Spring">Water Spring | HP:223 | FAT:83</option>
					<option value="Wisma Jaya RW 19 (FDT 1)">Wisma Jaya RW 19 (FDT 1) | HP:456 | FAT:97</option>
					<option value="Wisma Jaya RW 19 (FDT 2)">Wisma Jaya RW 19 (FDT 2) | HP:259 | FAT:59</option>
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

            <!-- <div class="form-group">
               <label for="alamat">Alamat</label>
               <textarea class="form-control" id="alamat" name="alamat" required=""></textarea>
            </div> -->
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
