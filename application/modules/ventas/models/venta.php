<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Venta extends MY_Model {

	protected $_table = 'ventas';
	protected $_id = 'id';
	protected $field_names = array('total', 'subtotal', 'saldado', 'fecha_entrega', 'lente', 'material', 'tipo', 'tinte', 'intensidad', 'aplicacion', 'tratamiento', 'id_graduacion', 'id_laboratorio', 'id_cliente');

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

}

/* End of file venta.php */
/* Location: ./application/models/venta.php */