/**
 * Book appointment modal — waits for jQuery + Bootstrap Modal, then binds once.
 */
(function () {
	'use strict';

	function bindAppointmentModal() {
		var $ = window.jQuery;
		if (!$ || !$.fn || typeof $.fn.modal !== 'function') {
			return false;
		}
		if (window.__dontiaApptModalBound) {
			return true;
		}

		var $form = $('#dontiaAppointmentForm');
		var $modal = $('#dontiaAppointmentModal');
		if (!$form.length || !$modal.length) {
			return false;
		}

		/* Outside .page-wrapper (overflow:hidden) and direct under body for Bootstrap backdrop. */
		if ($modal.parent()[0] !== document.body) {
			$modal.detach().appendTo(document.body);
		}

		window.__dontiaApptModalBound = true;
		var allowedServices = ['Skin Treatment', 'Dental', 'ENT'];

		function resetApptModalView() {
			$('#dontiaAppointmentFormWrap').show();
			$('#dontiaAppointmentModalLabel').show();
			$('#dontiaAppointmentSuccess').removeClass('is-visible').attr('aria-hidden', 'true');
		}

		function showApptSuccess() {
			$('#dontiaAppointmentFormWrap').hide();
			$('#dontiaAppointmentModalLabel').hide();
			$('#dontiaAppointmentSuccess').addClass('is-visible').attr('aria-hidden', 'false');
		}

		function clearDontiaApptErrors($f) {
			$f.find('.dontia-appt-field-error').text('');
			$f.find('.form-group').removeClass('has-error');
			$f.find('.dontia-appt-input').removeClass('input-error');
		}

		function setDontiaApptError($input, message) {
			var $fg = $input.closest('.form-group');
			$fg.addClass('has-error');
			$input.addClass('input-error');
			$fg.find('.dontia-appt-field-error').text(message);
		}

		function validateDontiaApptForm($f) {
			clearDontiaApptErrors($f);
			var ok = true;
			var name = $.trim($('#dontia_appt_name').val());
			if (!name) {
				setDontiaApptError($('#dontia_appt_name'), 'This field is required');
				ok = false;
			}
			var email = $.trim($('#dontia_appt_email').val());
			if (!email) {
				setDontiaApptError($('#dontia_appt_email'), 'This field is required');
				ok = false;
			} else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
				setDontiaApptError($('#dontia_appt_email'), 'Please enter a valid email');
				ok = false;
			}
			var phone = $.trim($('#dontia_appt_phone').val());
			if (!phone) {
				setDontiaApptError($('#dontia_appt_phone'), 'This field is required');
				ok = false;
			} else if (phone.replace(/\D/g, '').length < 7) {
				setDontiaApptError($('#dontia_appt_phone'), 'Please enter a valid phone number');
				ok = false;
			}
			var svc = $('#dontia_appt_service').val();
			if (!svc || allowedServices.indexOf(svc) === -1) {
				setDontiaApptError($('#dontia_appt_service'), 'This field is required');
				ok = false;
			}
			var dateVal = $.trim($('#dontia_appt_date').val());
			if (!dateVal) {
				setDontiaApptError($('#dontia_appt_date'), 'This field is required');
				ok = false;
			} else {
				var d = new Date(dateVal + 'T12:00:00');
				if (isNaN(d.getTime())) {
					setDontiaApptError($('#dontia_appt_date'), 'Please choose a valid date');
					ok = false;
				} else {
					var today = new Date();
					today.setHours(0, 0, 0, 0);
					if (d < today) {
						setDontiaApptError($('#dontia_appt_date'), 'Date cannot be in the past');
						ok = false;
					}
				}
			}
			return ok;
		}

		$form.on('input change', '.dontia-appt-input', function () {
			var $field = $(this);
			$field.closest('.form-group').removeClass('has-error');
			$field.removeClass('input-error');
			$field.closest('.form-group').find('.dontia-appt-field-error').text('');
		});

		$modal.on('show.bs.modal', function (e) {
			resetApptModalView();
			var rel = $(e.relatedTarget);
			var preset = rel.data('preselect-service');
			if (preset && allowedServices.indexOf(String(preset)) !== -1) {
				$('#dontia_appt_service').val(String(preset));
			}
		});

		$modal.on('hidden.bs.modal', function () {
			$form[0].reset();
			clearDontiaApptErrors($form);
			resetApptModalView();
			$('body').removeClass('modal-open');
			$('.modal-backdrop').remove();
		});

		/* Ensure form fields stay interactive (guards against partial CSS load). */
		$modal.on('shown.bs.modal', function () {
			$modal.find('.modal-dialog, .modal-content, .dontia-appt-input, select, button').css('pointer-events', 'auto');
		});

		$form.on('submit', function (ev) {
			ev.preventDefault();
			if (!validateDontiaApptForm($form)) {
				var $fe = $form.find('.input-error').first();
				if ($fe.length) {
					$fe.focus();
				}
				return;
			}
			var $btn = $form.find('button[type=submit]');
			var submitUrl = $form.attr('data-submit-url') || $form.attr('action');
			$btn.prop('disabled', true).attr('aria-busy', 'true');
			$.ajax({
				url: submitUrl,
				type: 'POST',
				data: $form.serialize(),
				dataType: 'json'
			}).done(function (res) {
				if (res && res.success) {
					$form[0].reset();
					clearDontiaApptErrors($form);
					showApptSuccess();
				} else {
					var msg = (res && res.message) ? res.message : 'Please check the form and try again.';
					window.alert(msg);
				}
			}).fail(function (xhr) {
				var msg = 'Something went wrong. Please try again.';
				if (xhr.responseJSON && xhr.responseJSON.message) {
					msg = xhr.responseJSON.message;
				} else if (xhr.status === 404) {
					msg = 'Booking service not found. Please refresh the page and try again.';
				}
				window.alert(msg);
			}).always(function () {
				$btn.prop('disabled', false).removeAttr('aria-busy');
			});
		});

		return true;
	}

	var tries = 0;
	function tryBind() {
		if (bindAppointmentModal()) {
			return;
		}
		if (tries++ < 120) {
			window.setTimeout(tryBind, 50);
		}
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', tryBind);
	} else {
		tryBind();
	}
	window.addEventListener('load', tryBind, { once: true });
})();
