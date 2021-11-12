<?php
$nama_pegawai = $_POST['nama_pegawai'];
$umur_pegawai = $_POST['umur_pegawai'];
$jabatan = $_POST['jabatan'];
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://127.0.0.1:8000/api',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array(
      'nama_pegawai' => $nama_pegawai,
      'umur_pegawai' => $umur_pegawai,
      'jabatan' => $jabatan
    ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
