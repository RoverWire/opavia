<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model {

	protected $_db			= '';
	protected $_tabla		= '';
	protected $_archivos 	= array();
	protected $_id 			= 'id';

	protected $pre_agregar		= array();
	protected $pos_agregar		= array();
	protected $pre_actualizar 	= array();
	protected $pos_actualizar	= array();
	protected $pre_eliminar		= array();
	protected $pos_eliminar		= array();

	protected $callback_parametros	= array();

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('inflector');
		$this->definir_base();
		$this->definir_tabla();
	}

	/* --------------------------------------------------------------
     * FUNCIONES DE USO INTERNO
     * ------------------------------------------------------------ */

	protected function definir_base()
	{
		if (!empty($this->_db)) {
			$this->db = $this->load->database($this->_db, TRUE);
		}
	}

	protected function definir_tabla()
	{
		if (empty($this->_tabla) || $this->_tabla == NULL) {
			$this->_tabla = plural(preg_replace('/(_m|_model)?$/', '', strtolower(get_class($this))));
		}
	}

	protected function trigger($event, $datos = FALSE)
	{
		if (isset($this->$event) && is_array($this->$event)) {
			foreach ($this->$event as $method) {
				if (strpos($method, '(')) {
					preg_match('/([a-zA-Z0-9\_\-]+)(\(([a-zA-Z0-9\_\-\., ]+)\))?/', $method, $matches);
					$method = $matches[1];
					$this->callback_parametros = explode(',', $matches[3]);
				}

				$datos = call_user_func_array(array($this, $method), array($datos));
			}
		}

		return $datos;
	}

	public function serialize($datos)
	{
		foreach ($this->callback_parametros as $campo) {
			$datos[$campo] = serialize($datos[$campo]);
		}
	}

	public function unserialize($datos)
	{
		foreach ($this->callback_parametros as $campo) {
            if (is_array($datos)) {
                $datos[$campo] = unserialize($datos[$campo]);
            } else {
                $datos->$campo = unserialize($datos->$campo);
            }
        }

        return $datos;
	}

	/* --------------------------------------------------------------
     * FUNCIONES GENÉRICAS
     * ------------------------------------------------------------ */

	public function agregar($datos)
	{
		if (is_array($datos)) {
			$datos = $this->trigger('pre_agregar', $datos);
			$this->db->insert($this->_tabla, $datos);
			$id = $this->db->insert_id();
			$this->trigger('pos_agregar', $id);
			return $id;
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
			$datos = $this->trigger('pre_actualizar', $datos);
			$this->db->where($this->_id, $id)->update($this->_tabla, $datos);
			$rows = $this->db->affected_rows();
			$this->trigger('pos_actualizar', array($datos, $rows));
		} else {
			return FALSE;
		}
	}

	public function eliminar($id)
	{
		if (empty($id) || (is_array($id) && count($id) < 1)) {
			return FALSE;
		}

		if (!is_array($id)) {
			$id = array($id);
		}

		if (count($this->_archivos) > 0) {
			$campos = implode(', ', $this->_archivos);
			$query = $this->db->select($campos)->where_in($this->_id, $id)->get($this->_tabla);

			foreach ($query->result() as $row) {
				foreach ($this->_archivos as $archivo) {
					if (isset($row->$archivo) && !empty($row->$archivo)) {
						if (file_exists('.'.$row->$archivo)) {
							unlink('.'.$row->$archivo);
						}
					}
				}
			}
		}

		$this->db->where_in($this->_id, $id)->delete($this->_tabla);

		return $this->db->affected_rows();
	}

	public function listar()
	{
		return $this->db->get($this->_tabla);
	}

	/* --------------------------------------------------------------
     * QUERY HELPERS ::EXPERIMENTAL::
     * ------------------------------------------------------------ */

	public function get()
	{
		return $this->db->get($this->_tabla);
	}

	public function last_query()
	{
		return $this->db->last_query();
	}

	public function count()
	{
		return $this->db->count_all_results($this->_tabla);
	}

	public function count_all()
	{
		return $this->db->count_all($this->_tabla);
	}
	
	public function __call($metodo, $parametros)
	{
		if (method_exists($this->db, $metodo)) {
			call_user_func_array(array($this->db, $metodo), $parametros);
			return $this;
		} else {
			return FALSE;
		}		
	}

	/* --------------------------------------------------------------
     * UTILERIAS
     * ------------------------------------------------------------ */

	public static function calcular_id()
	{
		return date("Ymds"). sprintf("%02d", rand(0,99));
	}

	public function tabla()
	{
		return $this->_tabla;
	}

}

/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */