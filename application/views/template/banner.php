<div class="container-fluid header-banner">
    <div class="row">
        <div class="header-banner-owl owl-carousel">
            <?php $banner = localized('main_banner'); ?>
            <?php foreach ($banner as $item): ?>
                <div class="item" style="background-image: url('<?= images_folder('header_banner/' . $item['image']); ?>')">
                    <!--<div class="image">-->
                        <!--<img src="<?= images_folder('header_banner/' . $item['image']); ?>" />-->
                    <!--</div>-->
                    <div class="text">
                        <p class="align-self-center"><?= $item['text']; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>