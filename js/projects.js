var projects;
var categories;
var region;
var search_text;

function get_projects(callback) {
	$.ajax({
		method: 'POST',
		url: urls.ajax_projects,
		data: {
			categories: categories,
			region: region,
			search: search_text
		}
	}).done(function (response) {
		console.log(response);

		if (response.status === 'success') {
			projects = response.projects;

			render_projects();
			if (typeof callback === 'function') callback();
		} else {
			swal({
				title: localized.error_title,
				text: localized.connection_error,
				icon: 'error'
			});
		}
	}).fail(function (jqXHR, status) {
		console.log(status);

		swal({
			title: localized.error_title,
			text: localized.connection_error,
			icon: 'error'
		});
	});
}

function render_projects() {
	var projects_div = $('.proyectos .container .row');
	projects_div.html('');

	$.each(projects, function (key, project) {
		var container = $('<div/>', {class: 'col-lg-4 col-md-6 portfolio-item'});
		var portfolio_content = $('<div/>', {class: 'portfolio-content'});
		var image_div = $('<div/>');
		var info = $('<div/>', {class: 'portfolio-info'});
		
		container.append(portfolio_content);
		portfolio_content.append(image_div);
		portfolio_content.append(info);
		

		//IMAGE
		if (project.main_image) {
			var images_folder = urls.project_images + '/' + project.id + '/';
			var thumb = $('<img/>', {
				src: images_folder + project.main_image,
			});
			image_div.append(thumb);
		}

		//CATEGORY OVERLAYS
		var categories_container = $('<div/>',);

		project.categories.forEach(function (category) {
			var cat_name = $.parseJSON(category.name);
			cat_name = cat_name[language];

			var category_div = $('<h4/>', {
				html: cat_name
			});

			categories_container.append(category_div);
		});

		info.append(categories_container);

		//INFO
		var info_title = $('<p/>', {html: project.name});
		info.append(info_title);

		var details_button = $('<a/>', {
			html: localized.view_details,
			class: 'ver-mas',
			'href': urls.base_url + 'proyectos/proyecto/' + project.id
		});
		info.append(details_button);

		projects_div.append(container);
	});
}

function update_categories() {
	categories = [];

	$('.category-checkbox input[type=checkbox]').each(function () {
		if (this.checked) {
			categories.push($(this).data('id'));
		}
	});
}
get_projects();

$(function () {
	$('#region').change(function (e) {
		e.preventDefault();

		region = $(this).val();
		get_projects();
	});

	$('#search').keydown(function (e) {
		if (e.which == 13) {
			e.preventDefault();
			$('.search-button').trigger('click');
		}
	});

	var search_timer;
	$('#search').change(function () {
		clearTimeout(search_timer);
		search_timer = setTimeout(function () {
			search_text = $('#search').val();
			get_projects();
		}, 100);
	});

	$('.search-button').click(function (e) {
		e.preventDefault();

		search_text = $('#search').val();
		get_projects();
	});

	$('.proyectos').on('click', '.details-button', function(e) {
		e.preventDefault();

		window.location.href = $(this).data('href') + ( (categories != null && categories.length) ? '?c=' + categories.toString() : '' );
	});

	$('.category-checkbox input[type=checkbox]').change(function (e) {
		update_categories();
		get_projects();
	});
});