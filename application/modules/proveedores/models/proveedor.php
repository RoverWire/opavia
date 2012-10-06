<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Proveedor extends MY_Model {

	protected $_table = 'proveedores';
	protected $_id    = 'id';
	protected $field_names = array('nombre', 'direccion', 'telefono', 'email', 'rfc', 'status');

	public function __construct()
	{
		parent::__construct();		
	}

}

/* End of file proveedor.php */
/* Location: ./application/models/proveedor.php */