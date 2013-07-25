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

	public function descontar($id, $cantidad)
	{
		if (!empty($id) && !empty($cantidad)) {
			$sql = "UPDATE catalogo_articulos SET existencia = (existencia - $cantidad) WHERE id = '$id';";
			return $this->db->simple_query($sql);
		} else {
			return FALSE;
		}
	}

	public function reporte($fecha_inicial, $fecha_final)
	{
		$this->db->select('ventas.fecha AS fecha_venta, ventas.total, abonos.id_venta, abonos.abono, abonos.saldo, abonos.fecha, clientes.nombre, clientes.apellidos');
		$this->db->from('ventas');
		$this->db->join('ventas_articulos', 'ventas.id = ventas_articulos.id_venta', 'inner');
		$this->db->join('abonos', 'ventas.id = abonos.id_venta', 'inner');
		$this->db->join('clientes', 'clientes.id = ventas.id_cliente', 'left');
		$this->db->where("abonos.fecha BETWEEN '$fecha_incio' AND '$fecha_fin'", '', FALSE);
	}

}

/* End of file venta_articulo.php */
/* Location: ./application/models/venta_articulo.php */