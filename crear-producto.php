<?php require_once 'config/database.php'; ?>
<?php require_once 'config/config.php'; ?>

<?php require_once 'layout/header.php'; ?>
<?php


if(isset($_SESSION['usuario-adm'])):
?>
    <div class="container">
        <br>
        <h1 class="titulo-adm">Crear Inmueble </h1>
        <br>
        <form action="guardar-producto.php" method="POST" class="form-control">
            <div class="mb-3">
                <label for="type">Tipo</label>
                <select name="type" id="type" class="form-control">
                    <option value="casa" selected>Casa</option>
                    <option value="apartamento">Apartamento</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="price">Precio</label>
                <input type="number" name="price" id="price" class="form-control">
            </div>

            <div class="mb-3">
                <label for="address">Direccion</label>
                <input type="text" name="address" id="address" class="form-control">
            </div>

            <div class="mb-3">
                <label for="size">Tamaño (m²)</label>
                <input type="number" name="size" id="size" class="form-control">
            </div>

            <div class="mb-3">
                <label for="bedrooms">Dormitorios</label>
                <input type="number" name="bedrooms" id="bedrooms" class="form-control">
            </div>

            <div class="mb-3">
                <label for="year">Años</label>
                <input type="number" name="year" id="year" class="form-control">
            </div>

            <div class="mb-3">
                <label for="cars">Tamaño de garaje (Carros)</label>
                <input type="number" name="cars" id="cars" class="form-control">
            </div>

            <div class="mb-3">
                <label for="type_zone">Ubicacion</label>
                <select name="type_zone" id="type_zone" class="form-control">
                    <option value="ciudad" selected>Ciudad</option>
                    <option value="rural">Rural</option>
                    <option value="suburbana">Suburbana</option>
                </select>
            </div>

            <div class="mb-3">
                <div class="icheckbox">
                    <label for="pool" class="text-dark">Piscina</label>
                    <input type="checkbox" name="pool" id="pool" class="float-end"/>
                    <label for="pool" class="toggle"><span></span></label>
                </div>
            </div>

            <div class="mb-3">
                <div class="icheckbox">
                    <label for="fireplace" class="text-dark">Chimenea</label>
                    <input type="checkbox" name="fireplace" id="fireplace"/>
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
                        <br>
                        <br>
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
