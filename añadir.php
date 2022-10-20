<?php

    try {
        //Connexió a la BBDD
        $myCon = new PDO('mysql:host=localhost; dbname=products', 'root', '');

        $nombre = $_POST['name'];
        $description = $_POST['description'];
        $precio = $_POST['price'];

        //Creem la consulta sql
        $agregar = "INSERT INTO producto(Name, Descripcion, price) VALUES('$nombre', '$description', '$precio')";
        $stmt = $myCon->prepare($agregar);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "error de connexió: " . $e->getMessage() . "<br/>";
        die();
    }


    if($stmt){
        echo "<script>alert('Se han añadido la tabla a la BD'); window.location='index.php';</script>";
    }else{
        echo "<script>alert('No se pudieron añadir los datos'); window.history.go(-1);</script>";
    }
?>