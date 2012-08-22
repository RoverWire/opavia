<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model {

	protected $_db			= '';
	protected $_tabla		= '';
	protected $_archivos 	= array();
	protected $_id 			= 'id';

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('inflector');
		$this->definir_tabla();
	}

	protected function definir_tabla()
	{
		if (empty($this->_tabla) || $this->_tabla == NULL) {
			$this->_tabla = plural(preg_replace('/(_m|_model)?$/', '', strtolower(get_class($this))));
		}
	}

	public function agregar($datos)
	{
		if (is_array($datos)) {
			$this->db->insert($this->_tabla, $datos);
			return $this->db->insert_id();
		} else {
			return FALSE;
		}
	}

	public function detalles($id)
	{
		if (!empty($id)) {
			return $this->db->where($this->_id, $id)->get($this->_tabla);
		} else {
			return FALSE;
		}
	}

	public function actualizar($id, $datos)
	{
		if (is_array($datos) && !empty($id)) {
			$this->db->where($this->_id, $id)->update($this->_tabla, $datos);
			return $this->db->affected_rows();
		} else {
			return FALSE;
		}
	}

	public function eliminar($id)
	{
		if (!is_array($id)) {
			$id = array($id);
		}

		if (count($this->_archivos) > 0) {
			$campos = implode(', ', $this->_archivos);
			$query = $this->db->select($campos, FALSE)->where_in($this->_id, $id)->get($this->_tabla);

			foreach ($query->result() as $row) {
				foreach ($this->_archivos as $archivo) {
					
				}
			}
		}
	}

}

/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */