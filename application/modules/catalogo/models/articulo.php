<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Articulo extends MY_Model {

	protected $_table = 'catalogo_articulos';
	protected $_id    = 'id';
	protected $field_names = array('id_linea', 'marca', 'modelo', 'color', 'costo_compra', 'precio_venta', 'existencia', 'id_proveedor');

	public function __construct()
	{
		parent::__construct();		
	}

	public function busqueda($buscar = '', $linea = 0, $offset = 0, $limit = 15, $activos = FALSE)
	{
		$this->db->select('SQL_CALC_FOUND_ROWS p.id, p.id_linea, p.marca, p.modelo, p.color, p.precio_venta, p.costo_compra, p.existencia, l.nombre AS linea', FALSE)
				 ->from($this->_table.' as p')
				 ->join('catalogo_lineas AS l', 'p.id_linea=l.id', 'left');


		if (!empty($buscar)) {
			$this->db->like('p.marca', $buscar, 'both')
					 ->or_like('p.modelo', $buscar, 'both')
					 ->or_like('p.color', $buscar, 'both');
		}

		if ($activos) {
			$this->db->where("(p.existencia > 0 OR l.nombre = 'Lentes Oftálmicos')", '', FALSE);
		}

		if ($linea) {
			$this->db->where('p.id_linea', $linea);
		}

		$this->db->order_by('marca, modelo', 'ASC')->group_by('p.id');
		$limit  = (is_numeric($limit)) ? $limit:15;

		if ($limit != 0) {
			$offset = (is_numeric($offset)) ? $offset:0;
			$this->db->limit($limit, $offset);
		}

		return $this->db->get($this->_table);
	}

}

/* End of file articulo.php */
/* Location: ./application/models/articulo.php */