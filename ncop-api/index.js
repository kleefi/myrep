<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Nama : <input type="text" name="nama" id="nama"><br>
    Umur : <input type="text" name="umur" id="umur"><br>
    Jabatan : <input type="text" name="jabatan" id="jabatan"><br>
    <button onclick="kirim()">Kirim</button>
    <script>
    function kirim(){
    var nama = document.getElementById("nama");
    var umur = document.getElementById("umur");
    var jabatan = document.getElementById("jabatan");
    var formdata = new FormData();
    formdata.append("nama_pegawai", nama.value);
    formdata.append("umur_pegawai", umur.value);
    formdata.append("jabatan", jabatan.value);

    var requestOptions = {
    method: 'POST',
    body: formdata,
    redirect: 'follow'
    };

    fetch("http://127.0.0.1:8000/api", requestOptions)
    .then(response => response.text())
    .then(result =>{
        if(result){
            alert('data berhasil ditambah!');
        }
    })
    .catch(error => console.log('error', error));
    }
    // create fetch post
    
    </script>
</body>
</html>
