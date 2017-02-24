<?php
include_once 'connection.php';

$query = $database->prepare("SELECT * FROM event");

$query->execute();

$events = $query->fetchAll();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>List Event</title>

    <script src="assets/tether.js"></script>
    <link rel="stylesheet" href="assets/bootstrap.css">
    <script src="assets/jquery.js"></script>
    <script src="assets/bootstrap.js"></script>

</head>
<body>
    <div class="container">
        <h1>List Event</h1>
        <a href="create.php"><button type="button" class="btn btn-success">Tambah Data</button></a>
        </br></br>
        <table border="1" class="table-bordered table-hover">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Lokasi</th>
                <th>Tanggal</th>
                <th>Edit</th>
                <th>Hapus</th>
            </tr>
            <?php foreach ($events as $event): ?>
                <tr>
                    <td>
                        <?php echo $event['id'] ?>
                    </td>
                    <td>
                        <?php echo $event['nama'] ?>
                    </td>
                    <td>
                        <?php echo $event['lokasi'] ?>
                    </td>
                    <td>
                        <?php echo $event['tanggal'] ?>
                    </td>
                    <td><a href="update.php?id=<?php echo $event['id']?>"><button type="button" class="btn btn-warning">Edit</button></a></td>
                    <td><a href="delete.php?id=<?php echo $event['id']?>"><button type="button" class="btn btn-danger">Delete</button></a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    
</body>
</html>