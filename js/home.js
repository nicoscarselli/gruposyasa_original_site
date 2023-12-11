var $state_select = $('#id_recper_provincia');
var $country_select = $('#id_recper_pais');
var $birthday_picker = $('#fechanacimiento');
var $currency_picker = $('#id_recper_moneda');
var $cv_button_wrapper = $('.cv-button-wrapper');
var $cv_input = $('#cv');
var $jobs_form = $('#jobs-form');
var selected_country_id;

$(function() {
    $('.select2').select2();

    $jobs_form.validate({
        rules: {
            apellido: 'required',
            nombre: 'required',
            email: {
                email: true,
                required: true
            },
            fechanacimiento: {
                required: true,
                date: true
            },
            id_recper_sexo: 'required',
            id_recper_pais: 'required',
            id_recper_provincia: 'required',
            id_recper_areatrabajo: 'required',
            id_recper_moneda: 'required',
            monto: {
                required: true,
                number: true
            },
            cv: {
                required: true,
                extension: 'pdf|odt|ott|docx|doc'
            }
        }
    });

    $birthday_picker.datepicker({
        format: 'yyyy-mm-dd'
    });

    $cv_input.change(function(e) {
        var filename = e.target.files[0].name;
        $cv_button_wrapper.find('.btn').html(filename);
    });

    $country_select.on('change', function(e) {
        selected_country_id = $(this).val();

        //State changes
        $state_select.html('').val(null).trigger('change');
        $.each(states, function(index, state) {
            if (state.id_recper_pais == selected_country_id) {
                var option = $('<option/>', {
                    value: state.id_recper_provincia,
                    text: state.nombre
                });
                $state_select.append(option);
            }
        });

        $state_select.trigger('change');

        //Currency changes
        var currency_id;
        $.each(countries, function(index, country) {
            if (country.id_recper_pais == selected_country_id) {
                currency_id = country.id_recper_moneda;
            }
        });

        console.log('Currency id', currency_id);
        $currency_picker.val(currency_id).trigger('change');
    });

    //BOOT
    $country_select.trigger('change');
});

$('.news').owlCarousel({
    autoplay:true,
    autoplayTimeout:3000,
    loop:true,
    margin:30,
    dots: true,
    nav: true,
    navText: ["<div class='nav-button owl-prev'>‹</div>", "<div class='nav-button owl-next'>›</div>"],
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 2
        },
        1200: {
            items: 3
        }
    }
});

$(function() {
    $('.proyectos_destacados').owlCarousel({
        autoplay:true,
        autoplayTimeout:3000,
        loop:true,
        margin:30,
        dots: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1200: {
                items: 4
            }
        }
    });
});
