<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lineas extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('linea');
	}

	public function index()
	{
		if ($this->input->post('del')) {
			$this->linea->delete($this->input->post('del'));
			$this->session->set_flashdata('msg_success', 'Las lineas han sido eliminadas de manera permanente.');
			redirect('clientes');
		}

		$default = array('buscar', 'offset');
		$param   = $this->uri->uri_to_assoc(4, $default);
		$num_results = 15;

		$param['buscar'] = ($this->input->post('buscar') != '') ? $this->input->post('buscar', TRUE):$param['buscar'];

		$this->load->library('pagination');
		$datos  = array();
		$datos['msg_success'] = $this->session->flashdata('msg_success');
		$datos['query']  = $this->linea->busqueda( $param['buscar'], $param['offset'], $num_results );
		$datos['buscar'] = $param['buscar'];
		$datos['form_action'] = '/catalogo/lineas';

		if (empty($param['buscar'])) {
			unset($param['buscar']);
			$config['uri_segment'] = 5;
		} else {
			$config['uri_segment'] = 7;
		}

		$param['offset'] = '';
		$config['total_rows']    = $this->linea->found_rows();
		$config['full_tag_open'] = '<div class="pagination pagination-right"><ul>';
		$config['base_url']      = '/catalogo/lineas/index/'.$this->uri->assoc_to_uri($param);
		$config['per_page']      = $num_results;
		$this->pagination->initialize($config);
		
		$this->template->write('title', 'Lineas de Artículos');
		$this->template->write_view('content', 'lineas_tabla', $datos);
		$this->template->asset_js('consulta.js');
		$this->template->render();
	}

	public function agregar()
	{
		$this->form_validation->set_rules('datos[nombre]', 'nombre', 'required|trim');
		$this->form_validation->set_error_delimiters('<span class="help-inline">', '</span>');

		if ($this->form_validation->run()) {
			if ($this->linea->insert( $this->input->post('datos') )) {
				$this->session->set_flashdata('msg_success', 'La nueva linea de artículos ha sido agregada.');
				redirect('catalogo/lineas');
			}
		}

		$datos = $this->linea->prepare_data( $this->input->post('datos') );
		$datos['titulo_form'] = 'Linea Nueva';

		$this->template->write('title', 'Agregar Linea');
		$this->template->write_view('content', 'linea_form', $datos);
		$this->template->render();
	}

	public function editar($id = '')
	{
		if (! $this->linea->exists($id)) {
			redirect('catalogo/lineas');
		}

		$this->form_validation->set_rules('datos[nombre]', 'nombre', 'required|trim');
		$this->form_validation->set_error_delimiters('<span class="help-inline">', '</span>');

		if ($this->form_validation->run()) {
			if ($this->linea->update($this->input->post('datos'), $id) !== FALSE) {
				$this->session->set_flashdata('msg_success', 'Los datos la linea han sido actualizados.');
				redirect('catalogo/lineas');
			}
		}

		$edit = $this->linea->get($id)->row_array();
		$datos = $this->linea->prepare_data($this->input->post('datos'), $edit);
		$datos['titulo_form'] = 'Editar Linea';
		$this->template->write('title', 'Editar Linea');
		$this->template->write_view('content', 'linea_form', $datos);
		$this->template->render();

	}

	public function eliminar($id = '')
	{
		if ($this->linea->exists($id)) {
			$this->linea->delete($id);
			$this->session->set_flashdata('msg_success', 'La linea de artículos ha sido eliminada.');
		}

		redirect('catalogo/lineas');
	}

}

/* End of file lineas.php */
/* Location: ./application/controllers/lineas.php */