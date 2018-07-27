$(document).ready(function() {
	$('.form-login').submit(function(event) {
		if ($(this).attr('id') == 'no_ajax') {
			return;
		}
		var json;
		event.preventDefault();
		$('.errors').html('');
		if ($(this).find('.input-login').val() == '') {
			$('.errors').html('Заполните поле логин');

		} else if($(this).find('.input-password').val() == '') {
			$('.errors').html('Заполните поле пароль');
		}
 		else {


		$.ajax({
			type: $(this).attr('method'),
			url: $(this).attr('action'),
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function(result) {
				json = jQuery.parseJSON(result);
				if (json.url) {
					window.location.href = '/' + json.url;
				} else {
					//alert(json.status + ' - ' + json.message);
					$('.errors').html(json.message)
				}
			},
		});

		}
	});


	$('.form-reg').submit(function(event) {
		if ($(this).attr('id') == 'no_ajax') {
			return;
		}
		var json;
		event.preventDefault();
		$('.errors').html('');
		if ($(this).find('.input-email').val() == '') {
			$('.errors').html('Заполните поле email');
		} 
		else if($(this).find('.input-login').val() == '') {
			$('.errors').html('Заполните поле логин');
		}
		else if($(this).find('.input-fio').val() == '') {
			$('.errors').html('Заполните поле ФИО');
		}
		else if($(this).find('.input-password').val() == '') {
			$('.errors').html('Заполните поле пароль');
		}		
 		else {


		$.ajax({
			type: $(this).attr('method'),
			url: $(this).attr('action'),
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function(result) {
				json = jQuery.parseJSON(result);
				if (json.url) {
					window.location.href = '/' + json.url;
				} else {
					//alert(json.status + ' - ' + json.message);
					$('.errors').html(json.message);
				}
			},
		});

		}
	});

});