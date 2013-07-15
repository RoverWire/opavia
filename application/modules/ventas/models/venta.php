<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Venta extends MY_Model {

	protected $_table         = 'ventas';
	protected $_id            = 'id';
	protected $field_names    = array('total', 'subtotal', 'saldado', 'fecha_entrega', 'lente', 'material', 'tipo', 'tinte', 'intensidad', 'aplicacion', 'tratamiento', 'id_graduacion', 'id_laboratorio', 'id_cliente');
	private   $tabla_abonos   = 'abonos';
	private   $tabla_clientes = 'clientes';

	public function __construct()
	{
		parent::__construct();		
	}

	public function folio_siguiente()
	{
		$query = $this->db->select('MAX(folio_venta) as folio', FALSE)->from($this->_table)->limit(1)->get();
		if ($query->num_rows() > 0) {
			$row = $query->row();
			return $row->folio + 1;
		} else {
			return 1;
		}
	}

	public function no_saldadas($buscar = '', $offset = 0, $limit = 15)
	{
		$this->db->select('SQL_CALC_FOUND_ROWS v.*, c.nombre, c.apellidos', FALSE)
				 ->from('ventas AS v')
				 ->join('clientes AS c', 'v.id_cliente = c.id', 'left')
				 ->where('v.saldado', '0')
				 ->where('v.folio_venta >', '0');

		if (!empty($buscar)) {
			$this->db->where("(c.nombre LIKE '%$buscar%' OR c.apellidos LIKE '%$buscar%' OR v.fecha LIKE '%$buscar%')");
		}

		$this->db->order_by('v.fecha', 'DESC');
		$limit  = (is_numeric($limit)) ? $limit:15;

		if ($limit != 0) {
			$offset = (is_numeric($offset)) ? $offset:0;
			$this->db->limit($limit, $offset);
		}

		return $this->db->get();
	}

	public function creditos_cliente($id_cliente)
	{
		$sql = "SELECT v.*, c.nombre, c.apellidos FROM ventas AS v LEFT JOIN clientes AS c ON v.id_cliente = c.id
		WHERE v.saldado = 0 AND v.folio_venta > 0 AND c.id = '$id_cliente' ORDER BY v.fecha DESC";
		return $this->db->query($sql);
	}

	public function compras_cliente($id_cliente)
	{
		$sql = "SELECT v.*, c.nombre, c.apellidos FROM ventas AS v LEFT JOIN clientes AS c ON v.id_cliente = c.id
		WHERE v.saldado = 1 AND v.folio_venta > 0 AND c.id = '$id_cliente' ORDER BY v.fecha DESC";
		return $this->db->query($sql);
	}

	public function cotizaciones_cliente($id_cliente)
	{
		$sql = "SELECT v.*, c.nombre, c.apellidos FROM ventas AS v LEFT JOIN clientes AS c ON v.id_cliente = c.id
		WHERE v.saldado = 0 AND v.folio_venta = 0 AND c.id = '$id_cliente' ORDER BY v.fecha DESC";
		return $this->db->query($sql);
	}

	public function reporte($fecha_incio, $fecha_fin, $tipo = 0)
	{
		$this->db->select('ventas.fecha AS fecha_venta, ventas.total, abonos.id_venta, abonos.abono, abonos.saldo, abonos.fecha, clientes.nombre, clientes.apellidos');
		$this->db->from($this->_table);
		$this->db->join($this->tabla_abonos, 'ventas.id = abonos.id_venta', 'inner');
		$this->db->join($this->tabla_clientes, 'clientes.id = ventas.id_cliente', 'left');
		$this->db->where("abonos.fecha BETWEEN '$fecha_incio' AND '$fecha_fin'", '', FALSE);

		switch ($tipo) {
			case 1:
				$this->db->where('ventas.total !=', 'abonos.abono');
				break;
			
			case 2:
				$this->db->where('ventas.total', 'abonos.abono');
				break;
		}

		return $this->db->get();
	}

}

/* End of file venta.php */
/* Location: ./application/models/venta.php */