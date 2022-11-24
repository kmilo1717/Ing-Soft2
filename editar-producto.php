<?php require_once 'config/database.php'; ?>
<?php require_once 'config/config.php'; ?>

<?php require_once 'layout/header.php'; ?>
<?php

    $producto_id = $_GET['id'];
	$consulta="SELECT * FROM estates WHERE id = $producto_id";
    $query = mysqli_query($db, $consulta);
    $productoadm = mysqli_fetch_array($query);
	

if(isset($_SESSION['usuario-adm'])):
?>
    <div class="container">
        <br>
        <h1 class="titulo-adm">Editar Producto</h1>
        <br>
        <form action="guardar-producto.php?editar=<?=$productoadm['id']?>" method="POST" class="form-control" enctype="multipart/form-data">
        <div class="mb-3">
                <label for="type">Tipo</label>
                <select name="type" id="type" class="form-control">
                    <option value="casa" selected>Casa</option>
                    <option value="apartamento">Apartamento</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="price">Precio</label>
                <input type="number" min="0" name="price" id="price" class="form-control" value="<?=$productoadm['price']?>">
            </div>

            <div class="mb-3">
                <label for="address">Direccion</label>
                <input type="text" name="address" id="address" class="form-control" value="<?=$productoadm['address']?>" require>
            </div>

            <div class="mb-3">
                <label for="size">Tamaño (m²)</label>
                <input type="number" name="size" id="size" class="form-control" value="<?=$productoadm['size']?>" require>
            </div>

            <div class="mb-3">
                <label for="bedrooms">Dormitorios</label>
                <input type="number" min="0" name="bedrooms" id="bedrooms" class="form-control" value="<?=$productoadm['bedrooms']?>" require>
            </div>

            <div class="mb-3">
                <label for="year">Años</label>
                <input type="number" min="0" name="year" id="year" class="form-control" value="<?=$productoadm['years']?>" require>
            </div>

            <div class="mb-3">
                <label for="cars">Tamaño de garaje (Carros)</label>
                <input type="number" min="0" name="cars" id="cars" class="form-control" value="<?=$productoadm['garage_cars']?>">
            </div>

            <div class="mb-3">
                <label for="type_zone">Ubicacion</label>
                <select name="type_zone" id="type_zone" class="form-control">
                    <option value="ciudad" <?=$productoadm['type_zone']=="ciudad"?'selected':''?>>Ciudad</option>
                    <option value="rural" <?=$productoadm['type_zone']=="rural"?'selected':''?>>Rural</option>
                    <option value="suburbana" <?=$productoadm['type_zone']=="suburbana"?'selected':''?>>Suburbana</option>
                </select>
            </div>

            <div class="mb-3">
                <div class="icheckbox">
                    <label for="pool" class="text-dark">Piscina</label>
                    <input type="checkbox" name="pool" id="pool" class="float-end" <?=$productoadm['pool']?'checked':''?>/>
                    <label for="pool" class="toggle"><span></span></label>
                </div>
            </div>

            <div class="mb-3">
                <div class="icheckbox">
                    <label for="fireplace" class="text-dark">Chimenea</label>
                    <input type="checkbox" name="fireplace" id="fireplace" <?=$productoadm['pool']?'checked':''?>/>
                    <label for="fireplace" class="toggle"><span></span></label>
                </div>
            </div>

            <p class="label text-dark">Servicios</p>
            <div class="form-check admin">
                <input class="form-check-input" type="checkbox" name="services" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault" class="text-dark">
                    Telefono
                </label>
            </div>
            <div class="form-check admin">
                <input class="form-check-input" type="checkbox" name="services" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault" class="text-dark">
                    Energia
                </label>
            </div>
            <div class="form-check admin">
                <input class="form-check-input" type="checkbox" name="services" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault" class="text-dark">
                    Gas
                </label>
            </div>
            <div class="form-check admin">
                <input class="form-check-input" type="checkbox" name="services" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault" class="text-dark">
                    Internet
                </label>
            </div>

            <div class="mb-3">
            <label for="foto">Foto</label>
            <input class="form-control form-control-lg" type="file" name="foto" >
            </div>


            <div class="mb-3">
            <input class="btn btn-success form-control form-control-lg" type="submit" value="Guardar">
            </div>
        </form>
    </div>
<?php
else:
    header('Location: index.php');
endif;
?>
<?php
    require_once 'layout/footer.php';
?>
