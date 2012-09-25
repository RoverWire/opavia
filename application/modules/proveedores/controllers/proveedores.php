<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Proveedores extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('proveedor');
	}

	public function index()
	{
		$this->template->render();
	}

	public function agregar()
	{
		$this->template->render();
	}

	public function editar($id = '')
	{
		$this->template->render();
	}

	public function eliminar($id = '')
	{
		redirect('proveedores');
	}

}

/* End of file proveedores.php */
/* Location: ./application/controllers/proveedores.php */