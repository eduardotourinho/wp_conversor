<?php

/**
 * Created by PhpStorm.
 * User: Eduardo
 * Date: 31/05/2017
 * Time: 11:07
 */
class ISB_Conversor_Medidas_Widget extends WP_Widget
{
	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array('classname' => 'isb_conversor_medidas_widget', 'description' => 'Conversor de medidas de peso, distância, volume e temperatura',);
		parent::__construct('isb_conversor_medidas_widget', 'Conversor de Medidas', $widget_ops);
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget($args, $instance) {
		echo '
<div class="row">
    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
        <h3 class="title align">Distância</h3>
        <form class="form-inline" id="form-distance" data-rsize="8">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
	            <div class="form-group">
	                <label for="">Metros</label>
	                <input type="number" class="form-control" name="meters" placeholder="" size="8" data-factor="1">
	            </div>
	            <div class="form-group">
	                <label for="">Polegadas</label>
	                <input type="number" class="form-control" name="inches" placeholder="" size="8" data-factor="39.37007874">
	            </div>
	                <div class="form-group">
	                <label for="">Pés</label>
	                <input type="number" class="form-control" name="feet" placeholder="" size="8" data-factor="3.2808399">
	            </div>
	                <div class="form-group">
	                <label for="">Jardas</label>
	                <input type="number" class="form-control" name="yards" placeholder="" size="8" data-factor="1.0936133">
	            </div>    
	                <div class="form-group">
	                <label for="">Milhas</label>
	                <input type="number" class="form-control" name="miles" placeholder="" size="8" data-factor="0.00062137">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="form-group">   
	                <label for="">Centímetros</label>
	                <input type="number" class="form-control" name="centimeters" placeholder="" size="8" data-factor="100">
                </div>
                <div class="form-group">
                    <label for="">Quilômetros</label>
                    <input type="number" class="form-control" name="kilometers" placeholder="" size="8" data-factor="0.001">
                </div>
                <div class="form-group">
                    <label for="">Nós</label>
                    <input type="number" class="form-control" name="knots" placeholder="" size="8" data-factor="0.0018532">
                </div>
                <div class="form-group">
                    <label for="">Léguas</label>
                    <input type="number" class="form-control" name="leagues" placeholder="" size="8" data-factor="0.00020712">
                </div>
                <div class="form-group">
                    <label for="">Milhas náuticas</label>
                    <input type="number" class="form-control" name="nmiles" placeholder="" size="8" data-factor="0.00053996">
                </div>
            </div>                    
            <div class="buttons col col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <button type="button" value="Converter" class="button" name="button2">Converter</button>
                <button type="reset" value="Limpar" class="button" name="reset">Limpar</button>
            </div>
        </form>
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
        <h3 class="title align">Peso</h3>
        <form class="form-inline" id="form-peso" action="javascript:void(0);" data-rsize="8">               
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label for="">KG</label>
                    <input type="number" class="form-control" id="kg" placeholder="" data-factor="1">
                </div>    
                <div class="form-group">
                    <label for="">Libras</label>
                    <input type="number" class="form-control" id="pounds" placeholder="" data-factor="2.2046215">
                </div>
                <div class="form-group">
                    <label for="">Pedras</label>
                    <input type="number" class="form-control" id="stones" placeholder="" data-factor="0.13778884375">
                </div>
                <div class="form-group">
                    <label for="">Gramas</label>
                    <input type="number" class="form-control" id="grams" placeholder="" data-factor="1000">
                </div>
                <div class="form-group">
                    <label for="">Onças</label>
                    <input type="number" class="form-control" id="ounces" placeholder=" data-factor="35.273944">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label for="">Libras Troy</label>
                    <input type="number" class="form-control" id="troy" placeholder="" data-factor="2.6792765">
                </div>
                <div class="form-group">
                    <label for="">Toneladas</label>
                    <input type="number" class="form-control" id="tons" placeholder="" data-factor="0.001">
                </div>
            </div>
            <div class="buttons col col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <button type="button" value="Converter" class="button" name="button2">Converter</button>
                <button type="reset" value="Limpar" class="button" name="reset">Limpar</button>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">        
        <h3 class="title align">Volume</h3>
        <form class="form-inline" id="medidas3" data-rsize="8">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="form-group">
	                <label for="">Litros</label>
	                <input type="number" class="form-control" id="liters" placeholder="" data-factor="1">
                </div>
                <div class="form-group">
                    <label for="">Mts Cúbicos</label>
                    <input type="number" class="form-control" id="m3" placeholder="" data-factor="0.001">
                </div>
                <div class="form-group">
                    <label for="">Quartos</label>
                    <input type="number" class="form-control" id="quarts" placeholder="" data-factor="1.056998">
                </div>
                <div class="form-group">
                    <label for="">Galões imperiais</label>
                    <input type="number" class="form-control" id="igallons" placeholder="" data-factor="0.2200433">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">           
                <div class="form-group">
                    <label for="">Mililitros</label>
                    <input type="number" class="form-control" id="ml" placeholder="" data-factor="1000">
                </div>
                <div class="form-group">
                    <label for="">Onça fluida</label>
                    <input type="number" class="form-control" id="fouces" placeholder="" data-factor="33.8239926">
                </div>
                <div class="form-group">
                    <label for="">Galões</label>
                    <input type="number" class="form-control" id="gallons" placeholder="" data-factor="0.2642499">
                </div>
            </div>
            <div class="buttons col col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <button type="button" value="Converter" class="button" name="button2">Converter</button>
                <button type="reset" value="Limpar" class="button" name="reset">Limpar</button>
            </div>
        </form>                 
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">        
        <h3 class="title align">Temperatura</h3>
        <form class="form-inline">
	        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
	            <div class="form-group">
	                <label for="">Fahrenheit</label>
	                <input type="number" name="F" onchange="eval(\'C.value = \' + this.form.C_expr.value);eval(\'K.value = \' + this.form.K_expr.value)" class="form-control" id="f">                                
	                <input type="hidden" name="F_expr" value="(Math.round(((212-32)/100 * C.value + 32)*100))/100;">
	                <input type="hidden" name="F_expr2" value="(Math.round(((212-32)/100 *(K.value - 273) + 32)*100))/100; ">
	            </div>
	            <div class="form-group">
	                <label for="">Kelvin</label>
	                <input type="number" name="K" onchange="eval(\'F.value = \' + this.form.F_expr2.value);eval(\'C.value = \' + this.form.C_expr2.value)" class="form-control" id="k">
	                <input type="hidden" name="K_expr" value="(Math.round((100/(212-32) * (F.value - 32))*100))/100 + 273">
	            </div>
	        </div>
	        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
	            <div class="form-group">
	                <label for="">Celcius</label>
	                <input type="number" name="C" onchange="eval(\'F.value = \' + this.form.F_expr.value);eval(\'K.value = \' + this.form.K_expr.value)" class="form-control" id="c">
	                <input type="hidden" name="C_expr" value="(Math.round((100/(212-32) * (F.value - 32))*100))/100">
	                <input type="hidden" name="C_expr2" value="(Math.round(K.value - 273))">
	            </div>
	        </div>
	        <div class="buttons col col-lg-12 col-md-12 col-sm-12 col-xs-12">
	            <input type="button" value="Converter" class="button" name="submit">
	            <input type="reset" value="Limpar" class="button" name="reset">
	        </div>
	    </form>
    </div>
</div>
';
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 * @return string|void
	 */
	public function form($instance) {
		// outputs the options form on admin
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 * @return array|void
	 */
	public function update($new_instance, $old_instance) {
		// processes widget options to be saved
	}
}