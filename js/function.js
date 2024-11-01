jQuery(document).ready(function ($) {

	$('#wpcf').submit(function (e) {
		e.preventDefault();

		let form = $(this)
		let url = $(this).attr('action');
		let data = $(this).serialize();
		let status = $('.wpcf-status-msg')

		let btnSubmit = $('.wpcf-submit button[type="submit"]')
		let oldTxt = btnSubmit.text()

		btnSubmit.addClass('wpcf-submit-loading')
		btnSubmit.text('Sending...')

		$.ajax({
			type: 'POST',
			url: url,
			data: data,
			success: onSuccess,
			complete: onComplete
		})

		function onSuccess(res) {
			status
				.removeClass('wpcf-status-success')
				.removeClass('wpcf-status-error')

			if (res.success) {
				form.slideUp('slow');
				status.html(res.data);
				status.addClass('wpcf-status-success');
			} else {
				status.addClass('wpcf-status-error');
				status.html(res.data);
			}
		}

		function onComplete() {
			btnSubmit.removeClass('wpcf-submit-loading')
			btnSubmit.text(oldTxt)
		}
	});
});