<?php
require 'config/config.php';
require 'config/database.php';
require_once 'layout/header.php';
?>

<div class="container" margin="auto">
  <br>
  <h1 class="text-center">Contactenos...</h1>
  <div class="row mt-5 mb-5">
  <h2 class="text-center fw-bold mb-3">Bob Constructor SAS</h2>
    <div class="col-sm-6 text-center">
      <br>
      <p class="fw-bold ">Direccion</p>
      <p>Cl. 68 #111, Bogotá</p>
      <p class="fw-bold">Telefono</p>
      <p>+601 233 33 22</p>
      <p>+57 311 322 3222</p>

      <p class="fw-bold">Correo</p>
      <p>bobconstructorsas@gmal.com</p>
    </div>
    <div class="col-sm-6 text-center">
      <img src="images/maps.png" width="80%">
      <p class="text-center">Cl. 68 #111, Bogotá</p>
    </div>
  </div>
</div>
<?php
include 'layout/footer.php';
?>
