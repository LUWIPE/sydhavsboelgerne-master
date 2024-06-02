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
// Inkludér navigationsmenuen
include("includes/insertnav.php");
?>
<div class="container mb-2">
    <div class="row justify-content-center m-2 p-2">
        <?php
        // Hent brugeren med ID 1 fra databasen
        $users = $db->sql("SELECT * FROM users WHERE userId = 1");
        // Gennemgå hver bruger
        foreach ($users as $user) :
            ?>
            <div class="col-4 col-md-4 col-lg-2 bg-body-tertiary p-2">
                <!-- Vis brugerens billede -->
                <img src="<?php echo $user->userImage ?>" class="img-fluid m-2" alt="User Image">
            </div>
            <div class="col-8 col-md-4 col-lg-4 bg-body-tertiary p-2">
                <!-- Vis brugerens navn -->
                <h4 class="ms-3 mt-2"><?php echo $user->userName ?></h4>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 mb-2 mt-2 pt-1 pb-3 bg-body-tertiary">
            <h5 class="text-primary">
                Mine favoritter
            </h5>
            <?php
            // Inkludér et placeholderslider for brugerens favoritter
            include("includes/placeholdercarousel.php");
            ?>
        </div>
        <div class="col-12 col-md-8 mb-2 mt-2 pt-1 pb-3">
            <h5 class="text-primary">
                Synes godt om
            </h5>
            <?php
            // Inkludér et placeholderslider for synes godt om-indhold
            include("includes/placeholdercarousel.php");
            ?>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-7 col-lg-5 d-flex">
            <!-- Vis logoet for Sydhavet -->
            <img src="images/sydhavetslogo.svg" alt="logo" class="img-fluid opacity-50">
        </div>
    </div>
</div>
<?php
// Inkludér bundnavigationsmenuen
include("includes/bottomnav.php");
?>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

