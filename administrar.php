<?php
require_once 'config/database.php';
require_once 'config/config.php';
require_once 'layout/header.php';
?>
<?php
if (isset($_SESSION['usuario-adm'])) :
    $consulta="SELECT * FROM estates";
    $query = mysqli_query($db, $consulta);
    $array = mysqli_fetch_array($query);
?>
    <br>
    <div class="container">
        <div class="row">

            <div class="welcome">
                <h1>Bienvenido/a <?= $_SESSION['usuario-adm']['nombre'] ?></h1> 

                <a href="cerrar.php" class="btn btn-danger">Cerrar Sesión</a>
                
                
            </div>

        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Casa</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Baños</th>
                    <th scope="col">Numero de carros</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Pisina</th>
                    <th scope="col">Zona</th>
                    <th scope="col">Chimenea</th>
                    <th scope="col">Años</th>
                    <th scope="col">Precio</th>
                    <th><a href="crear-producto.php" class="btn btn-primary">Agregar Inmueble</a> </th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($query as $row): 
                $imagen = "images/productos/" .$row['id']. ".png";
                if(!file_exists($imagen)){
                    $imagen = "images/no-photo.jpg";
                }
            ?>
                <tr>
                    
                    <td><?=$row['id']?></td>
                    <td><img class="img-thumbnail img-fluid" width="100" src="<?php echo $imagen; ?>" alt="Principal.jpg"></td>
                    <td><?=ucfirst($row['type'])?></td>
                    <td><?=$row['bedrooms']?></td>
                    <td><?=$row['garage_cars']?$row['garage_cars']:'No'?></td>
                    <td><?=$row['address']?></td>
                    <td><?=$row['pool']?'Si':'No'?></td>
                    <td><?=$row['type_zone']?></td>
                    <td><?=$row['fireplace']?'Si':'No'?></td>
                    <td><?=$row['years'].' años'?></td>
                    <td><?='$'.$row['price'].' COP'?></td>
                    <td>
                        <a href="editar-producto.php?id=<?=$row['id']?>" class="btn btn-warning">Editar</a>
                        |
                        <a href="eliminar-producto.php?id=<?=$row['id']?>" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>

    </div>

<?php
else :
    header('Location: loginadmin.php');

endif;
?>
<?php
require_once 'layout/footer.php'
?>