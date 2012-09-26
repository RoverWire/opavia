<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laboratorio extends MY_Model {

	protected $_table = 'laboratorios';
	protected $_id    = 'id';
	protected $field_names = array('nombre', 'direccion', 'telefono', 'contacto');

	public function __construct()
	{
		parent::__construct();		
	}

}

/* End of file laboratorio.php */
/* Location: ./application/models/laboratorio.php */