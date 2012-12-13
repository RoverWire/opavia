<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Graduaciones extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('clientes/cliente');
		$this->load->model('graduacion');
	}

	public function index($idcliente = '')
	{
		if (! $this->cliente->exists($idcliente)) {
			redirect('');
		}

		$this->template->render();
	}

	public function agregar($idcliente = '')
	{
		if (! $this->cliente->exists($idcliente)) {
			redirect('');
		}

		$this->form_validation->set_rules('od_sph', 'esfera', 'required|trim');
		$this->form_validation->set_rules('od_cyl', 'cilindro', 'required|trim');
		$this->form_validation->set_rules('od_axis', 'eje', 'required|trim');
		$this->form_validation->set_rules('od_add', 'esfera de cerca', 'required|trim');
		$this->form_validation->set_rules('oi_sph', 'esfera', 'required|trim');
		$this->form_validation->set_rules('oi_cyl', 'cilindro', 'required|trim');
		$this->form_validation->set_rules('oi_axis', 'eje', 'required|trim');
		$this->form_validation->set_rules('oi_add', 'esfera de cerca', 'required|trim');

		if ($this->form_validation->run()) {
			$_POST['datos']['id_cliente'] = $idcliente;
			if ($this->graduacion->insert($this->input->post('datos'))) {
				redirect('graduaciones/index/'.$idcliente);
			}
		}

		$datos                = $this->graduacion->prepare_data( $this->input->post('datos') );
		$datos['idcliente']   = $idcliente;
		$datos['titulo_form'] = 'Agregar Graduación';

		$this->template->write_view('content', 'form', $datos);
		$this->template->render();
	}

}

/* End of file graduaciones.php */
/* Location: ./application/controllers/graduaciones.php */