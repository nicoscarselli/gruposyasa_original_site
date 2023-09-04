<?php
/**
 * @var Project_region[] $regions
 * @var Project_category[] $categories
 * @var Project[] $projects
 */
?>

<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs d-flex align-items-center" style="background-image: url('<?= images_folder('header_proyectos.png'); ?>');">
    <div class="container position-relative d-flex flex-column align-items-center">
           <h2><?= localized('projects_title'); ?></h2>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Search bar container -->
<section>
    <div class="container">
        <?= form_open('', ['id' => 'search-form']); ?>
        <div class="row proyectos">
            <!-- Search bar -->
            <div class="col-lg-6">
                <div class="input-group">
                    <input type="text" class="form-control search-control" name="search" id="search" />
                    <span class="input-group-btn">
                        <button class="btn btn-secondary search-button" type="button">
                            <span class="bi bi-search"></span>
                        </button>
                    </span>
                </div>
            </div>
            <!-- Search bar -->

            <!-- Region switch -->
            <div class="col-lg-6">
                <select name="region" id="region" class="form-select">
                    <option value=""><?= localized('location'); ?></option>
                    <option value=""><?= localized('all_locations'); ?></option>

                    <?php foreach ($regions as $region): ?>
                        <option value="<?= $region->id; ?>"><?= $region->localized_name(); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <?= form_close(); ?>

        <div class="row mt-4">
            <div class="col-lg-12">
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

                    <div class="category-checkbox">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="category" data-id="<?= $category->id; ?>" /> <?= $category->localized_name(); ?>
                            </label>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>



<div class="proyectos">

    <div class="container">
        <div class="row gy-4 portfolio-container ">

        </div>
        <div class="row pagination">

         </div>
    </div>

</div>