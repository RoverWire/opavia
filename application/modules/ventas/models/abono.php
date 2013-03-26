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

}

/* End of file abono.php */
/* Location: ./application/models/abono.php */