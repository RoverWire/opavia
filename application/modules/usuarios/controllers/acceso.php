<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Acceso extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('usuario');
		$this->load->model('direccion_ip');
		$this->form_validation->set_rules('usuario', 'usuario', 'required|trim');
		$this->form_validation->set_rules('pass', 'contraseña', 'required|trim');

		if ($this->form_validation->run()) {
			if ($this->usuario->auth($this->input->post('usuario', TRUE), $this->input->post('pass', TRUE))) {
				$data = $this->usuario->por_usuario($this->input->post('usuario', TRUE));
				$user = $data->row_array();
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

}

/* End of file acceso.php */
/* Location: ./application/controllers/acceso.php */