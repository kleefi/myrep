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
						<option value="Anggada">Anggada | HP:10 | FAT:8</option>
						<option value="Bogor Raya Permai RW 11">Bogor Raya Permai RW 11 | HP:321 | FAT:231</option>
						<option value="Bogor Raya Permai RW 13">Bogor Raya Permai RW 13 | HP:273 | FAT:195</option>
						<option value="Bogor Raya Permai RW 14">Bogor Raya Permai RW 14 | HP:332 | FAT:245</option>
						<option value="Bojong Depok Baru Ii RW 13">Bojong Depok Baru Ii RW 13 | HP:456 | FAT:219</option>
						<option value="Bojong Depok Baru Ii RW 14">Bojong Depok Baru Ii RW 14 | HP:464 | FAT:244</option>
						<option value="Bojong Depok Baru Ii RW 16">Bojong Depok Baru Ii RW 16 | HP:380 | FAT:171</option>
						<option value="Bojong Depok Baru Ii RW 17">Bojong Depok Baru Ii RW 17 | HP:520 | FAT:273</option>
						<option value="Bojong Depok Baru RW 15">Bojong Depok Baru RW 15 | HP:418 | FAT:223</option>
						<option value="Budi Agung">Budi Agung | HP:509 | FAT:214</option>
						<option value="Bukit Cimanggu Villa">Bukit Cimanggu Villa | HP:860 | FAT:516</option>
						<option value="Bukit Kayu Manis RW 12">Bukit Kayu Manis RW 12 | HP:605 | FAT:332</option>
						<option value="Bumi Cibinong Endah RW 10">Bumi Cibinong Endah RW 10 | HP:166 | FAT:114</option>
						<option value="Bumi Cibinong Endah RW 11">Bumi Cibinong Endah RW 11 | HP:275 | FAT:125</option>
						<option value="Bumi Cibinong Endah RW 12">Bumi Cibinong Endah RW 12 | HP:295 | FAT:166</option>
						<option value="Bumi Kencana Asri (Dharmais) RW 13">Bumi Kencana Asri (Dharmais) RW 13 | HP:338 | FAT:150</option>
						<option value="Bumi Menteng Asri">Bumi Menteng Asri | HP:250 | FAT:156</option>
						<option value="Bumi Menteng Asri RW 15">Bumi Menteng Asri RW 15 | HP:163 | FAT:113</option>
						<option value="Bumi Menteng Asri RW 16 & RW 20">Bumi Menteng Asri RW 16 & RW 20 | HP:181 | FAT:135</option>
						<option value="Bumi Menteng Asri RW 17">Bumi Menteng Asri RW 17 | HP:155 | FAT:86</option>
						<option value="Bumi Menteng Asri RW 18">Bumi Menteng Asri RW 18 | HP:195 | FAT:113</option>
						<option value="Bumi Panggugah">Bumi Panggugah | HP:249 | FAT:148</option>
						<option value="Cilebut Bumi Pertiwi RW 12">Cilebut Bumi Pertiwi RW 12 | HP:524 | FAT:375</option>
						<option value="Cilebut Bumi Pertiwi RW 13">Cilebut Bumi Pertiwi RW 13 | HP:400 | FAT:165</option>
						<option value="Cilendek Indah Green Garden">Cilendek Indah Green Garden | HP:209 | FAT:139</option>
						<option value="Ciluar 3&4">Ciluar 3&4 | HP:36 | FAT:17</option>
						<option value="Ciluar Permai RW 08">Ciluar Permai RW 08 | HP:270 | FAT:179</option>
						<option value="Ciluar Permai RW 09">Ciluar Permai RW 09 | HP:352 | FAT:223</option>
						<option value="Ciomas Permai RW 07 RT 01,03 & 04">Ciomas Permai RW 07 RT 01,03 & 04 | HP:244 | FAT:165</option>
						<option value="Ciomas Permai RW 07,RW 09 & RW 11">Ciomas Permai RW 07,RW 09 & RW 11 | HP:460 | FAT:315</option>
						<option value="Ciomas Permai RW 08 & RW 10">Ciomas Permai RW 08 & RW 10 | HP:547 | FAT:328</option>
						<option value="Ciomas Permai RW 14">Ciomas Permai RW 14 | HP:334 | FAT:216</option>
						<option value="Ciriung Cemerlang RW 14">Ciriung Cemerlang RW 14 | HP:555 | FAT:387</option>
						<option value="Duta Kencana 2 RW 11">Duta Kencana 2 RW 11 | HP:293 | FAT:201</option>
						<option value="Graha Kartika Pratama (Ext)">Graha Kartika Pratama (Ext) | HP:19 | FAT:4</option>
						<option value="Graha Puspasari 1 RW 14">Graha Puspasari 1 RW 14 | HP:240 | FAT:108</option>
						<option value="Graha Puspasari 2 RW 15">Graha Puspasari 2 RW 15 | HP:176 | FAT:85</option>
						<option value="Griya Bogor Raya">Griya Bogor Raya | HP:250 | FAT:172</option>
						<option value="Griya Indah Bogor RW 14">Griya Indah Bogor RW 14 | HP:129 | FAT:61</option>
						<option value="Griya Melati">Griya Melati | HP:249 | FAT:149</option>
						<option value="Griya Persada RW 04">Griya Persada RW 04 | HP:214 | FAT:119</option>
						<option value="Griya Telaga Permai RW 19">Griya Telaga Permai RW 19 | HP:657 | FAT:449</option>
						<option value="Ipb 1">Ipb 1 | HP:164 | FAT:91</option>
						<option value="Ipb 1 RW 04">Ipb 1 RW 04 | HP:55 | FAT:48</option>
						<option value="Ipb 1 RW 12">Ipb 1 RW 12 | HP:112 | FAT:87</option>
						<option value="Jl Kayu Manis (Fe Ext)">Jl Kayu Manis (Fe Ext) | HP:2 | FAT:0</option>
						<option value="Jl Raya Bogor (Fe Ext)">Jl Raya Bogor (Fe Ext) | HP:1 | FAT:7</option>
						<option value="Jl Raya Laladon (Fe Ext)">Jl Raya Laladon (Fe Ext) | HP:3 | FAT:6</option>
						<option value="Jl Sholeh Iskandar (Fe Ext)">Jl Sholeh Iskandar (Fe Ext) | HP:3 | FAT:5</option>
						<option value="Johar Grande">Johar Grande | HP:33 | FAT:17</option>
						<option value="Kavling Panorama">Kavling Panorama | HP:248 | FAT:102</option>
						<option value="Kebun Raya Residence">Kebun Raya Residence | HP:784 | FAT:480</option>
						<option value="Kedung Badak Baru RW 06">Kedung Badak Baru RW 06 | HP:513 | FAT:331</option>
						<option value="Mayor Oking Citeureup 2">Mayor Oking Citeureup 2 | HP:14 | FAT:13</option>
						<option value="Mega Sentul Bougenvile RW 07">Mega Sentul Bougenvile RW 07 | HP:561 | FAT:346</option>
						<option value="Mutiara Cimanggis RW 16">Mutiara Cimanggis RW 16 | HP:106 | FAT:70</option>
						<option value="Nirwana Estate RW 13">Nirwana Estate RW 13 | HP:727 | FAT:332</option>
						<option value="Nirwana Golden Park">Nirwana Golden Park | HP:338 | FAT:213</option>
						<option value="Pakuan Regency">Pakuan Regency | HP:777 | FAT:543</option>
						<option value="Permata Cimanggis">Permata Cimanggis | HP:1025 | FAT:644</option>
						<option value="Permata Cimanggis - (Ext)">Permata Cimanggis - (Ext) | HP:17 | FAT:4</option>
						<option value="Permata Cimanggis (Ext) Not Used">Permata Cimanggis (Ext) Not Used | HP:16 | FAT:0</option>
						<option value="Persada Depok">Persada Depok | HP:369 | FAT:260</option>
						<option value="Perum Cibinong Griya Asri RW 08">Perum Cibinong Griya Asri RW 08 | HP:356 | FAT:251</option>
						<option value="Perum Gaperi RW 19">Perum Gaperi RW 19 | HP:250 | FAT:128</option>
						<option value="Perum Gaperi RW 20">Perum Gaperi RW 20 | HP:186 | FAT:92</option>
						<option value="Perum Gaperi RW 23">Perum Gaperi RW 23 | HP:177 | FAT:140</option>
						<option value="Perum Griya Kalibaru">Perum Griya Kalibaru | HP:193 | FAT:125</option>
						<option value="Perum Haur Jaya">Perum Haur Jaya | HP:240 | FAT:150</option>
						<option value="Perum Kopwani Village 2">Perum Kopwani Village 2 | HP:249 | FAT:157</option>
						<option value="Perum Mega Sentul Alamanda (FDT 1)">Perum Mega Sentul Alamanda (FDT 1) | HP:273 | FAT:145</option>
						<option value="Perum Mega Sentul Alamanda (FDT 2)">Perum Mega Sentul Alamanda (FDT 2) | HP:361 | FAT:232</option>
						<option value="Perum Perdagangan RW 07">Perum Perdagangan RW 07 | HP:791 | FAT:568</option>
						<option value="Perum Pesona Laguna RW 20">Perum Pesona Laguna RW 20 | HP:579 | FAT:343</option>
						<option value="Perum Puri Nirwana Ii RW 13">Perum Puri Nirwana Ii RW 13 | HP:345 | FAT:268</option>
						<option value="Perum Taman Cimanggu RW 08">Perum Taman Cimanggu RW 08 | HP:156 | FAT:86</option>
						<option value="Perum Taman Cimanggu RW 09">Perum Taman Cimanggu RW 09 | HP:390 | FAT:234</option>
						<option value="Perum Taman Kenari Jagorawi RW 11">Perum Taman Kenari Jagorawi RW 11 | HP:475 | FAT:311</option>
						<option value="Perum Taman Kenari Jagorawi RW 12">Perum Taman Kenari Jagorawi RW 12 | HP:219 | FAT:140</option>
						<option value="Perum Taman Kenari Jagorawi RW 13">Perum Taman Kenari Jagorawi RW 13 | HP:535 | FAT:305</option>
						<option value="Perumahan Sempur RW 01 Dan 02">Perumahan Sempur RW 01 Dan 02 | HP:355 | FAT:258</option>
						<option value="Perumahan Taman Kenari">Perumahan Taman Kenari | HP:511 | FAT:399</option>
						<option value="Pesona Cilebut 2">Pesona Cilebut 2 | HP:1229 | FAT:719</option>
						<option value="Pesona Laguna 2 RW 22 (FDT 1)">Pesona Laguna 2 RW 22 (FDT 1) | HP:150 | FAT:83</option>
						<option value="Pesona Laguna 2 RW 22 (FDT 2)">Pesona Laguna 2 RW 22 (FDT 2) | HP:420 | FAT:195</option>
						<option value="Pondok Kencana Permai">Pondok Kencana Permai | HP:173 | FAT:105</option>
						<option value="Pondok Kencana Permai RW 13">Pondok Kencana Permai RW 13 | HP:170 | FAT:139</option>
						<option value="Pondok Sukahati RW 19">Pondok Sukahati RW 19 | HP:252 | FAT:161</option>
						<option value="Primatama Residence">Primatama Residence | HP:105 | FAT:68</option>
						<option value="Puri Nirwana 3 RW 14">Puri Nirwana 3 RW 14 | HP:791 | FAT:445</option>
						<option value="Puri Nirwana 3 RW 15">Puri Nirwana 3 RW 15 | HP:427 | FAT:251</option>
						<option value="Puri Nirwana 3 RW 16">Puri Nirwana 3 RW 16 | HP:528 | FAT:290</option>
						<option value="Puri Nirwana Ii RW 12">Puri Nirwana Ii RW 12 | HP:699 | FAT:500</option>
						<option value="Ruko Arema Cibinong">Ruko Arema Cibinong | HP:24 | FAT:18</option>
						<option value="Ruko Bojong Depok Baru">Ruko Bojong Depok Baru | HP:84 | FAT:58</option>
						<option value="Ruko Jalan Mayor Oking">Ruko Jalan Mayor Oking | HP:9 | FAT:5</option>
						<option value="Ruko Mayor Oking">Ruko Mayor Oking | HP:43 | FAT:30</option>
						<option value="Ruko Mayor Oking 2">Ruko Mayor Oking 2 | HP:29 | FAT:26</option>
						<option value="Ruko Nirwana Estate">Ruko Nirwana Estate | HP:39 | FAT:26</option>
						<option value="Ruko Villa Bogor Indah 5">Ruko Villa Bogor Indah 5 | HP:55 | FAT:44</option>
						<option value="Ruko Yasmin 6">Ruko Yasmin 6 | HP:82 | FAT:65</option>
						<option value="Sindang Barang Asri RW 03">Sindang Barang Asri RW 03 | HP:67 | FAT:12</option>
						<option value="Sindang Barang Grande">Sindang Barang Grande | HP:62 | FAT:28</option>
						<option value="Taman Cibalagung Indah RW 05">Taman Cibalagung Indah RW 05 | HP:289 | FAT:170</option>
						<option value="Taman Cimanggu RW 05">Taman Cimanggu RW 05 | HP:250 | FAT:158</option>
						<option value="Taman Cimanggu RW 10">Taman Cimanggu RW 10 | HP:387 | FAT:218</option>
						<option value="Taman Cimanggu RW 11 & 12">Taman Cimanggu RW 11 & 12 | HP:408 | FAT:285</option>
						<option value="Taman Dramaga Indah RT 04 RW 02">Taman Dramaga Indah RT 04 RW 02 | HP:61 | FAT:22</option>
						<option value="Taman Pagelaran RW 09">Taman Pagelaran RW 09 | HP:238 | FAT:158</option>
						<option value="Taman Pagelaran RW 10">Taman Pagelaran RW 10 | HP:122 | FAT:57</option>
						<option value="Taman Pajajaran RW 11">Taman Pajajaran RW 11 | HP:257 | FAT:201</option>
						<option value="Taman Tirta Cimanggu RW 13">Taman Tirta Cimanggu RW 13 | HP:448 | FAT:283</option>
						<option value="Taman Yasmin Sektor 1 RW 15">Taman Yasmin Sektor 1 RW 15 | HP:153 | FAT:126</option>
						<option value="Tanah Sereal RW 02">Tanah Sereal RW 02 | HP:193 | FAT:145</option>
						<option value="Tanah Sereal RW 03">Tanah Sereal RW 03 | HP:95 | FAT:91</option>
						<option value="Tanah Sereal RW 04">Tanah Sereal RW 04 | HP:109 | FAT:91</option>
						<option value="Tanah Sereal RW 05">Tanah Sereal RW 05 | HP:129 | FAT:73</option>
						<option value="Villa Bogor Golf">Villa Bogor Golf | HP:69 | FAT:55</option>
						<option value="Villa Bogor Indah 2 RW 14">Villa Bogor Indah 2 RW 14 | HP:296 | FAT:193</option>
						<option value="Villa Bogor Indah 3">Villa Bogor Indah 3 | HP:707 | FAT:365</option>
						<option value="Villa Bogor Indah 3 Blok Be (Ext)">Villa Bogor Indah 3 Blok Be (Ext) | HP:31 | FAT:0</option>
						<option value="Villa Bogor Indah 5">Villa Bogor Indah 5 | HP:1031 | FAT:449</option>
						<option value="Villa Mutiara Bogor 1 RW 12 (FDT 1)">Villa Mutiara Bogor 1 RW 12 (FDT 1) | HP:259 | FAT:156</option>
						<option value="Villa Mutiara Bogor 1 RW 12 (FDT 2)">Villa Mutiara Bogor 1 RW 12 (FDT 2) | HP:382 | FAT:272</option>
						<option value="Villa Mutiara Bogor 1 RW 12 (FDT 3)">Villa Mutiara Bogor 1 RW 12 (FDT 3) | HP:556 | FAT:285</option>
						<option value="Villa Mutiara Bogor RW 11 FDT 1">Villa Mutiara Bogor RW 11 FDT 1 | HP:584 | FAT:369</option>
						<option value="Villa Mutiara Bogor RW 11 FDT 2">Villa Mutiara Bogor RW 11 FDT 2 | HP:198 | FAT:136</option>
						<option value="Visar Indah Pratama RW 12">Visar Indah Pratama RW 12 | HP:384 | FAT:296</option>
                  </select>
               </div>
               <!-- tutup Bogor -->

               <!-- Cibubur -->
               <div id="Cibubur" class="form-group" style="display: none;">
                  <select class="form-control js-example-basic-single" name="nama_cluster" oninvalid="this.setCustomValidity('Pilih Cluster')" oninput="setCustomValidity('')">
						<option value="Acropolis Selatan">Acropolis Selatan | HP:40 | FAT:26</option>
						<option value="Acropolis Utara">Acropolis Utara | HP:61 | FAT:26</option>
						<option value="America">America | HP:503 | FAT:267</option>
						<option value="Amsterdam">Amsterdam | HP:381 | FAT:172</option>
						<option value="Barcelona (Sb)">Barcelona (Sb) | HP:184 | FAT:72</option>
						<option value="Bellevue">Bellevue | HP:413 | FAT:139</option>
						<option value="Beverlyhills (G)">Beverlyhills (G) | HP:200 | FAT:135</option>
						<option value="Bukit Bougenville">Bukit Bougenville | HP:3 | FAT:16</option>
						<option value="Bumi Eraska">Bumi Eraska | HP:186 | FAT:70</option>
						<option value="Calgary">Calgary | HP:281 | FAT:105</option>
						<option value="California">California | HP:172 | FAT:108</option>
						<option value="Central Park (A-I)">Central Park (A-I) | HP:110 | FAT:39</option>
						<option value="Cibubur Mansion Cluster Castle">Cibubur Mansion Cluster Castle | HP:3 | FAT:16</option>
						<option value="Cibubur Mansion Cluster Palace">Cibubur Mansion Cluster Palace | HP:240 | FAT:86</option>
						<option value="Cibubur Villa 3">Cibubur Villa 3 | HP:279 | FAT:75</option>
						<option value="Cileungsi Hijau RW 14 FDT 1">Cileungsi Hijau RW 14 FDT 1 | HP:336 | FAT:101</option>
						<option value="Cileungsi Hijau RW 14 FDT 2">Cileungsi Hijau RW 14 FDT 2 | HP:178 | FAT:59</option>
						<option value="Citra Gran Cluster Central Garden">Citra Gran Cluster Central Garden | HP:10 | FAT:50</option>
						<option value="Citra Gran Cluster Central Garden & Citra Gran Cluster Terrace Garden">Citra Gran Cluster Central Garden & Citra Gran Cluster Terrace Garden | HP:699 | FAT:225</option>
						<option value="Citra Grand Cluster Brentwood">Citra Grand Cluster Brentwood | HP:67 | FAT:37</option>
						<option value="Citra Grand Cluster Castle Garden">Citra Grand Cluster Castle Garden | HP:155 | FAT:88</option>
						<option value="Citra Grand Cluster Green Valley">Citra Grand Cluster Green Valley | HP:199 | FAT:111</option>
						<option value="Citra Grand Cluster Meadow">Citra Grand Cluster Meadow | HP:183 | FAT:54</option>
						<option value="Citra Grand Cluster Praire">Citra Grand Cluster Praire | HP:140 | FAT:37</option>
						<option value="Citra Grand Cluster Rosewood Garden">Citra Grand Cluster Rosewood Garden | HP:107 | FAT:62</option>
						<option value="Citra Grand Cluster Tarn">Citra Grand Cluster Tarn | HP:189 | FAT:68</option>
						<option value="Citra Grand Cluster Zephyer Valley">Citra Grand Cluster Zephyer Valley | HP:36 | FAT:21</option>
						<option value="Citra Grand RW.14 Cluster Terrace Garden">Citra Grand RW.14 Cluster Terrace Garden | HP:8 | FAT:40</option>
						<option value="Citra Indah Jonggol Bukit Agave">Citra Indah Jonggol Bukit Agave | HP:997 | FAT:475</option>
						<option value="Citra Indah Jonggol Bukit Akasia - Lanjutan (Ext)">Citra Indah Jonggol Bukit Akasia - Lanjutan (Ext) | HP:51 | FAT:0</option>
						<option value="Citra Indah Jonggol Bukit Akasia (Ext)">Citra Indah Jonggol Bukit Akasia (Ext) | HP:19 | FAT:0</option>
						<option value="Citra Indah Jonggol Bukit Alamanda">Citra Indah Jonggol Bukit Alamanda | HP:2 | FAT:6</option>
						<option value="Citra Indah Jonggol Bukit Angsana">Citra Indah Jonggol Bukit Angsana | HP:1034 | FAT:852</option>
						<option value="Citra Indah Jonggol Bukit Aster">Citra Indah Jonggol Bukit Aster | HP:655 | FAT:254</option>
						<option value="Citra Indah Jonggol Bukit Azalea">Citra Indah Jonggol Bukit Azalea | HP:810 | FAT:124</option>
						<option value="Citra Indah Jonggol Bukit Bougenville">Citra Indah Jonggol Bukit Bougenville | HP:514 | FAT:255</option>
						<option value="Citra Indah Jonggol Bukit Cempaka">Citra Indah Jonggol Bukit Cempaka | HP:1181 | FAT:515</option>
						<option value="Citra Indah Jonggol Bukit Cendana">Citra Indah Jonggol Bukit Cendana | HP:1 | FAT:5</option>
						<option value="Citra Indah Jonggol Bukit Gladiola">Citra Indah Jonggol Bukit Gladiola | HP:205 | FAT:72</option>
						<option value="Citra Indah Jonggol Bukit Heliconia (Ext)">Citra Indah Jonggol Bukit Heliconia (Ext) | HP:93 | FAT:1</option>
						<option value="Citra Indah Jonggol Bukit Hijau">Citra Indah Jonggol Bukit Hijau | HP:423 | FAT:165</option>
						<option value="Citra Indah Jonggol Bukit Mahoni">Citra Indah Jonggol Bukit Mahoni | HP:404 | FAT:127</option>
						<option value="Citra Indah Jonggol Bukit Palem">Citra Indah Jonggol Bukit Palem | HP:545 | FAT:259</option>
						<option value="Citra Indah Jonggol Bukit Permai">Citra Indah Jonggol Bukit Permai | HP:59 | FAT:37</option>
						<option value="Citra Indah Jonggol Bukit Pinus">Citra Indah Jonggol Bukit Pinus | HP:653 | FAT:204</option>
						<option value="Citra Indah Jonggol Bukit Ravenia">Citra Indah Jonggol Bukit Ravenia | HP:533 | FAT:188</option>
						<option value="Citra Indah Jonggol Bukit Vignolia">Citra Indah Jonggol Bukit Vignolia | HP:538 | FAT:121</option>
						<option value="Citra Indah Jonggol Bukit Widelia">Citra Indah Jonggol Bukit Widelia | HP:270 | FAT:198</option>
						<option value="Citra Indah Jonggol Bukit Wijaya Kusuma">Citra Indah Jonggol Bukit Wijaya Kusuma | HP:563 | FAT:123</option>
						<option value="Cleopatra">Cleopatra | HP:167 | FAT:89</option>
						<option value="Cluster Ottawa">Cluster Ottawa | HP:309 | FAT:102</option>
						<option value="Coatesville">Coatesville | HP:425 | FAT:272</option>
						<option value="Colombus">Colombus | HP:473 | FAT:209</option>
						<option value="Costa Verde">Costa Verde | HP:46 | FAT:11</option>
						<option value="Da Vinci">Da Vinci | HP:120 | FAT:89</option>
						<option value="Denhaag (P)">Denhaag (P) | HP:70 | FAT:36</option>
						<option value="Duta Mekar Asri">Duta Mekar Asri | HP:993 | FAT:154</option>
						<option value="Duta Mekar Asri RT 16">Duta Mekar Asri RT 16 | HP:80 | FAT:4</option>
						<option value="Einstein">Einstein | HP:312 | FAT:161</option>
						<option value="Florence">Florence | HP:424 | FAT:183</option>
						<option value="Galileo">Galileo | HP:142 | FAT:56</option>
						<option value="Georgia And New Georgia (Tb)">Georgia And New Georgia (Tb) | HP:198 | FAT:86</option>
						<option value="Grand Mutiara 2">Grand Mutiara 2 | HP:163 | FAT:65</option>
						<option value="Grand Nusa Indah">Grand Nusa Indah | HP:302 | FAT:94</option>
						<option value="Grand Nusa Indah - Blok L">Grand Nusa Indah - Blok L | HP:209 | FAT:77</option>
						<option value="Grand Nusa Indah - Blok M">Grand Nusa Indah - Blok M | HP:71 | FAT:22</option>
						<option value="Grand Nusa Indah - Blok N">Grand Nusa Indah - Blok N | HP:298 | FAT:136</option>
						<option value="Grand Nusa Indah - Blok O">Grand Nusa Indah - Blok O | HP:145 | FAT:52</option>
						<option value="Grand Nusa Indah - Blok Pq">Grand Nusa Indah - Blok Pq | HP:166 | FAT:90</option>
						<option value="Grand Nusa Indah - Blok R-S">Grand Nusa Indah - Blok R-S | HP:198 | FAT:125</option>
						<option value="Grand Nusa Indah Anthurium">Grand Nusa Indah Anthurium | HP:254 | FAT:120</option>
						<option value="Grand Nusa Indah Blok K Lanjutan (Ext)">Grand Nusa Indah Blok K Lanjutan (Ext) | HP:16 | FAT:1</option>
						<option value="Grand Nusa Indah Blok N (Ext)">Grand Nusa Indah Blok N (Ext) | HP:38 | FAT:0</option>
						<option value="Grand Nusa Indah Brunflessia">Grand Nusa Indah Brunflessia | HP:309 | FAT:76</option>
						<option value="Grand Nusa Indah-Blok K (Ext)">Grand Nusa Indah-Blok K (Ext) | HP:18 | FAT:0</option>
						<option value="Hacienda Heights">Hacienda Heights | HP:168 | FAT:92</option>
						<option value="Harvest City - Dianthus A">Harvest City - Dianthus A | HP:237 | FAT:99</option>
						<option value="Harvest City - Dianthus B">Harvest City - Dianthus B | HP:277 | FAT:102</option>
						<option value="Harvest City - Florentina">Harvest City - Florentina | HP:207 | FAT:96</option>
						<option value="Harvest City - Oleander (Oj)">Harvest City - Oleander (Oj) | HP:221 | FAT:96</option>
						<option value="Harvest City - Orchid B">Harvest City - Orchid B | HP:266 | FAT:122</option>
						<option value="Harvest City - Orchid E">Harvest City - Orchid E | HP:280 | FAT:120</option>
						<option value="Harvest City - Orchid F">Harvest City - Orchid F | HP:163 | FAT:54</option>
						<option value="Harvest City - Orchid F (Ext)">Harvest City - Orchid F (Ext) | HP:20 | FAT:6</option>
						<option value="Harvest City - Orchid H">Harvest City - Orchid H | HP:208 | FAT:120</option>
						<option value="Harvest City - Orchid I">Harvest City - Orchid I | HP:222 | FAT:126</option>
						<option value="Kavling Polri Nagrak">Kavling Polri Nagrak | HP:387 | FAT:66</option>
						<option value="Keranggan Permai RW 15">Keranggan Permai RW 15 | HP:721 | FAT:254</option>
						<option value="Komplek Twp 2 Tni Al RW 19">Komplek Twp 2 Tni Al RW 19 | HP:478 | FAT:72</option>
						<option value="Komplek Twp 2 Tni Al RW 20">Komplek Twp 2 Tni Al RW 20 | HP:591 | FAT:64</option>
						<option value="Komplek Twp 2 Tni Al RW 21">Komplek Twp 2 Tni Al RW 21 | HP:736 | FAT:103</option>
						<option value="Kyoto">Kyoto | HP:281 | FAT:125</option>
						<option value="Limus Pratama Regency RW 08">Limus Pratama Regency RW 08 | HP:525 | FAT:139</option>
						<option value="Limus Pratama Regency RW 11">Limus Pratama Regency RW 11 | HP:1 | FAT:6</option>
						<option value="Lincoln">Lincoln | HP:99 | FAT:35</option>
						<option value="Livingstone">Livingstone | HP:185 | FAT:74</option>
						<option value="Mansion Garden">Mansion Garden | HP:100 | FAT:82</option>
						<option value="Marcopolo">Marcopolo | HP:557 | FAT:268</option>
						<option value="Marseilles">Marseilles | HP:38 | FAT:32</option>
						<option value="Monaco">Monaco | HP:309 | FAT:126</option>
						<option value="Montreal">Montreal | HP:192 | FAT:77</option>
						<option value="Mozart">Mozart | HP:173 | FAT:75</option>
						<option value="Napoleon">Napoleon | HP:207 | FAT:72</option>
						<option value="Newton">Newton | HP:103 | FAT:51</option>
						<option value="Nobel">Nobel | HP:153 | FAT:73</option>
						<option value="Oma Regency">Oma Regency | HP:114 | FAT:48</option>
						<option value="Ontario">Ontario | HP:135 | FAT:56</option>
						<option value="Orlando">Orlando | HP:281 | FAT:104</option>
						<option value="Oscar">Oscar | HP:77 | FAT:35</option>
						<option value="Paris">Paris | HP:340 | FAT:174</option>
						<option value="Permata Cibubur - Cluster Crystal">Permata Cibubur - Cluster Crystal | HP:127 | FAT:22</option>
						<option value="Permata Cibubur Dragon & Zambrud">Permata Cibubur Dragon & Zambrud | HP:115 | FAT:16</option>
						<option value="Permata Cibubur Phoenix">Permata Cibubur Phoenix | HP:292 | FAT:85</option>
						<option value="Perum Mutiara Cileungsi">Perum Mutiara Cileungsi | HP:299 | FAT:106</option>
						<option value="Picasso">Picasso | HP:318 | FAT:131</option>
						<option value="Pondok Damai Indah RW 12 (FDT 1)">Pondok Damai Indah RW 12 (FDT 1) | HP:127 | FAT:43</option>
						<option value="Pondok Damai Indah RW 12 (FDT 2)">Pondok Damai Indah RW 12 (FDT 2) | HP:365 | FAT:93</option>
						<option value="Pondok Damai Indah RW 13">Pondok Damai Indah RW 13 | HP:699 | FAT:147</option>
						<option value="Pondok Pesantren Riyadhul Huda (Ext)">Pondok Pesantren Riyadhul Huda (Ext) | HP:30 | FAT:0</option>
						<option value="Pondok Ujung Pratama">Pondok Ujung Pratama | HP:53 | FAT:8</option>
						<option value="Rembrandt">Rembrandt | HP:260 | FAT:57</option>
						<option value="Ruko Boston Square">Ruko Boston Square | HP:155 | FAT:87</option>
						<option value="Ruko Citra Grand Citywalk">Ruko Citra Grand Citywalk | HP:172 | FAT:89</option>
						<option value="Ruko Commpark Kota Wisata">Ruko Commpark Kota Wisata | HP:93 | FAT:31</option>
						<option value="Ruko Concordia Kota Wisata">Ruko Concordia Kota Wisata | HP:72 | FAT:38</option>
						<option value="Ruko Kawasan Niaga (R1 S/D R15) FDT1">Ruko Kawasan Niaga (R1 S/D R15) FDT1 | HP:149 | FAT:104</option>
						<option value="Ruko Sentra Eropa Kota Wisata">Ruko Sentra Eropa Kota Wisata | HP:312 | FAT:163</option>
						<option value="Ruko Trafalgar Kota Wisata">Ruko Trafalgar Kota Wisata | HP:68 | FAT:31</option>
						<option value="Salzburg">Salzburg | HP:203 | FAT:55</option>
						<option value="Sentra Dianthus Boulevard I (Blok Db)">Sentra Dianthus Boulevard I (Blok Db) | HP:53 | FAT:26</option>
						<option value="Sentra Dianthus Boulevard Ii">Sentra Dianthus Boulevard Ii | HP:20 | FAT:11</option>
						<option value="Somerset">Somerset | HP:142 | FAT:69</option>
						<option value="The Addres Cluster Deluxe">The Addres Cluster Deluxe | HP:438 | FAT:85</option>
						<option value="The Addres Cluster Platinum">The Addres Cluster Platinum | HP:172 | FAT:63</option>
						<option value="Toronto">Toronto | HP:241 | FAT:100</option>
						<option value="Van Gogh">Van Gogh | HP:371 | FAT:164</option>
						<option value="Vancouver Ext (Ua)">Vancouver Ext (Ua) | HP:254 | FAT:88</option>
						<option value="Vascodagama">Vascodagama | HP:175 | FAT:91</option>
						<option value="Villa Cibubur 2">Villa Cibubur 2 | HP:395 | FAT:88</option>
						<option value="Virginia">Virginia | HP:164 | FAT:92</option>
						<option value="Vivaldi">Vivaldi | HP:418 | FAT:223</option>
						<option value="Washington Barat">Washington Barat | HP:83 | FAT:33</option>
						<option value="Washington Timur">Washington Timur | HP:59 | FAT:35</option>
						<option value="West Covina">West Covina | HP:438 | FAT:174</option>
						<option value="West Covina (Ext)">West Covina (Ext) | HP:5 | FAT:2</option>
						<option value="Wina">Wina | HP:279 | FAT:119</option>
						<option value="Windsor">Windsor | HP:72 | FAT:29</option>
                  </select>
               </div>
               <!-- tutup Cibubur -->

               <!-- Depok -->
               <div id="Depok" class="form-group" style="display: none;">
                  <select class="form-control js-example-basic-single" name="nama_cluster" oninvalid="this.setCustomValidity('Pilih Cluster')" oninput="setCustomValidity('')">
                     <option value="" selected disabled hidden>Pilih Nama Cluster</option>
						<option value="Anyelir 3">Anyelir 3 | HP:838 | FAT:149</option>
						<option value="Apartemen Taman Melati">Apartemen Taman Melati | HP:773 | FAT:796</option>
						<option value="Bdn">Bdn | HP:412 | FAT:107</option>
						<option value="Beji Timur RW 01">Beji Timur RW 01 | HP:450 | FAT:61</option>
						<option value="Beji Timur RW 02">Beji Timur RW 02 | HP:362 | FAT:132</option>
						<option value="Beji Timur RW 03">Beji Timur RW 03 | HP:206 | FAT:71</option>
						<option value="Beji Timur RW 04">Beji Timur RW 04 | HP:257 | FAT:41</option>
						<option value="Beji Timur RW 05">Beji Timur RW 05 | HP:345 | FAT:76</option>
						<option value="Beji Timur RW 06">Beji Timur RW 06 | HP:314 | FAT:71</option>
						<option value="Beji Timur RW 07">Beji Timur RW 07 | HP:26 | FAT:62</option>
						<option value="Bella Casa Residence RW 05 Alamanda And Bougenville">Bella Casa Residence RW 05 Alamanda And Bougenville | HP:192 | FAT:85</option>
						<option value="Bella Casa Residence RW 08 (FDT 1)">Bella Casa Residence RW 08 (FDT 1) | HP:160 | FAT:73</option>
						<option value="Bella Casa Residence RW 23">Bella Casa Residence RW 23 | HP:194 | FAT:115</option>
						<option value="Bella Casa Residence-Cluster Jasmine RW 08 (FDT 2)">Bella Casa Residence-Cluster Jasmine RW 08 (FDT 2) | HP:189 | FAT:103</option>
						<option value="Branch Office Depok">Branch Office Depok | HP:3 | FAT:4</option>
						<option value="Bukit Cengkeh Berbunga RW 24">Bukit Cengkeh Berbunga RW 24 | HP:325 | FAT:73</option>
						<option value="Bukit Cinere Indah RW 16">Bukit Cinere Indah RW 16 | HP:458 | FAT:248</option>
						<option value="Bukit Mekar Perdana RW 20">Bukit Mekar Perdana RW 20 | HP:389 | FAT:79</option>
						<option value="Bukit Nirwana">Bukit Nirwana | HP:62 | FAT:14</option>
						<option value="Bukit Permai">Bukit Permai | HP:543 | FAT:227</option>
						<option value="Cahaya Garuda Permai">Cahaya Garuda Permai | HP:33 | FAT:8</option>
						<option value="Cahaya Garuda Residence">Cahaya Garuda Residence | HP:227 | FAT:72</option>
						<option value="Calista Regensi">Calista Regensi | HP:37 | FAT:10</option>
						<option value="Cibubur Garden">Cibubur Garden | HP:124 | FAT:45</option>
						<option value="Cinere Estate Blok F RW 15">Cinere Estate Blok F RW 15 | HP:290 | FAT:126</option>
						<option value="Depok Indah 1 RW 17">Depok Indah 1 RW 17 | HP:78 | FAT:71</option>
						<option value="Depok Jaya Agung">Depok Jaya Agung | HP:462 | FAT:107</option>
						<option value="Depok Sawangan Permai">Depok Sawangan Permai | HP:1250 | FAT:10</option>
						<option value="Depok-Jalan Legong Blok 1">Depok-Jalan Legong Blok 1 | HP:88 | FAT:2</option>
						<option value="Deppen RW 16 Kel Suka Tani">Deppen RW 16 Kel Suka Tani | HP:302 | FAT:29</option>
						<option value="Graha Cinere Modern">Graha Cinere Modern | HP:75 | FAT:11</option>
						<option value="Green Pitara">Green Pitara | HP:130 | FAT:24</option>
						<option value="Griya Asri Cinere">Griya Asri Cinere | HP:57 | FAT:10</option>
						<option value="Griya Cimanggis">Griya Cimanggis | HP:90 | FAT:10</option>
						<option value="Griya Elok">Griya Elok | HP:51 | FAT:11</option>
						<option value="Griya Lembah Depok RW 25">Griya Lembah Depok RW 25 | HP:76 | FAT:16</option>
						<option value="Griya Pesona Alam">Griya Pesona Alam | HP:74 | FAT:0</option>
						<option value="Griya Sakinah">Griya Sakinah | HP:75 | FAT:11</option>
						<option value="Jati Jajar Estate RW 11">Jati Jajar Estate RW 11 | HP:386 | FAT:70</option>
						<option value="Jl Bukit Sikumbang (Fe Ext)">Jl Bukit Sikumbang (Fe Ext) | HP:1 | FAT:5</option>
						<option value="Jl Kartini (Fe Ext)">Jl Kartini (Fe Ext) | HP:4 | FAT:9</option>
						<option value="Jl Sawangan Elok (Fe Ext)">Jl Sawangan Elok (Fe Ext) | HP:5 | FAT:1</option>
						<option value="Kavling Kostrad Cimanggis">Kavling Kostrad Cimanggis | HP:25 | FAT:6</option>
						<option value="Kavling Ui Timur">Kavling Ui Timur | HP:211 | FAT:32</option>
						<option value="Kemang Swatama">Kemang Swatama | HP:363 | FAT:112</option>
						<option value="Komplek Bbd">Komplek Bbd | HP:273 | FAT:31</option>
						<option value="Komplek Bumi Sawangan Elok RW 07">Komplek Bumi Sawangan Elok RW 07 | HP:342 | FAT:59</option>
						<option value="Komplek Bumi Sawangan Elok RW 10">Komplek Bumi Sawangan Elok RW 10 | HP:312 | FAT:54</option>
						<option value="Komplek Deppen RW 10">Komplek Deppen RW 10 | HP:428 | FAT:108</option>
						<option value="Komplek Deppen RW 17">Komplek Deppen RW 17 | HP:339 | FAT:67</option>
						<option value="Komplek Dept Koperasi">Komplek Dept Koperasi | HP:310 | FAT:55</option>
						<option value="Komplek Kopassus Pelita 1 RW 09">Komplek Kopassus Pelita 1 RW 09 | HP:292 | FAT:49</option>
						<option value="Komplek Kopassus Pelita 1 RW 11">Komplek Kopassus Pelita 1 RW 11 | HP:181 | FAT:54</option>
						<option value="Komplek Kopassus Sedayu RW 13">Komplek Kopassus Sedayu RW 13 | HP:336 | FAT:51</option>
						<option value="Komplek Krama Yudha Tiga Berlian">Komplek Krama Yudha Tiga Berlian | HP:201 | FAT:50</option>
						<option value="Komplek Pelni RW 17">Komplek Pelni RW 17 | HP:403 | FAT:71</option>
						<option value="Komplek Pelni RW 18">Komplek Pelni RW 18 | HP:288 | FAT:55</option>
						<option value="Komplek Pelni RW 19">Komplek Pelni RW 19 | HP:219 | FAT:43</option>
						<option value="Komplek Permata Arcadia">Komplek Permata Arcadia | HP:294 | FAT:142</option>
						<option value="Komplek Pertamina / Iptn">Komplek Pertamina / Iptn | HP:79 | FAT:34</option>
						<option value="Komplek Sukamaju Permai">Komplek Sukamaju Permai | HP:1 | FAT:6</option>
						<option value="Komplek Sukatani RW 14">Komplek Sukatani RW 14 | HP:286 | FAT:303</option>
						<option value="Komplek Sukatani RW 15">Komplek Sukatani RW 15 | HP:449 | FAT:385</option>
						<option value="Komplek Sukatani RW 18">Komplek Sukatani RW 18 | HP:734 | FAT:384</option>
						<option value="Komplek Sukatani RW 20">Komplek Sukatani RW 20 | HP:810 | FAT:423</option>
						<option value="Lembah Cinere Indah">Lembah Cinere Indah | HP:207 | FAT:67</option>
						<option value="Lembah Hijau Gobel">Lembah Hijau Gobel | HP:693 | FAT:219</option>
						<option value="Mampang Indah 1 RW 08">Mampang Indah 1 RW 08 | HP:219 | FAT:34</option>
						<option value="Mampang Indah 2">Mampang Indah 2 | HP:106 | FAT:64</option>
						<option value="Mampang Indah 2 RT 5">Mampang Indah 2 RT 5 | HP:81 | FAT:39</option>
						<option value="Megapolitan Cinere Estate RW 13">Megapolitan Cinere Estate RW 13 | HP:375 | FAT:166</option>
						<option value="Megapolitan Cinere Estate RW 14">Megapolitan Cinere Estate RW 14 | HP:397 | FAT:180</option>
						<option value="Megapolitan Cinere Estate RW 18">Megapolitan Cinere Estate RW 18 | HP:319 | FAT:129</option>
						<option value="Mutiara Darusalam">Mutiara Darusalam | HP:152 | FAT:32</option>
						<option value="Mutiara Depok (FDT 1)">Mutiara Depok (FDT 1) | HP:293 | FAT:13</option>
						<option value="Mutiara Depok (FDT 2)">Mutiara Depok (FDT 2) | HP:249 | FAT:33</option>
						<option value="Nuansa Depok 99">Nuansa Depok 99 | HP:41 | FAT:3</option>
						<option value="Oma Indah 2">Oma Indah 2 | HP:148 | FAT:20</option>
						<option value="Palem Ganda Asri (FDT 1)">Palem Ganda Asri (FDT 1) | HP:340 | FAT:132</option>
						<option value="Palem Ganda Asri (FDT 2)">Palem Ganda Asri (FDT 2) | HP:114 | FAT:32</option>
						<option value="Pancoran Mas Permai RW 07">Pancoran Mas Permai RW 07 | HP:256 | FAT:79</option>
						<option value="Pearl Garden Sawangan">Pearl Garden Sawangan | HP:49 | FAT:10</option>
						<option value="Pelita Air Service RW 15">Pelita Air Service RW 15 | HP:504 | FAT:78</option>
						<option value="Permata Arcadia - De Bale">Permata Arcadia - De Bale | HP:209 | FAT:74</option>
						<option value="Permata Depok Regency Zona Jamrud">Permata Depok Regency Zona Jamrud | HP:151 | FAT:24</option>
						<option value="Permata Duta RW 12">Permata Duta RW 12 | HP:14 | FAT:40</option>
						<option value="Permata Duta RW 12 & Permata Duta RW 25">Permata Duta RW 12 & Permata Duta RW 25 | HP:113 | FAT:42</option>
						<option value="Permata Duta RW.25">Permata Duta RW.25 | HP:1 | FAT:5</option>
						<option value="Permata Green Cinere">Permata Green Cinere | HP:115 | FAT:48</option>
						<option value="Permata Jasindo Lestari">Permata Jasindo Lestari | HP:202 | FAT:28</option>
						<option value="Permata Puri 1 (FDT 1)">Permata Puri 1 (FDT 1) | HP:257 | FAT:25</option>
						<option value="Permata Puri 1 (FDT 2)">Permata Puri 1 (FDT 2) | HP:175 | FAT:20</option>
						<option value="Perum Bpi">Perum Bpi | HP:28 | FAT:11</option>
						<option value="Perum Bukit Sawangan Indah RW 05">Perum Bukit Sawangan Indah RW 05 | HP:1273 | FAT:341</option>
						<option value="Perum Cimanggis Indah RW 05 & RW 11">Perum Cimanggis Indah RW 05 & RW 11 | HP:219 | FAT:33</option>
						<option value="Perum Depok 1 RW 01">Perum Depok 1 RW 01 | HP:268 | FAT:70</option>
						<option value="Perum Depok Timur RW 09">Perum Depok Timur RW 09 | HP:413 | FAT:24</option>
						<option value="Perum Depok Timur RW 10">Perum Depok Timur RW 10 | HP:347 | FAT:67</option>
						<option value="Perum Depok Utara, Beji RW 06">Perum Depok Utara, Beji RW 06 | HP:348 | FAT:87</option>
						<option value="Perum Depok Utara, Beji RW 07">Perum Depok Utara, Beji RW 07 | HP:222 | FAT:80</option>
						<option value="Perum Depok Utara, Beji RW 08">Perum Depok Utara, Beji RW 08 | HP:180 | FAT:49</option>
						<option value="Perum Pupuk Kujang">Perum Pupuk Kujang | HP:300 | FAT:90</option>
						<option value="Perum Tugu Indah">Perum Tugu Indah | HP:62 | FAT:27</option>
						<option value="Perumahan Pertamina">Perumahan Pertamina | HP:150 | FAT:39</option>
						<option value="Perumahan Pesona Faria">Perumahan Pesona Faria | HP:45 | FAT:3</option>
						<option value="Perumahan Pondok Mutiara Asri (Ext)">Perumahan Pondok Mutiara Asri (Ext) | HP:27 | FAT:0</option>
						<option value="Pesona Cinere Residence">Pesona Cinere Residence | HP:142 | FAT:39</option>
						<option value="Pesona Khayangan">Pesona Khayangan | HP:197 | FAT:87</option>
						<option value="Pesona Khayangan Ii RW 28 (FDT 1)">Pesona Khayangan Ii RW 28 (FDT 1) | HP:279 | FAT:138</option>
						<option value="Pesona Khayangan Ii RW 28 (FDT 2)">Pesona Khayangan Ii RW 28 (FDT 2) | HP:216 | FAT:82</option>
						<option value="Pesona Madani">Pesona Madani | HP:78 | FAT:10</option>
						<option value="Pitara Village">Pitara Village | HP:32 | FAT:10</option>
						<option value="Pondok Cibubur">Pondok Cibubur | HP:443 | FAT:184</option>
						<option value="Pondok Duta 2">Pondok Duta 2 | HP:242 | FAT:58</option>
						<option value="Puri Anggrek Mas">Puri Anggrek Mas | HP:207 | FAT:39</option>
						<option value="Puri Cinere Hijau & Perum Rangkapan Indah">Puri Cinere Hijau & Perum Rangkapan Indah | HP:134 | FAT:9</option>
						<option value="Puri Depok Mas">Puri Depok Mas | HP:569 | FAT:103</option>
						<option value="Puri Depok Mas (Ext)">Puri Depok Mas (Ext) | HP:38 | FAT:0</option>
						<option value="Puri Kencana Permai">Puri Kencana Permai | HP:40 | FAT:8</option>
						<option value="Qoryatussalam Sani">Qoryatussalam Sani | HP:190 | FAT:21</option>
						<option value="Rose Garden">Rose Garden | HP:138 | FAT:48</option>
						<option value="Ruko Cahaya Garuda Permai">Ruko Cahaya Garuda Permai | HP:17 | FAT:13</option>
						<option value="Ruko Itc Depok">Ruko Itc Depok | HP:49 | FAT:27</option>
						<option value="Ruko Kartini - Branch Office Depok">Ruko Kartini - Branch Office Depok | HP:3 | FAT:7</option>
						<option value="Sawangan Elok RW 11">Sawangan Elok RW 11 | HP:266 | FAT:27</option>
						<option value="Sawangan Regency">Sawangan Regency | HP:274 | FAT:74</option>
						<option value="Sersan Aning RW 07">Sersan Aning RW 07 | HP:340 | FAT:106</option>
						<option value="Studio Alam Indah">Studio Alam Indah | HP:176 | FAT:42</option>
						<option value="Studio Alam Resident">Studio Alam Resident | HP:14 | FAT:5</option>
						<option value="Sukma Jaya Permata">Sukma Jaya Permata | HP:218 | FAT:67</option>
						<option value="Taman Anyelir 2">Taman Anyelir 2 | HP:394 | FAT:72</option>
						<option value="Taman Anyelir 3">Taman Anyelir 3 | HP:76 | FAT:33</option>
						<option value="Taman Cipayung">Taman Cipayung | HP:350 | FAT:91</option>
						<option value="Taman Depok Permai">Taman Depok Permai | HP:292 | FAT:34</option>
						<option value="Taman Manggis Indah">Taman Manggis Indah | HP:265 | FAT:18</option>
						<option value="Taman Sawangan Residence & Perum Joglo">Taman Sawangan Residence & Perum Joglo | HP:175 | FAT:11</option>
						<option value="Taman Tiga Putra">Taman Tiga Putra | HP:93 | FAT:13</option>
						<option value="Telaga Golf Sawangan Cluster Bali">Telaga Golf Sawangan Cluster Bali | HP:203 | FAT:110</option>
						<option value="Telaga Golf Sawangan Cluster Belanda">Telaga Golf Sawangan Cluster Belanda | HP:307 | FAT:125</option>
						<option value="Telaga Golf Sawangan Cluster Espanola">Telaga Golf Sawangan Cluster Espanola | HP:376 | FAT:264</option>
						<option value="Telaga Golf Sawangan Cluster France">Telaga Golf Sawangan Cluster France | HP:230 | FAT:94</option>
						<option value="Telaga Golf Sawangan Cluster Great Britain">Telaga Golf Sawangan Cluster Great Britain | HP:183 | FAT:54</option>
						<option value="Telaga Golf Sawangan Cluster Miami & Manaco & Malaca">Telaga Golf Sawangan Cluster Miami & Manaco & Malaca | HP:171 | FAT:70</option>
						<option value="Teratai Residence">Teratai Residence | HP:72 | FAT:3</option>
						<option value="The Limo Residence">The Limo Residence | HP:73 | FAT:8</option>
						<option value="Tirta Mandala RW 18 & Tirta Mandala RT 04/04">Tirta Mandala RW 18 & Tirta Mandala RT 04/04 | HP:310 | FAT:59</option>
						<option value="Tirta Mandala RW 19">Tirta Mandala RW 19 | HP:286 | FAT:54</option>
						<option value="Villa Cemara">Villa Cemara | HP:33 | FAT:9</option>
						<option value="Villa Cibubur Indah">Villa Cibubur Indah | HP:114 | FAT:59</option>
						<option value="Villa Cibubur Indah 2">Villa Cibubur Indah 2 | HP:55 | FAT:29</option>
						<option value="Villa Cibubur Indah 3">Villa Cibubur Indah 3 | HP:116 | FAT:44</option>
						<option value="Villa Cinere Hijau 1">Villa Cinere Hijau 1 | HP:77 | FAT:11</option>
						<option value="Villa Cinere Hijau 2 RW 05">Villa Cinere Hijau 2 RW 05 | HP:77 | FAT:9</option>
						<option value="Villa Mutiara Cinere">Villa Mutiara Cinere | HP:840 | FAT:210</option>
						<option value="Villa Santika">Villa Santika | HP:228 | FAT:73</option>
						<option value="Wisma Cakra">Wisma Cakra | HP:419 | FAT:163</option>
                  </select>
               </div>
               <!-- tutup Depok -->

               <!-- Jakarta -->
               <div id="Jakarta" class="form-group" style="display: none;">
                  <select class="form-control js-example-basic-single" name="nama_cluster" oninvalid="this.setCustomValidity('Pilih Cluster')" oninput="setCustomValidity('')">
						<option value="Apartment Ambassador">Apartment Ambassador | HP:385 | FAT:125</option>
						<option value="Apartment Cempaka Mas">Apartment Cempaka Mas | HP:890 | FAT:231</option>
						<option value="Apartment Four Seasons">Apartment Four Seasons | HP:222 | FAT:157</option>
						<option value="Apartment Itc Permata Hijau">Apartment Itc Permata Hijau | HP:273 | FAT:55</option>
						<option value="Apartment Pakubuwono Residence">Apartment Pakubuwono Residence | HP:392 | FAT:94</option>
						<option value="Apartment Pakubuwono Residence -">Apartment Pakubuwono Residence -  | HP:0 | FAT:40</option>
						<option value="Apartment Pakubuwono Residence - Tower Iron Wood & Eagle Wood">Apartment Pakubuwono Residence - Tower Iron Wood & Eagle Wood | HP:3 | FAT:14</option>
						<option value="Apartment Roxy Mas">Apartment Roxy Mas | HP:118 | FAT:13</option>
						<option value="Apartment Taman Rasuna">Apartment Taman Rasuna | HP:3071 | FAT:814</option>
						<option value="Btn Kembangan">Btn Kembangan | HP:102 | FAT:11</option>
						<option value="Citra Garden 2 (FDT 1)">Citra Garden 2 (FDT 1) | HP:311 | FAT:39</option>
						<option value="Citra Garden 2 (FDT 3)">Citra Garden 2 (FDT 3) | HP:297 | FAT:24</option>
						<option value="Citra Garden 2 (FDT 5)">Citra Garden 2 (FDT 5) | HP:291 | FAT:26</option>
						<option value="Citra Garden 2 RW 12 (FDT 2)">Citra Garden 2 RW 12 (FDT 2) | HP:282 | FAT:17</option>
						<option value="Citra Garden 2 RW 19 (FDT 4)">Citra Garden 2 RW 19 (FDT 4) | HP:314 | FAT:20</option>
						<option value="Citra Garden 2 RW 19 (FDT 6)">Citra Garden 2 RW 19 (FDT 6) | HP:316 | FAT:50</option>
						<option value="Citra Garden 3 Blok A Dan Blok F">Citra Garden 3 Blok A Dan Blok F | HP:258 | FAT:106</option>
						<option value="Citra Garden 3 Blok B">Citra Garden 3 Blok B | HP:469 | FAT:177</option>
						<option value="Citra Garden 3 Blok C">Citra Garden 3 Blok C | HP:249 | FAT:85</option>
						<option value="Citra Garden 3 Blok D">Citra Garden 3 Blok D | HP:218 | FAT:62</option>
						<option value="Citra Garden 3 Blok E">Citra Garden 3 Blok E | HP:179 | FAT:80</option>
						<option value="Citra Garden 5 RW 10 (FDT 1)">Citra Garden 5 RW 10 (FDT 1) | HP:274 | FAT:27</option>
						<option value="Citra Garden 5 RW 10 (FDT 2)">Citra Garden 5 RW 10 (FDT 2) | HP:303 | FAT:14</option>
						<option value="Citra Garden 5 RW 10 (FDT 3)">Citra Garden 5 RW 10 (FDT 3) | HP:226 | FAT:25</option>
						<option value="Citra Garden 5 RW 16 (FDT 1)">Citra Garden 5 RW 16 (FDT 1) | HP:176 | FAT:16</option>
						<option value="Citra Garden 5 RW 16 (FDT 2)">Citra Garden 5 RW 16 (FDT 2) | HP:164 | FAT:16</option>
						<option value="Green Garden RW 03 (FDT 1)">Green Garden RW 03 (FDT 1) | HP:105 | FAT:56</option>
						<option value="Green Garden RW 03 (FDT 2)">Green Garden RW 03 (FDT 2) | HP:417 | FAT:171</option>
						<option value="Green Garden RW 03 (FDT 3)">Green Garden RW 03 (FDT 3) | HP:371 | FAT:161</option>
						<option value="Green Garden RW 04">Green Garden RW 04 | HP:350 | FAT:125</option>
						<option value="Green Ville (FDT 1)">Green Ville (FDT 1) | HP:197 | FAT:58</option>
						<option value="Green Ville (FDT 2)">Green Ville (FDT 2) | HP:422 | FAT:141</option>
						<option value="Jalan E RW 03">Jalan E RW 03 | HP:254 | FAT:45</option>
						<option value="Jatinegara Indah RW 09 (FDT 1)">Jatinegara Indah RW 09 (FDT 1) | HP:400 | FAT:147</option>
						<option value="Jatinegara Indah RW 09 (FDT 2)">Jatinegara Indah RW 09 (FDT 2) | HP:446 | FAT:174</option>
						<option value="Kebon Jeruk RW 08">Kebon Jeruk RW 08 | HP:312 | FAT:117</option>
						<option value="Kembangan Baru">Kembangan Baru | HP:147 | FAT:13</option>
						<option value="Kosambi Baru RW 15 (FDT 1)">Kosambi Baru RW 15 (FDT 1) | HP:399 | FAT:128</option>
						<option value="Kosambi Baru RW 15 (FDT 2)">Kosambi Baru RW 15 (FDT 2) | HP:252 | FAT:51</option>
						<option value="Pemukiman RW 06 - Kelurahan Pulo Gadung">Pemukiman RW 06 - Kelurahan Pulo Gadung | HP:235 | FAT:31</option>
						<option value="Pemukiman RW 10 Kayu Putih (FDT 1)">Pemukiman RW 10 Kayu Putih (FDT 1) | HP:158 | FAT:23</option>
						<option value="Pemukiman RW 10 Kayu Putih (FDT 2)">Pemukiman RW 10 Kayu Putih (FDT 2) | HP:166 | FAT:33</option>
						<option value="Permata Taman Palem">Permata Taman Palem | HP:1 | FAT:5</option>
						<option value="Perum Budi Indah (FDT 1)">Perum Budi Indah (FDT 1) | HP:258 | FAT:63</option>
						<option value="Perum Budi Indah (FDT 2)">Perum Budi Indah (FDT 2) | HP:275 | FAT:55</option>
						<option value="Perum Budi Indah (FDT 3)">Perum Budi Indah (FDT 3) | HP:368 | FAT:87</option>
						<option value="Perum Taman Ratu RW 11">Perum Taman Ratu RW 11 | HP:221 | FAT:20</option>
						<option value="Perum Taman Ratu RW 13 (FDT 1)">Perum Taman Ratu RW 13 (FDT 1) | HP:183 | FAT:11</option>
						<option value="Perum Taman Ratu RW 13 (FDT 2)">Perum Taman Ratu RW 13 (FDT 2) | HP:206 | FAT:25</option>
						<option value="Perum Taman Ratu RW 13 (FDT 3)">Perum Taman Ratu RW 13 (FDT 3) | HP:304 | FAT:35</option>
						<option value="Perumahan Dirjen Perhubungan Udara">Perumahan Dirjen Perhubungan Udara | HP:110 | FAT:36</option>
						<option value="Perumahan Taman Mahkota">Perumahan Taman Mahkota | HP:216 | FAT:97</option>
						<option value="Perumahan Utama Area RW 01 FDT 1">Perumahan Utama Area RW 01 FDT 1 | HP:250 | FAT:26</option>
						<option value="Perumahan Utama Area RW 01 FDT 2">Perumahan Utama Area RW 01 FDT 2 | HP:343 | FAT:67</option>
						<option value="Puri Indah RW 04">Puri Indah RW 04 | HP:402 | FAT:192</option>
						<option value="Puri Indah RW 08">Puri Indah RW 08 | HP:425 | FAT:170</option>
						<option value="Puri Kembangan RW 02">Puri Kembangan RW 02 | HP:231 | FAT:146</option>
						<option value="Rukan Graha Cempaka Mas">Rukan Graha Cempaka Mas | HP:164 | FAT:41</option>
						<option value="Ruko Bahan Bangunan Mall Mangga Dua">Ruko Bahan Bangunan Mall Mangga Dua | HP:243 | FAT:107</option>
						<option value="Ruko Blok A Mall Mangga Dua">Ruko Blok A Mall Mangga Dua | HP:25 | FAT:8</option>
						<option value="Ruko Itc Fatmawati">Ruko Itc Fatmawati | HP:249 | FAT:94</option>
						<option value="Ruko Itc Permata Hijau">Ruko Itc Permata Hijau | HP:114 | FAT:12</option>
						<option value="Ruko Itc Roxy Mas">Ruko Itc Roxy Mas | HP:518 | FAT:93</option>
						<option value="Ruko Mall Mangga Dua">Ruko Mall Mangga Dua | HP:55 | FAT:13</option>
						<option value="Ruko Mega Grosir Cempaka Mas">Ruko Mega Grosir Cempaka Mas | HP:732 | FAT:255</option>
						<option value="Ruko Orion Mall Mangga Dua">Ruko Orion Mall Mangga Dua | HP:21 | FAT:4</option>
						<option value="Ruko Textile Itc Mangga Dua">Ruko Textile Itc Mangga Dua | HP:295 | FAT:161</option>
						<option value="Ruko Wisma Eka Jiwa Mall Mangga Dua">Ruko Wisma Eka Jiwa Mall Mangga Dua | HP:33 | FAT:9</option>
						<option value="Taman Alfa Indah RW 05 (FDT 1)(Ae)">Taman Alfa Indah RW 05 (FDT 1)(Ae) | HP:233 | FAT:78</option>
						<option value="Taman Alfa Indah RW 05 (FDT 2)(Ae)">Taman Alfa Indah RW 05 (FDT 2)(Ae) | HP:236 | FAT:85</option>
						<option value="Taman Alfa Indah RW 05 (FDT 2)(Ug)">Taman Alfa Indah RW 05 (FDT 2)(Ug) | HP:82 | FAT:37</option>
						<option value="Taman Alfa Indah RW 07 (FDT 1)(Ae)">Taman Alfa Indah RW 07 (FDT 1)(Ae) | HP:170 | FAT:59</option>
						<option value="Taman Alfa Indah RW 07 (FDT 1)(Ug)">Taman Alfa Indah RW 07 (FDT 1)(Ug) | HP:112 | FAT:66</option>
						<option value="Taman Alfa Indah RW 07 (FDT 2)(Ug)">Taman Alfa Indah RW 07 (FDT 2)(Ug) | HP:287 | FAT:122</option>
						<option value="Taman Aries RW 08 (FDT 1)">Taman Aries RW 08 (FDT 1) | HP:184 | FAT:16</option>
						<option value="Taman Aries RW 08 (FDT 2)">Taman Aries RW 08 (FDT 2) | HP:187 | FAT:22</option>
						<option value="Taman Kedoya Baru RW 04 (FDT 1)">Taman Kedoya Baru RW 04 (FDT 1) | HP:223 | FAT:66</option>
						<option value="Taman Kedoya Baru RW 04 (FDT 2)">Taman Kedoya Baru RW 04 (FDT 2) | HP:353 | FAT:173</option>
						<option value="Taman Kedoya Baru RW 04 (FDT 3)">Taman Kedoya Baru RW 04 (FDT 3) | HP:290 | FAT:102</option>
						<option value="Taman Kedoya Permai FDT 1">Taman Kedoya Permai FDT 1 | HP:200 | FAT:5</option>
						<option value="Taman Kedoya Permai FDT 2">Taman Kedoya Permai FDT 2 | HP:168 | FAT:8</option>
						<option value="Taman Kota">Taman Kota | HP:846 | FAT:201</option>
						<option value="Taman Meruya RW 04">Taman Meruya RW 04 | HP:687 | FAT:325</option>
						<option value="Taman Palem Lestari RW 15 (FDT 1)">Taman Palem Lestari RW 15 (FDT 1) | HP:121 | FAT:50</option>
						<option value="Taman Palem Lestari RW 15 (FDT 2)">Taman Palem Lestari RW 15 (FDT 2) | HP:303 | FAT:161</option>
						<option value="Taman Palem Lestari RW 15 (FDT 3)">Taman Palem Lestari RW 15 (FDT 3) | HP:315 | FAT:103</option>
						<option value="Taman Pulo Gebang">Taman Pulo Gebang | HP:384 | FAT:207</option>
						<option value="Taman Surya 3 (FDT 1)">Taman Surya 3 (FDT 1) | HP:414 | FAT:147</option>
						<option value="Taman Surya 3 (FDT 2)">Taman Surya 3 (FDT 2) | HP:162 | FAT:44</option>
						<option value="Tanjung Duren Selatan RW 03">Tanjung Duren Selatan RW 03 | HP:413 | FAT:126</option>
						<option value="Tanjung Duren Selatan RW 05">Tanjung Duren Selatan RW 05 | HP:294 | FAT:123</option>
						<option value="Tanjung Duren Utara RW 02">Tanjung Duren Utara RW 02 | HP:332 | FAT:68</option>
						<option value="Tanjung Duren Utara RW 03 (FDT 1)">Tanjung Duren Utara RW 03 (FDT 1) | HP:656 | FAT:152</option>
						<option value="Tanjung Duren Utara RW 03 (FDT 2)">Tanjung Duren Utara RW 03 (FDT 2) | HP:390 | FAT:132</option>
						<option value="Tanjung Duren Utara RW 04">Tanjung Duren Utara RW 04 | HP:224 | FAT:124</option>
						<option value="Tanjung Duren Utara RW 05">Tanjung Duren Utara RW 05 | HP:139 | FAT:53</option>
						<option value="Tanjung Duren Utara RW 06 (FDT 1)">Tanjung Duren Utara RW 06 (FDT 1) | HP:311 | FAT:52</option>
                  </select>
               </div>
               <!-- tutup Jakarta -->

               <!-- Malang -->
               <div id="Malang" class="form-group" style="display: none;">
                  <select class="form-control js-example-basic-single" name="nama_cluster" oninvalid="this.setCustomValidity('Pilih Cluster')" oninput="setCustomValidity('')">
                     <option value="" selected disabled hidden>Pilih Nama Cluster</option>
						<option value="Baiduri Area RT 02">Baiduri Area RT 02 | HP:105 | FAT:42</option>
						<option value="Brantas Area RW 01">Brantas Area RW 01 | HP:473 | FAT:282</option>
						<option value="Brantas Area RW 06">Brantas Area RW 06 | HP:164 | FAT:57</option>
						<option value="Brantas Area RW 7">Brantas Area RW 7 | HP:597 | FAT:307</option>
						<option value="Bukit Dieng RT 08 & 09">Bukit Dieng RT 08 & 09 | HP:316 | FAT:201</option>
						<option value="Bukit Dieng RT 7">Bukit Dieng RT 7 | HP:200 | FAT:137</option>
						<option value="Bukit Tidar Permai RW 07">Bukit Tidar Permai RW 07 | HP:525 | FAT:517</option>
						<option value="Bukit Tidar Permai RW 10">Bukit Tidar Permai RW 10 | HP:429 | FAT:275</option>
						<option value="Bumi Asri Sengkaling RW 05">Bumi Asri Sengkaling RW 05 | HP:337 | FAT:301</option>
						<option value="Bumi Asri Sengkaling RW 09">Bumi Asri Sengkaling RW 09 | HP:264 | FAT:141</option>
						<option value="Bumi Meranti Wangi">Bumi Meranti Wangi | HP:255 | FAT:157</option>
						<option value="Bumi Sulfat Residence">Bumi Sulfat Residence | HP:56 | FAT:30</option>
						<option value="Bunulrejo RW 1 & RW 2">Bunulrejo RW 1 & RW 2 | HP:348 | FAT:183</option>
						<option value="Bunulrejo RW 12">Bunulrejo RW 12 | HP:104 | FAT:47</option>
						<option value="Bunulrejo RW 18">Bunulrejo RW 18 | HP:418 | FAT:277</option>
						<option value="Bunulrejo RW 3 & RW 4">Bunulrejo RW 3 & RW 4 | HP:288 | FAT:242</option>
						<option value="Candi Bajang Ratu">Candi Bajang Ratu | HP:199 | FAT:80</option>
						<option value="Candi Kalasan RW 10">Candi Kalasan RW 10 | HP:214 | FAT:71</option>
						<option value="Candi Mendut Selatan RW Xi">Candi Mendut Selatan RW Xi | HP:232 | FAT:133</option>
						<option value="Ciliwung Area RW 07">Ciliwung Area RW 07 | HP:303 | FAT:112</option>
						<option value="Citra Mas Raya">Citra Mas Raya | HP:156 | FAT:103</option>
						<option value="Delta Dieng">Delta Dieng | HP:61 | FAT:35</option>
						<option value="Dinoyo RW 06">Dinoyo RW 06 | HP:342 | FAT:223</option>
						<option value="D'Wiga Regency">D'Wiga Regency | HP:233 | FAT:108</option>
						<option value="Gading Kasri RW 02 RT 11">Gading Kasri RW 02 RT 11 | HP:58 | FAT:36</option>
						<option value="Gading Kasri RW 05">Gading Kasri RW 05 | HP:173 | FAT:92</option>
						<option value="Graha Pelita Asrikaton">Graha Pelita Asrikaton | HP:255 | FAT:165</option>
						<option value="Graha Sapto Raya">Graha Sapto Raya | HP:771 | FAT:437</option>
						<option value="Graha Sengkaling (Ae)">Graha Sengkaling (Ae) | HP:46 | FAT:11</option>
						<option value="Graha Sengkaling (Ug)">Graha Sengkaling (Ug) | HP:34 | FAT:28</option>
						<option value="Grand Tombro Residance (Ext)">Grand Tombro Residance (Ext) | HP:22 | FAT:5</option>
						<option value="Greenland At Tidar">Greenland At Tidar | HP:471 | FAT:346</option>
						<option value="Griya Saxophone">Griya Saxophone | HP:75 | FAT:55</option>
						<option value="Griya Shanta RW 15">Griya Shanta RW 15 | HP:167 | FAT:75</option>
						<option value="Griya Shanta RW 16 (Ae)">Griya Shanta RW 16 (Ae) | HP:73 | FAT:48</option>
						<option value="Griya Shanta RW 16 (Ug)">Griya Shanta RW 16 (Ug) | HP:111 | FAT:92</option>
						<option value="Istana Gajayana">Istana Gajayana | HP:106 | FAT:98</option>
						<option value="Jatimulyo RT 09 RW 04">Jatimulyo RT 09 RW 04 | HP:108 | FAT:37</option>
						<option value="Jatimulyo RW 01">Jatimulyo RW 01 | HP:271 | FAT:141</option>
						<option value="Jatimulyo RW 01 RT 03">Jatimulyo RW 01 RT 03 | HP:82 | FAT:49</option>
						<option value="Jatimulyo RW 02">Jatimulyo RW 02 | HP:213 | FAT:147</option>
						<option value="Jatimulyo RW 08">Jatimulyo RW 08 | HP:612 | FAT:430</option>
						<option value="Jatimulyo RW 10">Jatimulyo RW 10 | HP:143 | FAT:106</option>
						<option value="Jl Puncak Borobudur (Fe Ext)">Jl Puncak Borobudur (Fe Ext) | HP:1 | FAT:7</option>
						<option value="Joyo Grand RW 08">Joyo Grand RW 08 | HP:613 | FAT:258</option>
						<option value="Kalpataru Area RW 12 Tulusrejo">Kalpataru Area RW 12 Tulusrejo | HP:270 | FAT:115</option>
						<option value="Karang Basuki RW 01 RT 06">Karang Basuki RW 01 RT 06 | HP:119 | FAT:81</option>
						<option value="Kasin RW 02">Kasin RW 02 | HP:180 | FAT:99</option>
						<option value="Kasin RW 04">Kasin RW 04 | HP:132 | FAT:136</option>
						<option value="Kasin RW 05">Kasin RW 05 | HP:257 | FAT:133</option>
						<option value="Kauman RW 01 & RW 07">Kauman RW 01 & RW 07 | HP:115 | FAT:113</option>
						<option value="Kel Polehan RW 2">Kel Polehan RW 2 | HP:330 | FAT:168</option>
						<option value="Ketawang Gede RW 03 RT 01">Ketawang Gede RW 03 RT 01 | HP:180 | FAT:62</option>
						<option value="Klojen RW 05">Klojen RW 05 | HP:113 | FAT:65</option>
						<option value="Kota Araya FDT 1">Kota Araya FDT 1 | HP:629 | FAT:429</option>
						<option value="Kota Araya FDT 2">Kota Araya FDT 2 | HP:566 | FAT:437</option>
						<option value="Kota Araya Pondok Blimbing Indah FDT 3">Kota Araya Pondok Blimbing Indah FDT 3 | HP:270 | FAT:189</option>
						<option value="Kota Araya Pondok Blimbing Indah FDT 4">Kota Araya Pondok Blimbing Indah FDT 4 | HP:453 | FAT:361</option>
						<option value="Lembah Dieng RT 05">Lembah Dieng RT 05 | HP:101 | FAT:54</option>
						<option value="Little Kyoto">Little Kyoto | HP:86 | FAT:33</option>
						<option value="Lowokwaru RW 01">Lowokwaru RW 01 | HP:166 | FAT:94</option>
						<option value="Lowokwaru RW 09">Lowokwaru RW 09 | HP:624 | FAT:353</option>
						<option value="Lowokwaru RW 10">Lowokwaru RW 10 | HP:286 | FAT:151</option>
						<option value="Lowokwaru RW 13">Lowokwaru RW 13 | HP:137 | FAT:95</option>
						<option value="Lowokwaru RW 14 RT 01">Lowokwaru RW 14 RT 01 | HP:92 | FAT:43</option>
						<option value="Ma Chung University">Ma Chung University | HP:2 | FAT:7</option>
						<option value="Mega Mendung Area RW 08">Mega Mendung Area RW 08 | HP:86 | FAT:54</option>
						<option value="Mojolangu RT 04 RW 04">Mojolangu RT 04 RW 04 | HP:70 | FAT:47</option>
						<option value="Mojolangu RW 13">Mojolangu RW 13 | HP:167 | FAT:112</option>
						<option value="Mutiara Jingga">Mutiara Jingga | HP:59 | FAT:28</option>
						<option value="Mutiara Jingga Residence">Mutiara Jingga Residence | HP:215 | FAT:128</option>
						<option value="Oro Oro Dowo RW 05">Oro Oro Dowo RW 05 | HP:238 | FAT:202</option>
						<option value="Oro Oro Dowo RW.04 & RW.07">Oro Oro Dowo RW.04 & RW.07 | HP:457 | FAT:266</option>
						<option value="Oro-Oro Dowo RW 08">Oro-Oro Dowo RW 08 | HP:152 | FAT:99</option>
						<option value="Pandanwangi Utama Residence">Pandanwangi Utama Residence | HP:133 | FAT:71</option>
						<option value="Penanggungan RW 06">Penanggungan RW 06 | HP:119 | FAT:106</option>
						<option value="Penanggungan RW 07">Penanggungan RW 07 | HP:112 | FAT:49</option>
						<option value="Penangungan RW 02">Penangungan RW 02 | HP:132 | FAT:81</option>
						<option value="Permata Brantas Indah">Permata Brantas Indah | HP:135 | FAT:128</option>
						<option value="Permata Land Tunggul Wulung">Permata Land Tunggul Wulung | HP:107 | FAT:29</option>
						<option value="Permata RW 09">Permata RW 09 | HP:125 | FAT:108</option>
						<option value="Perum  Sawojajar 2 RW 09 Kel Sekarpuro">Perum  Sawojajar 2 RW 09 Kel Sekarpuro | HP:309 | FAT:142</option>
						<option value="Perum Bukit Hijau RW 09">Perum Bukit Hijau RW 09 | HP:141 | FAT:90</option>
						<option value="Perum Bunulrejo RW 13">Perum Bunulrejo RW 13 | HP:165 | FAT:144</option>
						<option value="Perum Jatimulyo RW 03">Perum Jatimulyo RW 03 | HP:25 | FAT:18</option>
						<option value="Perum Omaview Atas RW 10">Perum Omaview Atas RW 10 | HP:435 | FAT:273</option>
						<option value="Perum Omaview Bawah RW 11">Perum Omaview Bawah RW 11 | HP:329 | FAT:207</option>
						<option value="Perum Papa RW 15">Perum Papa RW 15 | HP:474 | FAT:343</option>
						<option value="Perum Patraland">Perum Patraland | HP:201 | FAT:146</option>
						<option value="Perum Puri Nirwana">Perum Puri Nirwana | HP:1 | FAT:0</option>
						<option value="Perum Salahutu Indah (Pisang Candi RW 11)">Perum Salahutu Indah (Pisang Candi RW 11) | HP:171 | FAT:128</option>
						<option value="Perum Sawojajar 1 RW 07">Perum Sawojajar 1 RW 07 | HP:340 | FAT:184</option>
						<option value="Perum Sawojajar 1 RW 09">Perum Sawojajar 1 RW 09 | HP:504 | FAT:224</option>
						<option value="Perum Sawojajar 1 RW 10">Perum Sawojajar 1 RW 10 | HP:495 | FAT:307</option>
						<option value="Perum Sawojajar 1 RW 12">Perum Sawojajar 1 RW 12 | HP:443 | FAT:189</option>
						<option value="Perum Sawojajar 1 RW 13">Perum Sawojajar 1 RW 13 | HP:172 | FAT:70</option>
						<option value="Perum Sawojajar 1 RW 15">Perum Sawojajar 1 RW 15 | HP:213 | FAT:107</option>
						<option value="Perum Sawojajar 2 RW 10">Perum Sawojajar 2 RW 10 | HP:296 | FAT:137</option>
						<option value="Perum Sawojajar 2 RW 11 Kel. Sekarpuro">Perum Sawojajar 2 RW 11 Kel. Sekarpuro | HP:252 | FAT:92</option>
						<option value="Perum Sawojajar 2 RW 12">Perum Sawojajar 2 RW 12 | HP:378 | FAT:202</option>
						<option value="Perum Sawojajar 2 RW 13 Kel. Sekarpuro">Perum Sawojajar 2 RW 13 Kel. Sekarpuro | HP:238 | FAT:113</option>
						<option value="Perum Sawojajar 2 RW 15">Perum Sawojajar 2 RW 15 | HP:452 | FAT:176</option>
						<option value="Perum Sawojajar 2 RW 17">Perum Sawojajar 2 RW 17 | HP:285 | FAT:182</option>
						<option value="Perum Sawojajar 2 RW 18">Perum Sawojajar 2 RW 18 | HP:355 | FAT:177</option>
						<option value="Perum Sawojajar 2 RW 19">Perum Sawojajar 2 RW 19 | HP:410 | FAT:214</option>
						<option value="Perum Sawojajar 2 RW 20">Perum Sawojajar 2 RW 20 | HP:243 | FAT:162</option>
						<option value="Perum Sawojajar RW 08">Perum Sawojajar RW 08 | HP:256 | FAT:129</option>
						<option value="Perum Sawojajar RW 11">Perum Sawojajar RW 11 | HP:381 | FAT:139</option>
						<option value="Perum Sawojajar RW 14">Perum Sawojajar RW 14 | HP:297 | FAT:168</option>
						<option value="Perumahan Bukit Cemara Tidar RW 09 (FDT 1)">Perumahan Bukit Cemara Tidar RW 09 (FDT 1) | HP:460 | FAT:360</option>
						<option value="Perumahan Bukit Cemara Tidar RW 09 (FDT 2)">Perumahan Bukit Cemara Tidar RW 09 (FDT 2) | HP:362 | FAT:232</option>
						<option value="Perumahan Mutiara Citra Mas">Perumahan Mutiara Citra Mas | HP:62 | FAT:35</option>
						<option value="Perumahan Puncak Permata Sengkaling & Taman Sengkaling">Perumahan Puncak Permata Sengkaling & Taman Sengkaling | HP:256 | FAT:187</option>
						<option value="Perumahan Sawojajar RW 07 Kel. Lesanpuro">Perumahan Sawojajar RW 07 Kel. Lesanpuro | HP:250 | FAT:142</option>
						<option value="Perumahan Sawojajar RW 08 Kel. Lesanpuro">Perumahan Sawojajar RW 08 Kel. Lesanpuro | HP:333 | FAT:183</option>
						<option value="Perumahan Sawojajar RW 09 Kel. Madyopuro">Perumahan Sawojajar RW 09 Kel. Madyopuro | HP:309 | FAT:184</option>
						<option value="Pesona Bougenville Ariskaton">Pesona Bougenville Ariskaton | HP:126 | FAT:54</option>
						<option value="Pisang Candi Area RW 09">Pisang Candi Area RW 09 | HP:180 | FAT:94</option>
						<option value="Pondok  Wisata Estate">Pondok  Wisata Estate | HP:312 | FAT:196</option>
						<option value="Pondok Alam Sigura Gura RW 07 (FDT 1)">Pondok Alam Sigura Gura RW 07 (FDT 1) | HP:450 | FAT:229</option>
						<option value="Pondok Alam Sigura Gura RW 07 (FDT 2)">Pondok Alam Sigura Gura RW 07 (FDT 2) | HP:337 | FAT:179</option>
						<option value="Pondok Blimbing Indah">Pondok Blimbing Indah | HP:566 | FAT:343</option>
						<option value="Pondok Indah Borobudur RT 10 RW 05">Pondok Indah Borobudur RT 10 RW 05 | HP:63 | FAT:35</option>
						<option value="Pondok Mulia">Pondok Mulia | HP:88 | FAT:44</option>
						<option value="Puri Bunga Estate">Puri Bunga Estate | HP:96 | FAT:41</option>
						<option value="Purwantoro Agung RW 22">Purwantoro Agung RW 22 | HP:302 | FAT:161</option>
						<option value="Purwantoro Area RW 13">Purwantoro Area RW 13 | HP:358 | FAT:208</option>
						<option value="Purwantoro RW 01">Purwantoro RW 01 | HP:162 | FAT:85</option>
						<option value="Purwantoro RW 12">Purwantoro RW 12 | HP:142 | FAT:107</option>
						<option value="Puwantoro Agung RW 21">Puwantoro Agung RW 21 | HP:510 | FAT:352</option>
						<option value="Puwantoro Agung RW 24">Puwantoro Agung RW 24 | HP:211 | FAT:130</option>
						<option value="Rampal Celaket RW 01">Rampal Celaket RW 01 | HP:113 | FAT:48</option>
						<option value="Rampal Celaket RW 03">Rampal Celaket RW 03 | HP:291 | FAT:156</option>
						<option value="RT 03 RW 04 Kel Ketawang Gede">RT 03 RW 04 Kel Ketawang Gede | HP:108 | FAT:70</option>
						<option value="Ruko Baiduri Area RT 02">Ruko Baiduri Area RT 02 | HP:5 | FAT:8</option>
						<option value="Ruko Brantas Area RW 7">Ruko Brantas Area RW 7 | HP:104 | FAT:87</option>
						<option value="Ruko Bunulrejo RW 1 & RW 2">Ruko Bunulrejo RW 1 & RW 2 | HP:44 | FAT:52</option>
						<option value="Ruko Bunulrejo RW 3 & RW 4">Ruko Bunulrejo RW 3 & RW 4 | HP:24 | FAT:20</option>
						<option value="Ruko Dinoyo RW 06">Ruko Dinoyo RW 06 | HP:47 | FAT:47</option>
						<option value="Ruko Griya Shanta RW 16">Ruko Griya Shanta RW 16 | HP:52 | FAT:53</option>
						<option value="Ruko Jatimulyo RT 09 RW 04">Ruko Jatimulyo RT 09 RW 04 | HP:43 | FAT:17</option>
						<option value="Ruko Jatimulyo RW 10">Ruko Jatimulyo RW 10 | HP:76 | FAT:46</option>
						<option value="Ruko Kasin RW 05">Ruko Kasin RW 05 | HP:91 | FAT:64</option>
						<option value="Ruko Kauman RW 01 & RW 07">Ruko Kauman RW 01 & RW 07 | HP:63 | FAT:58</option>
						<option value="Ruko Klojen RW 05">Ruko Klojen RW 05 | HP:31 | FAT:51</option>
						<option value="Ruko Mojolangu RT 04 RW 04">Ruko Mojolangu RT 04 RW 04 | HP:26 | FAT:28</option>
						<option value="Ruko Perum Jatimulyo RW 03">Ruko Perum Jatimulyo RW 03 | HP:40 | FAT:29</option>
						<option value="Ruko Pondok Alam Sigura Gura RW 07">Ruko Pondok Alam Sigura Gura RW 07 | HP:93 | FAT:98</option>
						<option value="Ruko Purwantoro RW 12">Ruko Purwantoro RW 12 | HP:43 | FAT:43</option>
						<option value="Ruko Rampal Celaket RW 01">Ruko Rampal Celaket RW 01 | HP:64 | FAT:37</option>
						<option value="Ruko RT 03 RW 04 Kel Ketawang Gede">Ruko RT 03 RW 04 Kel Ketawang Gede | HP:18 | FAT:11</option>
						<option value="Ruko Samaan RW 01">Ruko Samaan RW 01 | HP:13 | FAT:26</option>
						<option value="Ruko Soekarno Hatta Indah RW 10 (Mojolangu RW 10)">Ruko Soekarno Hatta Indah RW 10 (Mojolangu RW 10) | HP:71 | FAT:37</option>
						<option value="Samaan RW 01">Samaan RW 01 | HP:31 | FAT:28</option>
						<option value="Saxophone Land">Saxophone Land | HP:71 | FAT:31</option>
						<option value="Sekar Puro Residence">Sekar Puro Residence | HP:149 | FAT:105</option>
						<option value="Soekarno Hatta Indah RW 10 (Mojolangu RW 10)">Soekarno Hatta Indah RW 10 (Mojolangu RW 10) | HP:349 | FAT:193</option>
						<option value="Soekarno Hatta Indah RW 14">Soekarno Hatta Indah RW 14 | HP:354 | FAT:150</option>
						<option value="Sulfat Inside Residence">Sulfat Inside Residence | HP:23 | FAT:9</option>
						<option value="Sumbersari RW 04">Sumbersari RW 04 | HP:71 | FAT:42</option>
						<option value="Taman Agung RW 06">Taman Agung RW 06 | HP:413 | FAT:260</option>
						<option value="Taman Buah Buahan RW 05">Taman Buah Buahan RW 05 | HP:337 | FAT:234</option>
						<option value="Taman Buah Buahan RW 06">Taman Buah Buahan RW 06 | HP:173 | FAT:104</option>
						<option value="Taman Buah-Buahan RW 01">Taman Buah-Buahan RW 01 | HP:275 | FAT:175</option>
						<option value="Taman Sulfat">Taman Sulfat | HP:61 | FAT:41</option>
						<option value="Taman Sulfat RW 21">Taman Sulfat RW 21 | HP:499 | FAT:362</option>
						<option value="Tasik Madu RW 06">Tasik Madu RW 06 | HP:273 | FAT:122</option>
						<option value="Tirtasani Estate">Tirtasani Estate | HP:271 | FAT:196</option>
						<option value="Tirtasani Estate (Ug)">Tirtasani Estate (Ug) | HP:19 | FAT:14</option>
						<option value="Tirtasani Royal Resort">Tirtasani Royal Resort | HP:692 | FAT:570</option>
						<option value="Tirtasani Royal Resort (Ug)">Tirtasani Royal Resort (Ug) | HP:84 | FAT:65</option>
						<option value="Tulusrejo RT 05 RW 08">Tulusrejo RT 05 RW 08 | HP:65 | FAT:30</option>
						<option value="Tulusrejo RW 13">Tulusrejo RW 13 | HP:200 | FAT:106</option>
						<option value="Tulusrejo RW 16">Tulusrejo RW 16 | HP:204 | FAT:88</option>
						<option value="Tunjungsekar RW 02">Tunjungsekar RW 02 | HP:233 | FAT:143</option>
						<option value="Tunjungsekar RW 04">Tunjungsekar RW 04 | HP:170 | FAT:86</option>
						<option value="Tunjungsekar RW 08">Tunjungsekar RW 08 | HP:405 | FAT:293</option>
						<option value="Villa Bukit Sengkaling">Villa Bukit Sengkaling | HP:763 | FAT:226</option>
						<option value="Villa Dieng Residence">Villa Dieng Residence | HP:111 | FAT:69</option>
						<option value="Villa Dieng Residence - Tahap 3 (Ext)">Villa Dieng Residence - Tahap 3 (Ext) | HP:11 | FAT:4</option>
						<option value="Villa Gunung Buring">Villa Gunung Buring | HP:191 | FAT:119</option>
						<option value="Villa Puncak Tidar">Villa Puncak Tidar | HP:487 | FAT:310</option>
                  </select>
               </div>
               <!-- tutup Malang -->

               <!-- Medan -->
               <div id="Medan" class="form-group" style="display: none;">
                  <select class="form-control js-example-basic-single" name="nama_cluster" oninvalid="this.setCustomValidity('Pilih Cluster')" oninput="setCustomValidity('')">
						<option value="Address Cempaka Madani">Address Cempaka Madani | HP:220 | FAT:27</option>
						<option value="Bekala Asri Residence">Bekala Asri Residence | HP:248 | FAT:48</option>
						<option value="Cemara Asri Tahap 3">Cemara Asri Tahap 3 | HP:275 | FAT:84</option>
						<option value="Citra Garden - Blok D">Citra Garden - Blok D | HP:86 | FAT:47</option>
						<option value="Citra Garden - Mansion">Citra Garden - Mansion | HP:197 | FAT:105</option>
						<option value="Citra Garden - Terrace Garden">Citra Garden - Terrace Garden | HP:139 | FAT:87</option>
						<option value="Grand Pavilion">Grand Pavilion | HP:141 | FAT:26</option>
						<option value="Grand Polonia">Grand Polonia | HP:100 | FAT:19</option>
						<option value="Johor Indah Permai">Johor Indah Permai | HP:642 | FAT:258</option>
						<option value="Komp Taman Perkasa Indah">Komp Taman Perkasa Indah | HP:1 | FAT:5</option>
						<option value="Komplek Bi">Komplek Bi | HP:215 | FAT:78</option>
						<option value="Komplek Elegant Residence (Ext)">Komplek Elegant Residence (Ext) | HP:6 | FAT:0</option>
						<option value="Komplek Greenville">Komplek Greenville | HP:51 | FAT:10</option>
						<option value="Komplek Johor Permai/Melinjo">Komplek Johor Permai/Melinjo | HP:161 | FAT:71</option>
						<option value="Komplek Karya Prima">Komplek Karya Prima | HP:53 | FAT:9</option>
						<option value="Komplek Koserna Lingkungan Xi">Komplek Koserna Lingkungan Xi | HP:87 | FAT:32</option>
						<option value="Komplek Koserna Lingkungan Xii">Komplek Koserna Lingkungan Xii | HP:176 | FAT:71</option>
						<option value="Komplek Koserna Lingkungan Xiii">Komplek Koserna Lingkungan Xiii | HP:274 | FAT:129</option>
						<option value="Komplek Kowil Ham">Komplek Kowil Ham | HP:222 | FAT:87</option>
						<option value="Komplek Menteng Indah (FDT 1)">Komplek Menteng Indah (FDT 1) | HP:277 | FAT:120</option>
						<option value="Komplek Menteng Indah (FDT 2)">Komplek Menteng Indah (FDT 2) | HP:378 | FAT:148</option>
						<option value="Komplek Pemda Bulog">Komplek Pemda Bulog | HP:69 | FAT:35</option>
						<option value="Komplek Pemda Sumut Lingkungan 8">Komplek Pemda Sumut Lingkungan 8 | HP:116 | FAT:52</option>
						<option value="Komplek Pemda Sumut Lingkungan 9">Komplek Pemda Sumut Lingkungan 9 | HP:197 | FAT:94</option>
						<option value="Komplek Rispa 3">Komplek Rispa 3 | HP:259 | FAT:99</option>
						<option value="Komplek Sekip Mas">Komplek Sekip Mas | HP:51 | FAT:19</option>
						<option value="Komplek Taman Hako Indah">Komplek Taman Hako Indah | HP:209 | FAT:69</option>
						<option value="Komplek The City Residence">Komplek The City Residence | HP:134 | FAT:4</option>
						<option value="Komplek Wartawan">Komplek Wartawan | HP:387 | FAT:120</option>
						<option value="Lingkungan 1 Kel Jati Kec Medan Maimun">Lingkungan 1 Kel Jati Kec Medan Maimun | HP:199 | FAT:79</option>
						<option value="Lingkungan 1 Kelurahan Sei Sikambing">Lingkungan 1 Kelurahan Sei Sikambing | HP:113 | FAT:50</option>
						<option value="Lingkungan 1 Merdeka Medan Baru">Lingkungan 1 Merdeka Medan Baru | HP:218 | FAT:109</option>
						<option value="Lingkungan 1 Pangkalan Masyhur">Lingkungan 1 Pangkalan Masyhur | HP:107 | FAT:26</option>
						<option value="Lingkungan 1 Pulo Brayan Bengkel Baru">Lingkungan 1 Pulo Brayan Bengkel Baru | HP:48 | FAT:22</option>
						<option value="Lingkungan 1 Sukamaju">Lingkungan 1 Sukamaju | HP:101 | FAT:32</option>
						<option value="Lingkungan 12 Kel. Sukamaju">Lingkungan 12 Kel. Sukamaju | HP:177 | FAT:67</option>
						<option value="Lingkungan 12 Merdeka Medan Baru">Lingkungan 12 Merdeka Medan Baru | HP:58 | FAT:25</option>
						<option value="Lingkungan 13 Pangkalan Masyhur">Lingkungan 13 Pangkalan Masyhur | HP:323 | FAT:141</option>
						<option value="Lingkungan 14 Petisah Tengah">Lingkungan 14 Petisah Tengah | HP:238 | FAT:87</option>
						<option value="Lingkungan 2 Kelurahan Sei Sikambing">Lingkungan 2 Kelurahan Sei Sikambing | HP:209 | FAT:105</option>
						<option value="Lingkungan 2 Pulo Brayan Bengkel Baru">Lingkungan 2 Pulo Brayan Bengkel Baru | HP:176 | FAT:63</option>
						<option value="Lingkungan 2 Sukamaju">Lingkungan 2 Sukamaju | HP:104 | FAT:29</option>
						<option value="Lingkungan 3 Kelurahan Sei Sikambing">Lingkungan 3 Kelurahan Sei Sikambing | HP:80 | FAT:46</option>
						<option value="Lingkungan 3 Petisah Hulu">Lingkungan 3 Petisah Hulu | HP:187 | FAT:67</option>
						<option value="Lingkungan 3 Sei Agul">Lingkungan 3 Sei Agul | HP:476 | FAT:80</option>
						<option value="Lingkungan 4 Kel Darat">Lingkungan 4 Kel Darat | HP:124 | FAT:55</option>
						<option value="Lingkungan 4 Sei Agul">Lingkungan 4 Sei Agul | HP:115 | FAT:53</option>
						<option value="Lingkungan 4 Sukamaju">Lingkungan 4 Sukamaju | HP:121 | FAT:21</option>
						<option value="Lingkungan 7 Kel Babura">Lingkungan 7 Kel Babura | HP:142 | FAT:64</option>
						<option value="Lingkungan 7 Pangkalan Masyhur">Lingkungan 7 Pangkalan Masyhur | HP:420 | FAT:133</option>
						<option value="Lingkungan 7 Sei Agul">Lingkungan 7 Sei Agul | HP:186 | FAT:59</option>
						<option value="Lingkungan I Glugur Darat 1">Lingkungan I Glugur Darat 1 | HP:389 | FAT:73</option>
						<option value="Lingkungan I Kel Gedung Johor">Lingkungan I Kel Gedung Johor | HP:158 | FAT:51</option>
						<option value="Lingkungan I Kel Sei Putih Barat">Lingkungan I Kel Sei Putih Barat | HP:196 | FAT:54</option>
						<option value="Lingkungan I Kelurahan Helvitia">Lingkungan I Kelurahan Helvitia | HP:145 | FAT:51</option>
						<option value="Lingkungan I Pb Selayang 1">Lingkungan I Pb Selayang 1 | HP:198 | FAT:69</option>
						<option value="Lingkungan I Petisah Hulu">Lingkungan I Petisah Hulu | HP:157 | FAT:80</option>
						<option value="Lingkungan Ii Kel Sei Putih Barat">Lingkungan Ii Kel Sei Putih Barat | HP:168 | FAT:58</option>
						<option value="Lingkungan Ii Kelurahan Helvitia">Lingkungan Ii Kelurahan Helvitia | HP:85 | FAT:26</option>
						<option value="Lingkungan Ii Kelurahan Sei Agul">Lingkungan Ii Kelurahan Sei Agul | HP:354 | FAT:106</option>
						<option value="Lingkungan Ii Pare Darat">Lingkungan Ii Pare Darat | HP:200 | FAT:89</option>
						<option value="Lingkungan Ii Petisah Hulu">Lingkungan Ii Petisah Hulu | HP:127 | FAT:78</option>
						<option value="Lingkungan Ii Petisah Tengah">Lingkungan Ii Petisah Tengah | HP:181 | FAT:62</option>
						<option value="Lingkungan Iii Kelurahan Helvitia">Lingkungan Iii Kelurahan Helvitia | HP:282 | FAT:91</option>
						<option value="Lingkungan Iii Pare Darat">Lingkungan Iii Pare Darat | HP:70 | FAT:31</option>
						<option value="Lingkungan Iv Kel. Sei Putih Barat">Lingkungan Iv Kel. Sei Putih Barat | HP:254 | FAT:35</option>
						<option value="Lingkungan Iv Kelurahan Helvitia">Lingkungan Iv Kelurahan Helvitia | HP:197 | FAT:68</option>
						<option value="Lingkungan Iv Kelurahan Sei Sikambing">Lingkungan Iv Kelurahan Sei Sikambing | HP:169 | FAT:64</option>
						<option value="Lingkungan Iv Pulo Brayan Darat Ii">Lingkungan Iv Pulo Brayan Darat Ii | HP:303 | FAT:67</option>
						<option value="Lingkungan Ix Babura">Lingkungan Ix Babura | HP:130 | FAT:31</option>
						<option value="Lingkungan Ix Glugur Darat 1">Lingkungan Ix Glugur Darat 1 | HP:133 | FAT:51</option>
						<option value="Lingkungan Ix Petisah Hulu">Lingkungan Ix Petisah Hulu | HP:12 | FAT:10</option>
						<option value="Lingkungan V Kel. Sei Putih Barat">Lingkungan V Kel. Sei Putih Barat | HP:181 | FAT:48</option>
						<option value="Lingkungan V Kelurahan Babura">Lingkungan V Kelurahan Babura | HP:95 | FAT:39</option>
						<option value="Lingkungan V Petisah Hulu">Lingkungan V Petisah Hulu | HP:47 | FAT:26</option>
						<option value="Lingkungan V Pulo Brayan Darat Ii">Lingkungan V Pulo Brayan Darat Ii | HP:77 | FAT:12</option>
						<option value="Lingkungan V Sei Sikambing">Lingkungan V Sei Sikambing | HP:151 | FAT:59</option>
						<option value="Lingkungan V Taman Anggrek">Lingkungan V Taman Anggrek | HP:37 | FAT:13</option>
						<option value="Lingkungan Vi Kel Hamdan">Lingkungan Vi Kel Hamdan | HP:50 | FAT:26</option>
						<option value="Lingkungan Vi Kel Sei Putih Barat">Lingkungan Vi Kel Sei Putih Barat | HP:131 | FAT:23</option>
						<option value="Lingkungan Vi Kel. Tanjung Selamat">Lingkungan Vi Kel. Tanjung Selamat | HP:164 | FAT:72</option>
						<option value="Lingkungan Vi Kelurahan Glugur Darat I">Lingkungan Vi Kelurahan Glugur Darat I | HP:158 | FAT:38</option>
						<option value="Lingkungan Vi Kelurahan Masjid">Lingkungan Vi Kelurahan Masjid | HP:158 | FAT:64</option>
						<option value="Lingkungan Vi Petisah Hulu">Lingkungan Vi Petisah Hulu | HP:40 | FAT:18</option>
						<option value="Lingkungan Vi Petisah Tengah">Lingkungan Vi Petisah Tengah | HP:144 | FAT:68</option>
						<option value="Lingkungan Vi, Komplek Bi, Perumahan Lizzia Garden">Lingkungan Vi, Komplek Bi, Perumahan Lizzia Garden | HP:194 | FAT:44</option>
						<option value="Lingkungan Vii Beo,Beo 1&2,Beo Indah,Beo Mas Jl Beo Kelurahan Sei Siskamling B">Lingkungan Vii Beo,Beo 1&2,Beo Indah,Beo Mas Jl Beo Kelurahan Sei Siskamling B | HP:221 | FAT:71</option>
						<option value="Lingkungan Vii Gedung Johor">Lingkungan Vii Gedung Johor | HP:280 | FAT:109</option>
						<option value="Lingkungan Vii Kel Sei Putih Barat">Lingkungan Vii Kel Sei Putih Barat | HP:219 | FAT:56</option>
						<option value="Lingkungan Vii Kelurahan Hamdan">Lingkungan Vii Kelurahan Hamdan | HP:177 | FAT:53</option>
						<option value="Lingkungan Vii Kelurahan Madras">Lingkungan Vii Kelurahan Madras | HP:63 | FAT:23</option>
						<option value="Lingkungan Vii Petisah Hulu">Lingkungan Vii Petisah Hulu | HP:65 | FAT:19</option>
						<option value="Lingkungan Vii Pulo Brayan Darat I And Bilal Lestari">Lingkungan Vii Pulo Brayan Darat I And Bilal Lestari | HP:223 | FAT:77</option>
						<option value="Lingkungan Viii Kel Hamdan">Lingkungan Viii Kel Hamdan | HP:71 | FAT:27</option>
						<option value="Lingkungan Viii Kelurahan Madras">Lingkungan Viii Kelurahan Madras | HP:59 | FAT:30</option>
						<option value="Lingkungan Viii Petisah Hulu">Lingkungan Viii Petisah Hulu | HP:70 | FAT:44</option>
						<option value="Lingkungan Viii Sei Rokan">Lingkungan Viii Sei Rokan | HP:118 | FAT:56</option>
						<option value="Lingkungan X Babura">Lingkungan X Babura | HP:112 | FAT:31</option>
						<option value="Lingkungan X Kel Hamdan">Lingkungan X Kel Hamdan | HP:86 | FAT:33</option>
						<option value="Lingkungan X Kel Petisah Tengah">Lingkungan X Kel Petisah Tengah | HP:139 | FAT:64</option>
						<option value="Lingkungan X Kel Sei Putih Barat">Lingkungan X Kel Sei Putih Barat | HP:109 | FAT:18</option>
						<option value="Lingkungan X Kesawan">Lingkungan X Kesawan | HP:120 | FAT:72</option>
						<option value="Lingkungan X Petisah Hulu">Lingkungan X Petisah Hulu | HP:157 | FAT:77</option>
						<option value="Lingkungan X Sukamaju">Lingkungan X Sukamaju | HP:118 | FAT:37</option>
						<option value="Lingkungan Xi Glugur Darat 1">Lingkungan Xi Glugur Darat 1 | HP:207 | FAT:40</option>
						<option value="Lingkungan Xi Petisah Hulu">Lingkungan Xi Petisah Hulu | HP:122 | FAT:58</option>
						<option value="Lingkungan Xii Kel. Pulo Brayan Darat 1">Lingkungan Xii Kel. Pulo Brayan Darat 1 | HP:183 | FAT:42</option>
						<option value="Lingkungan Xiii Kel Petisah Tengah">Lingkungan Xiii Kel Petisah Tengah | HP:318 | FAT:137</option>
						<option value="Lingkungan Xvi Kel Petisah Tengah">Lingkungan Xvi Kel Petisah Tengah | HP:186 | FAT:98</option>
						<option value="Makam Pahlawan">Makam Pahlawan | HP:150 | FAT:34</option>
						<option value="Monaco Regency">Monaco Regency | HP:13 | FAT:3</option>
						<option value="Pahlawan Lingkungan 2">Pahlawan Lingkungan 2 | HP:116 | FAT:44</option>
						<option value="Permata Asri Residence">Permata Asri Residence | HP:46 | FAT:16</option>
						<option value="Perum Johor Katelia Indah">Perum Johor Katelia Indah | HP:238 | FAT:104</option>
						<option value="Perumahan Cemara Asri Sme De'Paradise Square">Perumahan Cemara Asri Sme De'Paradise Square | HP:24 | FAT:21</option>
						<option value="Perumahan Cemara Asri Sme Mitsubishi Square">Perumahan Cemara Asri Sme Mitsubishi Square | HP:32 | FAT:23</option>
						<option value="Perumahan Cemara Asri Sme Paragon Square">Perumahan Cemara Asri Sme Paragon Square | HP:42 | FAT:27</option>
						<option value="Perumahan Cemara Asri Sme Sophie Square">Perumahan Cemara Asri Sme Sophie Square | HP:36 | FAT:20</option>
						<option value="Perumahan Cemara Asri Tahap I">Perumahan Cemara Asri Tahap I | HP:426 | FAT:77</option>
						<option value="Perumahan Cemara Asri Tahap Ii">Perumahan Cemara Asri Tahap Ii | HP:538 | FAT:86</option>
						<option value="Perumahan Cemara Asri Tahap Iv">Perumahan Cemara Asri Tahap Iv | HP:218 | FAT:72</option>
						<option value="Perumahan Cemara Asri Tahap V">Perumahan Cemara Asri Tahap V | HP:308 | FAT:55</option>
						<option value="Perumahan Cemara Asri Tahap Vi">Perumahan Cemara Asri Tahap Vi | HP:604 | FAT:170</option>
						<option value="Perumahan Cemara Asri Tahap Vii">Perumahan Cemara Asri Tahap Vii | HP:227 | FAT:41</option>
						<option value="Perumahan Dosen Usu">Perumahan Dosen Usu | HP:159 | FAT:42</option>
						<option value="Perumahan Dulog Ling Iii Kel Helvitia Timur">Perumahan Dulog Ling Iii Kel Helvitia Timur | HP:129 | FAT:50</option>
						<option value="Perumahan Griya Raihan">Perumahan Griya Raihan | HP:174 | FAT:51</option>
						<option value="Perumahan Mega Town House">Perumahan Mega Town House | HP:52 | FAT:15</option>
						<option value="Perumahan Sempurna Garden">Perumahan Sempurna Garden | HP:54 | FAT:15</option>
						<option value="Perumahan Tanjung Gusta Permai">Perumahan Tanjung Gusta Permai | HP:318 | FAT:67</option>
						<option value="Perumahan Villa Permata">Perumahan Villa Permata | HP:40 | FAT:13</option>
						<option value="Platinum Residence">Platinum Residence | HP:77 | FAT:26</option>
						<option value="Pondok Indah">Pondok Indah | HP:33 | FAT:11</option>
						<option value="Pondok Surya Lingkungan Vi">Pondok Surya Lingkungan Vi | HP:388 | FAT:127</option>
						<option value="Puri Melinjo">Puri Melinjo | HP:17 | FAT:7</option>
						<option value="Royal Platinum">Royal Platinum | HP:82 | FAT:23</option>
						<option value="Ruko Lingkungan 1 Kelurahan Sei Sikambing">Ruko Lingkungan 1 Kelurahan Sei Sikambing | HP:62 | FAT:50</option>
						<option value="Ruko Lingkungan 1 Merdeka Medan Baru">Ruko Lingkungan 1 Merdeka Medan Baru | HP:26 | FAT:23</option>
						<option value="Ruko Lingkungan 2 Kelurahan Sei Sikambing">Ruko Lingkungan 2 Kelurahan Sei Sikambing | HP:38 | FAT:33</option>
						<option value="Ruko Lingkungan 3 Kelurahan Sei Sikambing">Ruko Lingkungan 3 Kelurahan Sei Sikambing | HP:4 | FAT:18</option>
						<option value="Ruko Lingkungan 3 Petisah Hulu">Ruko Lingkungan 3 Petisah Hulu | HP:39 | FAT:25</option>
						<option value="Ruko Lingkungan 7 Sei Agul">Ruko Lingkungan 7 Sei Agul | HP:22 | FAT:20</option>
						<option value="Ruko Lingkungan I Glugur Darat 1">Ruko Lingkungan I Glugur Darat 1 | HP:6 | FAT:11</option>
						<option value="Ruko Lingkungan I Kel Sei Putih Barat">Ruko Lingkungan I Kel Sei Putih Barat | HP:10 | FAT:17</option>
						<option value="Ruko Lingkungan Ii Petisah Hulu">Ruko Lingkungan Ii Petisah Hulu | HP:20 | FAT:22</option>
						<option value="Ruko Lingkungan Ix Petisah Hulu">Ruko Lingkungan Ix Petisah Hulu | HP:5 | FAT:12</option>
						<option value="Ruko Lingkungan Vii Kelurahan Madras">Ruko Lingkungan Vii Kelurahan Madras | HP:1 | FAT:6</option>
						<option value="Ruko Lingkungan Viii Kelurahan Madras">Ruko Lingkungan Viii Kelurahan Madras | HP:7 | FAT:18</option>
						<option value="Ruko Lingkungan Viii Petisah Hulu">Ruko Lingkungan Viii Petisah Hulu | HP:4 | FAT:12</option>
						<option value="Ruko Lingkungan X Kesawan">Ruko Lingkungan X Kesawan | HP:15 | FAT:17</option>
						<option value="Ruko Lingkungan Xi Petisah Hulu">Ruko Lingkungan Xi Petisah Hulu | HP:18 | FAT:10</option>
						<option value="Ruko Perumahan Cemara Asri Sme Tahap 1">Ruko Perumahan Cemara Asri Sme Tahap 1 | HP:114 | FAT:38</option>
						<option value="Ruko Perumahan Cemara Asri Sme Tahap 2">Ruko Perumahan Cemara Asri Sme Tahap 2 | HP:108 | FAT:40</option>
						<option value="Ruko Perumahan Cemara Asri Sme Tahap 6">Ruko Perumahan Cemara Asri Sme Tahap 6 | HP:367 | FAT:97</option>
						<option value="Ruko Perumahan Cemara Asri Sme Tahap 7">Ruko Perumahan Cemara Asri Sme Tahap 7 | HP:61 | FAT:28</option>
						<option value="Ruko Perumahan Cemara Asri Sme Tahap 8">Ruko Perumahan Cemara Asri Sme Tahap 8 | HP:122 | FAT:41</option>
						<option value="Ruko Perumahan Cemara Asri Sme Tahap 9">Ruko Perumahan Cemara Asri Sme Tahap 9 | HP:145 | FAT:75</option>
						<option value="Taman Anggrek Setiabudi">Taman Anggrek Setiabudi | HP:177 | FAT:33</option>
						<option value="Taman Harapan Indah">Taman Harapan Indah | HP:132 | FAT:50</option>
						<option value="Taman Impian Indah">Taman Impian Indah | HP:262 | FAT:60</option>
						<option value="Taman Jemadi Indah">Taman Jemadi Indah | HP:63 | FAT:13</option>
						<option value="Taman Johor Indah Permai Ii">Taman Johor Indah Permai Ii | HP:172 | FAT:8</option>
						<option value="Taman Tempuah Residence">Taman Tempuah Residence | HP:31 | FAT:7</option>
						<option value="Tata Harmoni">Tata Harmoni | HP:77 | FAT:20</option>
						<option value="Villa Gading Mas 1">Villa Gading Mas 1 | HP:266 | FAT:129</option>
						<option value="Villa Gading Mas 3">Villa Gading Mas 3 | HP:77 | FAT:41</option>
						<option value="Villa Jemadi Mas">Villa Jemadi Mas | HP:63 | FAT:22</option>
						<option value="Villa Malina Indah">Villa Malina Indah | HP:280 | FAT:139</option>
						<option value="Villa Permata Indah">Villa Permata Indah | HP:249 | FAT:66</option>
						<option value="Villa Polonia">Villa Polonia | HP:173 | FAT:72</option>
						<option value="Villa Prima Indah">Villa Prima Indah | HP:244 | FAT:108</option>
                  </select>
               </div>
               <!-- tutup Medan -->

               <!-- Palembang -->
               <div id="Palembang" class="form-group" style="display: none;">
                  <select class="form-control js-example-basic-single" name="nama_cluster" oninvalid="this.setCustomValidity('Pilih Cluster')" oninput="setCustomValidity('')">
						<option value="Afilla Permai">Afilla Permai | HP:174 | FAT:43</option>
						<option value="Alam Raya Residence">Alam Raya Residence | HP:124 | FAT:37</option>
						<option value="Arisma Sejahtera">Arisma Sejahtera | HP:187 | FAT:26</option>
						<option value="Aston Villa">Aston Villa | HP:70 | FAT:24</option>
						<option value="Barangan Indah">Barangan Indah | HP:72 | FAT:12</option>
						<option value="Batu Hitam">Batu Hitam | HP:224 | FAT:39</option>
						<option value="Bendung Indah RW 09">Bendung Indah RW 09 | HP:517 | FAT:110</option>
						<option value="Blok A Orchard Park">Blok A Orchard Park | HP:88 | FAT:61</option>
						<option value="Blok C Somerset West">Blok C Somerset West | HP:152 | FAT:96</option>
						<option value="Blok D Somerset East">Blok D Somerset East | HP:290 | FAT:173</option>
						<option value="Blok G Summer Meadow">Blok G Summer Meadow | HP:177 | FAT:105</option>
						<option value="Blok K Autumn Forest">Blok K Autumn Forest | HP:51 | FAT:33</option>
						<option value="Bougenville Residence (Ext)">Bougenville Residence (Ext) | HP:44 | FAT:0</option>
						<option value="Bougenville Residence Tahap Ii (Ext)">Bougenville Residence Tahap Ii (Ext) | HP:26 | FAT:0</option>
						<option value="Bua Sakti Village">Bua Sakti Village | HP:33 | FAT:11</option>
						<option value="Bukit Bunga Indah">Bukit Bunga Indah | HP:242 | FAT:29</option>
						<option value="Bukit Demang Azhar RW 15">Bukit Demang Azhar RW 15 | HP:113 | FAT:15</option>
						<option value="Bukit Sangkal (Sapta Marga)">Bukit Sangkal (Sapta Marga) | HP:194 | FAT:24</option>
						<option value="Bukit Sejahtera">Bukit Sejahtera | HP:25 | FAT:27</option>
						<option value="Bukit Sejahtera RW 04 - FDT 1">Bukit Sejahtera RW 04 - FDT 1 | HP:225 | FAT:8</option>
						<option value="Bukit Sejahtera RW 04 - FDT 2">Bukit Sejahtera RW 04 - FDT 2 | HP:275 | FAT:15</option>
						<option value="Bukit Sejahtera RW 17">Bukit Sejahtera RW 17 | HP:299 | FAT:54</option>
						<option value="Bukit Sejahtera RW 22">Bukit Sejahtera RW 22 | HP:245 | FAT:15</option>
						<option value="Bukit Sukatani">Bukit Sukatani | HP:135 | FAT:38</option>
						<option value="Bumi Patra Sriwijaya">Bumi Patra Sriwijaya | HP:119 | FAT:0</option>
						<option value="Bumi Sako Damai">Bumi Sako Damai | HP:276 | FAT:92</option>
						<option value="Cambai Agung">Cambai Agung | HP:119 | FAT:21</option>
						<option value="Celentang Lestari">Celentang Lestari | HP:74 | FAT:2</option>
						<option value="Cempaka & Flamboyan">Cempaka & Flamboyan | HP:148 | FAT:2</option>
						<option value="Citra Bukit Lestari (Ext)">Citra Bukit Lestari (Ext) | HP:15 | FAT:0</option>
						<option value="Citra Damai 2">Citra Damai 2 | HP:313 | FAT:29</option>
						<option value="City Center (Ext)">City Center (Ext) | HP:12 | FAT:0</option>
						<option value="Dempo Dalam RW 04">Dempo Dalam RW 04 | HP:317 | FAT:47</option>
						<option value="Depan Bukit Sejahtera">Depan Bukit Sejahtera | HP:68 | FAT:25</option>
						<option value="Depan Green Forest">Depan Green Forest | HP:72 | FAT:20</option>
						<option value="Depan Poligon">Depan Poligon | HP:61 | FAT:13</option>
						<option value="Flamboyan RT 68">Flamboyan RT 68 | HP:60 | FAT:20</option>
						<option value="Gading Mansion">Gading Mansion | HP:56 | FAT:14</option>
						<option value="Gang Merak RT 23/RW 07">Gang Merak RT 23/RW 07 | HP:146 | FAT:25</option>
						<option value="Garuda Putra 2">Garuda Putra 2 | HP:270 | FAT:21</option>
						<option value="Graha Damai Lestari">Graha Damai Lestari | HP:121 | FAT:21</option>
						<option value="Graha Karya Lestari">Graha Karya Lestari | HP:90 | FAT:17</option>
						<option value="Graha Masturah">Graha Masturah | HP:25 | FAT:3</option>
						<option value="Grand Flower 2 (Ext)">Grand Flower 2 (Ext) | HP:21 | FAT:0</option>
						<option value="Grand Kencana Residence (Ext)">Grand Kencana Residence (Ext) | HP:14 | FAT:0</option>
						<option value="Green Forest">Green Forest | HP:59 | FAT:19</option>
						<option value="Green Forest Residence">Green Forest Residence | HP:212 | FAT:16</option>
						<option value="Griya Bhakti Sriwijaya">Griya Bhakti Sriwijaya | HP:172 | FAT:19</option>
						<option value="Griya Bni Baturaja Nusa Indah">Griya Bni Baturaja Nusa Indah | HP:63 | FAT:16</option>
						<option value="Griya Buana Indah 1">Griya Buana Indah 1 | HP:143 | FAT:19</option>
						<option value="Griya Buana Indah 2 RT 89">Griya Buana Indah 2 RT 89 | HP:198 | FAT:24</option>
						<option value="Griya Buana Indah 2 RT 90">Griya Buana Indah 2 RT 90 | HP:228 | FAT:44</option>
						<option value="Griya Cipta Pratama Tahap 2 (Ext)">Griya Cipta Pratama Tahap 2 (Ext) | HP:21 | FAT:0</option>
						<option value="Griya Damai Indah (FDT1)">Griya Damai Indah (FDT1) | HP:377 | FAT:36</option>
						<option value="Griya Damai Indah (FDT2)">Griya Damai Indah (FDT2) | HP:350 | FAT:87</option>
						<option value="Griya De' Pangeran (Ext)">Griya De' Pangeran (Ext) | HP:17 | FAT:0</option>
						<option value="Griya Duta Mas Akasia">Griya Duta Mas Akasia | HP:179 | FAT:34</option>
						<option value="Griya Duta Mas Bougenville">Griya Duta Mas Bougenville | HP:178 | FAT:25</option>
						<option value="Griya Hero Abadi">Griya Hero Abadi | HP:834 | FAT:316</option>
						<option value="Griya Kaswari">Griya Kaswari | HP:267 | FAT:20</option>
						<option value="Griya Kenten Damai RT.53/RW.04">Griya Kenten Damai RT.53/RW.04 | HP:133 | FAT:38</option>
						<option value="Griya Mitra 1">Griya Mitra 1 | HP:57 | FAT:6</option>
						<option value="Griya Palem Kencana (Ext)">Griya Palem Kencana (Ext) | HP:23 | FAT:0</option>
						<option value="Griya Permata Sukma (Ext)">Griya Permata Sukma (Ext) | HP:40 | FAT:0</option>
						<option value="Griya Pesona">Griya Pesona | HP:46 | FAT:11</option>
						<option value="Griya Putra Maharani 1">Griya Putra Maharani 1 | HP:81 | FAT:17</option>
						<option value="Griya Sejahtera Sukawinatan">Griya Sejahtera Sukawinatan | HP:249 | FAT:42</option>
						<option value="Griya Sekojo RW 29">Griya Sekojo RW 29 | HP:97 | FAT:11</option>
						<option value="Griya Senang Hati">Griya Senang Hati | HP:132 | FAT:42</option>
						<option value="Griya Tiga Putri">Griya Tiga Putri | HP:221 | FAT:21</option>
						<option value="Griya Wahana Indah">Griya Wahana Indah | HP:1 | FAT:5</option>
						<option value="Himatuna Residence">Himatuna Residence | HP:53 | FAT:8</option>
						<option value="Jalan Indra RW 09">Jalan Indra RW 09 | HP:125 | FAT:14</option>
						<option value="Jalan Kartini">Jalan Kartini | HP:136 | FAT:3</option>
						<option value="Jalan Karunia Abadi (Ext)">Jalan Karunia Abadi (Ext) | HP:12 | FAT:0</option>
						<option value="Jalan Karya Sepakat">Jalan Karya Sepakat | HP:53 | FAT:21</option>
						<option value="Jalan Rustini (Ext)">Jalan Rustini (Ext) | HP:30 | FAT:0</option>
						<option value="Jalan Seduduk Putih RW 05">Jalan Seduduk Putih RW 05 | HP:136 | FAT:30</option>
						<option value="Jalan Yayasan Ii">Jalan Yayasan Ii | HP:133 | FAT:30</option>
						<option value="Jl Ariodillah 4 (Ext)">Jl Ariodillah 4 (Ext) | HP:25 | FAT:0</option>
						<option value="Jl Asahan Raya (Ext)">Jl Asahan Raya (Ext) | HP:42 | FAT:1</option>
						<option value="Jl Bambang Utoyo (Fe Ext)">Jl Bambang Utoyo (Fe Ext) | HP:4 | FAT:4</option>
						<option value="Jl Bari Raya (Ext)">Jl Bari Raya (Ext) | HP:23 | FAT:0</option>
						<option value="Jl Cemara RT 25">Jl Cemara RT 25 | HP:263 | FAT:20</option>
						<option value="Jl Cendrawasih">Jl Cendrawasih | HP:271 | FAT:39</option>
						<option value="Jl Dempo Lrg Sebat RT 01">Jl Dempo Lrg Sebat RT 01 | HP:69 | FAT:24</option>
						<option value="Jl Dempo Lrg Sebat RT 04">Jl Dempo Lrg Sebat RT 04 | HP:79 | FAT:20</option>
						<option value="Jl Dempo Raya (Ext)">Jl Dempo Raya (Ext) | HP:17 | FAT:0</option>
						<option value="Jl Eka Bakti RW 09 & RW 08 RT 29">Jl Eka Bakti RW 09 & RW 08 RT 29 | HP:209 | FAT:37</option>
						<option value="Jl Gagak Maskerebet (Ext)">Jl Gagak Maskerebet (Ext) | HP:26 | FAT:0</option>
						<option value="Jl Hulu Balang, Bukit Lama RW 2">Jl Hulu Balang, Bukit Lama RW 2 | HP:311 | FAT:12</option>
						<option value="Jl Kancil Putih Gang Bersama (Ext)">Jl Kancil Putih Gang Bersama (Ext) | HP:18 | FAT:0</option>
						<option value="Jl Kartaraharja RW 01">Jl Kartaraharja RW 01 | HP:253 | FAT:16</option>
						<option value="Jl Kenari RT 25 RW 07 (Ext)">Jl Kenari RT 25 RW 07 (Ext) | HP:19 | FAT:0</option>
						<option value="Jl Lematang RW 08 (Ext)">Jl Lematang RW 08 (Ext) | HP:22 | FAT:0</option>
						<option value="Jl Letkol Yasin RW 04">Jl Letkol Yasin RW 04 | HP:128 | FAT:35</option>
						<option value="Jl Multiwahana RW 03">Jl Multiwahana RW 03 | HP:167 | FAT:31</option>
						<option value="Jl Multiwahana RW 04">Jl Multiwahana RW 04 | HP:484 | FAT:117</option>
						<option value="Jl Multiwahana RW 25">Jl Multiwahana RW 25 | HP:246 | FAT:55</option>
						<option value="Jl Mutiara RW 27">Jl Mutiara RW 27 | HP:155 | FAT:43</option>
						<option value="Jl Ogan">Jl Ogan | HP:172 | FAT:8</option>
						<option value="Jl Opi V Dan Opi Vi (Ext)">Jl Opi V Dan Opi Vi (Ext) | HP:40 | FAT:0</option>
						<option value="Jl Pancasila RW 02 (Ext)">Jl Pancasila RW 02 (Ext) | HP:20 | FAT:0</option>
						<option value="Jl Papera RW 03">Jl Papera RW 03 | HP:234 | FAT:5</option>
						<option value="Jl Patahilang (Ext)">Jl Patahilang (Ext) | HP:20 | FAT:0</option>
						<option value="Jl Payo Durian (Ext)">Jl Payo Durian (Ext) | HP:18 | FAT:0</option>
						<option value="Jl Pdam Lr Alir RW 05">Jl Pdam Lr Alir RW 05 | HP:192 | FAT:13</option>
						<option value="Jl Pertahanan Plaju">Jl Pertahanan Plaju | HP:429 | FAT:20</option>
						<option value="Jl Pertahanan Plaju Ujung (Ext)">Jl Pertahanan Plaju Ujung (Ext) | HP:26 | FAT:0</option>
						<option value="Jl Rawasari">Jl Rawasari | HP:102 | FAT:4</option>
						<option value="Jl Rustini RW 01">Jl Rustini RW 01 | HP:124 | FAT:18</option>
						<option value="Jl Sedap Malam RT 02 RW 01 (Ext)">Jl Sedap Malam RT 02 RW 01 (Ext) | HP:17 | FAT:0</option>
						<option value="Jl Sultan M Mansyur (Ext)">Jl Sultan M Mansyur (Ext) | HP:20 | FAT:0</option>
						<option value="Jl Sumatera Ii (Ext)">Jl Sumatera Ii (Ext) | HP:49 | FAT:0</option>
						<option value="Jl Sumatera Iii (Ext)">Jl Sumatera Iii (Ext) | HP:20 | FAT:0</option>
						<option value="Jl Tanjung Rawo (Ext)">Jl Tanjung Rawo (Ext) | HP:41 | FAT:0</option>
						<option value="Jl Tulang Bawang Dsk">Jl Tulang Bawang Dsk | HP:214 | FAT:8</option>
						<option value="Jl Yasin Salmah (Ext)">Jl Yasin Salmah (Ext) | HP:18 | FAT:0</option>
						<option value="Jl. Bina Cipta RT 22 RW 15">Jl. Bina Cipta RT 22 RW 15 | HP:121 | FAT:14</option>
						<option value="Jl. Dempo Lrg Manggis RT 05">Jl. Dempo Lrg Manggis RT 05 | HP:83 | FAT:24</option>
						<option value="Jl. Dempo Lrg Manggis RT 06">Jl. Dempo Lrg Manggis RT 06 | HP:50 | FAT:32</option>
						<option value="Jl. Dempo Lrg Manggis RT 07">Jl. Dempo Lrg Manggis RT 07 | HP:57 | FAT:25</option>
						<option value="Jl. Dempo Lrg Manggis RT 08">Jl. Dempo Lrg Manggis RT 08 | HP:68 | FAT:12</option>
						<option value="Jln Bunga Mayang RT 03 RW 01 (Ext)">Jln Bunga Mayang RT 03 RW 01 (Ext) | HP:40 | FAT:0</option>
						<option value="Jln Walet Raya Maskerebet (Ext)">Jln Walet Raya Maskerebet (Ext) | HP:13 | FAT:0</option>
						<option value="Jln. Mitra Haji  (Ext)">Jln. Mitra Haji  (Ext) | HP:20 | FAT:0</option>
						<option value="Kebon Sirih">Kebon Sirih | HP:97 | FAT:10</option>
						<option value="Kelapa Gading">Kelapa Gading | HP:115 | FAT:23</option>
						<option value="Kencana Damai FDT 1">Kencana Damai FDT 1 | HP:345 | FAT:56</option>
						<option value="Kencana Damai FDT 2">Kencana Damai FDT 2 | HP:348 | FAT:50</option>
						<option value="Kencana Damai FDT 3">Kencana Damai FDT 3 | HP:311 | FAT:66</option>
						<option value="Kenten Permai RW 04">Kenten Permai RW 04 | HP:460 | FAT:135</option>
						<option value="Kijang Mas RT 41">Kijang Mas RT 41 | HP:169 | FAT:16</option>
						<option value="Komp Griya Siaran Sako">Komp Griya Siaran Sako | HP:4 | FAT:5</option>
						<option value="Komp Pusri Sako RW 13">Komp Pusri Sako RW 13 | HP:182 | FAT:49</option>
						<option value="Komp Pusri Sako RW 14">Komp Pusri Sako RW 14 | HP:175 | FAT:22</option>
						<option value="Komp Pusri Sako RW 15">Komp Pusri Sako RW 15 | HP:188 | FAT:67</option>
						<option value="Komp Pusri Sako RW 16">Komp Pusri Sako RW 16 | HP:237 | FAT:62</option>
						<option value="Komp Pusri Sako RW 17">Komp Pusri Sako RW 17 | HP:161 | FAT:26</option>
						<option value="Komp Sukabangun Cindo Residen">Komp Sukabangun Cindo Residen | HP:1 | FAT:5</option>
						<option value="Komp Sumatera">Komp Sumatera | HP:148 | FAT:27</option>
						<option value="Komp Town House Sako Modern">Komp Town House Sako Modern | HP:1 | FAT:5</option>
						<option value="Komp Villa Sako Indah Satelit">Komp Villa Sako Indah Satelit | HP:2 | FAT:5</option>
						<option value="Komp Wahana Griya Indah">Komp Wahana Griya Indah | HP:1 | FAT:5</option>
						<option value="Komplek Anyar Residence (Ext)">Komplek Anyar Residence (Ext) | HP:19 | FAT:0</option>
						<option value="Komplek Balayudha">Komplek Balayudha | HP:157 | FAT:1</option>
						<option value="Komplek Barcelona (Ext)">Komplek Barcelona (Ext) | HP:13 | FAT:0</option>
						<option value="Komplek Bougenville RW 05 (Ext)">Komplek Bougenville RW 05 (Ext) | HP:33 | FAT:0</option>
						<option value="Komplek Bsi RT 05">Komplek Bsi RT 05 | HP:113 | FAT:21</option>
						<option value="Komplek Bukit Sejahtera RW 21">Komplek Bukit Sejahtera RW 21 | HP:412 | FAT:78</option>
						<option value="Komplek Bukit Sejahtera RW 23 (Ext)">Komplek Bukit Sejahtera RW 23 (Ext) | HP:37 | FAT:0</option>
						<option value="Komplek Citra Damai 1 (Ext)">Komplek Citra Damai 1 (Ext) | HP:14 | FAT:0</option>
						<option value="Komplek Demang 1 RT 53">Komplek Demang 1 RT 53 | HP:91 | FAT:14</option>
						<option value="Komplek Demang Lebar Daun RW 05">Komplek Demang Lebar Daun RW 05 | HP:267 | FAT:38</option>
						<option value="Komplek Demang Lebar Daun RW 08">Komplek Demang Lebar Daun RW 08 | HP:125 | FAT:4</option>
						<option value="Komplek Demang Palace">Komplek Demang Palace | HP:1 | FAT:5</option>
						<option value="Komplek D'Miro Residence (Ext)">Komplek D'Miro Residence (Ext) | HP:21 | FAT:1</option>
						<option value="Komplek Dprd">Komplek Dprd | HP:131 | FAT:18</option>
						<option value="Komplek Flamboyan">Komplek Flamboyan | HP:1 | FAT:5</option>
						<option value="Komplek Gardena 2">Komplek Gardena 2 | HP:85 | FAT:17</option>
						<option value="Komplek Grand Garden (Ext)">Komplek Grand Garden (Ext) | HP:63 | FAT:0</option>
						<option value="Komplek Grand Mansion">Komplek Grand Mansion | HP:1 | FAT:6</option>
						<option value="Komplek Green Tara Residence (Ext)">Komplek Green Tara Residence (Ext) | HP:16 | FAT:0</option>
						<option value="Komplek Griya Bahagia">Komplek Griya Bahagia | HP:255 | FAT:66</option>
						<option value="Komplek Griya Bangun Indah Dan Saba Indah">Komplek Griya Bangun Indah Dan Saba Indah | HP:84 | FAT:22</option>
						<option value="Komplek Griya Maju">Komplek Griya Maju | HP:107 | FAT:35</option>
						<option value="Komplek Griya Permata Sako">Komplek Griya Permata Sako | HP:224 | FAT:47</option>
						<option value="Komplek Jaya Indah Plaju RT 30">Komplek Jaya Indah Plaju RT 30 | HP:137 | FAT:25</option>
						<option value="Komplek Kampus">Komplek Kampus | HP:165 | FAT:28</option>
						<option value="Komplek Kampus RW 09">Komplek Kampus RW 09 | HP:147 | FAT:47</option>
						<option value="Komplek Kebun Bunga Permai (Ext)">Komplek Kebun Bunga Permai (Ext) | HP:21 | FAT:0</option>
						<option value="Komplek Kedamaian 1-2 RW.02">Komplek Kedamaian 1-2 RW.02 | HP:377 | FAT:92</option>
						<option value="Komplek Kehutanan Griyawana Bakti (Ext)">Komplek Kehutanan Griyawana Bakti (Ext) | HP:22 | FAT:0</option>
						<option value="Komplek Kejaksaan">Komplek Kejaksaan | HP:141 | FAT:11</option>
						<option value="Komplek Kemang Manis RW 01">Komplek Kemang Manis RW 01 | HP:210 | FAT:9</option>
						<option value="Komplek Kemang Manis RW 02">Komplek Kemang Manis RW 02 | HP:132 | FAT:14</option>
						<option value="Komplek Kenten Gardena 1 (Ext)">Komplek Kenten Gardena 1 (Ext) | HP:38 | FAT:0</option>
						<option value="Komplek Kenten Indah">Komplek Kenten Indah | HP:169 | FAT:43</option>
						<option value="Komplek Kenten Sejahtera 2 (Ext)">Komplek Kenten Sejahtera 2 (Ext) | HP:15 | FAT:0</option>
						<option value="Komplek Labamhoe">Komplek Labamhoe | HP:92 | FAT:33</option>
						<option value="Komplek Letnan Hadin RW 11">Komplek Letnan Hadin RW 11 | HP:277 | FAT:21</option>
						<option value="Komplek Macan Kumbang">Komplek Macan Kumbang | HP:646 | FAT:49</option>
						<option value="Komplek Padang Selasa">Komplek Padang Selasa | HP:121 | FAT:0</option>
						<option value="Komplek Pdam RW 11">Komplek Pdam RW 11 | HP:149 | FAT:8</option>
						<option value="Komplek Pdk RW 12">Komplek Pdk RW 12 | HP:156 | FAT:23</option>
						<option value="Komplek Pengadilan">Komplek Pengadilan | HP:124 | FAT:27</option>
						<option value="Komplek Pepaya">Komplek Pepaya | HP:381 | FAT:48</option>
						<option value="Komplek Persada Indah Sako (Ext)">Komplek Persada Indah Sako (Ext) | HP:38 | FAT:0</option>
						<option value="Komplek Pertambangan Taman Kenten">Komplek Pertambangan Taman Kenten | HP:179 | FAT:17</option>
						<option value="Komplek Pertanian">Komplek Pertanian | HP:151 | FAT:17</option>
						<option value="Komplek Perumahan Pondok Palem Indah  RT 75 RW 19 (Ext Tahap 5)">Komplek Perumahan Pondok Palem Indah  RT 75 RW 19 (Ext Tahap 5) | HP:20 | FAT:0</option>
						<option value="Komplek Perumahan Sederhana">Komplek Perumahan Sederhana | HP:60 | FAT:15</option>
						<option value="Komplek Phdm">Komplek Phdm | HP:362 | FAT:78</option>
						<option value="Komplek Puri Impian 1">Komplek Puri Impian 1 | HP:114 | FAT:31</option>
						<option value="Komplek Puri Nusa Indah (Ext)">Komplek Puri Nusa Indah (Ext) | HP:18 | FAT:0</option>
						<option value="Komplek Pusri Sako RW 12">Komplek Pusri Sako RW 12 | HP:219 | FAT:60</option>
						<option value="Komplek Sintraman Jaya">Komplek Sintraman Jaya | HP:143 | FAT:43</option>
						<option value="Komplek Suhada">Komplek Suhada | HP:146 | FAT:26</option>
						<option value="Komplek Sukarame Indah RW 03">Komplek Sukarame Indah RW 03 | HP:263 | FAT:45</option>
						<option value="Komplek Sukarami Gardena(Ext)">Komplek Sukarami Gardena(Ext) | HP:44 | FAT:0</option>
						<option value="Komplek Sukarami Indah">Komplek Sukarami Indah | HP:3 | FAT:4</option>
						<option value="Komplek Surya Kebun Sirih">Komplek Surya Kebun Sirih | HP:3 | FAT:5</option>
						<option value="Komplek Talang Kelapa RW 13">Komplek Talang Kelapa RW 13 | HP:462 | FAT:89</option>
						<option value="Komplek Talang Kelapa RW 17 RT 91">Komplek Talang Kelapa RW 17 RT 91 | HP:275 | FAT:26</option>
						<option value="Komplek Taman Kavling Mandiri Sejahtera (Ext)">Komplek Taman Kavling Mandiri Sejahtera (Ext) | HP:16 | FAT:0</option>
						<option value="Komplek Tirta Garden">Komplek Tirta Garden | HP:119 | FAT:37</option>
						<option value="Komplek Tirta Lestari Indah (Ext)">Komplek Tirta Lestari Indah (Ext) | HP:16 | FAT:0</option>
						<option value="Komplek Way Hitam RW 06">Komplek Way Hitam RW 06 | HP:110 | FAT:23</option>
						<option value="Komplek Way Hitam RW 07">Komplek Way Hitam RW 07 | HP:412 | FAT:50</option>
						<option value="Komplek Ykpi">Komplek Ykpi | HP:269 | FAT:45</option>
						<option value="Liverpool">Liverpool | HP:185 | FAT:36</option>
						<option value="Lorong Alamiah (Ext)">Lorong Alamiah (Ext) | HP:35 | FAT:0</option>
						<option value="Lorong Aman RW 05">Lorong Aman RW 05 | HP:99 | FAT:11</option>
						<option value="Lorong Family 04">Lorong Family 04 | HP:122 | FAT:19</option>
						<option value="Lorong Kapling RW 08 (Ext)">Lorong Kapling RW 08 (Ext) | HP:34 | FAT:0</option>
						<option value="Lorong Kelapa Puyuh (Ext)">Lorong Kelapa Puyuh (Ext) | HP:13 | FAT:0</option>
						<option value="Lorong Kulit & Komplek Town House 87 (Ext)">Lorong Kulit & Komplek Town House 87 (Ext) | HP:41 | FAT:0</option>
						<option value="Mess Pertiwi RW 10">Mess Pertiwi RW 10 | HP:120 | FAT:11</option>
						<option value="Multiwahana RT 11">Multiwahana RT 11 | HP:123 | FAT:15</option>
						<option value="Mustika Perdana">Mustika Perdana | HP:194 | FAT:74</option>
						<option value="Mutiara Residence">Mutiara Residence | HP:68 | FAT:11</option>
						<option value="Mutiara Sehati">Mutiara Sehati | HP:66 | FAT:6</option>
						<option value="Mutiara Siguntang">Mutiara Siguntang | HP:34 | FAT:14</option>
						<option value="Ogan Permata Indah RW 16">Ogan Permata Indah RW 16 | HP:263 | FAT:34</option>
						<option value="Opi V (Ext)">Opi V (Ext) | HP:21 | FAT:0</option>
						<option value="Pakjo Indah">Pakjo Indah | HP:87 | FAT:14</option>
						<option value="Pakjo RT 05 RW 08">Pakjo RT 05 RW 08 | HP:188 | FAT:18</option>
						<option value="Pakjo RT 07 RW 09">Pakjo RT 07 RW 09 | HP:122 | FAT:13</option>
						<option value="Palembang - Jl Rama Raya RT 04">Palembang - Jl Rama Raya RT 04 | HP:186 | FAT:56</option>
						<option value="Palembang Dian Regency">Palembang Dian Regency | HP:250 | FAT:79</option>
						<option value="Palembang Regency (Perumahan Swadaya)">Palembang Regency (Perumahan Swadaya) | HP:28 | FAT:5</option>
						<option value="Palembang-Jl Sersan Sani">Palembang-Jl Sersan Sani | HP:124 | FAT:13</option>
						<option value="Palm View">Palm View | HP:135 | FAT:13</option>
						<option value="Pelita Harapan Residence">Pelita Harapan Residence | HP:73 | FAT:13</option>
						<option value="Permai Indah & Sapta Musi Permai">Permai Indah & Sapta Musi Permai | HP:76 | FAT:4</option>
						<option value="Permata Biru">Permata Biru | HP:86 | FAT:14</option>
						<option value="Permata Hijau 1">Permata Hijau 1 | HP:229 | FAT:69</option>
						<option value="Permata Residence">Permata Residence | HP:82 | FAT:19</option>
						<option value="Permata Taman Golf">Permata Taman Golf | HP:74 | FAT:31</option>
						<option value="Perum Assegaf ( Komplek Assegaf )">Perum Assegaf ( Komplek Assegaf ) | HP:164 | FAT:10</option>
						<option value="Perum Atlet Jakabaring">Perum Atlet Jakabaring | HP:186 | FAT:61</option>
						<option value="Perum Bangau">Perum Bangau | HP:117 | FAT:37</option>
						<option value="Perum Bukit Permai">Perum Bukit Permai | HP:116 | FAT:11</option>
						<option value="Perum Bunga Kencana (Ext)">Perum Bunga Kencana (Ext) | HP:16 | FAT:0</option>
						<option value="Perum Dosen Politeknik">Perum Dosen Politeknik | HP:72 | FAT:12</option>
						<option value="Perum Griya Anggrek">Perum Griya Anggrek | HP:50 | FAT:0</option>
						<option value="Perum Griya Harapan A (Ext)">Perum Griya Harapan A (Ext) | HP:54 | FAT:0</option>
						<option value="Perum Griya Sako Asri (Ext)">Perum Griya Sako Asri (Ext) | HP:33 | FAT:0</option>
						<option value="Perum Kelapa Indah Blok I 6">Perum Kelapa Indah Blok I 6 | HP:252 | FAT:32</option>
						<option value="Perum Kemang Padar">Perum Kemang Padar | HP:144 | FAT:16</option>
						<option value="Perum Malaka">Perum Malaka | HP:171 | FAT:38</option>
						<option value="Perum Maskarebet RW 02">Perum Maskarebet RW 02 | HP:146 | FAT:9</option>
						<option value="Perum Maskarebet RW 03">Perum Maskarebet RW 03 | HP:462 | FAT:51</option>
						<option value="Perum Mes Pertiwi RW 06">Perum Mes Pertiwi RW 06 | HP:263 | FAT:93</option>
						<option value="Perum Mes Pertiwi RW 07">Perum Mes Pertiwi RW 07 | HP:157 | FAT:41</option>
						<option value="Perum Opi RW 13">Perum Opi RW 13 | HP:732 | FAT:64</option>
						<option value="Perum Pondok Palem Indah">Perum Pondok Palem Indah | HP:549 | FAT:63</option>
						<option value="Perum Pu">Perum Pu | HP:142 | FAT:29</option>
						<option value="Perum Rajawali">Perum Rajawali | HP:330 | FAT:76</option>
						<option value="Perum Sako Borang RW 18">Perum Sako Borang RW 18 | HP:131 | FAT:42</option>
						<option value="Perum Sako Borang RW 19">Perum Sako Borang RW 19 | HP:135 | FAT:27</option>
						<option value="Perum Sako Borang RW 20">Perum Sako Borang RW 20 | HP:166 | FAT:45</option>
						<option value="Perum Sako Borang RW 21">Perum Sako Borang RW 21 | HP:226 | FAT:56</option>
						<option value="Perum Sako Borang RW 22">Perum Sako Borang RW 22 | HP:103 | FAT:17</option>
						<option value="Perum Sangkuriang Indah">Perum Sangkuriang Indah | HP:416 | FAT:95</option>
						<option value="Perum Taman Indah">Perum Taman Indah | HP:1 | FAT:5</option>
						<option value="Perum Tanjung Pengharapan">Perum Tanjung Pengharapan | HP:38 | FAT:5</option>
						<option value="Perumahan Benteng">Perumahan Benteng | HP:199 | FAT:3</option>
						<option value="Perumahan Buana Asri (Ext)">Perumahan Buana Asri (Ext) | HP:22 | FAT:3</option>
						<option value="Perumahan Buana Gardenia">Perumahan Buana Gardenia | HP:105 | FAT:21</option>
						<option value="Perumahan Bukit Palem Residence (Ext)">Perumahan Bukit Palem Residence (Ext) | HP:21 | FAT:0</option>
						<option value="Perumahan Bumi Sako Permai">Perumahan Bumi Sako Permai | HP:78 | FAT:3</option>
						<option value="Perumahan Dekranasda">Perumahan Dekranasda | HP:439 | FAT:133</option>
						<option value="Perumahan Graha Utama Bandara (Ext)">Perumahan Graha Utama Bandara (Ext) | HP:33 | FAT:0</option>
						<option value="Perumahan Green Island 1">Perumahan Green Island 1 | HP:140 | FAT:5</option>
						<option value="Perumahan Griya Asri Mandiri (Ext)">Perumahan Griya Asri Mandiri (Ext) | HP:22 | FAT:3</option>
						<option value="Perumahan Griya Sejahtera Sako">Perumahan Griya Sejahtera Sako | HP:65 | FAT:8</option>
						<option value="Perumahan Kebon Sirih Dalam (Ext)">Perumahan Kebon Sirih Dalam (Ext) | HP:21 | FAT:0</option>
						<option value="Perumahan Pinang Jaya">Perumahan Pinang Jaya | HP:21 | FAT:0</option>
						<option value="Perumahan Pioner (Ext)">Perumahan Pioner (Ext) | HP:17 | FAT:0</option>
						<option value="Perumahan Pondok Palem Indah RT 81 RW 19 (Ext)">Perumahan Pondok Palem Indah RT 81 RW 19 (Ext) | HP:37 | FAT:0</option>
						<option value="Perumahan Pondok Palem Indah Tahap 2 (Ext)">Perumahan Pondok Palem Indah Tahap 2 (Ext) | HP:15 | FAT:0</option>
						<option value="Perumahan Sasana Patra RW 08 (FDT 01)">Perumahan Sasana Patra RW 08 (FDT 01) | HP:419 | FAT:106</option>
						<option value="Perumahan Sasana Patra RW 08 (FDT 02)">Perumahan Sasana Patra RW 08 (FDT 02) | HP:433 | FAT:133</option>
						<option value="Perumahan Satelit Sapta Marga">Perumahan Satelit Sapta Marga | HP:90 | FAT:10</option>
						<option value="Perumahan Sukarela Indah">Perumahan Sukarela Indah | HP:55 | FAT:8</option>
						<option value="Perumahan Sukarela Mas">Perumahan Sukarela Mas | HP:1 | FAT:5</option>
						<option value="Perumahan Taman Puri Artha">Perumahan Taman Puri Artha | HP:64 | FAT:6</option>
						<option value="Perumnas Raya RW 02">Perumnas Raya RW 02 | HP:567 | FAT:70</option>
						<option value="Perumnas Talang Kelapa Blok 7 RT 31 RW 06 (Ext)">Perumnas Talang Kelapa Blok 7 RT 31 RW 06 (Ext) | HP:17 | FAT:0</option>
						<option value="Perumnas Tl Kelapa Vii RT 35 (Ext)">Perumnas Tl Kelapa Vii RT 35 (Ext) | HP:21 | FAT:0</option>
						<option value="Prima Indah RT 20 RW 19">Prima Indah RT 20 RW 19 | HP:160 | FAT:45</option>
						<option value="Puri Impian 2">Puri Impian 2 | HP:78 | FAT:32</option>
						<option value="Puri Mas Garden">Puri Mas Garden | HP:118 | FAT:8</option>
						<option value="Puri Sejahtera">Puri Sejahtera | HP:142 | FAT:11</option>
						<option value="Puri Sukatani Indah 2">Puri Sukatani Indah 2 | HP:113 | FAT:20</option>
						<option value="Puri Tanjung Asri">Puri Tanjung Asri | HP:161 | FAT:25</option>
						<option value="Pusri Sukamaju">Pusri Sukamaju | HP:214 | FAT:39</option>
						<option value="Ruko Abi Hasan">Ruko Abi Hasan | HP:19 | FAT:2</option>
						<option value="Ruko Arianda Angkatan 45">Ruko Arianda Angkatan 45 | HP:96 | FAT:21</option>
						<option value="Ruko Avenue 2">Ruko Avenue 2 | HP:20 | FAT:10</option>
						<option value="Ruko Bangau">Ruko Bangau | HP:64 | FAT:17</option>
						<option value="Ruko Bank Raya">Ruko Bank Raya | HP:16 | FAT:13</option>
						<option value="Ruko Basuki Rahmat">Ruko Basuki Rahmat | HP:93 | FAT:49</option>
						<option value="Ruko Blok B Orchard Park">Ruko Blok B Orchard Park | HP:78 | FAT:54</option>
						<option value="Ruko Celentang">Ruko Celentang | HP:205 | FAT:34</option>
						<option value="Ruko Copacabana">Ruko Copacabana | HP:96 | FAT:68</option>
						<option value="Ruko Dekat Olt">Ruko Dekat Olt | HP:107 | FAT:10</option>
						<option value="Ruko Demang">Ruko Demang | HP:13 | FAT:2</option>
						<option value="Ruko Golden Boulevard">Ruko Golden Boulevard | HP:23 | FAT:12</option>
						<option value="Ruko Green Kedamaian">Ruko Green Kedamaian | HP:182 | FAT:46</option>
						<option value="Ruko Jl M. Isa">Ruko Jl M. Isa | HP:125 | FAT:28</option>
						<option value="Ruko Kelapa Gading">Ruko Kelapa Gading | HP:28 | FAT:27</option>
						<option value="Ruko Kenten Permai">Ruko Kenten Permai | HP:49 | FAT:0</option>
						<option value="Ruko Km.9">Ruko Km.9 | HP:39 | FAT:25</option>
						<option value="Ruko Kolonel H. Burlian">Ruko Kolonel H. Burlian | HP:178 | FAT:45</option>
						<option value="Ruko Komplek Kampus">Ruko Komplek Kampus | HP:116 | FAT:31</option>
						<option value="Ruko Komplek Poligon">Ruko Komplek Poligon | HP:8 | FAT:6</option>
						<option value="Ruko Malaka">Ruko Malaka | HP:39 | FAT:1</option>
						<option value="Ruko Maskarebet">Ruko Maskarebet | HP:128 | FAT:1</option>
						<option value="Ruko Mayor Ruslan">Ruko Mayor Ruslan | HP:117 | FAT:35</option>
						<option value="Ruko Palembang Regency">Ruko Palembang Regency | HP:18 | FAT:10</option>
						<option value="Ruko Palm Kids">Ruko Palm Kids | HP:18 | FAT:6</option>
						<option value="Ruko Pasar Perumnas">Ruko Pasar Perumnas | HP:85 | FAT:26</option>
						<option value="Ruko Phdm">Ruko Phdm | HP:146 | FAT:43</option>
						<option value="Ruko Puri Mas Garden">Ruko Puri Mas Garden | HP:98 | FAT:30</option>
						<option value="Ruko Pusri Sukamaju">Ruko Pusri Sukamaju | HP:81 | FAT:24</option>
						<option value="Ruko Rajawali">Ruko Rajawali | HP:79 | FAT:52</option>
						<option value="Ruko Sako">Ruko Sako | HP:48 | FAT:10</option>
						<option value="Ruko Sako Borang">Ruko Sako Borang | HP:17 | FAT:1</option>
						<option value="Ruko Saphire">Ruko Saphire | HP:40 | FAT:35</option>
						<option value="Ruko Siaran Balai">Ruko Siaran Balai | HP:60 | FAT:11</option>
						<option value="Ruko Siaran Baru">Ruko Siaran Baru | HP:151 | FAT:52</option>
						<option value="Ruko Simpang Bobat">Ruko Simpang Bobat | HP:166 | FAT:47</option>
						<option value="Ruko Simpang Sako">Ruko Simpang Sako | HP:138 | FAT:79</option>
						<option value="Ruko Simpang Terminal">Ruko Simpang Terminal | HP:132 | FAT:45</option>
						<option value="Ruko Tirta Lestari">Ruko Tirta Lestari | HP:16 | FAT:4</option>
						<option value="Ruko Tunas Bangsa, Ruko Halte Kumbang, Ruko Buana Hijau, Ruko Bhl">Ruko Tunas Bangsa, Ruko Halte Kumbang, Ruko Buana Hijau, Ruko Bhl | HP:135 | FAT:37</option>
						<option value="Ruko Villa Gardena">Ruko Villa Gardena | HP:116 | FAT:19</option>
						<option value="Ruko Villa Tanjung Harapan">Ruko Villa Tanjung Harapan | HP:50 | FAT:14</option>
						<option value="Ruko Way Hitam">Ruko Way Hitam | HP:70 | FAT:10</option>
						<option value="Sako Garden">Sako Garden | HP:71 | FAT:28</option>
						<option value="Seduduk Putih RW 07">Seduduk Putih RW 07 | HP:380 | FAT:50</option>
						<option value="Sei Rembang RW 04">Sei Rembang RW 04 | HP:286 | FAT:33</option>
						<option value="Sekojo">Sekojo | HP:145 | FAT:20</option>
						<option value="Sentraland Residence (Ext)">Sentraland Residence (Ext) | HP:49 | FAT:0</option>
						<option value="Sukarame Indah RW 02">Sukarame Indah RW 02 | HP:221 | FAT:53</option>
						<option value="Sukarame Patra Permai 1-4">Sukarame Patra Permai 1-4 | HP:186 | FAT:24</option>
						<option value="Sukarame Patra Permai 2">Sukarame Patra Permai 2 | HP:201 | FAT:48</option>
						<option value="Sukarame Patra Permai 3">Sukarame Patra Permai 3 | HP:151 | FAT:113</option>
						<option value="Sukarela Residence">Sukarela Residence | HP:43 | FAT:14</option>
						<option value="Sungai Sahang RT 47">Sungai Sahang RT 47 | HP:212 | FAT:8</option>
						<option value="Surya Akbar 2">Surya Akbar 2 | HP:111 | FAT:30</option>
						<option value="Taman Bukit Raflesia">Taman Bukit Raflesia | HP:250 | FAT:33</option>
						<option value="Taman Graha Bukit Rafflesia">Taman Graha Bukit Rafflesia | HP:413 | FAT:65</option>
						<option value="Taman Pondok Indah">Taman Pondok Indah | HP:32 | FAT:1</option>
						<option value="Taman Sari Kenten 2">Taman Sari Kenten 2 | HP:150 | FAT:40</option>
						<option value="Tanah Merah RT 39 RW 11">Tanah Merah RT 39 RW 11 | HP:273 | FAT:74</option>
						<option value="Teuku Umar">Teuku Umar | HP:36 | FAT:5</option>
						<option value="Tirta Mutiara Indah">Tirta Mutiara Indah | HP:143 | FAT:36</option>
						<option value="Town House Pop 1">Town House Pop 1 | HP:76 | FAT:15</option>
						<option value="Town House Pop 2">Town House Pop 2 | HP:61 | FAT:8</option>
						<option value="Villa Anggrek">Villa Anggrek | HP:71 | FAT:14</option>
						<option value="Villa Angkasa Permai">Villa Angkasa Permai | HP:210 | FAT:25</option>
						<option value="Villa Arafuruh">Villa Arafuruh | HP:133 | FAT:9</option>
						<option value="Villa Bari Indah">Villa Bari Indah | HP:92 | FAT:13</option>
						<option value="Villa Bukit Lestari">Villa Bukit Lestari | HP:24 | FAT:2</option>
						<option value="Villa Bunga Mas">Villa Bunga Mas | HP:121 | FAT:13</option>
						<option value="Villa Edelweis">Villa Edelweis | HP:89 | FAT:19</option>
						<option value="Villa Edelweis 2">Villa Edelweis 2 | HP:40 | FAT:13</option>
						<option value="Villa Gardena 1 & 2">Villa Gardena 1 & 2 | HP:115 | FAT:46</option>
						<option value="Villa Gardena 3">Villa Gardena 3 | HP:154 | FAT:59</option>
						<option value="Villa Gardena 4 (Ext)">Villa Gardena 4 (Ext) | HP:46 | FAT:0</option>
						<option value="Villa Kedamaian 2">Villa Kedamaian 2 | HP:203 | FAT:57</option>
						<option value="Villa Kencana Damai">Villa Kencana Damai | HP:113 | FAT:34</option>
						<option value="Villa Kenten">Villa Kenten | HP:143 | FAT:46</option>
						<option value="Villa Palem Cemerlang (Ext)">Villa Palem Cemerlang (Ext) | HP:21 | FAT:4</option>
						<option value="Villa Permai Sentosa">Villa Permai Sentosa | HP:217 | FAT:5</option>
						<option value="Villa Permata">Villa Permata | HP:121 | FAT:25</option>
						<option value="Villa Shangrilla">Villa Shangrilla | HP:57 | FAT:3</option>
						<option value="Villa Sukamaju">Villa Sukamaju | HP:103 | FAT:18</option>
						<option value="Villa Sukarame Permai">Villa Sukarame Permai | HP:188 | FAT:29</option>
						<option value="Villa Sukarami Indah">Villa Sukarami Indah | HP:58 | FAT:11</option>
						<option value="Villa Tanjung Harapan">Villa Tanjung Harapan | HP:113 | FAT:26</option>
						<option value="Villa Utama Selayur">Villa Utama Selayur | HP:89 | FAT:1</option>
						<option value="Villa Wijaya Kesuma">Villa Wijaya Kesuma | HP:38 | FAT:6</option>
						<option value="Wahana Griya Indah">Wahana Griya Indah | HP:4 | FAT:8</option>
                  </select>
               </div>
               <!-- tutup Palembang -->

               <!-- Semarang -->
               <div id="Semarang" class="form-group" style="display: none;">
                  <select class="form-control js-example-basic-single" name="nama_cluster" oninvalid="this.setCustomValidity('Pilih Cluster')" oninput="setCustomValidity('')">
                     <option value="" selected disabled hidden>Pilih Nama Cluster</option>
						<option value="Afa Permai RW 17">Afa Permai RW 17 | HP:150 | FAT:31</option>
						<option value="Alamanda Cluster">Alamanda Cluster | HP:80 | FAT:38</option>
						<option value="Area Seroja Kel Karang Kidul">Area Seroja Kel Karang Kidul | HP:209 | FAT:53</option>
						<option value="Argo Mulyo Mukti Timur">Argo Mulyo Mukti Timur | HP:503 | FAT:140</option>
						<option value="Banget Ayu">Banget Ayu | HP:231 | FAT:44</option>
						<option value="Bendan Ngisor RW 01">Bendan Ngisor RW 01 | HP:369 | FAT:125</option>
						<option value="Bendan Ngisor RW 02">Bendan Ngisor RW 02 | HP:151 | FAT:42</option>
						<option value="Bojong Salaman RW 09">Bojong Salaman RW 09 | HP:299 | FAT:122</option>
						<option value="Bpd Iii RT 05 RW 06 Blok H (Ext)">Bpd Iii RT 05 RW 06 Blok H (Ext) | HP:21 | FAT:0</option>
						<option value="Bpd Iii RW 04">Bpd Iii RW 04 | HP:171 | FAT:30</option>
						<option value="Brumbungan RW 02">Brumbungan RW 02 | HP:112 | FAT:48</option>
						<option value="Brumbungan RW 03">Brumbungan RW 03 | HP:172 | FAT:72</option>
						<option value="Brumbungan RW 04">Brumbungan RW 04 | HP:126 | FAT:45</option>
						<option value="Brumbungan RW 05">Brumbungan RW 05 | HP:84 | FAT:16</option>
						<option value="Bukit Manyaran Permai">Bukit Manyaran Permai | HP:416 | FAT:128</option>
						<option value="Bukit Sendang Mulyo RW 15">Bukit Sendang Mulyo RW 15 | HP:303 | FAT:59</option>
						<option value="Bukit Sendang Mulyo RW 15 RT 04">Bukit Sendang Mulyo RW 15 RT 04 | HP:52 | FAT:12</option>
						<option value="Bukit Sendang Mulyo RW 20">Bukit Sendang Mulyo RW 20 | HP:387 | FAT:215</option>
						<option value="Bulu Lor RW 01">Bulu Lor RW 01 | HP:206 | FAT:57</option>
						<option value="Bulu Lor RW 03">Bulu Lor RW 03 | HP:166 | FAT:27</option>
						<option value="Bulu Lor RW 04">Bulu Lor RW 04 | HP:151 | FAT:40</option>
						<option value="Bulustalan RT 06 RW 03 (Ext)">Bulustalan RT 06 RW 03 (Ext) | HP:7 | FAT:0</option>
						<option value="Bulustalan RW 02">Bulustalan RW 02 | HP:244 | FAT:25</option>
						<option value="Bumi Wana Mukti RW 04">Bumi Wana Mukti RW 04 | HP:182 | FAT:49</option>
						<option value="Candi Kalasan RW 11">Candi Kalasan RW 11 | HP:525 | FAT:187</option>
						<option value="Cluster Korpri Bulusan">Cluster Korpri Bulusan | HP:31 | FAT:25</option>
						<option value="Cluster Wolter Moginsidi Baru">Cluster Wolter Moginsidi Baru | HP:87 | FAT:44</option>
						<option value="Dempel Baru Selatan">Dempel Baru Selatan | HP:443 | FAT:98</option>
						<option value="Gajah Mungkur RW 01">Gajah Mungkur RW 01 | HP:344 | FAT:158</option>
						<option value="Ganesha RW 04">Ganesha RW 04 | HP:553 | FAT:154</option>
						<option value="Ganesha RW 3">Ganesha RW 3 | HP:474 | FAT:148</option>
						<option value="Ganesha RW 5">Ganesha RW 5 | HP:367 | FAT:115</option>
						<option value="Gardenia">Gardenia | HP:226 | FAT:89</option>
						<option value="Gayamsari RW 05">Gayamsari RW 05 | HP:169 | FAT:47</option>
						<option value="Gisik Drono RW 04">Gisik Drono RW 04 | HP:311 | FAT:113</option>
						<option value="Gisik Drono RW 05">Gisik Drono RW 05 | HP:353 | FAT:85</option>
						<option value="Gisik Drono RW 06">Gisik Drono RW 06 | HP:132 | FAT:49</option>
						<option value="Gisik Drono RW 07">Gisik Drono RW 07 | HP:188 | FAT:82</option>
						<option value="Gisik Drono RW 08">Gisik Drono RW 08 | HP:84 | FAT:25</option>
						<option value="Grafika Citra Sentosa">Grafika Citra Sentosa | HP:69 | FAT:31</option>
						<option value="Grafika Widya Graha">Grafika Widya Graha | HP:37 | FAT:7</option>
						<option value="Grafika Yusuf Pratama">Grafika Yusuf Pratama | HP:30 | FAT:3</option>
						<option value="Graha Estetika">Graha Estetika | HP:438 | FAT:148</option>
						<option value="Graha Mukti RW 25">Graha Mukti RW 25 | HP:249 | FAT:82</option>
						<option value="Graha Sapta Asri">Graha Sapta Asri | HP:221 | FAT:31</option>
						<option value="Green Tembalang Regency">Green Tembalang Regency | HP:288 | FAT:64</option>
						<option value="Jasmin Park">Jasmin Park | HP:278 | FAT:123</option>
						<option value="Jatingaleh RW 02">Jatingaleh RW 02 | HP:147 | FAT:22</option>
						<option value="Jl  Mangga, Lamper Kidul">Jl  Mangga, Lamper Kidul | HP:218 | FAT:54</option>
						<option value="Jl Durian Raya (Fe Ext)">Jl Durian Raya (Fe Ext) | HP:4 | FAT:3</option>
						<option value="Jl Nangka Lamper Kidul">Jl Nangka Lamper Kidul | HP:242 | FAT:95</option>
						<option value="Kalibanteng Kidul RW 02">Kalibanteng Kidul RW 02 | HP:229 | FAT:51</option>
						<option value="Kalibanteng Kidul RW 03">Kalibanteng Kidul RW 03 | HP:144 | FAT:62</option>
						<option value="Kalibanteng Kulon RW 06">Kalibanteng Kulon RW 06 | HP:316 | FAT:102</option>
						<option value="Kalipancur RW 03">Kalipancur RW 03 | HP:347 | FAT:130</option>
						<option value="Kaliwiru RW 02">Kaliwiru RW 02 | HP:242 | FAT:107</option>
						<option value="Kaliwiru RW 03">Kaliwiru RW 03 | HP:158 | FAT:59</option>
						<option value="Kaliwiru RW 04">Kaliwiru RW 04 | HP:110 | FAT:67</option>
						<option value="Karang Rejo RW 01">Karang Rejo RW 01 | HP:174 | FAT:54</option>
						<option value="Karang Rejo RW 02">Karang Rejo RW 02 | HP:113 | FAT:33</option>
						<option value="Karang Rejo RW 04">Karang Rejo RW 04 | HP:153 | FAT:70</option>
						<option value="Karang Rejo RW 08">Karang Rejo RW 08 | HP:69 | FAT:3</option>
						<option value="Karang Tempel RW 02">Karang Tempel RW 02 | HP:182 | FAT:41</option>
						<option value="Karang Tempel RW 03">Karang Tempel RW 03 | HP:237 | FAT:59</option>
						<option value="Karang Tempel RW 04">Karang Tempel RW 04 | HP:149 | FAT:41</option>
						<option value="Karang Tempel RW 05">Karang Tempel RW 05 | HP:137 | FAT:60</option>
						<option value="Karangrejo Banyumanik RW 03">Karangrejo Banyumanik RW 03 | HP:243 | FAT:50</option>
						<option value="Karangrejo RW 05">Karangrejo RW 05 | HP:99 | FAT:32</option>
						<option value="Kel Banyumanik RW 06">Kel Banyumanik RW 06 | HP:139 | FAT:20</option>
						<option value="Kel Kalipancur RW 04">Kel Kalipancur RW 04 | HP:365 | FAT:148</option>
						<option value="Kel Karangayu RW 05">Kel Karangayu RW 05 | HP:187 | FAT:46</option>
						<option value="Kel Kuningan RW 05">Kel Kuningan RW 05 | HP:119 | FAT:50</option>
						<option value="Kel Lamper Lor RW 03">Kel Lamper Lor RW 03 | HP:211 | FAT:47</option>
						<option value="Kel Pedalangan RW 03">Kel Pedalangan RW 03 | HP:455 | FAT:89</option>
						<option value="Kel Plombokan RW 04">Kel Plombokan RW 04 | HP:276 | FAT:112</option>
						<option value="Kel Purwosari RW 06">Kel Purwosari RW 06 | HP:234 | FAT:47</option>
						<option value="Kel Tandang RW 02">Kel Tandang RW 02 | HP:413 | FAT:90</option>
						<option value="Kel. Kalicari RW 01">Kel. Kalicari RW 01 | HP:127 | FAT:52</option>
						<option value="Kel. Karangayu RW 01">Kel. Karangayu RW 01 | HP:233 | FAT:46</option>
						<option value="Kel. Srondol Kulon RW 08">Kel. Srondol Kulon RW 08 | HP:245 | FAT:79</option>
						<option value="Kembang Arum RW 01">Kembang Arum RW 01 | HP:182 | FAT:67</option>
						<option value="Kembang Arum RW 05">Kembang Arum RW 05 | HP:284 | FAT:118</option>
						<option value="Kembang Arum RW 08">Kembang Arum RW 08 | HP:150 | FAT:36</option>
						<option value="Kembang Arum RW 09">Kembang Arum RW 09 | HP:120 | FAT:52</option>
						<option value="Kembang Arum RW 10">Kembang Arum RW 10 | HP:421 | FAT:153</option>
						<option value="Kembang Arum RW 13">Kembang Arum RW 13 | HP:271 | FAT:102</option>
						<option value="Klipang Green">Klipang Green | HP:206 | FAT:74</option>
						<option value="Klipang Pesona Asri Ii & Iii RW 28 FDT 1">Klipang Pesona Asri Ii & Iii RW 28 FDT 1 | HP:467 | FAT:90</option>
						<option value="Klipang Pesona Asri Ii & Iii RW 28 FDT 2">Klipang Pesona Asri Ii & Iii RW 28 FDT 2 | HP:328 | FAT:84</option>
						<option value="Klipang Pesona Asri Residence">Klipang Pesona Asri Residence | HP:175 | FAT:103</option>
						<option value="Klipang Pesona Asri Royal Park (Ae)">Klipang Pesona Asri Royal Park (Ae) | HP:39 | FAT:9</option>
						<option value="Klipang Pesona Asri Royal Park (Ug)">Klipang Pesona Asri Royal Park (Ug) | HP:68 | FAT:33</option>
						<option value="Korpri Bulusan">Korpri Bulusan | HP:445 | FAT:65</option>
						<option value="Korpri Bulusan RW 05 RT 03">Korpri Bulusan RW 05 RT 03 | HP:85 | FAT:13</option>
						<option value="Korpri Sambiroto RW 08">Korpri Sambiroto RW 08 | HP:438 | FAT:60</option>
						<option value="Kuningan RW 06">Kuningan RW 06 | HP:400 | FAT:158</option>
						<option value="Lamper Lor RW 05">Lamper Lor RW 05 | HP:179 | FAT:64</option>
						<option value="Lamper Mijen RW 04">Lamper Mijen RW 04 | HP:302 | FAT:46</option>
						<option value="Lempong Sari RW 03">Lempong Sari RW 03 | HP:46 | FAT:19</option>
						<option value="Lempong Sari RW 06">Lempong Sari RW 06 | HP:168 | FAT:37</option>
						<option value="Lempong Sari RW 08">Lempong Sari RW 08 | HP:87 | FAT:28</option>
						<option value="Manyaran RW 01">Manyaran RW 01 | HP:277 | FAT:78</option>
						<option value="Manyaran RW 02">Manyaran RW 02 | HP:222 | FAT:86</option>
						<option value="Manyaran RW 03">Manyaran RW 03 | HP:291 | FAT:103</option>
						<option value="Manyaran RW 10">Manyaran RW 10 | HP:350 | FAT:146</option>
						<option value="Merlion Residence (Ext)">Merlion Residence (Ext) | HP:14 | FAT:0</option>
						<option value="Miroto RW 03">Miroto RW 03 | HP:156 | FAT:42</option>
						<option value="Mugas Barat">Mugas Barat | HP:166 | FAT:57</option>
						<option value="Palebon RW 08">Palebon RW 08 | HP:261 | FAT:96</option>
						<option value="Pandean Lamper RW 08">Pandean Lamper RW 08 | HP:246 | FAT:68</option>
						<option value="Pedurungan Lor 3">Pedurungan Lor 3 | HP:260 | FAT:62</option>
						<option value="Pekunden RW 04">Pekunden RW 04 | HP:146 | FAT:72</option>
						<option value="Pekunden RW 05">Pekunden RW 05 | HP:240 | FAT:93</option>
						<option value="Permata Batusari">Permata Batusari | HP:520 | FAT:157</option>
						<option value="Permata Hijau">Permata Hijau | HP:43 | FAT:27</option>
						<option value="Permata Sendang Mulyo RW 29">Permata Sendang Mulyo RW 29 | HP:131 | FAT:46</option>
						<option value="Perum Arya Mukti RW 02">Perum Arya Mukti RW 02 | HP:106 | FAT:41</option>
						<option value="Perum Pasadena RW 08">Perum Pasadena RW 08 | HP:219 | FAT:78</option>
						<option value="Perum Pasadena RW 10">Perum Pasadena RW 10 | HP:183 | FAT:23</option>
						<option value="Perum Payung Mas RW 10">Perum Payung Mas RW 10 | HP:305 | FAT:105</option>
						<option value="Perumnas Banyumanik RW 02">Perumnas Banyumanik RW 02 | HP:216 | FAT:35</option>
						<option value="Perumnas Banyumanik RW 08">Perumnas Banyumanik RW 08 | HP:178 | FAT:82</option>
						<option value="Perumnas Banyumanik RW 09">Perumnas Banyumanik RW 09 | HP:82 | FAT:61</option>
						<option value="Peterongan RW 04">Peterongan RW 04 | HP:118 | FAT:34</option>
						<option value="Petompon RW 01">Petompon RW 01 | HP:155 | FAT:42</option>
						<option value="Petompon RW 02">Petompon RW 02 | HP:164 | FAT:52</option>
						<option value="Petompon RW 05">Petompon RW 05 | HP:103 | FAT:16</option>
						<option value="Petompong Mas">Petompong Mas | HP:21 | FAT:8</option>
						<option value="Plamongan Hijau RW 08">Plamongan Hijau RW 08 | HP:223 | FAT:78</option>
						<option value="Plamongan Hijau RW 08 (Ext)">Plamongan Hijau RW 08 (Ext) | HP:2 | FAT:4</option>
						<option value="Plamongan Indah Blok Aa">Plamongan Indah Blok Aa | HP:68 | FAT:29</option>
						<option value="Plamongan Indah RW 05">Plamongan Indah RW 05 | HP:172 | FAT:39</option>
						<option value="Plamongan Indah RW 06">Plamongan Indah RW 06 | HP:252 | FAT:95</option>
						<option value="Plamongan Indah RW 07">Plamongan Indah RW 07 | HP:218 | FAT:24</option>
						<option value="Plamongan Indah RW 08">Plamongan Indah RW 08 | HP:465 | FAT:110</option>
						<option value="Plamongan Indah RW 14">Plamongan Indah RW 14 | HP:383 | FAT:151</option>
						<option value="Plamongan Indah RW 27">Plamongan Indah RW 27 | HP:515 | FAT:135</option>
						<option value="Plamongan Indah RW 29">Plamongan Indah RW 29 | HP:292 | FAT:98</option>
						<option value="Plamongan Indah RW 31">Plamongan Indah RW 31 | HP:431 | FAT:180</option>
						<option value="Plamongan Indah RW 33">Plamongan Indah RW 33 | HP:124 | FAT:38</option>
						<option value="Plamongan RW 16">Plamongan RW 16 | HP:147 | FAT:49</option>
						<option value="Pleburan RW 01">Pleburan RW 01 | HP:197 | FAT:42</option>
						<option value="Pleburan RW 04">Pleburan RW 04 | HP:241 | FAT:89</option>
						<option value="Pondok Indraprasta">Pondok Indraprasta | HP:506 | FAT:194</option>
						<option value="Puri Anjasmoro RW 02">Puri Anjasmoro RW 02 | HP:470 | FAT:149</option>
						<option value="Puri Anjasmoro RW 04">Puri Anjasmoro RW 04 | HP:308 | FAT:98</option>
						<option value="Puri Anjasmoro RW 06">Puri Anjasmoro RW 06 | HP:176 | FAT:49</option>
						<option value="Puri Anjasmoro RW 08">Puri Anjasmoro RW 08 | HP:160 | FAT:63</option>
						<option value="Rejosari RW 02">Rejosari RW 02 | HP:180 | FAT:52</option>
						<option value="Rejosari RW 12">Rejosari RW 12 | HP:204 | FAT:39</option>
						<option value="Ruko Alamanda">Ruko Alamanda | HP:128 | FAT:65</option>
						<option value="Ruko Miroto RW 03">Ruko Miroto RW 03 | HP:29 | FAT:24</option>
						<option value="Ruko Olt Pedurungan & Graha Mukti RW 25">Ruko Olt Pedurungan & Graha Mukti RW 25 | HP:136 | FAT:66</option>
						<option value="Ruko Pakunden RW 05">Ruko Pakunden RW 05 | HP:19 | FAT:21</option>
						<option value="Ruko Pleburan 1 RW 04">Ruko Pleburan 1 RW 04 | HP:39 | FAT:20</option>
						<option value="Ruko Pleburan 2 RW 04">Ruko Pleburan 2 RW 04 | HP:24 | FAT:15</option>
						<option value="Ruko Semarang Indah">Ruko Semarang Indah | HP:92 | FAT:43</option>
						<option value="Rumpun Diponegoro">Rumpun Diponegoro | HP:227 | FAT:69</option>
						<option value="Salaman Mloyo RW 01">Salaman Mloyo RW 01 | HP:85 | FAT:20</option>
						<option value="Salaman Mloyo RW 03">Salaman Mloyo RW 03 | HP:235 | FAT:99</option>
						<option value="Sampangan RW 01">Sampangan RW 01 | HP:369 | FAT:76</option>
						<option value="Sanggung Barat RT 02 RW 06">Sanggung Barat RT 02 RW 06 | HP:85 | FAT:19</option>
						<option value="Sekayu RW 03 RT 03">Sekayu RW 03 RT 03 | HP:62 | FAT:18</option>
						<option value="Semarang Indah RW 10">Semarang Indah RW 10 | HP:116 | FAT:32</option>
						<option value="Semarang-Jl Jeruk">Semarang-Jl Jeruk | HP:175 | FAT:19</option>
						<option value="Semarang-Jl Muradi">Semarang-Jl Muradi | HP:192 | FAT:75</option>
						<option value="Sinar Waluyo 1 Ex Ruko">Sinar Waluyo 1 Ex Ruko | HP:199 | FAT:63</option>
						<option value="Sinar Waluyo 2 Ex Ruko">Sinar Waluyo 2 Ex Ruko | HP:136 | FAT:69</option>
						<option value="Sinar Waluyo RW 01">Sinar Waluyo RW 01 | HP:370 | FAT:125</option>
						<option value="Slaman Mloyo RW 04">Slaman Mloyo RW 04 | HP:118 | FAT:55</option>
						<option value="Srondol Kulon RW 02">Srondol Kulon RW 02 | HP:164 | FAT:54</option>
						<option value="Sukorejo RW 04">Sukorejo RW 04 | HP:227 | FAT:84</option>
						<option value="Sukorejo RW 05">Sukorejo RW 05 | HP:328 | FAT:87</option>
						<option value="Sukorejo RW 05 RT 08">Sukorejo RW 05 RT 08 | HP:66 | FAT:19</option>
						<option value="Taman Bougenvil">Taman Bougenvil | HP:97 | FAT:63</option>
						<option value="Taman Bukit Asri">Taman Bukit Asri | HP:277 | FAT:79</option>
						<option value="Taman Flamboyan Indah">Taman Flamboyan Indah | HP:92 | FAT:53</option>
						<option value="Taman Ketapang">Taman Ketapang | HP:143 | FAT:62</option>
						<option value="Taman Puri Sartika RW 12">Taman Puri Sartika RW 12 | HP:308 | FAT:87</option>
						<option value="Taman Puri Sartika RW 12 RT 01">Taman Puri Sartika RW 12 RT 01 | HP:74 | FAT:24</option>
						<option value="Taman Sari Majapahit">Taman Sari Majapahit | HP:140 | FAT:65</option>
						<option value="Tanah Mas RW 01">Tanah Mas RW 01 | HP:436 | FAT:210</option>
						<option value="Tanah Mas RW 02">Tanah Mas RW 02 | HP:272 | FAT:127</option>
						<option value="Tanah Mas RW 03">Tanah Mas RW 03 | HP:217 | FAT:119</option>
						<option value="Tanah Mas RW 04">Tanah Mas RW 04 | HP:209 | FAT:95</option>
						<option value="Tanah Mas RW 05">Tanah Mas RW 05 | HP:374 | FAT:142</option>
						<option value="Tanah Mas RW 06">Tanah Mas RW 06 | HP:365 | FAT:135</option>
						<option value="Tanah Mas RW 07">Tanah Mas RW 07 | HP:297 | FAT:121</option>
						<option value="Tanah Mas RW 08">Tanah Mas RW 08 | HP:268 | FAT:123</option>
						<option value="Tanah Mas RW 13">Tanah Mas RW 13 | HP:469 | FAT:206</option>
						<option value="Tanah Mas RW 14">Tanah Mas RW 14 | HP:335 | FAT:155</option>
						<option value="Tegalsari RW 10">Tegalsari RW 10 | HP:121 | FAT:41</option>
						<option value="Telaga Bodas Karang Rejo RW 03">Telaga Bodas Karang Rejo RW 03 | HP:227 | FAT:65</option>
						<option value="Telogo Mulyo Pesona Asri">Telogo Mulyo Pesona Asri | HP:109 | FAT:49</option>
						<option value="Tlogosari RW 11">Tlogosari RW 11 | HP:157 | FAT:24</option>
						<option value="Tumpang RW 05">Tumpang RW 05 | HP:175 | FAT:53</option>
						<option value="Villa Aster 1">Villa Aster 1 | HP:156 | FAT:76</option>
						<option value="Villa Aster 2">Villa Aster 2 | HP:132 | FAT:45</option>
						<option value="Villa Mulawarman">Villa Mulawarman | HP:113 | FAT:31</option>
						<option value="Villa Pinus">Villa Pinus | HP:72 | FAT:30</option>
						<option value="Wonodri RW 02">Wonodri RW 02 | HP:228 | FAT:47</option>
						<option value="Wonodri RW 10">Wonodri RW 10 | HP:133 | FAT:51</option>
						<option value="Wonotingal RW 01">Wonotingal RW 01 | HP:235 | FAT:99</option>
						<option value="Wonotingal RW 02">Wonotingal RW 02 | HP:62 | FAT:42</option>
                  </select>
               </div>
               <!-- tutup Semarang -->

               <!-- Surabaya -->
               <div id="Surabaya" class="form-group" style="display: none;">
                  <select class="form-control js-example-basic-single" name="nama_cluster" oninvalid="this.setCustomValidity('Pilih Cluster')" oninput="setCustomValidity('')">
                     <option value="" selected disabled hidden>Pilih Nama Cluster</option>
						<option value="Babatan Indah RW 04">Babatan Indah RW 04 | HP:388 | FAT:220</option>
						<option value="Babatan Mukti RW 07">Babatan Mukti RW 07 | HP:544 | FAT:349</option>
						<option value="Babatan Pratama RW 08">Babatan Pratama RW 08 | HP:959 | FAT:660</option>
						<option value="Barata Jaya RW 04">Barata Jaya RW 04 | HP:322 | FAT:173</option>
						<option value="Bengawan RW 03">Bengawan RW 03 | HP:177 | FAT:116</option>
						<option value="Bengawan RW 04">Bengawan RW 04 | HP:120 | FAT:51</option>
						<option value="Bengawan RW 4">Bengawan RW 4 | HP:2 | FAT:7</option>
						<option value="Bhaskara Sari RW 02">Bhaskara Sari RW 02 | HP:125 | FAT:87</option>
						<option value="Bintang Diponggo">Bintang Diponggo | HP:170 | FAT:123</option>
						<option value="Blimbing RW 04">Blimbing RW 04 | HP:178 | FAT:124</option>
						<option value="Bluru Permai RW 10">Bluru Permai RW 10 | HP:460 | FAT:243</option>
						<option value="Bougenville RW 08">Bougenville RW 08 | HP:155 | FAT:122</option>
						<option value="Bratang Gede RW 06">Bratang Gede RW 06 | HP:392 | FAT:192</option>
						<option value="Bratang Gede RW 07">Bratang Gede RW 07 | HP:337 | FAT:141</option>
						<option value="Bratang Gede RW 12">Bratang Gede RW 12 | HP:556 | FAT:202</option>
						<option value="Bukit Kismadani Regency">Bukit Kismadani Regency | HP:474 | FAT:372</option>
						<option value="Bumi Citra Fajar RW 07">Bumi Citra Fajar RW 07 | HP:232 | FAT:153</option>
						<option value="Bumi Suko Indah RW 11">Bumi Suko Indah RW 11 | HP:528 | FAT:389</option>
						<option value="Bumi Suko Indah RW 11 RT 30,31,42,51,54">Bumi Suko Indah RW 11 RT 30,31,42,51,54 | HP:203 | FAT:140</option>
						<option value="Bumi Suko Indah RW 11 RT 43,44">Bumi Suko Indah RW 11 RT 43,44 | HP:218 | FAT:121</option>
						<option value="Citra Taman Niaga RW 17">Citra Taman Niaga RW 17 | HP:170 | FAT:122</option>
						<option value="Citra Taman Pitaloka">Citra Taman Pitaloka | HP:185 | FAT:155</option>
						<option value="Citra Taman Puspa">Citra Taman Puspa | HP:141 | FAT:113</option>
						<option value="Citra Taman Sari">Citra Taman Sari | HP:117 | FAT:73</option>
						<option value="Darmo Permai Selatan RW 05">Darmo Permai Selatan RW 05 | HP:376 | FAT:270</option>
						<option value="Darmo Permai Selatan RW 6">Darmo Permai Selatan RW 6 | HP:269 | FAT:216</option>
						<option value="Darmo Permai Timur RW 01 FDT 1">Darmo Permai Timur RW 01 FDT 1 | HP:270 | FAT:184</option>
						<option value="Darmo Permai Timur RW 01 FDT 2">Darmo Permai Timur RW 01 FDT 2 | HP:282 | FAT:181</option>
						<option value="Darmo Permai Utara">Darmo Permai Utara | HP:490 | FAT:327</option>
						<option value="Darmo Santosa Raya RW 05">Darmo Santosa Raya RW 05 | HP:357 | FAT:243</option>
						<option value="Darmo Satelit RW 03">Darmo Satelit RW 03 | HP:592 | FAT:500</option>
						<option value="Dharma Husada">Dharma Husada | HP:187 | FAT:125</option>
						<option value="Dharma Husada Utara RW 02">Dharma Husada Utara RW 02 | HP:293 | FAT:204</option>
						<option value="Dukuh Kupang RW 01">Dukuh Kupang RW 01 | HP:476 | FAT:158</option>
						<option value="Dukuh Kupang RW 02">Dukuh Kupang RW 02 | HP:270 | FAT:175</option>
						<option value="Dukuh Kupang RW 03">Dukuh Kupang RW 03 | HP:371 | FAT:246</option>
						<option value="Dukuh Kupang RW 08">Dukuh Kupang RW 08 | HP:486 | FAT:322</option>
						<option value="Dukuh Kupang Timur RW 08">Dukuh Kupang Timur RW 08 | HP:692 | FAT:348</option>
						<option value="Elveka Regency RW 03">Elveka Regency RW 03 | HP:219 | FAT:108</option>
						<option value="Gading Fajar RW 05">Gading Fajar RW 05 | HP:542 | FAT:523</option>
						<option value="Gading Kirana RT 34">Gading Kirana RT 34 | HP:315 | FAT:233</option>
						<option value="Gading Pantai RW 02">Gading Pantai RW 02 | HP:234 | FAT:177</option>
						<option value="Gayung Kebonsari RW 5 RT 4 And 5">Gayung Kebonsari RW 5 RT 4 And 5 | HP:80 | FAT:69</option>
						<option value="Gayungsari RW 04">Gayungsari RW 04 | HP:227 | FAT:164</option>
						<option value="Gayungsari RW 04 (RT 4,8,11,12)">Gayungsari RW 04 (RT 4,8,11,12) | HP:141 | FAT:116</option>
						<option value="Graha Anggrek Mas Regency ( Ae )">Graha Anggrek Mas Regency ( Ae ) | HP:218 | FAT:154</option>
						<option value="Graha Anggrek Mas Regency ( Ug )">Graha Anggrek Mas Regency ( Ug ) | HP:25 | FAT:24</option>
						<option value="Graha Asri Sukodono RW 08 & 09">Graha Asri Sukodono RW 08 & 09 | HP:289 | FAT:198</option>
						<option value="Graha Asri Sukodono RW 10,11,12">Graha Asri Sukodono RW 10,11,12 | HP:564 | FAT:426</option>
						<option value="Graha Candi Mas">Graha Candi Mas | HP:516 | FAT:382</option>
						<option value="Graha Family">Graha Family | HP:2207 | FAT:1556</option>
						<option value="Graha Family Block R,Rr,Va, And Vb">Graha Family Block R,Rr,Va, And Vb | HP:391 | FAT:215</option>
						<option value="Graha Family Blok O">Graha Family Blok O | HP:291 | FAT:243</option>
						<option value="Graha Family Cluster Platinum">Graha Family Cluster Platinum | HP:29 | FAT:34</option>
						<option value="Graha Family Condominium">Graha Family Condominium | HP:262 | FAT:319</option>
						<option value="Graha Juanda RW 05">Graha Juanda RW 05 | HP:251 | FAT:206</option>
						<option value="Graha Kota (FDT1)">Graha Kota (FDT1) | HP:545 | FAT:287</option>
						<option value="Graha Kota (FDT2)">Graha Kota (FDT2) | HP:497 | FAT:311</option>
						<option value="Graha Kuncara RW 04">Graha Kuncara RW 04 | HP:213 | FAT:87</option>
						<option value="Graha Natura">Graha Natura | HP:209 | FAT:129</option>
						<option value="Grand City Regency">Grand City Regency | HP:52 | FAT:32</option>
						<option value="Grand Masangan">Grand Masangan | HP:182 | FAT:94</option>
						<option value="Green Lake Semanggi">Green Lake Semanggi | HP:311 | FAT:144</option>
						<option value="Green Semanggi Mangrove RT 05">Green Semanggi Mangrove RT 05 | HP:631 | FAT:417</option>
						<option value="Green Semanggi Residence RT 05">Green Semanggi Residence RT 05 | HP:292 | FAT:186</option>
						<option value="Griya Bhayangkara RW 08">Griya Bhayangkara RW 08 | HP:28 | FAT:5</option>
						<option value="Griya Bhayangkara RW 09">Griya Bhayangkara RW 09 | HP:1675 | FAT:965</option>
						<option value="Griya Candramas RW 11">Griya Candramas RW 11 | HP:298 | FAT:168</option>
						<option value="Griya Candramas RW 19">Griya Candramas RW 19 | HP:376 | FAT:192</option>
						<option value="Griya Kartika RW 05">Griya Kartika RW 05 | HP:641 | FAT:299</option>
						<option value="Griya Karya Magersari Permai RW 07">Griya Karya Magersari Permai RW 07 | HP:1246 | FAT:781</option>
						<option value="Griya Kebon Agung RW 08">Griya Kebon Agung RW 08 | HP:562 | FAT:304</option>
						<option value="Griya Kebraon Barat RW 03">Griya Kebraon Barat RW 03 | HP:498 | FAT:284</option>
						<option value="Griya Kebraon Barat RW. 03 (Not Up Date)">Griya Kebraon Barat RW. 03 (Not Up Date) | HP:48 | FAT:233</option>
						<option value="Griya Permata Gedangan RW 07">Griya Permata Gedangan RW 07 | HP:539 | FAT:266</option>
						<option value="Griya Permata Gedangan RW 08">Griya Permata Gedangan RW 08 | HP:524 | FAT:272</option>
						<option value="Griya Permata Hijau Blok I Dan Blok F (RT 07 RW 04) (Ext)">Griya Permata Hijau Blok I Dan Blok F (RT 07 RW 04) (Ext) | HP:10 | FAT:4</option>
						<option value="Griya Permata Hijau RW 03">Griya Permata Hijau RW 03 | HP:510 | FAT:295</option>
						<option value="Griya Permata Hijau RW 04">Griya Permata Hijau RW 04 | HP:297 | FAT:156</option>
						<option value="Griya Pesona Asri Ykp RW 10">Griya Pesona Asri Ykp RW 10 | HP:559 | FAT:334</option>
						<option value="Griya Taman Sari I & Iii ; Oasis Village RW 05 ; Oasis Residence RW 04">Griya Taman Sari I & Iii ; Oasis Village RW 05 ; Oasis Residence RW 04 | HP:514 | FAT:271</option>
						<option value="Griyo Mapan Sentosa RW 04">Griyo Mapan Sentosa RW 04 | HP:422 | FAT:248</option>
						<option value="Griyo Mapan Sentosa RW 05">Griyo Mapan Sentosa RW 05 | HP:433 | FAT:241</option>
						<option value="Griyo Mapan Sentosa RW 05 Kel. Tambak Sawah">Griyo Mapan Sentosa RW 05 Kel. Tambak Sawah | HP:277 | FAT:135</option>
						<option value="Griyo Mapan Sentosa RW 06">Griyo Mapan Sentosa RW 06 | HP:239 | FAT:111</option>
						<option value="Griyo Mapan Sentosa RW 07">Griyo Mapan Sentosa RW 07 | HP:357 | FAT:176</option>
						<option value="Griyo Taman Asri RW 06">Griyo Taman Asri RW 06 | HP:359 | FAT:216</option>
						<option value="Griyo Taman Asri RW 09">Griyo Taman Asri RW 09 | HP:204 | FAT:84</option>
						<option value="Gubeng Kertajaya RW 01">Gubeng Kertajaya RW 01 | HP:448 | FAT:158</option>
						<option value="Gubeng Kertajaya RW 03">Gubeng Kertajaya RW 03 | HP:513 | FAT:264</option>
						<option value="Gunung Anyar Emas RW 08">Gunung Anyar Emas RW 08 | HP:685 | FAT:548</option>
						<option value="Gunung Anyar Harapan RW 05">Gunung Anyar Harapan RW 05 | HP:241 | FAT:149</option>
						<option value="Gunung Anyar Permai RW 04 RT 15">Gunung Anyar Permai RW 04 RT 15 | HP:91 | FAT:77</option>
						<option value="Gunung Sari Indah RW 06">Gunung Sari Indah RW 06 | HP:497 | FAT:317</option>
						<option value="Gunung Sari Indah RW 07">Gunung Sari Indah RW 07 | HP:248 | FAT:181</option>
						<option value="Gunung Sari Indah RW 08">Gunung Sari Indah RW 08 | HP:676 | FAT:346</option>
						<option value="Gunung Sari Indah RW 09">Gunung Sari Indah RW 09 | HP:134 | FAT:85</option>
						<option value="Hunian Villa Bukit Permai">Hunian Villa Bukit Permai | HP:72 | FAT:50</option>
						<option value="Istana Mentari RW 05">Istana Mentari RW 05 | HP:634 | FAT:465</option>
						<option value="Jajar Tunggal RW 06">Jajar Tunggal RW 06 | HP:344 | FAT:199</option>
						<option value="Jambangan Indah Regency 21 RW 02">Jambangan Indah Regency 21 RW 02 | HP:273 | FAT:116</option>
						<option value="Jambangan Indah RW 01">Jambangan Indah RW 01 | HP:159 | FAT:74</option>
						<option value="Jambangan RW 03">Jambangan RW 03 | HP:155 | FAT:199</option>
						<option value="Jambu RW 04 And RW 05">Jambu RW 04 And RW 05 | HP:400 | FAT:271</option>
						<option value="Jemursari RW 10">Jemursari RW 10 | HP:308 | FAT:245</option>
						<option value="Jemursari Selatan RW 08">Jemursari Selatan RW 08 | HP:246 | FAT:173</option>
						<option value="Kahuripan Nirwana RW 07 (FDT 1)">Kahuripan Nirwana RW 07 (FDT 1) | HP:306 | FAT:198</option>
						<option value="Kahuripan Nirwana RW 07 (FDT 2)">Kahuripan Nirwana RW 07 (FDT 2) | HP:187 | FAT:125</option>
						<option value="Kahuripan Nirwana RW 08 (FDT 1)">Kahuripan Nirwana RW 08 (FDT 1) | HP:397 | FAT:283</option>
						<option value="Kahuripan Nirwana RW 10">Kahuripan Nirwana RW 10 | HP:378 | FAT:310</option>
						<option value="Kalijudan Barat RW 05">Kalijudan Barat RW 05 | HP:558 | FAT:265</option>
						<option value="Karang Asem RW 08 (FDT 1)">Karang Asem RW 08 (FDT 1) | HP:453 | FAT:288</option>
						<option value="Karang Asem RW 08 (FDT 2)">Karang Asem RW 08 (FDT 2) | HP:209 | FAT:146</option>
						<option value="Karang Empat RW 07 (FDT 1)">Karang Empat RW 07 (FDT 1) | HP:461 | FAT:345</option>
						<option value="Karang Empat RW 07 (FDT 2)">Karang Empat RW 07 (FDT 2) | HP:427 | FAT:287</option>
						<option value="Kebonsari Regency RW 03">Kebonsari Regency RW 03 | HP:102 | FAT:39</option>
						<option value="Kebraon Indah Permai RW 09">Kebraon Indah Permai RW 09 | HP:663 | FAT:360</option>
						<option value="Kebraon Indah Permai RW 13">Kebraon Indah Permai RW 13 | HP:407 | FAT:143</option>
						<option value="Kebraon RW 04">Kebraon RW 04 | HP:508 | FAT:316</option>
						<option value="Kebraon RW 10">Kebraon RW 10 | HP:350 | FAT:179</option>
						<option value="Kebraon RW 11">Kebraon RW 11 | HP:261 | FAT:182</option>
						<option value="Kebraon RW 12">Kebraon RW 12 | HP:518 | FAT:216</option>
						<option value="Kedung Turi Permai RW 11">Kedung Turi Permai RW 11 | HP:250 | FAT:137</option>
						<option value="Kedung Turi Permai RW 12">Kedung Turi Permai RW 12 | HP:226 | FAT:102</option>
						<option value="Kencana Sari Timur">Kencana Sari Timur | HP:326 | FAT:240</option>
						<option value="Kendangsari Abc RT 06 RW 02">Kendangsari Abc RT 06 RW 02 | HP:60 | FAT:43</option>
						<option value="Keputih Tegal Timur RW 02">Keputih Tegal Timur RW 02 | HP:304 | FAT:122</option>
						<option value="Kerto Menanggal RW 09">Kerto Menanggal RW 09 | HP:141 | FAT:101</option>
						<option value="Ketintang Madya RW 08">Ketintang Madya RW 08 | HP:161 | FAT:120</option>
						<option value="Ketintang Permai RW 11">Ketintang Permai RW 11 | HP:238 | FAT:162</option>
						<option value="Ketintang Wiyata RW 04">Ketintang Wiyata RW 04 | HP:291 | FAT:191</option>
						<option value="Klampis Aji RW 09">Klampis Aji RW 09 | HP:219 | FAT:143</option>
						<option value="Klampis Harapan RW 08">Klampis Harapan RW 08 | HP:119 | FAT:87</option>
						<option value="Komplek Mangga RW 06">Komplek Mangga RW 06 | HP:442 | FAT:309</option>
						<option value="Komplek Merpati Kehutanan RW 11">Komplek Merpati Kehutanan RW 11 | HP:199 | FAT:129</option>
						<option value="Komplek Perum Merpati Kehutanan RW 12">Komplek Perum Merpati Kehutanan RW 12 | HP:170 | FAT:97</option>
						<option value="Kupang Baru Raya RW 05">Kupang Baru Raya RW 05 | HP:443 | FAT:334</option>
						<option value="Kutisari Indah Barat RW 04">Kutisari Indah Barat RW 04 | HP:352 | FAT:237</option>
						<option value="Kutisari Indah Barat RW 04 (Ext)">Kutisari Indah Barat RW 04 (Ext) | HP:246 | FAT:182</option>
						<option value="Kutisari Selatan RW 01">Kutisari Selatan RW 01 | HP:229 | FAT:141</option>
						<option value="Kutisari Selatan RW 3">Kutisari Selatan RW 3 | HP:523 | FAT:302</option>
						<option value="Larangan Megah Asri RW 08">Larangan Megah Asri RW 08 | HP:501 | FAT:244</option>
						<option value="Lebak Arum RW 09">Lebak Arum RW 09 | HP:722 | FAT:531</option>
						<option value="Lebak Indah Regency RW 07">Lebak Indah Regency RW 07 | HP:333 | FAT:260</option>
						<option value="Lebak Indah RW 11">Lebak Indah RW 11 | HP:540 | FAT:329</option>
						<option value="Lotus Regency">Lotus Regency | HP:30 | FAT:27</option>
						<option value="Manyar Indah RW 06">Manyar Indah RW 06 | HP:304 | FAT:223</option>
						<option value="Manyar Jaya RW 08 (FDT 1)">Manyar Jaya RW 08 (FDT 1) | HP:562 | FAT:415</option>
						<option value="Manyar Jaya RW 08 (FDT 2)">Manyar Jaya RW 08 (FDT 2) | HP:99 | FAT:82</option>
						<option value="Medayu Selatan RW 04">Medayu Selatan RW 04 | HP:422 | FAT:323</option>
						<option value="Medayu Utara RW 14">Medayu Utara RW 14 | HP:1155 | FAT:432</option>
						<option value="Medokan Asri Barat RW 05">Medokan Asri Barat RW 05 | HP:441 | FAT:299</option>
						<option value="Medokan Asri Tengah RW 07">Medokan Asri Tengah RW 07 | HP:210 | FAT:162</option>
						<option value="Mojo Arum RW 01">Mojo Arum RW 01 | HP:315 | FAT:210</option>
						<option value="Musi RW 14">Musi RW 14 | HP:388 | FAT:260</option>
						<option value="Mutiara Citra Asri RW 10 & RW 11">Mutiara Citra Asri RW 10 & RW 11 | HP:160 | FAT:120</option>
						<option value="Mutiara Citra Asri RW 12 And RW 13">Mutiara Citra Asri RW 12 And RW 13 | HP:319 | FAT:208</option>
						<option value="Mutiara Citra Asri RW 14">Mutiara Citra Asri RW 14 | HP:302 | FAT:216</option>
						<option value="Mutiara Prima Raya RW 06">Mutiara Prima Raya RW 06 | HP:103 | FAT:74</option>
						<option value="Ngagel Jaya Tengah RW 03">Ngagel Jaya Tengah RW 03 | HP:556 | FAT:398</option>
						<option value="Ngagel Madya RW 01">Ngagel Madya RW 01 | HP:579 | FAT:365</option>
						<option value="Ngagel Mulyo RW 04">Ngagel Mulyo RW 04 | HP:745 | FAT:356</option>
						<option value="Ngagel Rejo RW 01">Ngagel Rejo RW 01 | HP:159 | FAT:82</option>
						<option value="Ngagel Rejo RW 11">Ngagel Rejo RW 11 | HP:364 | FAT:172</option>
						<option value="Ngagel Tirto RW 03">Ngagel Tirto RW 03 | HP:421 | FAT:171</option>
						<option value="Ngagel Wasana RW 02">Ngagel Wasana RW 02 | HP:542 | FAT:416</option>
						<option value="Nizar Mansion">Nizar Mansion | HP:88 | FAT:43</option>
						<option value="Oasis 3, Gate Garden Juanda 1, Gate Garden 2">Oasis 3, Gate Garden Juanda 1, Gate Garden 2 | HP:139 | FAT:90</option>
						<option value="Oma Pesona Buduran RT 37">Oma Pesona Buduran RT 37 | HP:375 | FAT:231</option>
						<option value="Oma Pesona Buduran RT 38">Oma Pesona Buduran RT 38 | HP:283 | FAT:209</option>
						<option value="Opak RW 01">Opak RW 01 | HP:197 | FAT:158</option>
						<option value="Pandugo 2 RW 09">Pandugo 2 RW 09 | HP:332 | FAT:251</option>
						<option value="Pandugo Praja RW 06">Pandugo Praja RW 06 | HP:320 | FAT:229</option>
						<option value="Pepelegi Indah RW 07">Pepelegi Indah RW 07 | HP:249 | FAT:173</option>
						<option value="Permata Alam Permai RW 05">Permata Alam Permai RW 05 | HP:705 | FAT:452</option>
						<option value="Permata Buduran RW 02">Permata Buduran RW 02 | HP:140 | FAT:124</option>
						<option value="Permata Megah Asri RW 08">Permata Megah Asri RW 08 | HP:223 | FAT:88</option>
						<option value="Permata Sukodono Raya">Permata Sukodono Raya | HP:408 | FAT:301</option>
						<option value="Perum Barata Jaya RW 06">Perum Barata Jaya RW 06 | HP:397 | FAT:254</option>
						<option value="Perum Kendangsari RW 01">Perum Kendangsari RW 01 | HP:271 | FAT:192</option>
						<option value="Perum Palesdri (Jl Lesti)">Perum Palesdri (Jl Lesti) | HP:175 | FAT:119</option>
						<option value="Pesona Alam Gunung Anyar RW 08">Pesona Alam Gunung Anyar RW 08 | HP:98 | FAT:75</option>
						<option value="Pesona Permata Gading 1 RW 15">Pesona Permata Gading 1 RW 15 | HP:246 | FAT:156</option>
						<option value="Pesona Permata Gading 2 RW 16">Pesona Permata Gading 2 RW 16 | HP:513 | FAT:286</option>
						<option value="Pondok Jati">Pondok Jati | HP:372 | FAT:234</option>
						<option value="Pondok Jegu RW 02">Pondok Jegu RW 02 | HP:189 | FAT:106</option>
						<option value="Pondok Maritim RW 07">Pondok Maritim RW 07 | HP:182 | FAT:86</option>
						<option value="Pondok Maritim RW 08">Pondok Maritim RW 08 | HP:342 | FAT:181</option>
						<option value="Pondok Mutiara (FDT 1)">Pondok Mutiara (FDT 1) | HP:376 | FAT:289</option>
						<option value="Pondok Mutiara (FDT 2)">Pondok Mutiara (FDT 2) | HP:454 | FAT:333</option>
						<option value="Pondok Mutiara (FDT 3)">Pondok Mutiara (FDT 3) | HP:346 | FAT:191</option>
						<option value="Pondok Nirwana RW 07">Pondok Nirwana RW 07 | HP:241 | FAT:192</option>
						<option value="Pondok Sedati Asri RW 09">Pondok Sedati Asri RW 09 | HP:233 | FAT:160</option>
						<option value="Pondok Sidokare Asri RW 13">Pondok Sidokare Asri RW 13 | HP:452 | FAT:275</option>
						<option value="Pondok Sidokare Asri RW.15 & RW.16">Pondok Sidokare Asri RW.15 & RW.16 | HP:521 | FAT:304</option>
						<option value="Pondok Sidokare Indah RW 11">Pondok Sidokare Indah RW 11 | HP:290 | FAT:137</option>
						<option value="Prima Garden Estate RW 11">Prima Garden Estate RW 11 | HP:358 | FAT:210</option>
						<option value="Pucang Anom RW 08">Pucang Anom RW 08 | HP:362 | FAT:229</option>
						<option value="Pucang Permai RW 02 & Perum Dolog RW 02">Pucang Permai RW 02 & Perum Dolog RW 02 | HP:203 | FAT:128</option>
						<option value="Puri Gunung Anyar Regency RW 07">Puri Gunung Anyar Regency RW 07 | HP:309 | FAT:190</option>
						<option value="Puri Lidah Kulon Indah RW 07">Puri Lidah Kulon Indah RW 07 | HP:396 | FAT:261</option>
						<option value="Puri Maharani RW 05">Puri Maharani RW 05 | HP:274 | FAT:195</option>
						<option value="Puri Sejahtera RW 03">Puri Sejahtera RW 03 | HP:192 | FAT:91</option>
						<option value="Puri Taman Asri RW 08">Puri Taman Asri RW 08 | HP:193 | FAT:156</option>
						<option value="Putat Indah RW 03">Putat Indah RW 03 | HP:134 | FAT:100</option>
						<option value="Rewwin RW 06">Rewwin RW 06 | HP:971 | FAT:577</option>
						<option value="Ruko Darmo Galeria">Ruko Darmo Galeria | HP:76 | FAT:58</option>
						<option value="Ruko Darmo Permai Selatan RW 6">Ruko Darmo Permai Selatan RW 6 | HP:36 | FAT:23</option>
						<option value="Ruko Gate Wage">Ruko Gate Wage | HP:144 | FAT:112</option>
						<option value="Ruko Grand City Regency">Ruko Grand City Regency | HP:45 | FAT:33</option>
						<option value="Ruko Jemursari Raya">Ruko Jemursari Raya | HP:100 | FAT:73</option>
						<option value="Ruko Klampis">Ruko Klampis | HP:58 | FAT:51</option>
						<option value="Ruko Klampis 21">Ruko Klampis 21 | HP:167 | FAT:126</option>
						<option value="Ruko Klampis 88">Ruko Klampis 88 | HP:89 | FAT:64</option>
						<option value="Ruko Lotus Regency">Ruko Lotus Regency | HP:37 | FAT:28</option>
						<option value="Rungkut Asri RW 09">Rungkut Asri RW 09 | HP:240 | FAT:194</option>
						<option value="Rungkut Asri Timur RW 09">Rungkut Asri Timur RW 09 | HP:289 | FAT:241</option>
						<option value="Rungkut Harapan RW 02">Rungkut Harapan RW 02 | HP:502 | FAT:436</option>
						<option value="Rungkut Mapan Timur RW 09">Rungkut Mapan Timur RW 09 | HP:228 | FAT:225</option>
						<option value="Sekardangan Indah RW 05">Sekardangan Indah RW 05 | HP:205 | FAT:173</option>
						<option value="Sekardangan Indah RW 06">Sekardangan Indah RW 06 | HP:321 | FAT:237</option>
						<option value="Semampir Tengah RW 01">Semampir Tengah RW 01 | HP:193 | FAT:81</option>
						<option value="Sepanjang Town House RW 02">Sepanjang Town House RW 02 | HP:104 | FAT:89</option>
						<option value="Sepanjang Town House RW 07">Sepanjang Town House RW 07 | HP:60 | FAT:86</option>
						<option value="Sidodadi Indah RW 06">Sidodadi Indah RW 06 | HP:178 | FAT:141</option>
						<option value="Sidokare Indah RW 09 & RW 14">Sidokare Indah RW 09 & RW 14 | HP:451 | FAT:222</option>
						<option value="Simpang Darmo Permai Selatan RW 08">Simpang Darmo Permai Selatan RW 08 | HP:457 | FAT:311</option>
						<option value="Simpang Darmo Permai Selatan RW 10">Simpang Darmo Permai Selatan RW 10 | HP:398 | FAT:268</option>
						<option value="Siwalankerto RW 01">Siwalankerto RW 01 | HP:259 | FAT:71</option>
						<option value="Sukolilo Dian Regency RT 04 RW 02">Sukolilo Dian Regency RT 04 RW 02 | HP:719 | FAT:566</option>
						<option value="Sukolilo Park Regency RW 02">Sukolilo Park Regency RW 02 | HP:392 | FAT:226</option>
						<option value="Sukomanunggal Jaya RW 3">Sukomanunggal Jaya RW 3 | HP:324 | FAT:253</option>
						<option value="Surya Asri RW 11">Surya Asri RW 11 | HP:209 | FAT:110</option>
						<option value="Surya Asri RW 12">Surya Asri RW 12 | HP:370 | FAT:206</option>
						<option value="Surya Regency RW 03">Surya Regency RW 03 | HP:75 | FAT:72</option>
						<option value="Surya Regency RW 08">Surya Regency RW 08 | HP:159 | FAT:117</option>
						<option value="Swan Regency RW 09">Swan Regency RW 09 | HP:370 | FAT:193</option>
						<option value="Taman Aloha RW 09 (FDT 1)">Taman Aloha RW 09 (FDT 1) | HP:500 | FAT:385</option>
						<option value="Taman Aloha RW 09 (FDT 2)">Taman Aloha RW 09 (FDT 2) | HP:279 | FAT:186</option>
						<option value="Taman Permata Indah RW 03">Taman Permata Indah RW 03 | HP:215 | FAT:220</option>
						<option value="Taman Pinang RW 05">Taman Pinang RW 05 | HP:274 | FAT:154</option>
						<option value="Taman Pinang RW 06">Taman Pinang RW 06 | HP:267 | FAT:196</option>
						<option value="Taman Pinang RW 07">Taman Pinang RW 07 | HP:139 | FAT:93</option>
						<option value="Taman Pondok Jati">Taman Pondok Jati | HP:481 | FAT:307</option>
						<option value="Taman Prada Indah RT 3 RW 04">Taman Prada Indah RT 3 RW 04 | HP:74 | FAT:25</option>
						<option value="Taman Suko Asri RW 08">Taman Suko Asri RW 08 | HP:411 | FAT:250</option>
						<option value="Taman Surya Agung RW 06">Taman Surya Agung RW 06 | HP:304 | FAT:173</option>
						<option value="Tenggilis Mejoyo Selatan RW 02">Tenggilis Mejoyo Selatan RW 02 | HP:261 | FAT:220</option>
						<option value="Tenggilis Timur RW 01">Tenggilis Timur RW 01 | HP:233 | FAT:169</option>
						<option value="Tenggilis Utara RW 04">Tenggilis Utara RW 04 | HP:199 | FAT:117</option>
						<option value="The Amerta Residence RW 03">The Amerta Residence RW 03 | HP:84 | FAT:23</option>
						<option value="Tropodo Dian Regency RW 07">Tropodo Dian Regency RW 07 | HP:135 | FAT:106</option>
						<option value="Tumapel RW 06">Tumapel RW 06 | HP:375 | FAT:268</option>
						<option value="Villa Jasmine RW 03">Villa Jasmine RW 03 | HP:557 | FAT:383</option>
						<option value="Villa Kalijudan Indah RW 07">Villa Kalijudan Indah RW 07 | HP:550 | FAT:393</option>
						<option value="Wiguna Timur Regency RW 09">Wiguna Timur Regency RW 09 | HP:197 | FAT:154</option>
						<option value="Wisata Bukit Mas 2">Wisata Bukit Mas 2 | HP:260 | FAT:199</option>
						<option value="Wisma Indah RW 03">Wisma Indah RW 03 | HP:224 | FAT:109</option>
						<option value="Wisma Kedung Asem 2 RW 09">Wisma Kedung Asem 2 RW 09 | HP:176 | FAT:126</option>
						<option value="Wisma Kencana Indah">Wisma Kencana Indah | HP:112 | FAT:53</option>
						<option value="Wisma Lidah Kulon Kel Lidah Wetan FDT 1">Wisma Lidah Kulon Kel Lidah Wetan FDT 1 | HP:270 | FAT:164</option>
						<option value="Wisma Lidah Kulon Kel Lidah Wetan FDT 2">Wisma Lidah Kulon Kel Lidah Wetan FDT 2 | HP:381 | FAT:237</option>
						<option value="Wisma Lidah Kulon RW 04 Kel. Bangkingan">Wisma Lidah Kulon RW 04 Kel. Bangkingan | HP:638 | FAT:400</option>
						<option value="Wisma Pagesangan RW 01">Wisma Pagesangan RW 01 | HP:278 | FAT:201</option>
						<option value="Wisma Penjaringan Sari 2 RW 11">Wisma Penjaringan Sari 2 RW 11 | HP:149 | FAT:129</option>
						<option value="Wisma Penjaringan Sari RW 04 (FDT 1)">Wisma Penjaringan Sari RW 04 (FDT 1) | HP:263 | FAT:142</option>
						<option value="Wisma Penjaringan Sari RW 04 (FDT 2)">Wisma Penjaringan Sari RW 04 (FDT 2) | HP:479 | FAT:300</option>
						<option value="Wisma Permai RW 05">Wisma Permai RW 05 | HP:348 | FAT:264</option>
						<option value="Wisma Permai RW 08">Wisma Permai RW 08 | HP:350 | FAT:249</option>
						<option value="Wisma Sarinadi RW 05">Wisma Sarinadi RW 05 | HP:150 | FAT:83</option>
						<option value="Wisma Tropodo RW 03">Wisma Tropodo RW 03 | HP:742 | FAT:546</option>
						<option value="Wisma Tropodo RW 06">Wisma Tropodo RW 06 | HP:480 | FAT:275</option>
						<option value="Wisma Tropodo RW 09">Wisma Tropodo RW 09 | HP:557 | FAT:331</option>
						<option value="Wonosari Kidul RW 03">Wonosari Kidul RW 03 | HP:207 | FAT:70</option>
						<option value="Wonosari Kidul RW 04">Wonosari Kidul RW 04 | HP:78 | FAT:45</option>
                  </select>
               </div>
               <!-- tutup Surabaya -->

               <!-- Tangerang -->
               <div id="Tangerang" class="form-group" style="display: none;">
                  <select class="form-control js-example-basic-single" name="nama_cluster" oninvalid="this.setCustomValidity('Pilih Cluster')" oninput="setCustomValidity('')">
                     <option value="" selected disabled hidden>Pilih Nama Cluster</option>
						<option value="A Dream Residence">A Dream Residence | HP:25 | FAT:12</option>
						<option value="Anggrek Loka Ii-1">Anggrek Loka Ii-1 | HP:320 | FAT:173</option>
						<option value="Anggrek Loka Ii-2">Anggrek Loka Ii-2 | HP:280 | FAT:186</option>
						<option value="Anggrek Loka Ii-3">Anggrek Loka Ii-3 | HP:314 | FAT:228</option>
						<option value="Anthea">Anthea | HP:103 | FAT:58</option>
						<option value="Arinda Permai 1">Arinda Permai 1 | HP:167 | FAT:124</option>
						<option value="Arinda Permai 2">Arinda Permai 2 | HP:473 | FAT:377</option>
						<option value="Bangun Reksa Indah Ii">Bangun Reksa Indah Ii | HP:570 | FAT:367</option>
						<option value="Banjar Wijaya - Blok A20 RW 11">Banjar Wijaya - Blok A20 RW 11 | HP:292 | FAT:132</option>
						<option value="Banjar Wijaya - Cluster Asia">Banjar Wijaya - Cluster Asia | HP:399 | FAT:143</option>
						<option value="Banjar Wijaya - Cluster Cattleya">Banjar Wijaya - Cluster Cattleya | HP:208 | FAT:78</option>
						<option value="Banjar Wijaya - Cluster Cemara 1">Banjar Wijaya - Cluster Cemara 1 | HP:242 | FAT:82</option>
						<option value="Banjar Wijaya - Cluster Cemara 2">Banjar Wijaya - Cluster Cemara 2 | HP:197 | FAT:91</option>
						<option value="Banjar Wijaya - Cluster Lantana">Banjar Wijaya - Cluster Lantana | HP:171 | FAT:68</option>
						<option value="Banjar Wijaya - Cluster Nusa Indah">Banjar Wijaya - Cluster Nusa Indah | HP:17 | FAT:9</option>
						<option value="Banjar Wijaya - Cluster Victoria">Banjar Wijaya - Cluster Victoria | HP:71 | FAT:37</option>
						<option value="Banjar Wijaya - Cluster Viola">Banjar Wijaya - Cluster Viola | HP:127 | FAT:44</option>
						<option value="Bintaro Mansion (Fe Ext)">Bintaro Mansion (Fe Ext) | HP:3 | FAT:5</option>
						<option value="Bukit Kenanga Residence (Ext)">Bukit Kenanga Residence (Ext) | HP:24 | FAT:1</option>
						<option value="Bukit Mutiara Indah">Bukit Mutiara Indah | HP:6 | FAT:5</option>
						<option value="Bukit Nusa Indah RW 13">Bukit Nusa Indah RW 13 | HP:433 | FAT:230</option>
						<option value="Bukit Nusa Indah RW 15">Bukit Nusa Indah RW 15 | HP:566 | FAT:487</option>
						<option value="Bukit Nusa Indah RW 16">Bukit Nusa Indah RW 16 | HP:455 | FAT:306</option>
						<option value="Bukit Pamulang Indah RW 04">Bukit Pamulang Indah RW 04 | HP:505 | FAT:370</option>
						<option value="Bukit Pamulang Indah RW 13">Bukit Pamulang Indah RW 13 | HP:281 | FAT:199</option>
						<option value="Bunga Pratama Pamulang">Bunga Pratama Pamulang | HP:1 | FAT:8</option>
						<option value="Castilla">Castilla | HP:266 | FAT:26</option>
						<option value="Cluster Ags">Cluster Ags | HP:13 | FAT:6</option>
						<option value="Cluster Sudimara Selatan (Ext)">Cluster Sudimara Selatan (Ext) | HP:9 | FAT:1</option>
						<option value="Cluster Vinaya Terrace">Cluster Vinaya Terrace | HP:1 | FAT:8</option>
						<option value="De Latinos 1 (Virginia & Clio Vintage & La Vintage)">De Latinos 1 (Virginia & Clio Vintage & La Vintage) | HP:200 | FAT:132</option>
						<option value="De Latinos 2 (Bahamas & Carribean Island & Buenos Aires)">De Latinos 2 (Bahamas & Carribean Island & Buenos Aires) | HP:408 | FAT:226</option>
						<option value="De Latinos 3 A (Hacienda Mexicano)">De Latinos 3 A (Hacienda Mexicano) | HP:383 | FAT:174</option>
						<option value="De Latinos 3 B (Brazillia Flamengo)">De Latinos 3 B (Brazillia Flamengo) | HP:231 | FAT:121</option>
						<option value="De Latinos 4 (Santiago & De Rio 1 & 2 & Costarica)">De Latinos 4 (Santiago & De Rio 1 & 2 & Costarica) | HP:531 | FAT:313</option>
						<option value="De Latinos 5 (Patagonia & Centro Havana)">De Latinos 5 (Patagonia & Centro Havana) | HP:301 | FAT:151</option>
						<option value="Delatinos Caribbean">Delatinos Caribbean | HP:4 | FAT:28</option>
						<option value="Duren Village">Duren Village | HP:402 | FAT:260</option>
						<option value="Fountain Bleau">Fountain Bleau | HP:113 | FAT:9</option>
						<option value="Giriloka 1">Giriloka 1 | HP:368 | FAT:159</option>
						<option value="Giriloka 2">Giriloka 2  | HP:279 | FAT:95</option>
						<option value="Giriloka 3">Giriloka 3 | HP:184 | FAT:29</option>
						<option value="Golden Vienna I & Kencana Loka Xii-2 (Block E,F)">Golden Vienna I & Kencana Loka Xii-2 (Block E,F) | HP:404 | FAT:189</option>
						<option value="Golden Vienna Ii & Kencana Loka Xii-3 Blok K & L">Golden Vienna Ii & Kencana Loka Xii-3 Blok K & L | HP:410 | FAT:231</option>
						<option value="Graha Permai RW 09 FDT 1">Graha Permai RW 09 FDT 1 | HP:198 | FAT:142</option>
						<option value="Graha Yasa Asri">Graha Yasa Asri | HP:103 | FAT:52</option>
						<option value="Grand Poris RW 09 (FDT1)">Grand Poris RW 09 (FDT1) | HP:212 | FAT:73</option>
						<option value="Grand Poris RW 09 (FDT2)">Grand Poris RW 09 (FDT2) | HP:238 | FAT:67</option>
						<option value="Green Bamboo Residences (Ext)">Green Bamboo Residences (Ext) | HP:13 | FAT:3</option>
						<option value="Greencove">Greencove | HP:335 | FAT:152</option>
						<option value="Griya Jakarta RW 07">Griya Jakarta RW 07 | HP:200 | FAT:132</option>
						<option value="Griya Kencana 1">Griya Kencana 1 | HP:280 | FAT:187</option>
						<option value="Griya Kencana 2 RW 13">Griya Kencana 2 RW 13 | HP:216 | FAT:87</option>
						<option value="Griya Kencana 2 RW 14">Griya Kencana 2 RW 14 | HP:261 | FAT:178</option>
						<option value="Griya Kencana 2 RW 15">Griya Kencana 2 RW 15 | HP:235 | FAT:169</option>
						<option value="Griya Rahmah Bintaro">Griya Rahmah Bintaro | HP:1 | FAT:8</option>
						<option value="Griyaloka Sek 1.1">Griyaloka Sek 1.1 | HP:1371 | FAT:576</option>
						<option value="Griyaloka Sek 1.2">Griyaloka Sek 1.2 | HP:617 | FAT:157</option>
						<option value="Griyaloka Sek 1.2 Ext">Griyaloka Sek 1.2 Ext | HP:323 | FAT:60</option>
						<option value="Griyaloka Sek 1.3">Griyaloka Sek 1.3 | HP:302 | FAT:115</option>
						<option value="Griyaloka Sek 1.3 Ext">Griyaloka Sek 1.3 Ext | HP:241 | FAT:130</option>
						<option value="Griyaloka Sek 1.4">Griyaloka Sek 1.4 | HP:529 | FAT:160</option>
						<option value="Griyaloka Sek 1.5">Griyaloka Sek 1.5 | HP:305 | FAT:80</option>
						<option value="Griyaloka Sek 1.6">Griyaloka Sek 1.6 | HP:638 | FAT:386</option>
						<option value="Griyaloka Sek 1.7">Griyaloka Sek 1.7 | HP:235 | FAT:61</option>
						<option value="Jl Aria Putra (Fe Ext)">Jl Aria Putra (Fe Ext) | HP:3 | FAT:5</option>
						<option value="Jl Menjangan Raya (Fe Ext)">Jl Menjangan Raya (Fe Ext) | HP:1 | FAT:7</option>
						<option value="Jl Oscar Raya (Fe Ext)">Jl Oscar Raya (Fe Ext) | HP:3 | FAT:5</option>
						<option value="Kencana Loka 12.5">Kencana Loka 12.5 | HP:535 | FAT:374</option>
						<option value="Kencana Loka 12-2 (Blok C,D,G,H)">Kencana Loka 12-2 (Blok C,D,G,H) | HP:411 | FAT:179</option>
						<option value="Kencana Loka Xii-3 (Block J) Taman Chrysant 1">Kencana Loka Xii-3 (Block J) Taman Chrysant 1 | HP:392 | FAT:187</option>
						<option value="Kencana Loka Xii-4 (Block P) & Taman Chrysant 2">Kencana Loka Xii-4 (Block P) & Taman Chrysant 2 | HP:393 | FAT:215</option>
						<option value="Kintamani Residence">Kintamani Residence | HP:52 | FAT:17</option>
						<option value="Komplek Barata">Komplek Barata | HP:1 | FAT:8</option>
						<option value="Komplek Garuda Cipondoh RW 06 (FDT 1)">Komplek Garuda Cipondoh RW 06 (FDT 1) | HP:167 | FAT:11</option>
						<option value="Komplek Garuda Cipondoh RW 06 (FDT 2)">Komplek Garuda Cipondoh RW 06 (FDT 2) | HP:234 | FAT:24</option>
						<option value="Komplek Kehakiman RW 08">Komplek Kehakiman RW 08 | HP:333 | FAT:12</option>
						<option value="Komplek Kehakiman RW 13 - FDT 1">Komplek Kehakiman RW 13 - FDT 1 | HP:144 | FAT:21</option>
						<option value="Komplek Kehakiman RW 13 - FDT 2">Komplek Kehakiman RW 13 - FDT 2 | HP:100 | FAT:4</option>
						<option value="Metro Permata 1 (FDT 1)">Metro Permata 1 (FDT 1) | HP:523 | FAT:401</option>
						<option value="Metro Permata 1 (FDT 2)">Metro Permata 1 (FDT 2) | HP:391 | FAT:350</option>
						<option value="Metro Permata 1 RW 07 (FDT 1)">Metro Permata 1 RW 07 (FDT 1) | HP:312 | FAT:233</option>
						<option value="Metro Permata 1 RW 07 (FDT 2)">Metro Permata 1 RW 07 (FDT 2) | HP:314 | FAT:227</option>
						<option value="Neo Catalonia">Neo Catalonia | HP:356 | FAT:42</option>
						<option value="Nerada Estate">Nerada Estate | HP:438 | FAT:332</option>
						<option value="Nusa Loka 14.1">Nusa Loka 14.1 | HP:2 | FAT:12</option>
						<option value="Nusaloka Sek 14.1">Nusaloka Sek 14.1 | HP:502 | FAT:89</option>
						<option value="Nusaloka Sek 14.2">Nusaloka Sek 14.2 | HP:341 | FAT:62</option>
						<option value="Nusaloka Sek 14.3">Nusaloka Sek 14.3 | HP:363 | FAT:66</option>
						<option value="Nusaloka Sek 14.4">Nusaloka Sek 14.4 | HP:533 | FAT:128</option>
						<option value="Nusaloka Sek 14.5">Nusaloka Sek 14.5 | HP:880 | FAT:190</option>
						<option value="Nusaloka Sek 14.6">Nusaloka Sek 14.6 | HP:845 | FAT:237</option>
						<option value="Palem Ganda Asri 1">Palem Ganda Asri 1 | HP:349 | FAT:235</option>
						<option value="Pamulang Asri RW 04">Pamulang Asri RW 04 | HP:133 | FAT:66</option>
						<option value="Pamulang Elok RW 14">Pamulang Elok RW 14 | HP:650 | FAT:290</option>
						<option value="Pamulang Estate RW 13">Pamulang Estate RW 13 | HP:748 | FAT:477</option>
						<option value="Pamulang Estate RW 21 FDT 2">Pamulang Estate RW 21 FDT 2 | HP:286 | FAT:188</option>
						<option value="Pamulang Estate RW 24">Pamulang Estate RW 24 | HP:167 | FAT:99</option>
						<option value="Pamulang Estate RW 25">Pamulang Estate RW 25 | HP:140 | FAT:98</option>
						<option value="Pamulang Gardenia">Pamulang Gardenia | HP:40 | FAT:15</option>
						<option value="Pamulang Permai RW 10">Pamulang Permai RW 10 | HP:532 | FAT:369</option>
						<option value="Pamulang Permai RW 11">Pamulang Permai RW 11 | HP:402 | FAT:305</option>
						<option value="Pamulang Permai RW 12">Pamulang Permai RW 12 | HP:729 | FAT:469</option>
						<option value="Pamulang Permai RW 14">Pamulang Permai RW 14 | HP:206 | FAT:158</option>
						<option value="Pamulang Permai RW 14 (FDT 2)">Pamulang Permai RW 14 (FDT 2) | HP:472 | FAT:368</option>
						<option value="Pamulang Permai RW 15">Pamulang Permai RW 15 | HP:363 | FAT:249</option>
						<option value="Pamulang Permai RW 23">Pamulang Permai RW 23 | HP:209 | FAT:172</option>
						<option value="Pamulang Regency RT 08 RW 05">Pamulang Regency RT 08 RW 05 | HP:129 | FAT:73</option>
						<option value="Pamulang Village">Pamulang Village | HP:208 | FAT:163</option>
						<option value="Pavilion Residence">Pavilion Residence | HP:156 | FAT:56</option>
						<option value="Perum Al-Falah">Perum Al-Falah | HP:352 | FAT:227</option>
						<option value="Perum Benda Baru RW 17">Perum Benda Baru RW 17 | HP:309 | FAT:230</option>
						<option value="Perum Benda Baru RW 18">Perum Benda Baru RW 18 | HP:249 | FAT:194</option>
						<option value="Perum Serua Permai RW 04">Perum Serua Permai RW 04 | HP:241 | FAT:163</option>
						<option value="Perum Serua Permai RW 05">Perum Serua Permai RW 05 | HP:136 | FAT:60</option>
						<option value="Perum Serua Permai RW 07">Perum Serua Permai RW 07 | HP:315 | FAT:126</option>
						<option value="Perumahan Bukit Indah RW 06">Perumahan Bukit Indah RW 06 | HP:326 | FAT:192</option>
						<option value="Perumahan Bukit Indah RW 08">Perumahan Bukit Indah RW 08 | HP:268 | FAT:152</option>
						<option value="Perumahan Bukit Indah RW 5">Perumahan Bukit Indah RW 5 | HP:313 | FAT:211</option>
						<option value="Perumahan Ciputat Baru RW 06">Perumahan Ciputat Baru RW 06 | HP:230 | FAT:207</option>
						<option value="Perumahan Cireundeu Residence">Perumahan Cireundeu Residence | HP:49 | FAT:29</option>
						<option value="Perumahan Gunung Raya Dalam RT 05">Perumahan Gunung Raya Dalam RT 05 | HP:74 | FAT:51</option>
						<option value="Perumahan Pertamina RW 7 & 8">Perumahan Pertamina RW 7 & 8 | HP:874 | FAT:616</option>
						<option value="Pondok Benda Residence">Pondok Benda Residence | HP:95 | FAT:71</option>
						<option value="Pondok Kacang Prima RW 08">Pondok Kacang Prima RW 08 | HP:1218 | FAT:767</option>
						<option value="Pondok Lakah Permai RW 16">Pondok Lakah Permai RW 16 | HP:408 | FAT:218</option>
						<option value="Pondok Payung Mas">Pondok Payung Mas | HP:198 | FAT:133</option>
						<option value="Poris Indah RT 11 (Ext)">Poris Indah RT 11 (Ext) | HP:24 | FAT:0</option>
						<option value="Poris Indah RW 01 (FDT 1)">Poris Indah RW 01 (FDT 1) | HP:249 | FAT:56</option>
						<option value="Poris Indah RW 01 (FDT 2)">Poris Indah RW 01 (FDT 2) | HP:453 | FAT:119</option>
						<option value="Poris Indah RW 02">Poris Indah RW 02 | HP:431 | FAT:69</option>
						<option value="Poris Indah RW 05 (FDT 1)">Poris Indah RW 05 (FDT 1) | HP:422 | FAT:105</option>
						<option value="Poris Indah RW 05 (FDT 2)">Poris Indah RW 05 (FDT 2) | HP:437 | FAT:77</option>
						<option value="Poris Indah RW 05 (FDT 3)">Poris Indah RW 05 (FDT 3) | HP:438 | FAT:194</option>
						<option value="Poris Indah RW 06 FDT 1">Poris Indah RW 06 FDT 1 | HP:388 | FAT:106</option>
						<option value="Poris Indah RW 06 FDT 2">Poris Indah RW 06 FDT 2 | HP:421 | FAT:106</option>
						<option value="Poris Indah RW 06 FDT 3">Poris Indah RW 06 FDT 3 | HP:514 | FAT:120</option>
						<option value="Poris Indah RW 07 (FDT 1)">Poris Indah RW 07 (FDT 1) | HP:526 | FAT:182</option>
						<option value="Poris Indah RW 07 (FDT 2)">Poris Indah RW 07 (FDT 2) | HP:490 | FAT:104</option>
						<option value="Provence Parkland">Provence Parkland | HP:167 | FAT:35</option>
						<option value="Puri Kartika RW 06">Puri Kartika RW 06 | HP:549 | FAT:359</option>
						<option value="Puri Kartika RW 08">Puri Kartika RW 08 | HP:240 | FAT:189</option>
						<option value="Puri Pamulang RW 09">Puri Pamulang RW 09 | HP:546 | FAT:278</option>
						<option value="Puri Pamulang RW 25">Puri Pamulang RW 25 | HP:305 | FAT:184</option>
						<option value="Puspita Loka">Puspita Loka | HP:1331 | FAT:270</option>
						<option value="Puspita Loka Hfc">Puspita Loka Hfc | HP:1 | FAT:6</option>
						<option value="Reni Jaya RW 06 Kel Pondok Benda">Reni Jaya RW 06 Kel Pondok Benda | HP:982 | FAT:566</option>
						<option value="Reni Jaya RW 06 Kel Pondok Petir">Reni Jaya RW 06 Kel Pondok Petir | HP:512 | FAT:332</option>
						<option value="Reni Jaya RW 06 Kel Pondok Petir (Ext)">Reni Jaya RW 06 Kel Pondok Petir (Ext) | HP:6 | FAT:4</option>
						<option value="Reni Jaya RW 07">Reni Jaya RW 07 | HP:406 | FAT:248</option>
						<option value="Reni Jaya RW 08">Reni Jaya RW 08 | HP:296 | FAT:199</option>
						<option value="Reni Jaya RW 12">Reni Jaya RW 12 | HP:310 | FAT:173</option>
						<option value="Reni Jaya RW 14 Kel Pondok Benda">Reni Jaya RW 14 Kel Pondok Benda | HP:365 | FAT:155</option>
						<option value="Reni Jaya RW 17 Kel Pamulang Barat">Reni Jaya RW 17 Kel Pamulang Barat | HP:390 | FAT:219</option>
						<option value="Reni Jaya RW 20">Reni Jaya RW 20 | HP:336 | FAT:207</option>
						<option value="Riverview Village (Ext)">Riverview Village (Ext) | HP:11 | FAT:6</option>
						<option value="Ruko Barcelona">Ruko Barcelona | HP:47 | FAT:23</option>
						<option value="Ruko Golden  Boulevard">Ruko Golden  Boulevard | HP:582 | FAT:198</option>
						<option value="Ruko Golden Madrid 1">Ruko Golden Madrid 1 | HP:114 | FAT:52</option>
						<option value="Ruko Golden Madrid 2">Ruko Golden Madrid 2 | HP:92 | FAT:38</option>
						<option value="Ruko Golden Viena">Ruko Golden Viena | HP:82 | FAT:32</option>
						<option value="Ruko Griyaloka Sek 1.2">Ruko Griyaloka Sek 1.2 | HP:88 | FAT:45</option>
						<option value="Ruko Ocean Park Bsd">Ruko Ocean Park Bsd | HP:1 | FAT:5</option>
						<option value="Ruko Tol Boulevard">Ruko Tol Boulevard | HP:171 | FAT:113</option>
						<option value="Sevilla">Sevilla | HP:708 | FAT:337</option>
						<option value="Sme - Golden Road">Sme - Golden Road | HP:162 | FAT:54</option>
						<option value="Sme - Itc Bsd">Sme - Itc Bsd | HP:54 | FAT:16</option>
						<option value="Sme - Malibu">Sme - Malibu | HP:72 | FAT:5</option>
						<option value="Taman Edelweiss">Taman Edelweiss | HP:25 | FAT:4</option>
						<option value="Taman Giriloka">Taman Giriloka | HP:470 | FAT:152</option>
						<option value="Taman Kedaung FDT 1">Taman Kedaung FDT 1 | HP:504 | FAT:365</option>
						<option value="Taman Kedaung FDT 2">Taman Kedaung FDT 2 | HP:529 | FAT:313</option>
						<option value="Taman Mangu Indah">Taman Mangu Indah | HP:825 | FAT:504</option>
						<option value="Taman Mangu Indah RW 12">Taman Mangu Indah RW 12 | HP:480 | FAT:318</option>
						<option value="Taman Provence">Taman Provence | HP:79 | FAT:28</option>
						<option value="Taman Provennce">Taman Provennce | HP:11 | FAT:21</option>
						<option value="Taman Royal 3 - Cluster Ebony">Taman Royal 3 - Cluster Ebony | HP:105 | FAT:9</option>
						<option value="Taman Royal 3 - Cluster Jati">Taman Royal 3 - Cluster Jati | HP:154 | FAT:21</option>
						<option value="Taman Rusa Residence (Ext)">Taman Rusa Residence (Ext) | HP:8 | FAT:1</option>
						<option value="Taman Tirta Golf">Taman Tirta Golf | HP:204 | FAT:83</option>
						<option value="Telaga Golf">Telaga Golf | HP:129 | FAT:135</option>
						<option value="The Avani Livena Dhesna">The Avani Livena Dhesna | HP:1 | FAT:5</option>
						<option value="The Eminent Ingenia">The Eminent Ingenia | HP:1 | FAT:5</option>
						<option value="The Green 1 (Mirrage & Blossom Ville & Grand Canyon)">The Green 1 (Mirrage & Blossom Ville & Grand Canyon) | HP:363 | FAT:173</option>
						<option value="The Green 2 (Montecarlo & Bellagio & Banyan Ville)">The Green 2 (Montecarlo & Bellagio & Banyan Ville) | HP:321 | FAT:165</option>
						<option value="The Green 3 (Vineyard & Manhattan Forum & Venetian)">The Green 3 (Vineyard & Manhattan Forum & Venetian) | HP:584 | FAT:303</option>
						<option value="Town House Griya Aviva">Town House Griya Aviva | HP:57 | FAT:38</option>
						<option value="Vermont Parkland">Vermont Parkland | HP:245 | FAT:133</option>
						<option value="Victoria Riverpark">Victoria Riverpark | HP:256 | FAT:74</option>
						<option value="Villa Alvita">Villa Alvita | HP:308 | FAT:216</option>
						<option value="Villa Bintaro Regency">Villa Bintaro Regency | HP:637 | FAT:523</option>
						<option value="Villa Bintaro RW 11">Villa Bintaro RW 11 | HP:465 | FAT:273</option>
						<option value="Villa Indah Pamulang">Villa Indah Pamulang | HP:79 | FAT:21</option>
						<option value="Villa Inti Persada RW 19">Villa Inti Persada RW 19 | HP:245 | FAT:170</option>
						<option value="Villa Inti Persada RW 19 (FDT 1)">Villa Inti Persada RW 19 (FDT 1) | HP:437 | FAT:292</option>
						<option value="Villa Inti Persada RW 19 RT 07">Villa Inti Persada RW 19 RT 07 | HP:86 | FAT:44</option>
						<option value="Villa Inti Persada RW 28">Villa Inti Persada RW 28 | HP:350 | FAT:245</option>
						<option value="Villa Melati Mas Blok C RT 49 RW 08(Ext)">Villa Melati Mas Blok C RT 49 RW 08(Ext) | HP:19 | FAT:7</option>
						<option value="Villa Melati Mas Blok J">Villa Melati Mas Blok J | HP:170 | FAT:113</option>
						<option value="Villa Melati Mas Blok O">Villa Melati Mas Blok O | HP:138 | FAT:104</option>
						<option value="Villa Melati Mas Blok U RT/RW : 057/008 (Ext)">Villa Melati Mas Blok U RT/RW : 057/008 (Ext) | HP:12 | FAT:6</option>
						<option value="Villa Melati Mas Regency Blok B">Villa Melati Mas Regency Blok B | HP:258 | FAT:216</option>
						<option value="Villa Melati Mas Regency Blok V">Villa Melati Mas Regency Blok V | HP:132 | FAT:85</option>
						<option value="Villa Melati Mas RW 09 Blok C">Villa Melati Mas RW 09 Blok C | HP:449 | FAT:243</option>
						<option value="Villa Melati Mas RW 09 Blok P-T">Villa Melati Mas RW 09 Blok P-T | HP:351 | FAT:239</option>
						<option value="Villa Melati Mas RW 09 FDT 1">Villa Melati Mas RW 09 FDT 1 | HP:197 | FAT:117</option>
						<option value="Villa Melati Mas RW 09 FDT 2">Villa Melati Mas RW 09 FDT 2 | HP:298 | FAT:158</option>
						<option value="Villa Melati Mas RW 09 FDT 3">Villa Melati Mas RW 09 FDT 3 | HP:494 | FAT:348</option>
						<option value="Villa Melati Mas RW 09 RT 44 (Ext)">Villa Melati Mas RW 09 RT 44 (Ext) | HP:12 | FAT:4</option>
						<option value="Villa Melati Mas Vista (Ext)">Villa Melati Mas Vista (Ext) | HP:23 | FAT:3</option>
						<option value="Villa Pamulang Mas 1">Villa Pamulang Mas 1 | HP:582 | FAT:372</option>
						<option value="Villa Pamulang Mas 2">Villa Pamulang Mas 2 | HP:244 | FAT:178</option>
						<option value="Villa Pamulang RW 10">Villa Pamulang RW 10 | HP:318 | FAT:211</option>
						<option value="Villa Pamulang RW 11">Villa Pamulang RW 11 | HP:333 | FAT:180</option>
						<option value="Villa Pamulang RW 12">Villa Pamulang RW 12 | HP:652 | FAT:434</option>
						<option value="Virginia Lagoon">Virginia Lagoon | HP:264 | FAT:82</option>
						<option value="Wisma Pondok Aren">Wisma Pondok Aren | HP:150 | FAT:95</option>
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
