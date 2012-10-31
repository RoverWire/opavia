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
		$this->load->helper('formulario');
		$this->load->model('clientes/cliente');
		$this->form_validation->set_rules('datos[nombre]', 'nombre', 'required|trim');
		$this->form_validation->set_rules('datos[apellidos]', 'apellidos', 'required|trim');
		$this->form_validation->set_rules('datos[email]', 'e-mail', 'required|valid_email|trim');

		$datos = $this->cliente->prepare_data( $this->input->post('datos') );

		if ($this->form_validation->run()) {
			if ($this->cliente->insert( $this->input->post('datos') )) {
				$this->session->set_flashdata('msg_success', 'El cliente ha sido agregado.');
				redirect('ventas/nueva');
			}
		}

		$this->template->write('title', 'Agregar Cliente');
		$this->template->write_view('content', 'cliente_nuevo', $datos);
		$this->template->render();
	}

	public function nueva()
	{
		$this->template->render();
	}



}

/* End of file ventas.php */
/* Location: ./application/controllers/ventas.php */