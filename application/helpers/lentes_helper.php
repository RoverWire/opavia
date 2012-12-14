<?php
 
if (! function_exists('drop_lentes'))
{
	function drop_lentes($nombre, $sel = '', $attr = '')
	{
		$op = array(
				'Monofocal'  => 'Monofocal',
				'Bifocal'    => 'Bifocal',
				'Progresivo' => 'Progresivo',
				'Ejecutivo'  => 'Ejecutivo', 
				'Younger'    => 'Younger'
				);

		return form_dropdown($nombre, $op, $sel, $attr);
	}
}
 
if (! function_exists('drop_lentes_tipo'))
{
	function drop_lentes_tipo($nombre, $sel = '', $attr = '')
	{
		$op = array(
				'Blanco'         => 'Blanco',
				'Transitions VI' => 'Transitions VI',
				'Photogrey'      => 'Photogrey',
				'Aclimates'      => 'Aclimates',
				'Solaris'        => 'Solaris'
				);

		return form_dropdown($nombre, $op, $sel, $attr);
	}
}

if (! function_exists('drop_lentes_tinte'))
{
	function drop_lentes_tinte($nombre, $sel = '', $attr = '')
	{
		$op = array(
				'Gris' => 'Gris',
				'G-15' => 'G-15',
				'Café' => 'Café',
				'Rosa' => 'Rosa',
				'Rubiol' => 'Rubiol'
				);

		return form_dropdown($nombre, $op, $sel, $attr);
	}
}

if (! function_exists('drop_lentes_intensidad'))
{
	function drop_lentes_intensidad($nombre, $sel = '', $attr = '')
	{
		$op = array(
				'Tenue' => 'Tenue',
				'Uno'   => 'Uno',
				'Dos'   => 'Dos',
				'Tres'  => 'Tres'
				);

		return form_dropdown($nombre, $op, $sel, $attr);
	}
}

if (! function_exists('drop_lentes_aplicacion'))
{
	function drop_lentes_aplicacion($nombre, $sel = '', $attr = '')
	{
		$op = array(
				'Uniforme'    => 'Uniforme',
				'Desvanecido' => 'Desvanecido'
				);

		return form_dropdown($nombre, $op, $sel, $attr);
	}
}

if (! function_exists('drop_lentes_material'))
{
	function drop_lentes_material($nombre, $sel = '', $attr = '')
	{
		$op = array(
				'CR39 Nucleonic' => 'CR39 Nucleonic',
				'Policarbonato'  => 'Policarbonato',
				'Thin & Lite'    => 'Thin & Lite',
				'Hi Index'       => 'Hi Index',
				'Trivex'         => 'Trivex',
				'Cristal'        => 'Cristal'
				);

		return form_dropdown($nombre, $op, $sel, $attr);
	}
}

if (! function_exists('drop_lentes_tratamiento'))
{
	function drop_lentes_tratamiento($nombre, $sel = '', $attr = '')
	{
		$op = array(
				'AR Terminado' => 'AR Terminado',
				'AR Crizal Alize Terminado' => 'AR Crizal Alize Terminado',
				'AR Crizal Forte Terminado' => 'AR Crizal Forte Terminado',
				'AR Optikot Procesado' => 'AR Optikot Procesado',
				'AR Duarte Procesado' => 'AR Duarte Procesado',
				'AR Spelen Procesado' => 'AR Spelen Procesado',
				'AR Crizal Augen Procesado' => 'AR Crizal Augen Procesado',
				'AR Crizal Alize Procesado' => 'AR Crizal Alize Procesado',
				'AR Crizal Forte Procesado' => 'AR Crizal Forte Procesado',
				'Filtro U.V' => 'Filtro U.V',
				'Antirrayas' => 'Antirrayas'
				);

		return form_dropdown($nombre, $op, $sel, $attr);
	}
}