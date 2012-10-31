<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ventas extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->template->write('title', 'Ventas');
		$this->template->write_view('content', 'venta_nueva');
		$this->template->render();
	}

	public function clientes()
	{
		$this->template->render();
	}

	public function cliente_nuevo()
	{
		$this->load->model('usuarios/usuario');
		$this->template->render();
	}

}

/* End of file ventas.php */
/* Location: ./application/controllers/ventas.php */