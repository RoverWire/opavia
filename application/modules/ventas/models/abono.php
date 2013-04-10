<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Abono extends MY_Model {

	protected $_table = 'abonos';
	protected $_id = 'id';
	protected $field_names = array('fecha', 'abono', 'saldo', 'id_venta');

	public function __construct()
	{
		parent::__construct();
	}

	public function pagado_venta($id_venta)
	{
		$sql   = "SELECT SUM(abono) AS pagado FROM {$this->_table} WHERE id_venta = '$id_venta'";
		$query = $this->db->query($sql);
		$row   = $query->row();
		return $row->pagado;
	}

	public function abonos_venta($id_venta)
	{
		$sql = "SELECT fecha, abono, saldo FROM {$this->_table} WHERE id_venta = '$id_venta'";
		return $this->db->query($sql);
	}

	public function es_credito($id)
	{
		$sql   = "SELECT COUNT(id) AS id FROM ventas WHERE saldado = 0 AND id = '$id'";
		$query = $this->db->query($sql)->row();
		return ($query->id != 0) ? TRUE:FALSE;
	}

	public function ultimo_abono($id_venta)
	{
		$sql   = "SELECT saldo, id_venta, id FROM {$this->_table} WHERE id_venta = '$id_venta' ORDER BY id DESC LIMIT 1";
		return $this->db->query($sql)->row_array();
	}

	public function abonar($id_venta, $cantidad)
	{
		if (empty($cantidad) || empty($id_venta)) {
			return FALSE;
		}

		$saldo = $this->ultimo_abono($id_venta);
		$abono = array('fecha' => date('Y-m-d'), 'id_venta' => $id_venta, 'abono' => $cantidad);
		$abono['saldo'] = $saldo['saldo'] - $cantidad;

		if ($this->insert($abono)) {
			if($abono['saldo'] == 0) {
				$this->db->update('ventas', array('saldado' => '1'), "id = '$id_venta'");
			}

			return TRUE;
		} else {
			return FALSE;
		}
	}

}

/* End of file abono.php */
/* Location: ./application/models/abono.php */