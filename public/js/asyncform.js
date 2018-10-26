$('form#form').submit(function(e) {
	e.preventDefault();
	var data = new FormData(this);
	console.log(data.get('file'));
	$.ajax({
		url: '/',
		type: 'post',
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		data: data,
		processData: false,
		contentType: false,
		success: function(result) {
			$('#message').html(
				`<div class="alert alert-success alert-dismissible" role="alert">
					Dane zostały pomyślnie zapisane.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>`);
		},
		error: function(error) {
			var errors = error.responseJSON.errors;
			var errorsArray = [];

			for (let error in errors) {
				if (errors.hasOwnProperty(error)) {
					errorsArray.push(...errors[error]);
				}
			}

			$('#message').html(
				`<div class="alert alert-danger alert-dismissible" role="alert">
					<strong>Błąd ${error.status}</strong><br>
					${errorsArray.join('<br>')}
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>`);
		}
	});
});