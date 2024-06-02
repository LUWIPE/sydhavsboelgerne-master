<h5 class="text-primary">
    Kategorier
</h5>
<!-- Karusel til kategorier -->
<div id="categoriesCarousel" class="carousel slide">

    <?php
    // Hent alle kategorier fra databasen
    $categories = $db->sql("SELECT * FROM category");
    // Del kategorierne op i grupper af tre
    $categoryChunks = array_chunk($categories, 3);
    ?>
    <!-- Indhold af karusellen -->
    <div class="carousel-inner">
        <?php
        // Initialisér variabel til at tjekke om det er første slide
        $isFirst = true;
        foreach ($categoryChunks as $chunk) : ?>
            <!-- Hvert slide i karusellen -->
            <div class="carousel-item <?php if ($isFirst) echo 'active'; ?>">
                <div class="row">
                    <?php foreach ($chunk as $category) : ?>
                        <!-- Hver kategori i et slide -->
                        <div class="col-4 d-flex justify-content-center">
                            <!-- Link til kategoriens side -->
                            <a href="<?php echo $category->catePageUrl ?>">
                                <!-- Billede for kategorien -->
                                <img src="<?php echo $category->cateImgSrc ?>" class="img-fluid p-1" width="100" height="100" alt="<?php echo $category->cateName ?>">
                                <!-- Navn på kategorien -->
                                <span class="d-flex justify-content-center"><?php echo $category->cateName ?></span>
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
    <button class="carousel-control-prev bg-body-tertiary" type="button" data-bs-target="#categoriesCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Forrige</span>
    </button>
    <!-- Knappen til at skifte til næste slide -->
    <button class="carousel-control-next bg-body-tertiary" type="button" data-bs-target="#categoriesCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Næste</span>
    </button>
</div>