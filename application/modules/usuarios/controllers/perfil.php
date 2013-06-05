<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perfil extends MY_Controller {

	protected $permitidos = array(0,1);
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('usuario');
	}

	public function index()
	{
		$this->form_validation->set_rules('datos[nombre]', 'nombre', 'required|trim');
		$this->form_validation->set_rules('datos[apellidos]', 'apellidos', 'required|trim');
		$this->form_validation->set_error_delimiters('<span class="help-inline">', '</span>');

		if ($this->form_validation->run()) {
			if ($this->usuario->update($this->input->post('datos'), $this->session->userdata('id')) !== FALSE) {
				$datos = $this->input->post('datos');
				$this->session->set_userdata($datos);
				$this->session->set_flashdata('msg_success', 'Los datos del perfil han sido actualizados.');
				redirect('usuarios/perfil');
			}
		}

		if ($this->input->post('datos')) {
			$datos = $this->input->post('datos');
		} else {
			$datos = $this->usuario->get($this->session->userdata('id'))->row_array();
		}

		$this->template->write('title', 'Datos de Usuario');
		$this->template->write_view('content', 'form_perfil', $datos);
		$this->template->render();
	}

	public function password()
	{
		$this->form_validation->set_rules('actual', 'contraseña actual', 'required|min_length[6]|callback_password_check|trim');
		$this->form_validation->set_rules('datos[pass]', 'nueva contraseña', 'required|min_length[6]|matches[repetir]|trim');
		$this->form_validation->set_rules('repetir', 'repetir contraseña', 'required|trim');
		$this->form_validation->set_error_delimiters('<span class="help-inline">', '</span>');

		if ($this->form_validation->run()) {
			if ($this->usuario->update($this->input->post('datos'), $this->session->userdata('id')) !== FALSE) {
				$this->session->set_flashdata('msg_success', 'La contraseña ha sido cambiada.');
				redirect('usuarios/perfil/password');
			}
		}

		$this->template->write('title', 'Cambiar Contraseña');
		$this->template->write_view('content', 'password');
		$this->template->render();
	}

	public function password_check($pass)
	{
		if ($this->usuario->comparar_password($pass, $this->session->userdata('id'))) {
			return TRUE;
		} else {
			$this->form_validation->set_message('password_check', 'La contraseña actual es incorrecta.');
			return FALSE;
		}
	}

}

/* End of file perfil.php */
/* Location: ./application/controllers/perfil.php */