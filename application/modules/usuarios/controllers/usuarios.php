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
		$this->form_validation->set_rules('datos[nombre]', 'nombre', 'required|max_length[150]|trim');
		$this->form_validation->set_rules('datos[apellidos]', 'apellidos', 'required|max_length[150]|trim');
		$this->form_validation->set_rules('datos[usuario]', 'usuario', 'required|max_length[50]|is_unique[usuarios.usuario]|trim');
		$this->form_validation->set_rules('datos[pass]', 'contraseña', 'required|matches[repetir]|trim');
		$this->form_validation->set_rules('repetir', 'repetir contraseña', 'required|trim');
		$this->form_validation->set_rules('datos[tipo]', 'tipo de usuario', 'required|integer|trim');
		$this->form_validation->set_rules('datos[activo]', 'estado', 'required|integer|trim');

		$this->form_validation->set_error_delimiters('<span class="help-inline">', '</span>');

		if ($this->form_validation->run()) {
			
		}

		$this->template->write('title', 'Agregar Usuario');
		$this->template->write_view('content', 'form');
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