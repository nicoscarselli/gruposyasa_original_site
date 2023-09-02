<section class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="subtitle"><?= localized('our_services_main_title'); ?></h2>
            <span class="separator"></span>
        </div>

        <div class="col-12">
            <div class="row">
                <div class="col-3 d-none d-md-block">
                    <img src="<?= images_folder('section_icons/icon_1.png'); ?>" />
                </div>

                <div class="col-12 col-md-9">
                    <div class="section-subtitle blue-text"><?= localized('our_services_construction_mgmt_subtitle'); ?></div>
                    <div class="blue-text"><?= localized('our_services_construction_mgmt_content'); ?></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container-fluid grey-section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 mb-4 col-right-border">
                <div class="row">
                    <?php $list = localized('our_services_construction_list'); ?>
                    <?php foreach ($list as $index => $item): ?>
                        <?php $margin = (count($list) == $index + 1) ? '' : 'mb-4'; ?>

                        <div class="col-2 align-self-center text-right <?= $margin; ?>">
                            <img src="<?= images_folder('bullets/bullet_' . ($index + 1) . '.png'); ?>" />
                        </div>
                        <div class="col-10 align-self-center <?= $margin; ?>"><?= $item; ?></div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="col-12 col-md-6 mb-4">
                <div class="row">
                    <div class="col-12 blue-text mb-5"><?= localized('our_services_right_text'); ?></div>
                    <div class="col-12">
                        <img src="<?= images_folder('our_services/construction_sequences_' . user_language(true) . '.png'); ?>" class="responsive"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container">
    <div class="row">
        <div class="col-12 mb-4">
            <div class="section-subtitle blue-text"><?= localized('processes_management_title'); ?></div>
        </div>
        <div class="col-12 blue-text">
            <?= localized('processes_management_content'); ?>
        </div>
    </div>
</section>

<section class="container-fluid grey-section">
    <div class="container">
        <?php
            $management_table = localized('management_table');
            $team_table = localized('team_table');
        ?>
        <div class="row">
            <div class="col-6 col-md-5 text-center">
                <div class="section-subtitle blue-text text-center"><?= $management_table['title']; ?></div>
            </div>
            <div class="d-none d-md-block col-md-2">&nbsp;</div>
            <div class="col-6 col-md-5 text-center">
                <div class="section-subtitle blue-text text-center"><?= $team_table['title']; ?></div>
            </div>
        </div>

        <div class="row">
            <div class="col-5 align-self-center">
                <div class="text-center">
                    <ul class="simple-ul">
                        <?php foreach ($management_table['items'] as $item): ?>
                            <li class="blue-text"><?= $item; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="col-2 text-center">
                <img src="<?= images_folder('our_services/separador.png'); ?>" />
            </div>
            <div class="col-5 align-self-center">
                <div class="text-left">
                    <ul class="simple-ul">
                        <?php foreach ($team_table['items'] as $item): ?>
                            <li class="blue-text mb-1"><?= $item; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container">
    <div class="row mb-5">
        <div class="col-12 mb-4">
            <div class="section-subtitle blue-text"><?= localized('our_services_due_diligence_title'); ?></div>
        </div>
        <div class="col-12 blue-text">
            <?= localized('our_services_due_diligence_content'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mb-4">
            <div class="section-subtitle blue-text"><?= localized('our_services_pre_construction_title'); ?></div>
        </div>
        <div class="col-12 blue-text">
            <?= localized('our_services_pre_construction_content'); ?>
        </div>
    </div>
</section>