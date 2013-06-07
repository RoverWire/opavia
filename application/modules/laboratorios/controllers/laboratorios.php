<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laboratorios extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('laboratorio');
	}

	public function index()
	{
		if ($this->input->post('del')) {
			$this->laboratorio->delete($this->input->post('del'));
			$this->session->set_flashdata('msg_success', 'Los laboratorios han sido eliminados de manera permanente.');
			redirect('laboratorios');
		}

		$default = array('buscar', 'offset');
		$param   = $this->uri->uri_to_assoc(3, $default);
		$num_results = 15;

		$param['buscar'] = ($this->input->post('buscar') != '') ? $this->input->post('buscar', TRUE):$param['buscar'];

		$this->load->library('pagination');
		$datos  = array();
		$datos['msg_success'] = $this->session->flashdata('msg_success');
		$datos['query']  = $this->laboratorio->busqueda( $param['buscar'], $param['offset'], $num_results );
		$datos['buscar'] = $param['buscar'];
		$datos['form_action'] = '/laboratorios';

		if (empty($param['buscar'])) {
			unset($param['buscar']);
			$config['uri_segment'] = 4;
		} else {
			$config['uri_segment'] = 6;
		}

		$param['offset'] = '';
		$config['total_rows']    = $this->laboratorio->found_rows();
		$config['full_tag_open'] = '<div class="pagination pagination-right"><ul>';
		$config['base_url']      = '/laboratorios/index/'.$this->uri->assoc_to_uri($param);
		$config['per_page']      = $num_results;
		$this->pagination->initialize($config);

		$this->template->write('title', 'Laboratorios');
		$this->template->write_view('content', 'tabla', $datos);
		$this->template->asset_js('consulta.js');
		$this->template->render();
	}

	public function agregar()
	{
		$this->load->helper('formulario');
		$this->form_validation->set_rules('datos[nombre]', 'nombre', 'required|trim');
		$this->form_validation->set_rules('datos[direccion]', 'direccion', 'required|trim');
		$this->form_validation->set_rules('datos[telefono]', 'telefono', 'required|trim');
		$this->form_validation->set_error_delimiters('<span class="help-inline">', '</span>');

		if ($this->form_validation->run()) {
			if ($this->laboratorio->insert( $this->input->post('datos') )) {
				$this->session->set_flashdata('msg_success', 'El laboratorio ha sido agregado.');
				redirect('laboratorios');
			}
		}

		$datos = $this->laboratorio->prepare_data( $this->input->post('datos') );
		$datos['titulo_form'] = 'Laboratorio Nuevo';

		$this->template->write('title', 'Agregar Laboratorio');
		$this->template->write_view('content', 'form', $datos);
		$this->template->render();
	}

	public function editar($id = '')
	{
		if (! $this->laboratorio->exists($id)) {
			redirect('laboratorios');
		}

		$edit = $this->laboratorio->get($id)->row_array();
		$this->form_validation->set_rules('datos[nombre]', 'nombre', 'required|trim');
		$this->form_validation->set_rules('datos[telefono]', 'telefono', 'required|trim');
		$this->form_validation->set_rules('datos[direccion]', 'dirección', 'required|trim');
		$this->form_validation->set_error_delimiters('<span class="help-inline">', '</span>');

		if ($this->form_validation->run()) {
			if ($this->laboratorio->update($this->input->post('datos'), $id) !== FALSE) {
				$this->session->set_flashdata('msg_success', 'Los datos del laboratorio han sido actualizados.');
				redirect('laboratorios');
			}
		}

		$this->load->helper('formulario');
		$datos = $this->laboratorio->prepare_data($this->input->post('datos'), $edit);
		$datos['titulo_form'] = 'Editar Laboratorio';
		$this->template->write('title', 'Editar Laboratorio');
		$this->template->write_view('content', 'form', $datos);
		$this->template->render();
	}

	public function eliminar($id = '')
	{
		if ($this->laboratorio->exists($id)) {
			$this->laboratorio->delete($id);
			$this->session->set_flashdata('msg_success', 'El laboratorio ha sido eliminado de forma permanente.');
		}

		redirect('laboratorios');
	}

}

/* End of file laboratorios.php */
/* Location: ./application/controllers/laboratorios.php */