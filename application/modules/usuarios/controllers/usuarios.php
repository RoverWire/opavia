<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('usuario');
	}

	public function index()
	{
		if ($this->input->post('del')) {
			$this->usuario->delete($this->input->post('del'));
			$this->session->set_flashdata('msg_success', 'Los usuarios han sido eliminados de manera permanente.');
			redirect('usuarios');
		}

		$datos = array();
		$datos['query'] = $this->usuario->get();
		$datos['msg_success'] = $this->session->flashdata('msg_success');
		$this->template->write('title', 'Usuarios');
		$this->template->write_view('content', 'table', $datos);
		$this->template->asset_js('consulta.js');
		$this->template->render();
	}

	public function agregar()
	{
		$this->load->helper('formulario');
		$this->form_validation->set_rules('datos[nombre]', 'nombre', 'required|max_length[150]|trim');
		$this->form_validation->set_rules('datos[apellidos]', 'apellidos', 'required|max_length[150]|trim');
		$this->form_validation->set_rules('datos[usuario]', 'usuario', 'required|max_length[50]|is_unique[usuarios.usuario]|trim');
		$this->form_validation->set_rules('datos[pass]', 'contraseña', 'required|min_length[6]|matches[repetir]|trim');
		$this->form_validation->set_rules('repetir', 'repetir contraseña', 'required|trim');
		$this->form_validation->set_rules('datos[tipo]', 'tipo de usuario', 'required|integer|trim');
		$this->form_validation->set_rules('datos[activo]', 'estado', 'required|integer|trim');

		$this->form_validation->set_error_delimiters('<span class="help-inline">', '</span>');

		if ($this->form_validation->run()) {
			if ($this->usuario->insert( $this->input->post('datos') )) {
				$this->session->set_flashdata('msg_success', 'El usuario ha sido agregado.');
				redirect('usuarios');
			}
		}

		$datos = $this->usuario->prepare_data($this->input->post('datos'));
		$datos['titulo_form'] = 'Agregar Usuario';

		$this->template->write('title', 'Agregar Usuario');
		$this->template->write_view('content', 'form', $datos);
		$this->template->render();
	}

	public function editar($id = '')
	{
		if (! $this->usuario->exists($id)) {
			redirect('usuarios');
		}

		$this->load->helper('formulario');
		$edit = $this->usuario->get($id)->row_array();

		$this->form_validation->set_rules('datos[nombre]', 'nombre', 'required|max_length[150]|trim');
		$this->form_validation->set_rules('datos[apellidos]', 'apellidos', 'required|max_length[150]|trim');
		$this->form_validation->set_rules('datos[tipo]', 'tipo de usuario', 'required|integer|trim');
		$this->form_validation->set_rules('datos[activo]', 'estado', 'required|integer|trim');

		if (isset($_POST['datos']['usuario']) && strtolower($edit['usuario']) != strtolower($_POST['datos']['usuario'])) {
			$this->form_validation->set_rules('datos[usuario]', 'usuario', 'required|max_length[50]|is_unique[usuarios.usuario]|trim');
		}

		if ((isset($_POST['datos']['pass']) && !empty($_POST['datos']['pass'])) || $this->input->post('repetir')) {
			$this->form_validation->set_rules('datos[pass]', 'contraseña', 'required|min_length[6]|matches[repetir]|trim');
			$this->form_validation->set_rules('repetir', 'repetir contraseña', 'required|trim');
		}

		$this->form_validation->set_error_delimiters('<span class="help-inline">', '</span>');

		if ($this->form_validation->run()) {
			if ($this->usuario->update($this->input->post('datos'), $id) !== FALSE) {
				$this->session->set_flashdata('msg_success', 'Los datos del usuario han sido actualizados.');
				redirect('usuarios');
			} else {
				
			}
		}

		if ($this->input->post('datos')) {
			$datos = $this->input->post('datos');
		} else {
			$datos = $edit;
		}

		$datos = $this->usuario->prepare_data($datos);
		$datos['titulo_form'] = 'Editar Usuario';

		$this->template->write('title', 'Editar Usuario');
		$this->template->write_view('content', 'form', $datos);
		$this->template->render();
	}

	public function eliminar($id = '')
	{
		if ($this->usuario->exists($id)) {
			$this->usuario->delete($id);
			$this->session->set_flashdata('msg_success', 'El usuario ha sido eliminado de forma permanente.');
		}

		redirect('usuarios');
	}

	public function login()
	{
		$this->load->model('direccion_ip');
		$this->form_validation->set_rules('usuario', 'usuario', 'required|trim');
		$this->form_validation->set_rules('pass', 'contraseña', 'required|trim');

		if ($this->form_validation->run()) {
			if ($this->usuario->auth($this->input->post('usuario', TRUE), $this->input->post('pass', TRUE))) {
				$data = $this->usuario->por_usuario($this->input->post('usuario', TRUE));
				$user = $data->row_array();
				unset($user['pass']);
				$this->session->set_userdata($user);
				redirect('');
			} else {
				$intentos = $this->direccion_ip->intento($this->input->ip_address());
			}
		}

		$this->template->set_master_template('clean');
		$this->template->write('title', 'Inicio de Sesión');
		$this->template->write_view('content', 'login');
		$this->template->render();
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('usuarios/login');
	}

}

/* End of file usuarios.php */
/* Location: ./application/controllers/usuarios.php */