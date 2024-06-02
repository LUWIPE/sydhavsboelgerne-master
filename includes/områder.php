<h5 class="text-primary">
    Områder
</h5>
<div class="row">
    <!-- Karusel til områder -->
    <div id="areaCarousel" class="carousel slide">

        <?php
        // Hent alle områder fra databasen
        $areas = $db->sql("SELECT * FROM area");
        // Del områderne op i grupper af tre
        $areaChunks = array_chunk($areas, 3);
        ?>
        <!-- Indhold af karusellen -->
        <div class="carousel-inner">
            <?php
            // Initialisér variabel til at tjekke om det er første slide
            $isFirst = true;
            foreach ($areaChunks as $areaChunk) : ?>
                <!-- Hvert slide i karusellen -->
                <div class="carousel-item <?php if ($isFirst) echo 'active'; ?>">
                    <div class="row">
                        <?php foreach ($areaChunk as $area) : ?>
                            <!-- Hvert område i et slide -->
                            <div class="col-4">
                                <!-- Link til områdets side -->
                                <a href="<?php echo $area->areaPageUrl ?>">
                                    <!-- Billede af området -->
                                    <img src="<?php echo $area->areaImgSrc ?>" class="d-block w-100 p-1" alt="<?php echo $area->areaName ?>">
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php
                // Opdater variablen til at markere det første slide som aktivt
                $isFirst = false;
            endforeach; ?>
        </div>
        <!-- Knappen til at skifte til forrige slide -->
        <button class="carousel-control-prev bg-body-tertiary" type="button" data-bs-target="#areaCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Forrige</span>
        </button>
        <!-- Knappen til at skifte til næste slide -->
        <button class="carousel-control-next bg-body-tertiary" type="button" data-bs-target="#areaCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Næste</span>
        </button>
    </div>
</div>
