<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Proveedor extends MY_Model {

	protected $_table = 'proveedores';
	protected $_id    = 'id';
	protected $field_names = array('nombre', 'direccion', 'telefono', 'email', 'rfc', 'status');

	public function __construct()
	{
		parent::__construct();		
	}

	public function busqueda($buscar = '', $offset = 0, $limit = 15)
	{
		$this->db->select('SQL_CALC_FOUND_ROWS id, nombre, direccion, telefono, email, rfc, status', FALSE);

		if (!empty($buscar)) {
			$this->db->like('nombre', $buscar, 'both');
			$this->db->or_like('email', $buscar, 'both');
		}

		$this->db->order_by('nombre', 'ASC');
		$limit  = (is_numeric($limit)) ? $limit:15;

		if ($limit != 0) {
			$offset = (is_numeric($offset)) ? $offset:0;
			$this->db->limit($limit, $offset);
		}

		return $this->db->get($this->_table);
	}

}

/* End of file proveedor.php */
/* Location: ./application/models/proveedor.php */