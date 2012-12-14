<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ventas extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('clientes/cliente');
		$this->load->model('graduaciones/graduacion');
	}

	public function index()
	{
		$this->session->unset_userdata('venta_cliente');
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
				$id_cliente = $this->db->insert_id();
				$this->session->set_userdata('venta_cliente', $id_cliente);
				redirect('ventas/graduacion/'.$id_cliente);
			}
		}

		$this->template->write('title', 'Agregar Cliente');
		$this->template->write_view('content', 'cliente_nuevo', $datos);
		$this->template->render();
	}

	public function graduaciones($id_cliente = '')
	{
		if (! $this->cliente->exists($id_cliente)) {
			$this->session->set_flashdata('msg_warning', 'El usuario proporcionado no existe. Verificar número e intenter de nuevo');
			redirect('ventas');
		}

		$this->session->set_userdata('venta_cliente', $id_cliente);

		$datos               = array();
		$datos['cliente']    = $this->cliente->get($id_cliente)->row();
		$datos['query']      = $this->graduacion->where('id_cliente', $id_cliente)->get();
		$datos['id_cliente'] = $id_cliente;

		$this->template->write('title', 'Graduaciones');
		$this->template->write_view('content', 'graduaciones/listado_ventas', $datos);
		$this->template->add_js('ventas.js');
		$this->template->render();
	}

	public function agregar_graduacion($id_cliente)
	{
		if (! $this->cliente->exists($id_cliente)) {
			$this->session->set_flashdata('msg_warning', 'El usuario proporcionado no existe. Verificar número e intenter de nuevo');
			redirect('ventas');
		}

		$this->form_validation->set_rules('datos[od_sph]', 'esfera', 'required|trim');
		$this->form_validation->set_rules('datos[od_cyl]', 'cilindro', 'required|trim');
		$this->form_validation->set_rules('datos[od_axis]', 'eje', 'required|trim');
		$this->form_validation->set_rules('datos[od_add]', 'esfera de cerca', 'required|trim');
		$this->form_validation->set_rules('datos[oi_sph]', 'esfera', 'required|trim');
		$this->form_validation->set_rules('datos[oi_cyl]', 'cilindro', 'required|trim');
		$this->form_validation->set_rules('datos[oi_axis]', 'eje', 'required|trim');
		$this->form_validation->set_rules('datos[oi_add]', 'esfera de cerca', 'required|trim');
		$this->form_validation->set_error_delimiters('<span class="help-inline">', '</span>');

		if ($this->form_validation->run()) {
			$_POST['datos']['id_cliente'] = $id_cliente;
			if ($this->graduacion->insert($this->input->post('datos')) !== FALSE) {
				$id_graduacion = $this->db->insert_id();
				$this->session->set_userdata('ventas_graduacion', $id_graduacion);
				redirect('ventas/orden/'.$id_graduacion);
			}
		}

		$datos                = $this->graduacion->prepare_data( $this->input->post('datos') );
		$datos['idcliente']   = $id_cliente;
		$datos['titulo_form'] = 'Agregar Graduación';

		$this->template->write('title', 'Agregar Graduación');
		$this->template->write_view('content', 'graduaciones/form_ventas', $datos);
		$this->template->render();
	}

	public function orden($id_graduacion = '')
	{
		if (! $this->graduacion->exists($id_graduacion)) {
			redirect('ventas');
		}

		$this->load->model('graduaciones/orden');
		$this->load->helper('lentes');

		$datos = $this->orden->prepare_data( $this->input->post('datos') );
		$this->template->write('title', 'Orden a Laboratorio');
		$this->template->write_view('content', 'orden_form', $datos);
		$this->template->render();
	}

	public function articulos()
	{
		if (! $this->session->userdata('venta_cliente')) {
			redirect('ventas');
		}
		
		
		$this->template->render();
	}



}

/* End of file ventas.php */
/* Location: ./application/controllers/ventas.php */