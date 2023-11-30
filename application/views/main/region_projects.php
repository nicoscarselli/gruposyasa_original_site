<?php
/**
 * @var Project_region[] $regions
 * @var Project_category[] $categories
 * @var Project[] $projects
 */
?>

<style>
.mb-8 {
    margin-bottom: 2rem;
}
.breadcrumbs div.container>h2.uppercase
{
    text-transform: uppercase;
}
</style>

<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs d-flex align-items-center text-center" style="background-image: url('<?= images_folder('header_proyectos.png'); ?>');">
    <div class="container position-relative align-items-center">
        <h2 class="uppercase"><?php echo json_decode($region[0]->name)->es; ?></h2>
        <a href="<?= site_url(); ?>">Home</a> / <a href="<?= site_url('#proyectos'); ?>"><?= localized('projects'); ?></a>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Search bar container -->
<section>
    <div class="container">


    </div>
</section>



<div class="proyectos">
    <div class="container">
        <div class="row gy-4 portfolio-container mb-8">
            <?php foreach($projects as $project){ ?>
            <div class="col-lg-4 col-md-6 portfolio-item">
                <div class="portfolio-content">
                    <div>
                        <img
                            src="https://www.gruposyasa.com/webpagedemo/project_files/<?php echo $project->id; echo '/'; echo $project->main_image;?>">
                    </div>
                    <div class="portfolio-info">
                        <div>
                            <h4><?php echo json_decode($project->region_name)->es; ?></h4>
                        </div>
                        <p><?php echo $project->name; ?></p><a class="ver-mas"
                            href="https://www.gruposyasa.com/webpagedemo/proyectos/proyecto/<?php echo $project->id; ?>">Ver
                            detalles</a>
                    </div>
                </div>
            </div>

            <?php } ?>
        </div>
        <div class="row pagination">

        </div>
    </div>

</div>