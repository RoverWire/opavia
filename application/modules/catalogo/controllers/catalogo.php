<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Catalogo extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('articulo');
		$this->load->model('linea');
		$this->load->model('proveedores/proveedor');
	}

	public function index()
	{
		if ($this->input->post('del')) {
			$this->articulo->delete($this->input->post('del'));
			$this->session->set_flashdata('msg_success', 'Los artículos han sido eliminados de manera permanente.');
			redirect('clientes');
		}

		$datos = array();
		$datos['query'] = $this->articulo->get();
		$this->template->write('title', 'Artículos');
		$this->template->write_view('content', 'tabla', $datos);
		$this->template->asset_js('consulta.js');
		$this->template->render();
	}

	public function agregar()
	{
		$this->form_validation->set_rules('datos[nombre]', 'nombre', 'required|trim');
		$this->form_validation->set_rules('datos[id_linea]', 'linea', 'required|trim');
		$this->form_validation->set_rules('datos[id_proveedor]', 'proveedor', 'required|trim');
		$this->form_validation->set_rules('datos[marca]', 'marca', 'required|trim');
		$this->form_validation->set_error_delimiters('<span class="help-inline">', '</span>');

		if ($this->form_validation->run()) {
			if ($this->articulo->insert( $this->input->post('datos') ) !== FALSE) {
				$this->session->set_flashdata('msg_success', 'El nuevo artículo ha sido agregado.');
				redirect('catalogo');
			}
		}

		$datos = $this->articulo->prepare_data( $this->input->post('datos') );
		$datos['id_linea'] = $this->linea->dropdown_opt('id', 'nombre', $datos['id_linea']);
		$datos['id_proveedor'] = $this->proveedor->dropdown_opt('id', 'nombre', $datos['id_proveedor']);
		$datos['titulo_form'] = 'Artículo Nuevo';

		$this->template->write('title', 'Agregar Artículo');
		$this->template->write_view('content', 'form', $datos);
		$this->template->render();
	}

	public function editar($id = '')
	{
		if (! $this->articulo->exists($id)) {
			redirect('catalogo');
		}

		$this->form_validation->set_rules('datos[nombre]', 'nombre', 'required|trim');
		$this->form_validation->set_rules('datos[id_linea]', 'linea', 'required|trim');
		$this->form_validation->set_rules('datos[id_proveedor]', 'proveedor', 'required|trim');
		$this->form_validation->set_rules('datos[marca]', 'marca', 'required|trim');
		$this->form_validation->set_error_delimiters('<span class="help-inline">', '</span>');

		if ($this->form_validation->run()) {
			if ($this->articulo->update($this->input->post('datos'), $id) !== FALSE) {
				$this->session->set_flashdata('msg_success', 'Los datos del artículo han sido actualizados.');
				redirect('catalogo');
			}
		}

		$edit = $this->articulo->get($id)->row_array();
		$datos = $this->articulo->prepare_data($this->input->post('datos'), $edit);
		$datos['id_linea'] = $this->linea->dropdown_opt('id', 'nombre', $datos['id_linea']);
		$datos['id_proveedor'] = $this->proveedor->dropdown_opt('id', 'nombre', $datos['id_proveedor']);
		$datos['titulo_form'] = 'Editar Articulo';
		$this->template->write('title', 'Editar Articulo');
		$this->template->write_view('content', 'form', $datos);
		$this->template->render();
	}

	public function eliminar($id = '')
	{
		if ($this->articulo->exists($id)) {
			$this->articulo->delete($id);
			$this->session->set_flashdata('msg_success', 'El artículo ha sido eliminado.');
		}

		redirect('catalogo');
	}

}

/* End of file catalogo.php */
/* Location: ./application/controllers/catalogo.php */