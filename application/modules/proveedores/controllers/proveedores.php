<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Proveedores extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('proveedor');
	}

	public function index()
	{
		if ($this->input->post('del')) {
			$this->proveedor->delete($this->input->post('del'));
			$this->session->set_flashdata('msg_success', 'Los proveedores han sido eliminados de manera permanente.');
			redirect('clientes');
		}

		$default = array('buscar', 'offset');
		$param   = $this->uri->uri_to_assoc(3, $default);
		$num_results = 15;

		$param['buscar'] = ($this->input->post('buscar') != '') ? $this->input->post('buscar', TRUE):$param['buscar'];

		$this->load->library('pagination');
		$datos  = array();
		$datos['msg_success'] = $this->session->flashdata('msg_success');
		$datos['query']  = $this->proveedor->busqueda( $param['buscar'], $param['offset'], $num_results );
		$datos['buscar'] = $param['buscar'];
		$datos['form_action'] = '/proveedores';

		if (empty($param['buscar'])) {
			unset($param['buscar']);
			$config['uri_segment'] = 4;
		} else {
			$config['uri_segment'] = 6;
		}

		$param['offset'] = '';
		$config['total_rows']    = $this->proveedor->found_rows();
		$config['full_tag_open'] = '<div class="pagination pagination-right"><ul>';
		$config['base_url']      = '/proveedores/index/'.$this->uri->assoc_to_uri($param);
		$config['per_page']      = $num_results;
		$this->pagination->initialize($config);

		$this->template->write('title', 'Proveedores');
		$this->template->write_view('content', 'tabla', $datos);
		$this->template->asset_js('consulta.js');
		$this->template->render();
	}

	public function agregar()
	{
		$this->load->helper('formulario');
		$this->form_validation->set_rules('datos[nombre]', 'nombre', 'required|trim');
		$this->form_validation->set_rules('datos[rfc]', 'rfc', 'required|trim');
		$this->form_validation->set_error_delimiters('<span class="help-inline">', '</span>');

		if ($this->form_validation->run()) {
			if ($this->proveedor->insert( $this->input->post('datos') )) {
				$this->session->set_flashdata('msg_success', 'El proveedor ha sido agregado.');
				redirect('proveedores');
			}
		}

		$datos = $this->proveedor->prepare_data( $this->input->post('datos') );
		$datos['titulo_form'] = 'Proveedor Nuevo';

		$this->template->write('title', 'Agregar Proveedor');
		$this->template->write_view('content', 'form', $datos);
		$this->template->render();
	}

	public function editar($id = '')
	{
		if (! $this->proveedor->exists($id)) {
			redirect('proveedores');
		}

		$edit = $this->proveedor->get($id)->row_array();
		$this->form_validation->set_rules('datos[nombre]', 'nombre', 'required|trim');
		$this->form_validation->set_rules('datos[rfc]', 'rfc', 'required|trim');
		$this->form_validation->set_error_delimiters('<span class="help-inline">', '</span>');

		if ($this->form_validation->run()) {
			if ($this->proveedor->update($this->input->post('datos'), $id) !== FALSE) {
				$this->session->set_flashdata('msg_success', 'Los datos del proveedor han sido actualizados.');
				redirect('proveedores');
			}
		}

		$this->load->helper('formulario');
		$datos = $this->proveedor->prepare_data($this->input->post('datos'), $edit);
		$datos['titulo_form'] = 'Editar Proveedor';
		$this->template->write('title', 'Editar Proveedor');
		$this->template->write_view('content', 'form', $datos);
		$this->template->render();
	}

	public function eliminar($id = '')
	{
		if ($this->proveedor->exists($id)) {
			$this->proveedor->delete($id);
			$this->session->set_flashdata('msg_success', 'El proveedor ha sido eliminado de forma permanente.');
		}

		redirect('proveedores');
	}

}

/* End of file proveedores.php */
/* Location: ./application/controllers/proveedores.php */