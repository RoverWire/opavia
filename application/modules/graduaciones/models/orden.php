<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orden extends MY_Model {

	protected $_table = 'ordenes';
	protected $_id = 'id';
	protected $field_names = array('importe', 'fecha_entrega', 'lente', 'material', 'tipo', 'tinte', 'intensidad', 'aplicacion', 'tratamiento', 'id_graduacion', 'id_laboratorio', 'id_ventas');

	public function __construct()
	{
		parent::__construct();		
	}

}

/* End of file orden.php */
/* Location: ./application/models/orden.php */