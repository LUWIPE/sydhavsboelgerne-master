<?php
require "settings/init.php";
?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Podcasts</title>

    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body class="bg-body-secondary">
<?php
include("includes/insertnav.php"); // Inkludér navigationsmenuen
?>

<div id="dagensnyheder" class="container mb-2"> <!-- Container til dagens nyheder -->
    <div class="row justify-content-center"> <!-- Række til at justere indholdet til midten -->
        <div class="col-12 col-md-8">
            <?php
            $isPodcast = true; // Angiver, at vi viser podcasts
            include("includes/dagensnyheder.php"); // Inkludér dagens nyheder
            ?>
        </div>
    </div>
</div>
<div class="container"> <!-- Generel container -->
    <div class="row mb-3 bg-body-tertiary flex-column flex-lg-row justify-content-lg-between"> <!-- Række til at justere indholdet til midten -->
        <div class="col col-lg-5"> <!-- Kolonne til podcast-info -->
            <h2 class="text-primary mb-1 mt-1">Podcasts</h2> <!-- Overskrift for podcasts -->
            <p class="text-primary mb-1">Velkommen til Sydhavsbølgernes podcasts, hvor vi hver dag lægger nye interessante historier og debatter op fra dit lokalområde.</p> <!-- Beskrivelse af podcasts -->
        </div>
        <div class="col-12 col-md-8 col-lg-5 mb-2 mt-2 pt-1 pb-3 d-flex flex-column"> <!-- Kolonne til serier -->
            <?php
            include("includes/serier.php"); // Inkludér serier
            ?>
        </div>
    </div>
</div>
<div class="container"> <!-- Generel container -->
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 mb-2 mt-2 pt-1 pb-3">
            <?php
            include("includes/kategorier.php"); // Inkludér kategorier
            ?>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 mb-2 mt-2 pt-1 pb-3">
            <h5 class="text-primary">Dagens Sydhavsbølger</h5> <!-- Overskrift for dagens Sydhavsbølger -->
            <div id="dagensCarousel" class="carousel slide"> <!-- Karusel til dagens Sydhavsbølger -->

                <?php
                $contentsDagens = $db->sql("SELECT * FROM content WHERE contentSeriesId = 1"); // Hent indhold til dagens Sydhavsbølger
                $contentDagensChunks = array_chunk($contentsDagens, 3); // Deler indholdet op i grupper af tre
                ?>
                <div class="carousel-inner"> <!-- Indhold af karusellen -->
                    <?php
                    $isFirst = true;
                    foreach ($contentDagensChunks as $contentDagensChunk) : ?>
                        <div class="carousel-item <?php if ($isFirst) echo 'active'; ?>"> <!-- Element i karusellen -->
                            <div class="row">
                                <?php foreach ($contentDagensChunk as $dagensContent) : ?>
                                    <div class="col-4"> <!-- Kolonne til hvert indhold -->
                                        <img src="<?php echo $dagensContent->contentThumbnail ?>" class="d-block w-100 p-1" alt="<?php echo $dagensContent->contentName ?>" data-bs-toggle="modal" data-bs-target="#podcastModal"> <!-- Billede til indhold -->
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php
                        $isFirst = false;
                    endforeach; ?>
                </div>
                <button class="carousel-control-prev bg-body-tertiary" type="button" data-bs-target="#dagensCarousel" data-bs-slide="prev"> <!-- Knappen for at skifte til forrige slide -->
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next bg-body-tertiary" type="button" data-bs-target="#dagensCarousel" data-bs-slide="next"> <!-- Knappen for at skifte til næste slide -->
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="col-12 col-md-8 mb-2 mt-2 pt-1 pb-3">
            <?php
            include("includes/områder.php"); // Inkludér områder
            ?>
        </div>
        <div class="col-12 col-md-8 mb-2 mt-2 pt-1 pb-3">
            <!-- Modal til podcastafspilning -->
            <div class="modal fade" id="podcastModal" tabindex="-1" aria-labelledby="podcastModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-fullscreen-md-down">
                    <!-- Modal indhold -->
                    <div class="modal-content" style="max-width: 100vw; max-height: max-content; overflow: auto;">
                        <!-- Modal header -->
                        <div class="modal-header">
                            <!-- Modal titel -->
                            <h5 class="modal-title" id="podcastModalLabel">Dagens Sydhavsbølger</h5>
                            <!-- Luk knap -->
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!-- Modal body/indhold -->
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row justify-content-center">
                                    <?php
                                    $podcastcontent = $db->sql("SELECT * FROM content WHERE contentId = 1");
                                    ?>
                                    <?php
                                    // Hent podcasts fra databasen med typen 1 som er podcast

                                    ?>
                                    <?php foreach ($podcastcontent as $podcast) : ?>
                                        <div class="col-10 col-smg-8 col-sm-6 col-md-6 col-lg-6 p-2" id="<?php echo 'podc' . $podcast->contentId . $podcast->contentTypeId ?>">
                                            <div class="podcast-container d-flex flex-column align-content-center" style="scroll-snap-align: start;">
                                                <!-- Podcastafspiller -->
                                                <video id="<?php echo 'podc' . $podcast->contentId ?>" class="podcast mt-2" controls> <!-- indsætter podcast controls -->
                                                    <source src="<?php echo $podcast->contentSrc ?>" type="video/mp4">
                                                    Din browser understøtter ikke podcastafspilleren. <!-- fallback besked -->
                                                </video>
                                                <!-- Podcast titel -->
                                                <h5 class="mt-2 mb-3"><?php echo $podcast->contentName ?></h5>
                                                <!-- Knapper til interaktion -->
                                                <div class="p-2 ps-0 mb-4">
                                                    <!-- Like knap -->
                                                    <button class="btn btn-outline-primary border-0 likebtn <?php echo 'podc' . $podcast->contentId ?>">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="visually-hidden bi bi-heart-fill" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
                                                        </svg>
                                                    </button>
                                                    <!-- Favorit knap -->
                                                    <button class="btn btn-outline-primary border-0 favbtn <?php echo 'podc' . $podcast->contentId ?>">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-bookmark" viewBox="0 0 16 16">
                                                            <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1z"/>
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="visually-hidden bi bi-bookmark-fill" viewBox="0 0 16 16">
                                                            <path d="M2 2v13.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2"/>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="serie-container d-flex flex-column align-content-center">
                                            <?php
                                            // Hent podcastserier fra databasen med id 1
                                            $podcastseries = $db->sql("SELECT * FROM content WHERE contentSeriesId = 1");
                                            // Initialisére tæller variablen
                                            $counter = 1;
                                            ?>
                                            <?php foreach ($podcastseries as $series) : ?>
                                                <!-- Start på hver serie -->
                                                <div class="d-flex flex-row pt-2 pb-2 border rounded-2 border-primary-subtle justify-content-evenly align-items-center">
                                                    <!-- Billede af podcastserien -->
                                                    <img src="<?php echo $series->contentThumbnail ?>" class="img-fluid" style="max-height: 80px;" alt="<?php echo $series->contentName ?>">
                                                    <!-- Titel på podcastserien -->
                                                    <p class="fw-bold m-0"><?php echo $series->contentName ?></p>
                                                    <!-- Vis tallet, som stiger med 1 for hvert element, altså episodetallet -->
                                                    <div class="d-flex"><?php echo $counter++; ?></div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php
include("includes/bottomnav.php"); // Inkludérer bundnavigationsmenuen
?>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script> <!-- Link til Bootstrap JavaScript-fil -->
</body>
</html>
