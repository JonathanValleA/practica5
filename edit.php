
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
<form action="editcode.php" method="POST">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Price</th>
            <th scope="col">Qsold</th>
            </th>
        </thead>
        <tbody>


        
        <?php
        try {
            //Connexió a la BBDD
            $myCon = new PDO('mysql:host=localhost; dbname=products', 'root', '');
            //Creem la consulta sql
            $sql ="SELECT * FROM producto";
        
        } catch (PDOException $e) {
            echo "error de connexió: " . $e->getMessage() . "<br/>";
            die();
        }
        
        ?>

        <?php foreach ($myCon->query($sql) as $i => $product){ ?>
            <tr>
                <td><?php echo $product['id']?></td>
                <input type="hidden" value="<?php echo $product['id']; ?>" name="id">
                <td><input type="text" value="<?php echo $product['Name']; ?>" name="Name"></td>
                <td><input type="text" value="<?php echo $product['Descripcion']; ?>" name="Descripcion"></td>
                <td><input type="text" value="<?php echo $product['Price']; ?>" name="Price"></td>
                <td><input type="text" value="<?php echo $product['Qsold']; ?>" name="Qsold"></td>
                <td><input type="submit" value="Actualizar"></td>
            </tr>
        <?php }?>
    </table>
</form>
</body>