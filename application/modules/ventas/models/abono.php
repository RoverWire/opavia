<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Abono extends MY_Model {

	protected $_table = 'abonos';
	protected $_id = 'id';
	protected $field_names = array('fecha', 'abono', 'saldo', 'id_venta');

	public function __construct()
	{
		parent::__construct();
	}

}

/* End of file abono.php */
/* Location: ./application/models/abono.php */