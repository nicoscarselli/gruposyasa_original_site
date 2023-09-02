<section class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="subtitle"><?= localized('regional_reach_main_title'); ?></h2>
            <span class="separator"></span>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-12 text-center blue-text">
            <?= localized('regional_reach_main_subtitle'); ?>
        </div>
    </div>

    <?php $tabs = localized('regional_reach_tabs'); ?>
    <div class="row">
        <div class="col-12">
            <ul class="nav nav-tabs" id="regional-reach-tabs" role="tablist">
                <?php $first = true; ?>
                <?php foreach ($tabs as $index => $tab): ?>
                    <li class="nav-item regional-reach-tab">
                        <a class="nav-link <?= $first ? 'active' : ''; ?>"
                           id="<?= $index; ?>-tab" data-toggle="tab" href="#<?= $index; ?>" role="tab"
                           aria-controls="<?= $index; ?>" aria-selected="<?= ($first) ? 'true' : 'false'; ?>"><?= $tab['name']; ?></a>
                    </li>
                    <?php $first = false; ?>
                <?php endforeach; ?>
            </ul>

            <div class="tab-content" id="regional-reach-tab-container">
                <?php $first = true; ?>
                <?php foreach ($tabs as $index => $tab): ?>
                    <div class="tab-pane fade <?= ($first) ? 'show active' : ''; ?> regional-reach-tab-content" id="<?= $index; ?>" role="tabpanel" aria-labelledby="<?= $index; ?>-tab">
                        <img src="<?= base_url(); ?>images/regional_reach/<?= $tab['image']; ?>" />
                        <?= $tab['content']; ?>
                    </div>
                    <?php $first = false; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>