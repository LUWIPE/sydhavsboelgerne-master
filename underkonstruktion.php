<?php
require "settings/init.php";
?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Sydhavsbølgerne</title>

    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>

<div class="container"> <!-- Generel container for siden -->
    <div class="row justify-content-center"> <!-- Række til indholdet i midten -->
        <div class="col-12 col-md-8 mb-2 mt-2 pt-1 pb-3"> <!-- Kolonne til områder -->
            <h1 class="text-primary">Denne side er ikke tilgængelig</h1>
            <p class="fw-bold">Denne side er lige nu ikke tilgængelig, da den er under konstruktion.<br><br></p>
            <a href="index.php"><button class="btn btn-primary">
                Vend tilbage til forsiden
            </button></a>
        </div>
        <div class="col col-lg-5 d-flex">
            <!-- Vis logoet for Sydhavet -->
            <img src="images/sydhavetslogo.svg" alt="logo" class="img-fluid opacity-50">
        </div>

        <div class="col-12 col-md-8 mb-2 mt-2 pt-1 pb-3 bg-body-quatro"> <!-- Kolonne til journalister -->

        </div>
        <div class="col-12 col-md-8 mb-2 mt-2 pt-1 pb-3"> <!-- Kolonne til serier -->

        </div>
    </div>
</div>

<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script> <!-- Link til Bootstrap JavaScript-fil -->
</body>
</html>
