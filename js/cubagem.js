/**
 * Created by Eduardo on 31/05/2017.
 */

jQuery(document).ready( function ($) {

	function calcCubagem(row) {
		var volumes = $(row).find('.cubagem-item-volume').val() || 0;
		var altura = $(row).find('.cubagem-item-altura').val() || 0;
		var largura = $(row).find('.cubagem-item-largura').val() || 0;
		var profundidade = $(row).find('.cubagem-item-profundidade').val() || 0;

		var cubagem = parseFloat(volumes * altura * largura * profundidade);
		var peso = parseFloat(cubagem * 300);

		$(row).find('.cubagem-item-cubagem').val(cubagem.toFixed(2));
		$(row).find('.cubagem-item-peso').val(peso.toFixed(2));

		calcCubagemTotal();
	}

	function calcCubagemTotal() {
		var pesoTotal = 0,
			cubagemTotal = 0;

		$('.cubagem-item-form').each(function (index) {
			console.log(index);

			cubagemTotal += parseFloat($(this).find('.cubagem-item-cubagem').val()) || 0;
			pesoTotal += parseFloat($(this).find('.cubagem-item-peso').val()) || 0;
		});

		$('#total_cubagem').text(new Intl.NumberFormat('pt-br').format(cubagemTotal.toFixed(2)));
		$('#total_peso').text(new Intl.NumberFormat('pt-br').format(pesoTotal.toFixed(2)));
	}

	function removeLinha(element) {
		element.nextAll().each(function (index) {
			var elItemCount = $(this).find('.cubagem-item-count');
			var count = parseInt(elItemCount.text());
			elItemCount.text(count-1);
		});
		$('#table-cubagem').data('cubagem-item-count', $('#table-cubagem').data('cubagem-item-count')-1);
		element.remove();

		calcCubagemTotal();
	}

	$('#cubagem-nova-linha').on('click', function (e) {
		e.preventDefault();

		var itemCount = $('#table-cubagem').data('cubagem-item-count');
		var $tbody = $('#table-cubagem tbody');
		var newLine = $('#form-item-cubagem').clone();

		var $removeElement = $('<a></a>')
			.attr('href', '#')
			.text('Remover')
			.on('click', function (e) {
				e.preventDefault();
				removeLinha($(e.target.closest('tr')));
			});

		newLine.attr('id', '');
		newLine.data('cubagem-item', itemCount+1);
		newLine.find('.cubagem-item-count').text( itemCount+1 );
		newLine.find('.cubagem-item-remove').append($removeElement);
		newLine.find('input').val('');
		$tbody.append(newLine);

		$('#table-cubagem').data('cubagem-item-count',itemCount+1);
	});

	$('.cubagem-item-volume, .cubagem-item-altura, .cubagem-item-largura, .cubagem-item-profundidade').live('blur', function (e) {
		var element = e.target.closest('tr');
		calcCubagem(element);
	});


});