<?php

/**
 * Created by PhpStorm.
 * User: Eduardo
 * Date: 31/05/2017
 * Time: 11:07
 */
class Calculo_Cubagem_Widget extends WP_Widget
{
	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array(
			'classname' => 'calculo_cubagem_widget',
			'description' => 'Realiza o cálculo de cubagem para transporte de cargas',
		);
		parent::__construct( 'calculo_cubagem_widget', 'Cálculo de Cubagem', $widget_ops );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		echo '
<div class="row">
	<div class="col-md-12">
		<form class="form-horizontal">
			<table class="table table-striped table-condensed" id="table-cubagem" data-cubagem-item-count="1">
				<thead>
					<tr>
						<th>&nbsp;</th>
						<th>Volumes</th>
						<th>Altura (m)</th>
						<th>Largura (m)</th>
						<th>Profundidade (m)</th>
						<th>Cubagem (m³)</th>
						<th>Peso (kg)</th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th colspan="5" class="text-right">Total</th>
						<th id="total_cubagem">0</th>
						<th id="total_peso">0</th>
						<th>&nbsp;</th>
					</tr>
				</tfoot>
				<tbody>
					<tr id="form-item-cubagem" class="cubagem-item-form" data-cubagem-item="1">
						<td class="cubagem-item-count">1</td>
						<td><input class="form-control input-sm cubagem-item-volume" type="number" step="1" min="1"></td>
						<td><input class="form-control input-sm cubagem-item-altura" type="number" step="0.01" min="0.01"></td>
						<td><input class="form-control input-sm cubagem-item-largura" type="number" step="0.01" min="0.01"></td>
						<td><input class="form-control input-sm cubagem-item-profundidade" type="number" step="0.01" min="0.01"></td>
						<td><input class="form-control input-sm cubagem-item-cubagem" type="number" step="0.01" readonly></td>
						<td><input class="form-control input-sm cubagem-item-peso" type="number" step="0.01" readonly></td>
						<td class="cubagem-item-remove">&nbsp;</td>
					</tr>
				</tbody>
			</table>
		</form>
	</div>
</div>
<div class="row">
	<div class="container">
		<div class="col-md-4"><a href="#" class="btn btn-primary" id="cubagem-nova-linha">Adicionar linha</a></div>
	</div>
</div>';
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 * @return string|void
	 */
	public function form( $instance ) {
		// outputs the options form on admin
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 * @return array|void
	 */
	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
	}
}