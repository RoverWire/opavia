<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Linea extends MY_Model {

	protected $_table = 'catalogo_lineas';
	protected $_id    = 'id';
	protected $field_names = array('nombre');

	public function __construct()
	{
		parent::__construct();
	}

}

/* End of file linea.php */
/* Location: ./application/models/linea.php */