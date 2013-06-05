<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cliente extends MY_Model {

	protected $_table = 'clientes';
	protected $_id = 'id';
	protected $field_names = array('nombre', 'apellidos', 'direccion', 'telefono', 'email', 'rfc', 'limite_credito', 'status', 'fecha_suspension', 'causa_suspension', 'vendedor');

	public function __construct()
	{
		parent::__construct();		
	}

	public function busqueda($buscar = '', $offset = 0, $limit = 15, $activos = FALSE)
	{
		$this->db->select('SQL_CALC_FOUND_ROWS id, nombre, apellidos, email, telefono, status', FALSE);

		if (!empty($buscar)) {
			$this->db->like("CONCAT(nombre, ' ', apellidos)", $buscar, 'both', FALSE);
		}

		if ($activos) {
			$this->db->where('status', '1');
		}

		$this->db->order_by('nombre, apellidos', 'ASC');
		$limit  = (is_numeric($limit)) ? $limit:15;

		if ($limit == 0) {
			$offset = (is_numeric($offset)) ? $offset:0;
			$this->db->limit($limit, $offset);
		}

		return $this->db->get($this->_table);
	}

}

/* End of file cliente.php */
/* Location: ./application/models/cliente.php */