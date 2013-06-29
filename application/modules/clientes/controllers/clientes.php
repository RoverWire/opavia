<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clientes extends MY_Controller {

	protected $permitidos = array(0,1);

	public function __construct()
	{
		parent::__construct();
		$this->load->model('cliente');
	}

	public function index()
	{
		if ($this->input->post('del')) {
			$this->cliente->delete($this->input->post('del'));
			$this->session->set_flashdata('msg_success', 'Los clientes han sido eliminados de manera permanente.');
			redirect('clientes');
		}

		$default = array('buscar', 'offset');
		$param   = $this->uri->uri_to_assoc(3, $default);
		$num_results = 15;

		$param['buscar'] = ($this->input->post('buscar') != '') ? $this->input->post('buscar', TRUE):$param['buscar'];

		$this->load->library('pagination');
		$datos  = array();
		$datos['msg_success'] = $this->session->flashdata('msg_success');
		$datos['query']  = $this->cliente->busqueda( $param['buscar'], $param['offset'], $num_results );
		$datos['buscar'] = $param['buscar'];
		$datos['form_action'] = '/clientes';

		if (empty($param['buscar'])) {
			unset($param['buscar']);
			$config['uri_segment'] = 4;
		} else {
			$config['uri_segment'] = 6;
		}

		$param['offset'] = '';
		$config['total_rows']    = $this->cliente->found_rows();
		$config['full_tag_open'] = '<div class="pagination pagination-right"><ul>';
		$config['base_url']      = '/clientes/index/'.$this->uri->assoc_to_uri($param);
		$config['per_page']      = $num_results;
		$this->pagination->initialize($config);
		
		$this->template->write('title', 'Clientes');
		$this->template->write_view('content', 'tabla', $datos);
		$this->template->asset_js('consulta.js');
		$this->template->render();
	}

	public function agregar()
	{
		$this->load->helper('formulario');
		$this->form_validation->set_rules('datos[nombre]', 'nombre', 'required|trim');
		$this->form_validation->set_rules('datos[apellidos]', 'apellidos', 'required|trim');
		$this->form_validation->set_error_delimiters('<span class="help-inline">', '</span>');

		if (!empty($_POST['datos']['email'])) {
			$this->form_validation->set_rules('datos[email]', 'e-mail', 'valid_email|trim');
		}

		if ($this->form_validation->run()) {
			if ($this->cliente->insert( $this->input->post('datos') )) {
				$this->session->set_flashdata('msg_success', 'El cliente ha sido agregado.');
				redirect('clientes');
			}
		}

		$datos = $this->cliente->prepare_data( $this->input->post('datos') );
		$datos['titulo_form'] = 'Cliente Nuevo';

		$this->template->write('title', 'Agregar Cliente');
		$this->template->write_view('content', 'form', $datos);
		$this->template->render();
	}

	public function editar($id = '')
	{
		if (! $this->cliente->exists($id)) {
			redirect('clientes');
		}

		$edit = $this->cliente->get($id)->row_array();
		$this->form_validation->set_rules('datos[nombre]', 'nombre', 'required|trim');
		$this->form_validation->set_rules('datos[apellidos]', 'apellidos', 'required|trim');
		$this->form_validation->set_error_delimiters('<span class="help-inline">', '</span>');

		if (!empty($_POST['datos']['email'])) {
			$this->form_validation->set_rules('datos[email]', 'e-mail', 'valid_email|trim');
		}

		if ($this->form_validation->run()) {
			if ($this->cliente->update($this->input->post('datos'), $id) !== FALSE) {
				$this->session->set_flashdata('msg_success', 'Los datos del cliente han sido actualizados.');
				redirect('clientes');
			}
		}

		$this->load->helper('formulario');
		$datos = $this->cliente->prepare_data($this->input->post('datos'), $edit);
		$datos['titulo_form'] = 'Editar Cliente';
		$this->template->write('title', 'Editar Cliente');
		$this->template->write_view('content', 'form', $datos);
		$this->template->render();
	}

	public function eliminar($id = '')
	{
		if ($this->cliente->exists($id)) {
			$this->cliente->delete($id);
			$this->session->set_flashdata('msg_success', 'El cliente ha sido eliminado de forma permanente.');
		}

		redirect('clientes');
	}

	public function detalles($id = '')
	{
		if (! $this->cliente->exists($id)) {
			redirect('clientes');
		}

		$this->load->model('ventas/venta');

		$datos            = array();
		$datos['cliente'] = $this->cliente->get($id)->row();
		$datos['credito'] = $this->venta->creditos_cliente($id);
		$datos['compra']  = $this->venta->compras_cliente($id);
		$datos['cotizacion']  = $this->venta->cotizaciones_cliente($id);
		$this->template->write('title', 'Detalles de Cliente');
		$this->template->write_view('content', 'details', $datos);
		$this->template->render();
	}

}

/* End of file clientes.php */
/* Location: ./application/controllers/clientes.php */