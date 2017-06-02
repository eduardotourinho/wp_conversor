/**
 * Created by Eduardo on 31/05/2017.
 */

jQuery(document).ready( function ($) {

	function convertform(oform){
		var firstvalue = 0;
		var inputs = $(oform).find('input');

		inputs.each(function (index, element) {
			if ($(element).val()) {
				firstvalue = $(element).val() / $(element).data('factor');
				return false;
			}
		});

		if (firstvalue === 0) {
			clearform(oform);
			return false;
		}

		inputs.each(function (index, element) {
			var formattedValue = formatvalue((firstvalue * $(element).data('factor')), oform.data('rsize'));
			$(element).val(formattedValue);
		});

		return true;
	}

	function formatvalue(input, rsize) {
		var invalid = "**************************";
		var nines = "999999999999999999999999";
		var strin = "" + input;
		var fltin = parseFloat(strin);
		if (strin.length <= rsize) return strin;
		if (strin.indexOf("e") !== -1 ||
			fltin > parseFloat(nines.substring(0,rsize)+".4"))
			return invalid.substring(0, rsize);
		var rounded = "" + (fltin + (fltin - parseFloat(strin.substring(0, rsize))));
		return rounded.substring(0, rsize);
	}

	function resetform(form) {
		clearform(form);
		return true;
	}

	function clearform(form) {
		$(form).find('input').val('');
		return true;
	}

	$('button').on('click', function(e) {
		e.preventDefault();
		var $form = $(e.target).parents('form');
		console.log($form);

		if ($(e.target).attr('type') === 'reset') {
			resetform($form);
		} else {
			convertform($form);
		}
	});

});