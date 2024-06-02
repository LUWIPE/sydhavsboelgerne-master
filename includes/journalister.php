<h5 class="text-primary">
    Journalister
</h5>
<!-- Karusel til forfattere -->
<div id="authorCarousel" class="carousel slide">

    <?php
    // Hent alle forfattere fra databasen
    $authors = $db->sql("SELECT * FROM author");
    // Del forfatterne op i grupper af tre
    $authorChunks = array_chunk($authors, 3);
    ?>
    <!-- Indhold af karusellen -->
    <div class="carousel-inner">
        <?php
        // Initialisér variabel til at tjekke om det er første slide
        $isFirst = true;
        foreach ($authorChunks as $authorChunk) : ?>
            <!-- Hvert slide i karusellen -->
            <div class="carousel-item <?php if ($isFirst) echo 'active'; ?>">
                <div class="row">
                    <?php foreach ($authorChunk as $author) : ?>
                        <!-- Hver forfatter i et slide -->
                        <div class="col-4">
                            <div class="card bg-transparent border-0">
                                <!-- Link til forfatterens side -->
                                <a href="<?php echo $author->authorPageUrl ?>">
                                    <!-- Billede af forfatteren -->
                                    <img src="<?php echo $author->authorImgSrc ?>" class="card-img-top p-1 img-fluid" alt="<?php echo $author->authorName ?>">
                                    <div class="card-body p-0 m-0">
                                        <!-- Navn på forfatteren -->
                                        <p class="fw-bold text-center m-0"><?php echo $author->authorName?></p>
                                    </div>
                                </a>
                            </div>
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
    <button class="carousel-control-prev" type="button" data-bs-target="#authorCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon visually-hidden" aria-hidden="true"></span>
        <span class="visually-hidden">Forrige</span>
    </button>
    <!-- Knappen til at skifte til næste slide -->
    <button class="carousel-control-next" type="button" data-bs-target="#authorCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon visually-hidden" aria-hidden="true"></span>
        <span class="visually-hidden">Næste</span>
    </button>
</div>

