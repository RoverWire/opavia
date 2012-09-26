<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cliente extends MY_Model {

	protected $_table = 'clientes';
	protected $_id = 'id';
	protected $field_names = array('nombre', 'apellidos', 'direccion', 'telefono', 'email', 'rfc', 'limite_credito', 'status', 'fecha_suspension', 'causa_suspension', 'vendedor');

	public function __construct()
	{
		parent::__construct();		
	}

}

/* End of file cliente.php */
/* Location: ./application/models/cliente.php */