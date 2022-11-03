<?php

$id = $_POST['id'];
$name = $_POST['Name'];
$descripcion = $_POST['Descripcion'];
$price = $_POST['Price'];
$qsold = $_POST['Qsold'];

try {
//Connexió a la BBDD
    $myCon = new PDO('mysql:host=localhost; dbname=products', 'root', '');
//Creem la consulta sql
    $sql ="UPDATE producto SET name='$name', descripcion='$descripcion', price='$price', qsold='$qsold, WHERE id=$id";

    $stmt = $myCon->prepare($sql);
    $stmt->execute();

    //En cas que falli la connexió
} catch (PDOException $e) {
    echo "error de connexió: " . $e->getMessage() . "<br/>";
    die();
}

$myCon = null;

//Missatges de canvi exitos i error respectivament, amb la consequent redirecció de pagina
if($stmt){
    echo "<script>alert('Se han actualizado los cambios'); window.location='index.php';</script>";
}else{
    echo "<script>alert('No se pudieron actualizar los datos'); window.history.go(-1);</script>";
}
?>
<?php
$id=$_GET['id'];
try {
    //Connexió a la BBDD
    $myCon = new PDO('mysql:host=localhost; dbname=products', 'root', '');
    //Creem la consulta sql
    $sql ="SELECT * FROM producto WHERE id=$id";

} catch (PDOException $e) {
    echo "error de connexió: " . $e->getMessage() . "<br/>";
    die();
}
?>