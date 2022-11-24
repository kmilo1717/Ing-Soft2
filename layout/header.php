<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bob Constructor</title>
    <link rel="icon" type="image/jpg" href="images/logo.jpg">

    <link rel="stylesheet" href="css/estilos.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://www.paypal.com/sdk/js?client-id=<?php echo CLIENT_ID; ?>&currency=<?php echo CURRENCY;?>">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <header>

        <div class="navbar navbar-expand-lg navbar-main">
            <div class="container">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader"
                    aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarHeader">
                    <ul class="navbar-nav me-auto mb-2 nav-options-header">
                        <li class="nav-item">
                            <a href="index.php?type=casa" class="nav-link">Casas</a>

                        </li>

                        <li class="nav-item">
                            <a href="index.php?type=apartamento" class="nav-link">Apartamentos</a>
                        </li>

                        <li class="nav-item">
                            <img src="images/logo.png" class="logo-main" alt="logo">
                        </li>

                        <li class="nav-item">
                            <a href="nosotros.php" class="nav-link">Nosotros</a>
                        </li>

                        <li class="nav-item">
                            <a href="contactenos.php" class="nav-link">Contactenos</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
