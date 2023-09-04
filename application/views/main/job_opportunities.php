<?php
/**
 * @var Traduccion[] $translations
 * @var Idioma $language
 * @var Gender[] $genders
 * @var Country[] $countries
 * @var State[] $states
 * @var Title[] $titles
 * @var Job_area[] $job_areas
 * @var Currency[] $currencies
 */

/**
 * @param $code
 * @param Idioma $language
 * @param Traduccion[] $translations
 * @return string
 */

function translated($code, $language, $translations) {
    if (empty($translations)) die('No translations');

    foreach ($translations as $translation) {
        if ($translation->codigo_traduccion == $code
            && $translation->id_idioma == $language->id_idioma) {
            return $translation->descripcion;
        }
    }

    return '';
}
?>

<script>
    var states = [
        <?php foreach ($states as $state): ?>
        {
            id_recper_pais: <?= $state->id_recper_pais; ?>,
            id_recper_provincia: <?= $state->id_recper_provincia; ?>,
            nombre: "<?= translated($state->codigo_traduccion, $language, $translations); ?>"
        },
        <?php endforeach; ?>
    ];

    var countries = [
        <?php foreach ($countries as $country): ?>
            <?= json_encode($country); ?>,
        <?php endforeach; ?>
    ];
</script>


<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs d-flex align-items-center" style="background-image: url('<?= images_folder('header_oportunidades.png'); ?>');">
    <div class="container position-relative d-flex flex-column align-items-center">
           <h2><?= localized('job_opps_main_title'); ?></h2>
    </div>
</div>
<!-- End Breadcrumbs -->

<?php if (!empty(validation_errors()) || isset($error)): ?>
    <div class="row">
        <div class="col alert alert-danger">
            <?php if (!empty(validation_errors())) echo validation_errors();  ?>
            <?php if (isset($error)) echo $error; ?>
        </div>
    </div>
<?php endif; ?>


<section class="job_opportunities">

    <div class="container">


    <?php if (!isset($thank_you)): ?>
        <div class="row php-email-form justify-content-center">
            <div class="col-lg-6">
                <h2>Completa el formulario para que conozcamos tu experiencias</h2>
            </div>

            <div class="col-lg-5">
                <?= form_open_multipart('', ['id' => 'jobs-form']); ?>
                <div class="form-group">
                    <label for="nombre"><?= localized('job_opps_first_name'); ?></label>
                    <input type="text" name="nombre" id="nombre" class="form-control" value="<?= set_value('nombre'); ?>" />
                </div>

                <div class="form-group">
                    <label for="email"><?= localized('job_opps_email'); ?></label>
                    <input type="email" name="email" id="email" class="form-control" value="<?= set_value('email'); ?>" />
                </div>

                <div class="form-group">
                    <label for="fechanacimiento"><?= localized('job_opps_birthday'); ?></label>
                    <input type="text" name="fechanacimiento" id="fechanacimiento" class="form-control" value="<?= set_value('fechanacimiento'); ?>" />
                </div>

                <div class="form-group">
                    <label for="id_recper_sexo"><?= localized('job_opps_gender'); ?></label>
                    <select class="form-control" id="id_recper_sexo" name="id_recper_sexo">
                        <?php foreach ($genders as $gender): ?>
                            <option value="<?= $gender->id_recper_sexo; ?>" <?= set_radio('id_recper_sexo', $gender->id_recper_sexo, ($gender->id_recper_sexo == 1)); ?> />
                                <?= translated($gender->codigo_traduccion, $language, $translations); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="id_recper_pais"><?= localized('job_opps_country'); ?></label>
                    <select class="form-select" id="id_recper_pais" name="id_recper_pais">
                        <?php foreach ($countries as $country): ?>
                            <option value="<?= $country->id_recper_pais; ?>" data-currency-id="<?= $country->id_recper_moneda; ?>" <?= set_select('id_recper_pais', $country->id_recper_pais); ?>>
                                <?= translated($country->codigo_traduccion, $language, $translations); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="id_recper_provincia"><?= localized('job_opps_state'); ?></label>
                    <select class="form-control select2" id="id_recper_provincia" name="id_recper_provincia"></select>
                </div>

                <div class="form-group">
                    <label for="id_recper_areatrabajo"><?= localized('job_opps_job_area'); ?></label>
                    <select class="form-control select2" name="id_recper_areatrabajo" id="id_recper_areatrabajo">
                        <?php foreach ($job_areas as $area): ?>
                            <option value="<?= $area->id_recper_areatrabajo; ?>" <?= set_select('id_recper_areatrabajo', $area->id_recper_areatrabajo); ?>>
                                <?= translated($area->codigo_traduccion, $language, $translations); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="id_recper_moneda"><?= localized('job_opps_salary'); ?></label>
                    <div class="row">
                        <div class="col-lg-3 col-3">
                            <select class="form-control select2" name="id_recper_moneda" id="id_recper_moneda">
                                <?php foreach ($currencies as $currency): ?>
                                    <option value="<?= $currency->id_recper_moneda; ?>" <?= set_select('id_recper_moneda', $currency->id_recper_moneda); ?>>
                                        <?= translated($currency->codigo_traduccion, $language, $translations); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-lg-9 col-3">
                            <input type="text" class="col form-control" name="monto" id="monto" value="<?= set_value('monto'); ?>" />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>
                        <input type="checkbox" id="dispext" name="dispext" value="1" />
                            <?= localized('job_opps_work_abroad'); ?>
                    </label>
                </div>

                <div class="form-group">
                    <div class="cv-button-wrapper">
                        <button class="btn btn-secondary"><?= localized('job_opps_cv'); ?></button>
                        <input type="file" name="cv" id="cv" />
                        <span class="info"><?= localized('job_opps_cv_specs'); ?></span>
                    </div>
                </div>

                <div class="form-group text-center">
                    <button class="btn btn-primary"><?= localized('job_opps_submit'); ?></button>
                </div>

                <?= form_close(); ?>
            </div>
            
        </div>
    <?php else: //$thank_you isset?>

        <div class="row">
            <div class="d-none d-md-flex col-md-6">
                <img src="<?= images_folder('job_opportunities/jobs.jpg'); ?>" class="img-fluid" style="height: fit-content;"/>
            </div>
            <div class="col col-md-6">
                <div class="thank-you-header"><?= localized('job_opps_thank_you_header'); ?></div>
                <div class="thank-you-text"><?= localized('job_opps_thank_you_text'); ?></div>
            </div>
        </div>

    <?php endif; ?>

    </div>

</section>