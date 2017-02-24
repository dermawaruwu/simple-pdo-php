<?php

$namaServer = "localhost";
$namaDatabase = "roadshow_gunadarma";
$username = "root";
$password = "";
 
try {
    $database = new PDO("mysql:host={$namaServer};dbname={$namaDatabase}",$username,$password); 
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    /*if ($database){
        echo "Berhasil Konek";
    }*/
} catch(PDOException $e) {
    echo "ERROR : ".$e->getMessage();
}