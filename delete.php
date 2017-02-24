<?php  
    include_once 'connection.php';

    if(isset($_GET["id"])){
        
        $query = $database->prepare("DELETE FROM event WHERE id=:id");
        $query->bindParam(":id", $_GET["id"]);
        
        $query->execute();
        
        header("location: index.php");
    }
?>
