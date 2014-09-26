<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reportes extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{
		$this->load->model('venta');
		$this->form_validation->set_rules('inicio', 'fecha inicio', 'required|callback_fecha|trim');
		$this->form_validation->set_rules('final', 'fecha final', 'required|callback_fecha|trim');
		$this->form_validation->set_error_delimiters('<span class="help-inline">', '</span>');
		$query = '';

		if ($this->form_validation->run()) {
			$query = $this->venta->reporte($this->input->post('inicio'), $this->input->post('final'), $this->input->post('filtro'));
		}

		if ($this->input->post('descarga') == 1) {
			$contenido = $this->load->view('reporte_tabla', array('datos' => $query), TRUE);
			header("Content-type: application/octet-stream");
			header("Content-Disposition: attachment; filename=reporte.xls");
			header("Pragma: no-cache");
			header("Expires: 0");
			echo $contenido;
		} else {
			$this->template->write_view('content', 'reportes', array('datos' => $query));
			$this->template->write('title', 'Reportes de Ventas');
			$this->template->render();
		}
	}

	public function ventas()
	{
		$this->load->model('venta_articulo');
		$this->form_validation->set_rules('inicio', 'fecha inicio', 'required|callback_fecha|trim');
		$this->form_validation->set_rules('final', 'fecha final', 'required|callback_fecha|trim');
		$this->form_validation->set_error_delimiters('<span class="help-inline">', '</span>');
		$query = '';

		if ($this->form_validation->run()) {
			$query = $this->venta_articulo->reporte($this->input->post('inicio'), $this->input->post('final'));
		}

		if ($this->input->post('descarga') == 1) {
			$contenido = $this->load->view('reporte_tabla_ventas', array('datos' => $query), TRUE);
			header("Content-type: application/octet-stream");
			header("Content-Disposition: attachment; filename=reporte.xls");
			header("Pragma: no-cache");
			header("Expires: 0");
			echo $contenido;
		} else {
			$this->template->write_view('content', 'reportes_ventas', array('datos' => $query));
			$this->template->write('title', 'Reportes de Ventas');
			$this->template->render();
		}
	}

	public function almacen()
	{
		$this->load->model('catalogo/articulo');
		$query = $this->articulo->busqueda('', 0, 0, 0, FALSE);
		$contenido = $this->load->view('reporte_almacen', array('query' => $query), TRUE);
		header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment; filename=almacen.xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		echo $contenido;
	}

	public function fecha($str)
	{
		if (! preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $str)) {
			$this->form_validation->set_message('fecha', 'El campo %s no tiene un formato de fecha válido.');
			return FALSE;
		} else {
			return TRUE;
		}
	}

}

/* End of file reportes.php */
/* Location: ./application/controllers/reportes.php */