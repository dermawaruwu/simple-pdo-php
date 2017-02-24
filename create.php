<?php

include_once 'connection.php';

if (isset($_POST['submit'])){
    $nama = htmlentities($_POST['nama']);
    $lokasi = htmlentities($_POST['lokasi']);
    $tanggal = htmlentities($_POST['tanggal']);

    $query = $database->prepare("INSERT INTO event (nama, lokasi, tanggal) VALUES (:nama, :lokasi, :tanggal)");
    $query->bindParam(":nama", $nama);
    $query->bindParam(":lokasi", $lokasi);
    $query->bindParam(":tanggal", $tanggal);

    $query->execute();

    header("location: index.php");
}

?>

<!DOCTYPE html>  
<html>  
    <head>
        <meta charset="utf-8">
        <title>Tambah Event</title>

        <script src="assets/tether.js"></script>
        <link rel="stylesheet" href="assets/bootstrap.css">
        <script src="assets/jquery.js"></script>
        <script src="assets/bootstrap.js"></script>

    </head>
    <body>
        <div class="container">
            <h1>Tambah Event</h1>
            <form method="post">
                <!--Nama: required <input type="text" name="nama" placeholder="Nama" /> <br>
                Lokasi: required <input type="text" name="lokasi" placeholder="Lokasi" /> <br>
                Tanggal: required <input type="text" name="tanggal" placeholder="Tanggal" /> <br>
                <input type="submit" name="submit" />-->
       
                    <div class="form-group">
                        <label for="formGroupExampleInput">Nama</label>
                        <input required type="text" name="nama" class="form-control" id="formGroupExampleInput" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Lokasi</label>
                        <input required type="text" name="lokasi" class="form-control" id="formGroupExampleInput2" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput3">Tanggal</label>
                        <input required type="text" name="tanggal" class="form-control" id="formGroupExampleInput3" placeholder="">
                    </div>
                    <!--<button type="submit" name="submit" class="btn btn-primary">Submit</button>-->
                    <input type="submit" name="submit" class="btn btn-info"/>

            <!--</form>-->
        </div>
        
    </body>
</html>  