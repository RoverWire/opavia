<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cliente extends MY_Model {

	protected $_table = 'clientes';
	protected $_id = 'id';
	protected $field_names = array('nombre', 'apellidos', 'direccion', 'telefono', 'email', 'rfc', 'limite_credito', 'status', 'fecha_suspension', 'causa_suspension', 'vendedor');

	public function __construct()
	{
		parent::__construct();		
	}

	public function busqueda($buscar, $offset = 0)
	{
		$this->db->like('nombre', $buscar, 'both');
		$this->db->or_like('apellidos', $buscar, 'both');
		$this->db->limit(15, $offset);
		return $this->db->get($this->_table);
	}

}

/* End of file cliente.php */
/* Location: ./application/models/cliente.php */