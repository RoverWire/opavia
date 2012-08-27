<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('usuario');
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
		
	}

}

/* End of file usuarios.php */
/* Location: ./application/controllers/usuarios.php */