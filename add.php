<?php
    include 'koneksi.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <title>Add</title>
</head>
<body>
<div class="w-50 mx-auto border p-3 mt-5">
<h3>Form Pendaftaran Bantuan Mahasiswa Unmer</h3>
    <a href="index.php">Kembali ke home</a>
<form action="add.php" method="post">
    <label for="nim">NIM</label>
    <input type="text" id="nim" name="nim" class="form-control" required>

    <label for="nama">Nama Mahasiswa</label>
    <input type="text" id="nama" name="nama" class="form-control" required>
    
    <label for="jurusan">Jurusan</label>
    <select name="jurusan" id="jurusan" name="jurusan" class="form-select" required>
    <option>Pilih Jurusan</option>
    <option value="informasi"> Sistem Informasi</option>
    <option value="hukum">Hukum</option>
    <option value="sipil">Teknik sipil</option>
    <option value="perbankan">Perbankan</option>
    <option value="perhotelan">Perhotelan</option>
    <option value="psikologi">Psikologi</option>
    <option value="arsitektur">Teknik Arsitektur</option>
    <option value="mesin">Teknik Mesin</option>

    </select>

    <label for="alamat">Alamat</label>
    <input type="text" id="alamat" name="alamat" class="form-control" required>

    <label for="telpon">telpon</label>
    <input type="text" id="telpon" name="telpon" class="form-control" required>

    <input class="btn btn-success mt-3" type="submit" name="submit" value="Submit">


</form>
</div>

<?php
if(isset($_POST['submit'])) {

$nim = $_POST['nim'];
$nama = $_POST['nama'];
$jurusan = $_POST['jurusan'];
$alamat = $_POST['alamat'];
$telpon = $_POST['telpon'];

$jurusanSelect = $_POST['jurusan'];
if($jurusanSelect == 'informasi') {
    $jurusan = 'Sistem Informasi';
}
if($jurusanSelect == 'sipil') {
    $jurusan = 'Teknik Sipil';
}
if($jurusanSelect == 'arsitektur') {
    $jurusan = 'Teknik Arsitektur';
}
if($jurusanSelect == 'mesin') {
    $jurusan = 'Teknik Mesin';
}


$sqlGet = "SELECT *FROM mahasiswa WHERE nim='$nim'";
$queryGet = mysqli_query($conn, $sqlGet);
$cek = mysqli_num_rows($queryGet);

$sqlInsert="INSERT INTO mahasiswa(nim, nama, jurusan, alamat, telpon) 
            VALUES ('$nim', '$nama', '$jurusan', '$alamat','$telpon')";
$queryInsert = mysqli_query($conn, $sqlInsert);

if(isset($sqlInsert) && $cek <= 0) {
echo"
<div class='alert alert-success'>Data berhasil ditambahkan <a href='index.php'>Cek data</a></div>
";
} else if($cek > 0){
echo"
<div class='alert alert-danger'>Data gagal ditambahkan <a href='index.php'>Cek data</a></div>
";
}

header("location; index.php");
}
?>


</body>
</html>