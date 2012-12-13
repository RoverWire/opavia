<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Graduaciones extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('clientes/cliente');
		$this->load->model('graduacion');
	}

	public function index($id_cliente = '')
	{
		if (! $this->cliente->exists($id_cliente)) {
			redirect('');
		}

		$datos               = array();
		$datos['query']      = $this->graduacion->where('id_cliente', $id_cliente)->get();
		$datos['id_cliente'] = $id_cliente;

		$this->template->write('title', 'Graduaciones del Cliente');
		$this->template->write_view('content', 'table', $datos);
		$this->template->render();
	}

	public function agregar($idcliente = '')
	{
		if (! $this->cliente->exists($id_cliente)) {
			redirect('');
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
				$this->session->set_flashdata('msg_success', 'La graduación ha sido añadida al usuario.');
				redirect('graduaciones/index/'.$id_cliente);
			}
		}

		$datos                = $this->graduacion->prepare_data( $this->input->post('datos') );
		$datos['idcliente']   = $id_cliente;
		$datos['titulo_form'] = 'Agregar Graduación';

		$this->template->write('title', 'Nueva Graduación');
		$this->template->write_view('content', 'form', $datos);
		$this->template->render();
	}

	public function editar($id = '')
	{
		if (! $this->graduacion->exists($id)) {
			redirect('');
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
		$update = $this->graduacion->get($id)->row_array();

		if ($this->form_validation->run()) {
			if ($this->graduacion->update($this->input->post('datos'), $id) !== FALSE) {
				$this->session->set_flashdata('msg_success', 'Las modificaciones en la graduación han sido actualizadas.');
				redirect('graduaciones/index/'.$update['id_cliente']);
			}
		}

		
		$datos                = $this->graduacion->prepare_data($update, $this->input->post('datos') );
		$datos['titulo_form'] = 'Editar Graduación';

		$this->template->write('title', 'Editar Graduación');
		$this->template->write_view('content', 'form', $datos);
		$this->template->render();
	}

}

/* End of file graduaciones.php */
/* Location: ./application/controllers/graduaciones.php */