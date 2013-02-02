<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Venta_Articulo extends MY_Model {

	protected $_table = 'ventas_articulos';
	protected $_id = 'id';
	protected $field_names = array('cantidad', 'unitario', 'total', 'id_venta', 'id_articulo');

	public function __construct()
	{
		parent::__construct();
	}

	public function listado($id_venta)
	{
		$sql = "SELECT va.cantidad, va.unitario, va.total, ca.marca, ca.modelo, ca.color 
		FROM ventas_articulos AS va, catalogo_articulos AS ca WHERE
		va.id_venta = '$id_venta' AND ca.id = va.id_articulo ORDER BY va.id ASC";

		return $this->db->query($sql);
	}

}

/* End of file venta_articulo.php */
/* Location: ./application/models/venta_articulo.php */