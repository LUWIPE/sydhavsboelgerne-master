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

<body class="bg-body-secondary">
<?php
include("includes/insertnav.php"); // Inkludér navigationsmenuen i toppen
?>
<div id="dagensnyheder" class="container mb-2"> <!-- Container til dagens nyheder -->
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <?php
            include("includes/dagensnyheder.php"); // Inkludére dagens nyheder-karusellen
            ?>
        </div>
    </div>
</div>
<div class="container"> <!-- Generel container for siden -->
    <div class="row justify-content-center"> <!-- Række til indholdet i midten -->
        <div class="col-12 col-md-8 mb-2 mt-2 pt-1 pb-3 bg-body-tertiary"> <!-- Kolonne til kategorier -->
            <?php
            include("includes/kategorier.php"); // Inkludére kategorier-karusellen
            ?>
        </div>
        <div class="col-12 col-md-8 mb-2 mt-2 pt-1 pb-3"> <!-- Kolonne til områder -->
            <?php
            include("includes/områder.php"); // Inkludére områder-karusellen
            ?>
        </div>
        <div class="col-12 col-md-8 mb-2 mt-2 pt-1 pb-3 bg-body-quatro"> <!-- Kolonne til journalister -->
            <?php
            include("includes/journalister.php"); // Inkludére journalister-karusellen
            ?>
        </div>
        <div class="col-12 col-md-8 mb-2 mt-2 pt-1 pb-3"> <!-- Kolonne til serier -->
            <?php
            include("includes/serier.php"); // Inkludére serier-karusellen
            ?>
        </div>
    </div>
</div>
<?php
include("includes/bottomnav.php"); // Inkludére bundnavigationsmenuen
?>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script> <!-- Link til Bootstrap JavaScript-fil -->
</body>
</html>