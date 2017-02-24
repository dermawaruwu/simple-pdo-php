<?php

include_once 'connection.php';

    if(!isset($_GET['id'])){
        die("Event Belum Diinput");
    }
    
    $query = $database->prepare("SELECT * FROM event WHERE id = :id");
    $query->bindParam(":id", $_GET['id']);
    
    $query->execute();

    $data = $query->fetch(); // Mengambil first row dari hasil eksekusi SQL
    
    if(isset($_POST['submit'])){
        
        $nama = htmlentities($_POST['nama']);
        $lokasi = htmlentities($_POST['lokasi']);
        $tanggal = htmlentities($_POST['tanggal']);

        $query = $database->prepare("UPDATE event SET nama=:nama,lokasi=:lokasi,tanggal=:tanggal WHERE id=:id");
        $query->bindParam(":nama", $nama);
        $query->bindParam(":lokasi", $lokasi);
        $query->bindParam(":tanggal", $tanggal);
        $query->bindParam(":id", $_GET['id']);
        
        $query->execute();
        
        header("location: index.php");
    }
?>

<!DOCTYPE html>  
<html>  
    <head>
        <meta charset="utf-8">
        <title>Edit Event</title>

        <script src="assets/tether.js"></script>
        <link rel="stylesheet" href="assets/bootstrap.css">
        <script src="assets/jquery.js"></script>
        <script src="assets/bootstrap.js"></script>

    </head>
    <body>
    <div class="container">
        <h1>Edit Event</h1>
        <form method="post">
            <!--Nama: <input required type="text" name="nama" placeholder="Nama" value="<?= $data['nama'] ?>"/> <br>
            Lokasi: <input required type="text" name="lokasi" placeholder="lokasi" value="<?= $data['lokasi'] ?>"/> <br>
            Tanggal: <input required type="text" name="tanggal" placeholder="No tanggal" value="<?= $data['tanggal'] ?>"/> <br>
            <input type="submit" name="submit" />-->

            <div class="form-group">
                <label for="formGroupExampleInput">Nama</label>
                <input required type="text" name="nama" class="form-control" id="formGroupExampleInput" value="<?= $data['nama'] ?>" placeholder="">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Lokasi</label>
                <input required type="text" name="lokasi" class="form-control" id="formGroupExampleInput2" value="<?= $data['lokasi'] ?>" placeholder="">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput3">Tanggal</label>
                <input required type="text" name="tanggal" class="form-control" id="formGroupExampleInput3" value="<?= $data['tanggal'] ?>" placeholder="">
            </div>
            <!--<button type="submit" name="submit" class="btn btn-primary">Submit</button>-->
            <input type="submit" name="submit" class="btn btn-info"/>
        </form>
    </div>
        
    </body>
</html> 