
<?php
// Hent alle miniaturebilleder for videoer af typen "Explainer" fra databasen
$explainerthumbnails = $db->sql("SELECT * FROM content WHERE contentTypeId = 2");
?>
<div class="thumbnail-container col-10 col-sm-8">
    <?php foreach ($explainerthumbnails as $thumbnail) : ?>
        <!-- Hvert miniaturebillede repræsenterer en video -->
        <div class="thumbnail border-bottom" data-bs-toggle="modal" data-bs-target="#videoModal" onclick="scrollToVideo('<?php echo 'expl'.$thumbnail->contentId.$thumbnail->contentTypeId ?>')">
            <!-- Billede til miniaturebillede af video -->
            <img src="<?php echo $thumbnail->contentThumbnail ?>" class="img-fluid" alt="<?php echo $thumbnail->contentName ?>">
            <!-- Titel på video -->
            <h5 class="text-primary"><?php echo $thumbnail->contentName ?></h5>
            <!-- Beskrivelse af video -->
            <p><?php echo $thumbnail->contentDescription ?></p>
            <!-- Skjult input med videoens ID -->
            <input type="hidden" class="video-id" value="<?php echo $thumbnail->contentId.$thumbnail->contentTypeId.'expl' ?>">
        </div>
    <?php endforeach; ?>
</div>