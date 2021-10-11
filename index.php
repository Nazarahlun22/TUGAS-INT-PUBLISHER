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
    <title>Tugas CRUD</title>
</head>
<body>
    <div class="container mt-4">
    <h3>Rekap Data Mahasiswa</h3>
    <a href="add.php" class="btn btn-primary btn-md mb-3">Tambah Data</a> 
    <table class="table table-striped table-hover table-bordered ">
        <thead class="table-dark">
            <th>NIM</th>
            <th>Nama Mahasiswa</th>
            <th>Jurusan</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Aksi</th>
        </thead>

        <?php
        $sqlGet = "SELECT * FROM mahasiswa";
        $query = mysqli_query($conn, $sqlGet);


        while($data = mysqli_fetch_array($query)){
            echo"
            <tbody>
            <tr>
                <td>$data[nim]</td>
                <td>$data[nama]</td>
                <td>$data[jurusan]</td>
                <td>$data[alamat]</td>
                <td>$data[telpon]</td>
                <td>
                <div class='row'>
                <div class='col d-flex justify-content-center'>
                <a href='update.php?nim=$data[nim]' class='btn btn-sm btn-warning'> Update </a>
                </div>
                <div class='col d-flex justify-content-center'>
                <a href='delete.php?nim=$data[nim]' class='btn btn-sm btn-danger'> Delete </a>
                </div>
                </div>

                </td>
            </tr>
            </tbody>
            ";
        }
        ?>

    </table>
    </div>

    

    
</body>
</html>