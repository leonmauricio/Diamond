$(document).ready(function () {

	$('#contact-form').validate({
		errorClass: 'form-control-feedback',
		highlight: function(element, errorClass) {
			$(element).addClass('form-control-danger').parent().addClass('has-danger');
		},
		unhighlight: function(element, errorClass) {
			$(element).removeClass('form-control-danger').parent().removeClass('has-danger');
		},
		rules: {
			name: {
				required: true
			},
			phone: {
				required: true,
				integer: true
			},
			email:{
				required: true,
				email:true
			},
			comment: {
				required: true,
				minlength: 50,
				maxlength: 150
			}
		},
		messages: {
			email: {
				required: "We need your email address to contact you",
				email: "Your email address must be in the format of name@domain.com"
			}
		}
	});

	$("#contact-form").submit(function (event) {
		var form = this,
			button = $(form).find('button');

		event.preventDefault();
		if (!$(form).valid()) {
			return false;
		}

		button.attr('disabled', 'disabled').html("<i class='fa fa-spinner fa-pulse'></i> Enviando...");

		$.ajax({
			url: $(form).attr('action'),
			type: "POST",
			dataType: 'json',
			data: $(form).serialize(),
			success: function(response) {
				if (response.success) {
					form.reset();
					button.removeAttr("disabled");
					button.text("Enviar");
					alert('Thank you');
				}
			}
		});
	});

	$('#book-store').validate({
		errorClass: 'form-control-feedback',
		highlight: function(element, errorClass) {
			$(element).addClass('form-control-danger').parent().addClass('has-danger');
		},
		unhighlight: function(element, errorClass) {
			$(element).removeClass('form-control-danger').parent().removeClass('has-danger');
		},
		rules: {
			name: {
				required: true
			},
			price: {
				required: true,
				integer: true
			},
			rating: {
				required: true,
				integer: true
			},
			description: {
				required: true
			},
			year: {
				required: true
			},
			discount: {
				required: true,
				integer: true

			}
		}
	});

	$("#book-store").submit(function (event) {
		var form = this;

		event.preventDefault();
		if (!$(form).valid()) {
			alert('no es valido');
			return false;
		}

		$.ajax({
			url: $(form).attr('action'),
			type: "POST",
			dataType: 'json',
			data: $(form).serialize(),
			success: function(response) {
				if (response.success) {
					form.reset();
					alert('Success!');
					window.location.href = '/books/admin';
				}
			}
		});	
	});

	$(".delete-book").click(function(event){
		var button = $(this),
			id = button.data('id');
		$.ajax({
			url: '/books/delete',
			type: 'POST',
			dataType: 'json',
			data: {id: id},
			success: function(response) {
				if (response.success) {
					button.closest('li').remove();
				}
			}
		});
	})

	$('#categories-store').validate({
		errorClass: 'form-control-feedback',
		highlight: function(element, errorClass) {
			$(element).addClass('form-control-danger').parent().addClass('has-danger');
		},
		unhighlight: function(element, errorClass) {
			$(element).removeClass('form-control-danger').parent().removeClass('has-danger');
		},
		rules: {
			name: {
				required: true
			}
		}
	});

	$("#categories-store").submit(function (event) {
		var form = this;

		event.preventDefault();
		if (!$(form).valid()) {
			alert('no es valido');
			return false;
		}

		$.ajax({
			url: $(form).attr('action'),
			type: "POST",
			dataType: 'json',
			data: $(form).serialize(),
			success: function(response) {
				if (response.success) {
					form.reset();
					alert('Success!');
					window.location.href = '/categories/admin';
				}
			}
		});	
	});

	$(".delete-category").click(function(event){
		var button = $(this),
			id = button.data('id');
		$.ajax({
			url: '/categories/delete',
			type: 'POST',
			dataType: 'json',
			data: {id: id},
			success: function(response) {
				if (response.success) {
					button.closest('li').remove();
				}
			}
		});
	})

	$('#authors-store').validate({
		errorClass: 'form-control-feedback',
		highlight: function(element, errorClass) {
			$(element).addClass('form-control-danger').parent().addClass('has-danger');
		},
		unhighlight: function(element, errorClass) {
			$(element).removeClass('form-control-danger').parent().removeClass('has-danger');
		},
		rules: {
			name: {
				required: true
			},
			surname: {
				required: true
			}

		}
	});

	$("#authors-store").submit(function (event) {
		var form = this;

		event.preventDefault();
		if (!$(form).valid()) {
			alert('no es valido');
			return false;
		}

		$.ajax({
			url: $(form).attr('action'),
			type: "POST",
			dataType: 'json',
			data: $(form).serialize(),
			success: function(response) {
				if (response.success) {
					form.reset();
					alert('Success!');
					window.location.href = '/authors/admin';
				}
			}
		});	
	});

	$(".delete-author").click(function(event){
		var button = $(this),
			id = button.data('id');
		$.ajax({
			url: '/authors/delete',
			type: 'POST',
			dataType: 'json',
			data: {id: id},
			success: function(response) {
				if (response.success) {
					button.closest('li').remove();
				}
			}
		});
	});
	
	$('#users-store').validate({
		errorClass: 'form-control-feedback',
		highlight: function(element, errorClass) {
			$(element).addClass('form-control-danger').parent().addClass('has-danger');
		},
		unhighlight: function(element, errorClass) {
			$(element).removeClass('form-control-danger').parent().removeClass('has-danger');
		},
		rules: {
			username: {
				required: true
			},
			password: {
				required: true
			},
			email: {
				required: true
			},
			name: {
				required: true
			},
			surname: {
				required: true
			}
		}
	});

	$("#users-store").submit(function (event) {
		var form = this;
		event.preventDefault();
		if (!$(form).valid()) {
			alert('no es valido');
			return false;
		}

		$.ajax({
			url: $(form).attr('action'),
			type: "POST",
			dataType: 'json',
			data: $(form).serialize(),
			success: function(response) {
				if (response.success) {
					form.reset();
					alert('Success!');
					window.location.href = '/users/admin';
				}
			}
		});	
	});

	$(".delete-user").click(function(event){
		var button = $(this),
			id = button.data('id');
		$.ajax({
			url: '/users/delete',
			type: 'POST',
			dataType: 'json',
			data: {id: id},
			success: function(response) {
				if (response.success) {
					button.closest('li').remove();
				}
			}
		});
	});

	$("#login").submit(function (event) {
		var form = this;

		event.preventDefault();
		if (!$(form).valid()) {
			alert('no es valido');
			return false;
		}

		$.ajax({
			url: $(form).attr('action'),
			type: "POST",
			dataType: 'json',
			data: $(form).serialize(),
			success: function (response) {
				if (response.success) {
					alert('Welcome back!');
					window.location.href = "/books/admin";
				} else {
					alert('Wrong password or username');
				}
			}
		});	
	});

	$("#order-store").submit(function (event) {
		var form = this;

		event.preventDefault();
		if (!$(form).valid()) {
			alert('no es valido');
			return false;
		}

		$.ajax({
			url: $(form).attr('action'),
			type: "POST",
			dataType: 'json',
			data: $(form).serialize(),
			success: function(response) {
				if (response.success) {
					form.reset();
					alert('Success!');
					window.location.href = '/';
				}
			}
		});	
	});

	$(".delete-from-cart").click(function(event){
		var button = $(this),
			id = button.data('id');
		$.ajax({
			url: '/cart/delete',
			type: 'POST',
			dataType: 'json',
			data: {id: id},
			success: function(response) {
				if (response.success) {
					window.location.reload();
				}
			}
		});
	});

});