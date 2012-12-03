<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ventas extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('clientes/cliente');
	}

	public function index()
	{
		$this->template->write('title', 'Ventas');
		$this->template->write_view('content', 'venta_nueva');
		$this->template->render();
	}

	public function clientes()
	{
		$datos = array();
		$datos['buscar'] = $this->input->post('buscar', TRUE);
		$datos['query']  = $this->cliente->busqueda($datos['buscar']);

		$this->template->write_view('content', 'cliente_listado', $datos);
		$this->template->write('title', 'Listado de Clientes');
		$this->template->render();
	}

	public function cliente_nuevo()
	{
		$this->load->helper('formulario');
		$this->form_validation->set_error_delimiters('<span class="help-inline">', '</span>');
		$this->form_validation->set_rules('datos[nombre]', 'nombre', 'required|trim');
		$this->form_validation->set_rules('datos[apellidos]', 'apellidos', 'required|trim');
		$this->form_validation->set_rules('datos[telefono]', 'telefono', 'required|trim');
		$this->form_validation->set_rules('datos[email]', 'e-mail', 'required|valid_email|trim');

		$datos = $this->cliente->prepare_data( $this->input->post('datos') );

		if ($this->form_validation->run()) {
			if ($this->cliente->insert( $this->input->post('datos') )) {
				$this->session->set_flashdata('msg_success', 'El cliente ha sido agregado.');
				redirect('ventas/nueva/'.$this->db->insert_id());
			}
		}

		$this->template->write('title', 'Agregar Cliente');
		$this->template->write_view('content', 'cliente_nuevo', $datos);
		$this->template->render();
	}

	public function nueva($idcliente)
	{
		if (! $this->cliente->exists($idcliente)) {
			$this->session->set_flashdata('msg_warning', 'El usuario proporcionado no existe. Verificar número e intenter de nuevo');
			redirect('ventas');
		}

		$datos = array();
		$datos['cliente'] = $this->cliente->get($idcliente)->row();
		$this->template->write('title', 'Venta');
		$this->template->write_view('content', 'venta', $datos);
		$this->template->add_js('ventas.js');
		$this->template->render();
	}



}

/* End of file ventas.php */
/* Location: ./application/controllers/ventas.php */