<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Linea extends MY_Model {

	protected $_table = 'catalogo_lineas';
	protected $_id    = 'id';
	protected $field_names = array('nombre');

	public function __construct()
	{
		parent::__construct();
	}

	public function busqueda($buscar = '', $offset = 0, $limit = 15)
	{
		$this->db->select('SQL_CALC_FOUND_ROWS id, nombre', FALSE)->from($this->_table);
		if (!empty($buscar)) {
			$this->db->like('nombre', $buscar, 'both');
		}

		$limit  = (is_numeric($limit)) ? $limit:15;

		if ($limit != 0) {
			$offset = (is_numeric($offset)) ? $offset:0;
			$this->db->limit($limit, $offset);
		}

		return $this->db->get();
	}

}

/* End of file linea.php */
/* Location: ./application/models/linea.php */