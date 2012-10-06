<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Articulo extends MY_Model {

	protected $_table = 'catalogo_articulos';
	protected $_id    = 'id';
	protected $field_names = array('nombre', 'id_linea', 'clave', 'marca', 'modelo', 'color', 'costo_compra', 'precio_venta', 'existencia', 'id_proveedor');

	public function __construct()
	{
		parent::__construct();		
	}

}

/* End of file articulo.php */
/* Location: ./application/models/articulo.php */