/*Placeholder forms*/


jQuery(function() {
   jQuery.support.placeholder = false;
   test = document.createElement('input');
   if('placeholder' in test) jQuery.support.placeholder = true;
});

 $(function() {
	if(!$.support.placeholder) { 
		var active = document.activeElement;
		$(':text').focus(function () {
			if ($(this).attr('placeholder') != '' && $(this).val() == $(this).attr('placeholder')) {
				$(this).val('').removeClass('hasPlaceholder');
			}
		}).blur(function () {
			if ($(this).attr('placeholder') != '' && ($(this).val() == '' || $(this).val() == $(this).attr('placeholder'))) {
				$(this).val($(this).attr('placeholder')).addClass('hasPlaceholder');
			}
		});
		$(':text').blur();
		$(active).focus();
		$('form').submit(function () {
			$(this).find('.hasPlaceholder').each(function() { $(this).val(''); });
		});
	}
});

jQuery(function() {
   jQuery.support.placeholder = false;
   test = document.createElement('input');
   if('placeholder' in test) jQuery.support.placeholder = true;
});

 $(function() {
	if(!$.support.placeholder) { 
		var active = document.activeElement;
		$(':password').focus(function () {
			if ($(this).attr('placeholder') != '' && $(this).val() == $(this).attr('placeholder')) {
				$(this).val('').removeClass('hasPlaceholder');
			}
		}).blur(function () {
			if ($(this).attr('placeholder') != '' && ($(this).val() == '' || $(this).val() == $(this).attr('placeholder'))) {
				$(this).val($(this).attr('placeholder')).addClass('hasPlaceholder');
			}
		});
		$(':password').blur();
		$(active).focus();
		$('form').submit(function () {
			$(this).find('.hasPlaceholder').each(function() { $(this).val(''); });
		});
	}
});


/*Calculator*/


$(function(){

	calc();

	$('#calc_plan').on('change', calc);
	$('#inv_amount').bind('change keyup', calc).on('keypress', isNumberKey);

});

function isNumberKey(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode;
	if (charCode > 31 && (charCode < 48 || charCode > 57))
		return false;
	return true;
}

function calc() {

	var plan = $('#calc_plan').val();
	var amount = $('#inv_amount').val();
	var percent;

	switch (plan) {
		case '1':
			switch (true) {
				case (amount<10):
					percent = 127;
					break;
				case (amount<=299):
					percent = 127;
					break;
				case (amount<=999):
					percent = 127;
					break;
				case (amount<=4999):
					percent = 127;
					break;
				case (amount<=9999):
					percent = 127;
					break;
				case (amount<=24999):
					percent = 127;
					break;	
				case (amount<=50000):
					percent = 127;
					break;		
				default:
					percent = 127;
			}
			break;
		case '2':
			switch (true) {
				case (amount<10):
					percent = 100;
					break;
				case (amount<=299):
					percent = 135;
					break;
				case (amount<=999):
					percent = 135;
					break;
				case (amount<=4999):
					percent = 135;
					break;
				case (amount<=9999):
					percent = 135;
					break;
				case (amount<=24999):
					percent = 135;
					break;	
				case (amount<=50000):
					percent = 135;
					break;		
				default:
					percent = 135;
			}
			break;
		case '3':
			switch (true) {
				case (amount<10):
					percent = 100;
					break;
				case (amount<=299):
					percent = 180;
					break;
				case (amount<=999):
					percent = 180;
					break;
				case (amount<=4999):
					percent = 180;
					break;
				case (amount<=9999):
					percent = 180;
					break;
				case (amount<=24999):
					percent = 180;
					break;	
				case (amount<=50000):
					percent = 180;
					break;		
				default:
					percent = 180;
			}
			break;
		case '4':
			switch (true) {
				case (amount<10):
					percent = 100;
					break;
				case (amount<=299):
					percent = 250;
					break;
				case (amount<=999):
					percent = 250;
					break;
				case (amount<=4999):
					percent = 250;
					break;
				case (amount<=9999):
					percent = 250;
					break;
				case (amount<=24999):
					percent = 250;
					break;	
				case (amount<=50000):
					percent = 250;
					break;		
				default:
					percent = 250;
			}
			break;
		case '5':
			switch (true) {
				case (amount<10):
					percent = 100;
					break;
				case (amount<=299):
					percent = 200;
					break;
				case (amount<=999):
					percent = 200;
					break;
				case (amount<=4999):
					percent = 200;
					break;
				case (amount<=9999):
					percent = 200;
					break;
				case (amount<=24999):
					percent = 200;
					break;	
				case (amount<=50000):
					percent = 200;
					break;		
				default:
					percent = 200;
			}
			break;
		case '6':
			switch (true) {
				case (amount<10):
					percent = 100;
					break;
				case (amount<=299):
					percent = 155;
					break;
				case (amount<=999):
					percent = 155;
					break;
				case (amount<=4999):
					percent = 155;
					break;
				case (amount<=9999):
					percent = 155;
					break;
				case (amount<=24999):
					percent = 155;
					break;	
				case (amount<=50000):
					percent = 155;
					break;		
				default:
					percent = 155;
			}
			break;
			
		case '7':
			switch (true) {
				case (amount<300):
					percent = 100;
					break;
				case (amount<=5000):
					percent = 800;
					break;
				default:
					percent = 800;
			}
			break;
			
				
		case '8':
			switch (true) {
				case (amount<500):
					percent = 100;
					break;
				case (amount<=15000):
					percent = 2000;
					break;
				default:
					percent = 2000;
			}
			break;


	}

	$('#assign_per').val(percent+'%');
	var total = amount*percent/100;
	$('#total_return').val('$'+total);
	$('#net_profit').val('$'+(total-amount).toFixed(2));

}
