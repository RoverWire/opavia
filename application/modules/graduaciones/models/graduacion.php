<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Graduacion extends MY_Model {

	protected $_table = 'graduaciones';
	protected $_id = 'id';
	protected $field_names = array('od_sph', 'od_cyl', 'od_axis', 'od_add', 'oi_sph', 'oi_cyl', 'oi_axis', 'oi_add', 'id_cliente');

	public function __construct()
	{
		parent::__construct();		
	}

}

/* End of file graduacion.php */
/* Location: ./application/models/graduacion.php */