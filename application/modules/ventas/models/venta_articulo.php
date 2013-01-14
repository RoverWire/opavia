<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Venta_Articulo extends MY_Model {

	protected $_table = 'ventas_articulos';
	protected $_id = 'id';
	protected $field_names = array('cantidad', 'unitario', 'total', 'id_venta', 'id_articulo');

	public function __construct()
	{
		parent::__construct();
	}

}

/* End of file venta_articulo.php */
/* Location: ./application/models/venta_articulo.php */