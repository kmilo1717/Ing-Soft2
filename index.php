<?php

require 'config/config.php';
require 'config/database.php';

$db = new Database();
$con = $db->conectar();

if (isset($_GET['type'])){
    $type = $_GET['type'];
    $sql = $con->prepare("SELECT * FROM estates WHERE type = ?");
    $sql->execute([$type]);
    $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
}else if(isset($_POST)){
    $sql = "SELECT * FROM estates WHERE 1 ";
    if (isset($_POST['min_size']) && $_POST['min_size']){
        $data = $_POST['min_size'];
        $sql.="AND size >= $data ";
    }
    if (isset($_POST['max_size']) && $_POST['max_size']){
        $data = $_POST['max_size'];
        $sql.="AND size <= $data ";
    }
    if (isset($_POST['bedrooms']) && $_POST['bedrooms']){
        $data = $_POST['bedrooms'];
        $sql.="AND bedrooms >= $data ";
    }
    if (isset($_POST['year']) && $_POST['year']){
        $data = $_POST['year'];
        $sql.="AND years >= $data ";
    }
    if (isset($_POST['cars']) && $_POST['cars']){
        $data = $_POST['cars'];
        if ($data == 1 || $data == 2){
            $sql.="AND garage_cars = $data";
        }else{
            $sql.="AND garage_cars > 2";
        }
    }
    if (isset($_POST['type_zone']) && $_POST['type_zone'] != 'Indiferente'){
        $data = $_POST['type_zone'];
        $sql.="AND type_zone = '$data' ";
    }
    if (isset($_POST['tool']) && $_POST['tool']){
        $data = $_POST['tool'];
        $sql.="AND tool = $data ";
    }
    if (isset($_POST['fireplace']) && $_POST['fireplace']){
        $data = $_POST['fireplace'];
        $sql.="AND fireplace = $data ";
    }

    $response = mysqli_query($db_general,$sql);
    $resultado = [];
    if ($response){
        while($row = mysqli_fetch_array($response)) {
            $resultado[] = $row;
        }
    }
}else{
    $sql = $con->prepare("SELECT * FROM estates");
    $sql->execute();
    $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
}

include 'layout/header.php';
?>
    <?php if (isset($_GET['type'])){ ?>
        <h2 class="title-type"><?=ucfirst($_GET['type'].'s') ?></h2>
    <?php } ?>
    <div class="container main"> 
        <?php if($resultado) { ?>
            <?php foreach($resultado as $row) { ?>
                <?php

                $id = $row['id'];
                $imagen = "images/productos/" .$id. ".png";

                if(!file_exists($imagen)){
                    $imagen = "images/no-photo.jpg";
                }

                ?>
                <div class="estate mt-4">
                    <div class="img-product">
                        <img src="<?= $imagen; ?>" alt="producto">
                        <p>$<?= $row['price'] ?> COP</p>
                    </div>
                    <div class="content">
                        <div class="row mt-5 h5">
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-center title-detalles">Detalles</div>
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-center fw-bold">Direccion</div>
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-center"><?= $row['address'] ?></div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 text-center des-title">Tipo</div>
                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 text-center descrip"><?= $row['type'] ?></div>
                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 text-center des-title">Dormitorios</div>
                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 text-center descrip"><?= $row['bedrooms'] ?></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 text-center des-title">Tamaño</div>
                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 text-center descrip"><?= $row['size'].'m²'?></div>
                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 text-center des-title">Garaje</div>
                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 text-center descrip"><?= $row['garage_cars']?$row['garage_cars'].' carros':'No'?></div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 text-center des-title">Años</div>
                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 text-center descrip"><?= $row['years'].' años' ?></div>
                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 text-center des-title">Ubicación</div>
                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 text-center descrip"><?= $row['type_zone'] ?></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 text-center des-title">Zona</div>
                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 text-center descrip"><?= $row['type_zone'] ?></div>
                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 text-center des-title">Chimenea</div>
                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 text-center descrip"><?= $row['pool']?'Si':'No' ?></div>
                        </div>
                    </div>
                </div>

            <?php } ?>
        <?php }else{ ?>
                <img src="images/no-found.png" alt="No se han encontrado los parametros" class="no-found">
                <h3 class="txt-found alert alert-danger">No se encuentran registros con los parametros mencionados.</h3>
            <?php } ?>
    </div>

    <div class="searcher">
        <p class="title-search">Busqueda Avanzada</p>
        <form action="index.php" class="form-section" method="POST">
             <div class="input-group-spec number">
                <label for="min_size">Tamaño mínimo</label>
                <p>m²</p>
                <input type="number" name="min_size" id="min_size" class="form-control">
             </div>

             <div class="input-group-spec number">
                <label for="max_size">Tamaño máximo</label>
                <p>m²</p>
                <input type="number" name="max_size" id="max_size" class="form-control">
             </div>

             <div class="input-group-spec number">
                <label for="bedrooms">Tamaño mínimo de dormitorios</label>
                <p>123</p>
                <input type="number" name="bedrooms" id="bedrooms" class="form-control">
             </div>

             <div class="input-group-spec number">
                <label for="year">Cantidad mínima de años</label>
                <p>123</p>
                <input type="number" name="year" id="year" class="form-control">
             </div>

             <div class="icheckbox">
                <label for="status">Tamaño de garaje (Carros)</label>
                <input type="checkbox" id="status"/>
                <label for="status" class="toggle"><span></span></label>
            </div>

            <div class="input-group-spec radio">
                <input type="radio" name="cars" id="cars_1" value="1"> <label for="cars_1">1</label>
                <input type="radio" name="cars" id="cars_2" value="2"> <label for="cars_2">2</label>
                <input type="radio" name="cars" id="cars_3" value="3+"> <label for="cars_3">3+</label>
             </div>

             <div class="input-group-spec dropbox">
                <label for="type_zone">Ubicacion</label>
                <select name="type_zone" id="type_zone" class="form-control">
                    <option selected>Indiferente</option>
                    <option value="ciudad">Ciudad</option>
                    <option value="rural">Rural</option>
                    <option value="suburbana">Suburbana</option>
                </select>
             </div>
             <div class="icheckbox">
                <label for="pool">Piscina</label>
                <input type="checkbox" name="pool" id="pool"/>
                <label for="pool" class="toggle"><span></span></label>
            </div>
            <div class="icheckbox">
                <label for="fireplace">Chimenea</label>
                <input type="checkbox" name="fireplace" id="fireplace"/>
                <label for="fireplace" class="toggle"><span></span></label>
            </div>

            <p class="label">Servicios</p>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="services" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Telefono
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="services" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Energia
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="services" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Gas
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="services" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Internet
                </label>
            </div>
                        <br>
            <input type="submit" value="Consultar" class="btn btn-submit">
        </form>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>

<script>
function addProducto(id, token) {
    let url = 'clases/carrito.php'
    let formData = new FormData()
    formData.append('id', id)
    formData.append('token', token)

    fetch(url, {
            method: 'POST',
            body: formData,
            mode: 'cors'

        }).then(response => response.json())
        .then(data => {
            if (data.ok) {
                let elemento = document.getElementById("num_cart")
                elemento.innerHTML = data.numero
            }
        })
}
</script>
</body>
<br>
<?php
include 'layout/footer.php';
?>

</html>