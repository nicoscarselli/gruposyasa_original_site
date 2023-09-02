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

<section class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="subtitle"><?= localized('job_opps_main_title'); ?></h2>
            <span class="separator"></span>
        </div>
    </div>

    <?php if (!empty(validation_errors()) || isset($error)): ?>
        <div class="row">
            <div class="col alert alert-danger">
                <?php if (!empty(validation_errors())) echo validation_errors();  ?>
                <?php if (isset($error)) echo $error; ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if (!isset($thank_you)): ?>
        <div class="row">
            <div class="d-none d-md-flex col-md-6">
                <img src="<?= images_folder('job_opportunities/jobs.jpg'); ?>" class="img-fluid" style="height: fit-content;"/>
            </div>

            <div class="col col-md-6">
                <?= form_open_multipart('', ['id' => 'jobs-form']); ?>
                <div class="form-group">
                    <label for="apellido"><?= localized('job_opps_last_name'); ?></label>
                    <input type="text" name="apellido" id="apellido" class="form-control" value="<?= set_value('apellido'); ?>" />
                </div>

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
                    <div class="form-check">
                        <?php foreach ($genders as $gender): ?>
                            <label class="form-check-label">
                                <input type="radio" id="id_recper_sexo" name="id_recper_sexo"
                                       value="<?= $gender->id_recper_sexo; ?>" <?= set_radio('id_recper_sexo', $gender->id_recper_sexo, ($gender->id_recper_sexo == 1)); ?> />
                                <?= translated($gender->codigo_traduccion, $language, $translations); ?>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="id_recper_pais"><?= localized('job_opps_country'); ?></label>
                    <select class="form-control select2" id="id_recper_pais" name="id_recper_pais">
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
                    <label for="ciudad"><?= localized('job_opps_city'); ?></label>
                    <input type="text" class="form-control" id="ciudad" name="ciudad" value="<?= set_value('ciudad'); ?>" />
                </div>

                <div class="form-group">
                    <label for="telefono"><?= localized('job_opps_phone'); ?></label>
                    <input type="text" class="form-control" id="telefono" name="telefono" value="<?= set_value('telefono'); ?>" />
                </div>

                <div class="form-group">&nbsp;</div>

                <div class="form-group">
                    <label for="id_recper_titulo"><?= localized('job_opps_job_title'); ?></label>
                    <select class="form-control select2" name="id_recper_titulo" id="id_recper_titulo">
                        <?php foreach ($titles as $title): ?>
                            <option value="<?= $title->id_recper_titulo; ?>" <?= set_select('id_recper_titulo', $title->id_recper_titulo); ?>>
                                <?= translated($title->codigo_traduccion, $language, $translations); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
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
                    <label for="anioexperiencia"><?= localized('job_opps_years_experience'); ?></label>
                    <input type="text" class="form-control" id="anioexperiencia" name="anioexperiencia" value="<?= set_value('monto', 0); ?>" />
                </div>

                <div class="form-group">
                    <label for="id_recper_moneda"><?= localized('job_opps_salary'); ?></label>
                    <div class="form-row">
                        <div class="col-6 col-md-3">
                            <select class="form-control select2" name="id_recper_moneda" id="id_recper_moneda">
                                <?php foreach ($currencies as $currency): ?>
                                    <option value="<?= $currency->id_recper_moneda; ?>" <?= set_select('id_recper_moneda', $currency->id_recper_moneda); ?>>
                                        <?= translated($currency->codigo_traduccion, $language, $translations); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-6 col-md-9">
                            <input type="text" class="col form-control" name="monto" id="monto" value="<?= set_value('monto'); ?>" />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" id="dispext" name="dispext" value="1" />
                            <?= localized('job_opps_work_abroad'); ?>
                        </label>
                    </div>
                </div>

                <div class="form-group text-center">
                    <div class="cv-button-wrapper">
                        <button class="btn"><?= localized('job_opps_cv'); ?></button>
                        <input type="file" name="cv" id="cv" />
                        <span class="info"><?= localized('job_opps_cv_specs'); ?></span>
                    </div>
                </div>

                <div class="form-group text-center">
                    <button class="job-opps-submit"><?= localized('job_opps_submit'); ?></button>
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
</section>