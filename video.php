<?php
require "settings/init.php";
?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Videoer</title>

    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body class="bg-body-secondary">
<?php
include("includes/insertnav.php");
?>
<div id="dagensnyheder" class="container mb-2">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <?php
            $isVideo = true;
            include("includes/dagensnyheder.php");
            ?>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 mb-2 mt-2 pt-1 pb-3 bg-body-tertiary">
            <?php
            include("includes/kategorier.php");
            ?>
        </div>
        <div class="col-12 col-sm-8 col-md-8 mb-2 mt-2 pt-1 pb-3">
            <!-- Modal til videoafspilning -->
            <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen-md-down">
                    <!-- Modal indhold -->
                    <div class="modal-content" style="max-width: max-content; max-height: max-content; overflow: auto;">
                        <!-- Modal header -->
                        <div class="modal-header">
                            <!-- Modal titel -->
                            <h5 class="modal-title" id="videoModalLabel">Video Feed</h5>
                            <!-- Luk knap -->
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!-- Modal body/indhold -->
                        <div class="modal-body" style="scroll-snap-type: y mandatory; overflow-y: auto;">
                            <div class="container-fluid">
                                <div class="row">
                                    <?php
                                    // Hent videoer fra databasen
                                    $videocontent = $db->sql("SELECT * FROM content WHERE contentTypeId = 2");
                                    ?>
                                    <?php foreach ($videocontent as $shortform) : ?>
                                        <div class="col-12">
                                            <div class="video-container d-flex flex-column align-content-center" style="scroll-snap-align: start;">
                                                <!-- Videoafspiller -->
                                                <video id="<?php echo 'expl' . $shortform->contentId . $shortform->contentTypeId ?>" class="video mt-2" autoplay loop muted controls> <!-- sørger for at videoen afspilles, kører som loop og starter i en tilstand af "muted" - indsætter også video controls -->
                                                    <source src="<?php echo $shortform->contentSrc ?>" type="video/mp4">
                                                    Din browser understøtter ikke videoafspilleren. <!-- fallback besked -->
                                                </video>
                                                <!-- Video titel -->
                                                <h5 class="mt-2 mb-3"><?php echo $shortform->contentName ?></h5>
                                                <!-- Knapper til interaktion -->
                                                <div class="p-2 ps-0 mb-4">
                                                    <!-- Like knap -->
                                                    <button class="btn btn-outline-primary border-0 likebtn <?php echo 'expl'.$shortform->contentId ?>">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="visually-hidden bi bi-heart-fill" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
                                                        </svg>
                                                    </button>
                                                    <!-- Favorit knap -->
                                                    <button class="btn btn-outline-primary border-0 favbtn <?php echo 'expl'.$shortform->contentId ?>">
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
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Overskrift og knap til at åbne video feed -->
    <div class="row justify-content-center mb-5">
        <!-- Kolonne til overskrift og knap -->
        <div class="col-12 col-sm-8 col-md-4 col-lg-6 d-flex flex-column">
            <!-- Overskrift -->
            <h2 class="text-primary mb-1">Videoer</h2>
            <!-- Beskrivelsestekst -->
            <p class="text-primary mb-2">Velkommen til Sydhavsbølgernes videounivers, hvor vi hver dag ligger nye interessante historier og debatter op, fra dit lokalområde.<br><br>Her på siden kan du se korte videoindslag, hvor vi dækker det vigtigste af lokale og nationale nyheder og historier!</p>
            <!-- Knap til at åbne modal for video feed -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#videoModal" style="width: max-content">
                Åben video feed
            </button>
        </div>
        <!-- Kolonne til logo -->
        <div class="col-4 col-md-4 col-lg-2">
            <img src="images/sydhavetslogo.svg" alt="sydhavsbølgernes logo" class="d-none d-sm-block img-fluid">
        </div>
    </div>

    <!-- Videooversigt -->
    <div class="row justify-content-center">
        <!-- Overskrift for videooversigt -->
        <div class="col-12 col-md-8 mt-2 pt-3 pb-3 bg-body-tertiary d-flex justify-content-center flex-wrap">
            <h2 class="m-0">Videooversigt</h2>
        </div>
        <!-- Kolonne til at inkludere videofeed-thumbnails -->
        <div class="col-12 col-md-8 mb-2 pt-1 pb-3 bg-body-tertiary d-flex justify-content-center flex-wrap">
            <?php
            // Inkludér filen med thumbnails til videooversigten
            include("includes/vidthumbnails.php");
            ?>
        </div>
    </div>
</div>
<?php
include("includes/bottomnav.php");
?>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script>

    // Vælg modalen med id'et 'videoModal' og gem den i variablen 'videoModal'
    const videoModal = document.querySelector('#videoModal');

    // Vælg alle elementer med klassenavnet '.video' inden for modalen og gem dem i variablen 'videos'
    const videos = videoModal.querySelectorAll('.video');

    // Definér indstillingerne for den observer, der holder øje med om videoerne er synlige på skærmen
    const observerOptions = {
        root: null, // Vi ønsker ikke en specifik container for observationen, så vi sætter den til 'null'
        rootMargin: '0px', // Afstanden mellem skærmen og videoen, før observationen aktiveres, sættes til '0px'
        threshold: 0.5 // Vi ønsker at aktivere observationen, når mindst 50% af videoen er synlig på skærmen
    };

    // Opret en observer, der vil holde øje med om videoerne er synlige på skærmen
    const videoObserver = new IntersectionObserver((entries, observer) => {
        // For hver observeret indgang (video)
        entries.forEach(entry => {
            // Hvis videoen er synlig på skærmen
            if (entry.isIntersecting) {
                // Afspil videoen
                entry.target.play();
            } else {
                // Hvis videoen ikke er synlig på skærmen, sæt den på pause
                entry.target.pause();
            }
        });
    }, observerOptions);

    // Tilføj hver video til observeren, så vi kan holde øje med om de bliver synlige på skærmen
    videos.forEach(video => {
        videoObserver.observe(video);

        // Tilføj en eventlistener til hver video, så vi kan afspille/pause dem ved at klikke på dem
        video.addEventListener('click', () => {
            // Hvis videoen er på pause, afspil den, ellers sæt den på pause
            if (video.paused) {
                video.play();
            } else {
                video.pause();
            }
        });
    });

    // Lyt efter at modalen bliver skjult
    videoModal.addEventListener('hidden.bs.modal', function () {
        // Når modalen bliver skjult, sæt alle videoer på pause
        videos.forEach(video => {
            video.pause();
        });
    });

    // Vælg alle knapper med klassenavnet '.likebtn' eller '.favbtn' og gem dem i variablen 'buttons'
    const buttons = document.querySelectorAll('.likebtn, .favbtn');

    // Tilføj en eventlistener til hver knap, der aktiveres ved klik
    buttons.forEach(button => {
        button.addEventListener('click', () => {
            // Når knappen klikkes, skift synligheden af alle ikoner inden i knappen
            const svgs = button.querySelectorAll('svg');
            svgs.forEach(svg => {
                svg.classList.toggle('visually-hidden');
            });
        });
    });

    // Funktion til at rulle til en specifik video baseret på dens id
    function scrollToVideo(videoId) {
        // Lyt efter at modalen bliver vist én gang
        videoModal.addEventListener('shown.bs.modal', function () {
            // Find den specifikke video med id'et 'videoId' inden for modalen
            const video = videoModal.querySelector('#' + videoId);
            // Hvis videoen findes, rul til den med en glidende animation
            if (video) {
                video.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        }, { once: true }); // Sørg for, at denne event kun lyttes til én gang
    }

</script>
</body>
</html>