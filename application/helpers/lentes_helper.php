<?php
 
if (! function_exists('drop_lentes'))
{
	function drop_lentes($nombre, $sel = '', $attr = '')
	{
		$op = array(
				''           => 'Seleccione Opción',
				'Monofocal'  => 'Monofocal',
				'Bifocal'    => 'Bifocal',
				'Progresivo' => 'Progresivo',
				'Progresivo Trinity 17 mm'       => 'Progresivo Trinity 17 mm',
				'Progresivo Trinity Ultra 12 mm' => 'Progresivo Trinity Ultra 12 mm',
				'Progresivo Espacia'             => 'Progresivo Espacia',
				'Progresivo Espace'              => 'Progresivo Espace',
				'Progresivo Small Fit'           => 'Progresivo Small Fit',
				'Progresivo Adaptar'             => 'Progresivo Adaptar',
				'Progresivo Ovation'             => 'Progresivo Ovation',
				'Progresivo Comfort'             => 'Progresivo Comfort',
				'Progresivo Pix'                 => 'Progresivo Pix',
				'Progresivo Physio'              => 'Progresivo Physio',
				'Progresivo Physio Sport'        => 'Progresivo Physio Sport',
				'Progresivo Eclipse'             => 'Progresivo Eclipse',
				'Progresivo AO Easy'             => 'Progresivo AO Easy',
				'Progresivo SolaMax'             => 'Progresivo Solamax',
				'Progresivo SolaOne'             => 'Progresivo SolaOne',
				'Progresivo Compact'             => 'Progresivo Compact',
				'Progresivo Compact Ultra'       => 'Progresivo Compact Ultra',				
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
				''           	           => 'Seleccione Opción',
				'Blanco'                   => 'Blanco',
				'Transitions VI'           => 'Transitions VI',
				'Transitions VI Terminado' => 'Transitions VI Terminado',
				'Transitions VI Procesado' => 'Transitions VI Procesado',
				'Transitions VI Aclimate'  => 'Transitions VI Aclimate',
				'PhotoFusion Terminado'    => 'PhotoFusion Terminado',
				'PhotoFusion Procesado'    => 'PhotoFusion Procesado',
				'Augen Parasol Terminado'  => 'Augen Parasol Terminado',
				'Augen Parasol Procesado'  => 'Augen Parasol Procesado',
				'Nupolar'                  => 'Nupolar',
				'Polarizado Molina'        => 'Polarizado Molina',
				'Photogrey'                => 'Photogrey',
				'Aclimate'                 => 'Aclimate',
				'Solaris'                  => 'Solaris'
				);

		return form_dropdown($nombre, $op, $sel, $attr);
	}
}

if (! function_exists('drop_lentes_tinte'))
{
	function drop_lentes_tinte($nombre, $sel = '', $attr = '')
	{
		$op = array(
				''       => 'Seleccione Opción',
				'Gris'   => 'Gris',
				'G-15'   => 'G-15',
				'Café'   => 'Café',
				'Rosa'   => 'Rosa',
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
				''      => 'Seleccione Opción',
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
				''            => 'Seleccione Opción',
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
				''               => 'Seleccione Opción',
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
				''                          => 'Seleccione Opción',
				'AR Terminado'              => 'AR Terminado',
				'AR Crizal Alize Terminado' => 'AR Crizal Alize Terminado',
				'AR Crizal Forte Terminado' => 'AR Crizal Forte Terminado',
				'AR Optikot Procesado'      => 'AR Optikot Procesado',
				'AR Duarte Procesado'       => 'AR Duarte Procesado',
				'AR Spelen Procesado'       => 'AR Spelen Procesado',
				'AR Crizal Augen Procesado' => 'AR Crizal Augen Procesado',
				'AR Crizal Alize Procesado' => 'AR Crizal Alize Procesado',
				'AR Crizal Forte Procesado' => 'AR Crizal Forte Procesado',
				'Filtro U.V'                => 'Filtro U.V',
				'Antirrayas'                => 'Antirrayas'
				);

		return form_dropdown($nombre, $op, $sel, $attr);
	}
}