<?php

$id = $_POST['id'];
$name = $_POST['Name'];
$descripcion = $_POST['Descripcion'];
$price = $_POST['Price'];

try {
//Connexió a la BBDD
    $myCon = new PDO('mysql:host=localhost; dbname=products', 'root', '');
//Creem la consulta sql
    $sql ="UPDATE producto SET name='$name', descripcion='$descripcion', price='$price' WHERE id=$id";

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
//Pàgina on es ficaran les dades a actualitzar
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Actualizar</title>
</head>
<body>
<form action="edit.php" method="POST">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Price</th>
            </th>
        </thead>
        <tbody>

        <?php foreach ($myCon->query($sql) as $i => $product){ ?>
            <tr>
                <td><?php echo $product['id']?></td>
                <input type="hidden" value="<?php echo $product['id']; ?>" name="id">
                <td><input type="text" value="<?php echo $product['Name']; ?>" name="Name"></td>
                <td><input type="text" value="<?php echo $product['Descripcion']; ?>" name="Descripcion"></td>
                <td><input type="text" value="<?php echo $product['Price']; ?>" name="Price"></td>
                <td><input type="submit" value="Actualizar"></td>
            </tr>
        <?php }?>
    </table>
</form>
</body>