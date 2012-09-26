<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Proveedor extends MY_Model {

	protected $_table = 'proveedores';
	protected $_id    = 'id';
	protected $field_names = array('nombre', 'apellidos', 'direccion', 'telefono', 'email', 'rfc', 'limite_credito', 'status', 'fecha_suspension', 'causa_suspension');

	public function __construct()
	{
		parent::__construct();		
	}

}

/* End of file proveedor.php */
/* Location: ./application/models/proveedor.php */