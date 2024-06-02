
<div id="serierCarousel" class="carousel slide">

    <?php
    $serier = $db->sql("SELECT * FROM series");
    $serierChunks = array_chunk($serier, 3);
    ?>
    <div class="carousel-inner">
        <?php
        $isFirst = true;
        foreach ($serierChunks as $serierChunk) : ?>
            <div class="carousel-item <?php if ($isFirst) echo 'active'; ?>">
                <div class="row">
                    <?php foreach ($serierChunk as $serie) : ?>
                        <div class="col-4">
                            <a href="<?php echo $serie->seriePageUrl ?>">
                                <img src="<?php echo $serie->serieImgSrc ?>" class="d-block w-100 p-1" alt="<?php echo $serie->serieName ?>">
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php
            $isFirst = false;
        endforeach; ?>
    </div>
    <button class="carousel-control-prev bg-body-tertiary" type="button" data-bs-target="#serierCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next bg-body-tertiary" type="button" data-bs-target="#serierCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
