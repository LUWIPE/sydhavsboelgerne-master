<style>
    /* Styling til kontrolknapperne for at navigere i karusellen */
    .carousel-control-prev,
    .carousel-control-next {
        width: 10%; /* Sæt bredden af kontrolknapperne til 10% af bredden */
    }
</style>

<!-- Overskrift for karusellen -->
<h3 class="text-primary">
    Seneste
</h3>

<!-- Karusellelement -->
<div id="currentNewsCarousel" class="carousel slide d-flex flex-column">
    <div class="row">
        <!-- Kontrolknap til at navigere til forrige slide -->
        <button class="carousel-control-prev" type="button" data-bs-target="#currentNewsCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Forrige</span>
        </button>

        <?php
        // Vælg indhold baseret på om det er en podcast, video eller andet
        if ($isPodcast) {
            $currentcontent = $db->sql("SELECT * FROM content WHERE contentStatus = 1 AND contentTypeId = 1");
        } elseif ($isVideo) {
            $currentcontent = $db->sql("SELECT * FROM content WHERE contentStatus = 1 AND contentTypeId = 2");
        } else {
            $currentcontent = $db->sql("SELECT * FROM content WHERE contentStatus = 1");
        }
        ?>

        <!-- Karusel-indhold -->
        <div class="carousel-inner p-0">
            <?php
            $isFirst = true; // Variabel til at kontrollere, om det er det første slide
            foreach ($currentcontent as $content) :
                ?>
                <div class="carousel-item <?php if ($isFirst) echo 'active'; ?>" >
                    <!-- Link til indholdssiden -->
                    <a href="<?php echo $content->contentPageUrl ?>" class="d-flex justify-content-center" <?php if ($isPodcast) echo 'data-bs-toggle="modal" data-bs-target="#podcastModal"'; elseif ($isVideo) echo 'data-bs-toggle="modal" data-bs-target="#videoModal"' ?>>
                        <!-- Billede for det aktuelle indhold -->
                        <img src="<?php echo $content->contentCurrentThumbnailSrc ?>" class="d-block w-75 p-1" alt="<?php echo $content->contentName ?>">
                    </a>
                </div>
                <?php
                $isFirst = false; // Efter det første slide, sæt variablen til falsk
            endforeach;
            ?>
        </div>

        <!-- Kontrolknap til at navigere til næste slide -->
        <button class="carousel-control-next" type="button" data-bs-target="#currentNewsCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Næste</span>
        </button>
    </div>

    <!-- Karusel-indikatorer -->
    <div class="carousel-indicators m-0 position-relative row">
        <?php
        $index = 0; // Indeks for slides
        $isFirst = true; // Variabel til at kontrollere, om det er det første slide
        foreach ($currentcontent as $content) :
            ?>
            <!-- Indikator for hvert slide -->
            <button type="button" data-bs-target="#currentNewsCarousel" data-bs-slide-to="<?php echo $index; ?>" <?php if ($isFirst) echo 'class="active" aria-current="true"'; ?> aria-label="Slide <?php echo $index + 1; ?>"></button>
            <?php
            $isFirst = false; // Efter det første slide, sættes variablen til falsk
            $index++; // indsætter flere indikatore
        endforeach;
        ?>
    </div>
</div>
