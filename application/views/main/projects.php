<?php
/**
 * @var Project_region[] $regions
 * @var Project_category[] $categories
 * @var Project[] $projects
 */
?>

<!-- Search bar container -->
<section class="container">
    <?= form_open('', ['id' => 'search-form']); ?>
    <div class="row">
        <!-- Search bar -->
        <div class="col-12 col-md-8">
            <div class="input-group">
                <input type="text" class="form-control search-control" name="search" id="search" />
                <span class="input-group-btn">
                    <button class="btn btn-secondary search-button" type="button">
                        <span class="oi oi-magnifying-glass"></span>
                    </button>
                </span>
            </div>
        </div>

        <!-- Region switch -->
        <div class="col-12 col-md-4">
            <select name="region" id="region" class="form-control">
                <option value=""><?= localized('location'); ?></option>
                <option value=""><?= localized('all_locations'); ?></option>

                <?php foreach ($regions as $region): ?>
                    <option value="<?= $region->id; ?>"><?= $region->localized_name(); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <?= form_close(); ?>
</section>

<div class="container">
    <div class="row">
        <div class="col-12 section-separator"></div>
    </div>
</div>

<!-- Category selection container -->
<?php $checkbox_col = 'col-12 col-sm-6 col-md-4 col-lg-3'; ?>
<section class="container">
    <div class="row">
        <?php foreach ($categories as $category): ?>
            <?php $is_active_category = false; ?>
            <?php
                foreach ($projects as $project) {
                    foreach ($project->categories as $project_category) {
                        if ($category->id == $project_category->id) $is_active_category = true;
                    }
                }

                if (!$is_active_category) continue;
            ?>


            <div class="<?= $checkbox_col; ?> category-checkbox">
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="category"
                            data-id="<?= $category->id; ?>" />
                        <span></span>
                        <?= $category->localized_name(); ?>
                    </label>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<div class="container">
    <div class="row">
        <div class="col-12 section-separator"></div>
    </div>
</div>

<section class="container projects-container">
    <div class="row list">

    </div>
    <div class="row pagination">

    </div>
</section>