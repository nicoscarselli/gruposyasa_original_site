var projects;
var categories = null;
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
	var projects_div = $('.projects-container .list');
	projects_div.html('');

	$.each(projects, function (key, project) {
		var container = $('<div/>', {
			class: 'col-12 project-item'
		});

		var row = $('<div/>', {class: 'row'});
		var image_div = $('<div/>', {
			class: 'col-12 col-md-6 col-lg-4 image'
		});
		var info_div = $('<div/>', {
			class: 'col-12 col-md-6 col-lg-8 info'
		});

		row.append(image_div);
		row.append(info_div);
		container.append(row);

		//IMAGE
		if (project.main_image) {
			var images_folder = urls.project_images + '/' + project.id + '/';
			var thumb = $('<img/>', {
				src: images_folder + project.main_image,
				class: 'img-fluid'
			});
			image_div.append(thumb);
		}

		//CATEGORY OVERLAYS
		var categories_container = $('<div/>', {
			class: 'categories-container'
		});

		project.categories.forEach(function (category) {
			var cat_name = $.parseJSON(category.name);
			cat_name = cat_name[language];

			var category_div = $('<div/>', {
				class: 'category',
				html: cat_name
			});

			categories_container.append(category_div);
		});

		image_div.append(categories_container);

		//INFO
		var info_title = $('<div/>', {
			class: 'title',
			html: project.name
		});
		info_div.append(info_title);

		info_div.append(create_project_description(project));

		var details_button = $('<a/>', {
			html: localized.view_details,
			class: 'details-button',
			'data-href': urls.base_url + 'proyectos/proyecto/' + project.id
		});
		info_div.append(details_button);

		projects_div.append(container);
	});
}

function create_project_description(project) {
	return $('<div/>', {
		class: 'description',
		html: project.description
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

	$('.projects-container').on('click', '.details-button', function(e) {
		e.preventDefault();

		window.location.href = $(this).data('href') + ( (categories != null && categories.length) ? '?c=' + categories.toString() : '' );
	});

	$('.category-checkbox input[type=checkbox]').change(function (e) {
		update_categories();
		get_projects();
	});
});