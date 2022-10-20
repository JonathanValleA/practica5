<?php 
    $id=$_GET['id'];
    try {
        //Connexió a la BBDD
        $myCon = new PDO('mysql:host=localhost; dbname=products', 'root', '');
        //Creem la consulta sql
        $sql="DELETE FROM producto WHERE id=$id";
        $stmt = $myCon->prepare($sql);
        $stmt->execute();
     } catch (PDOException $e) {
        echo "error de connexió: " . $e->getMessage() . "<br/>";
        die();
     }
    if($stmt){
        header('refresh:0;url=index.php?eliminado');
    }

?>