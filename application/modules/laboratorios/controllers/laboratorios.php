<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laboratorios extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if ($this->input->post('del')) {
			$this->laboratorio->delete($this->input->post('del'));
			$this->session->set_flashdata('msg_success', 'Los laboratorios han sido eliminados de manera permanente.');
			redirect('laboratorios');
		}

		$datos = array();
		$datos['query'] = $this->cliente->get();
		$this->template->write('title', 'Laboratorios');
		$this->template->write_view('content', 'tabla', $datos);
		$this->template->asset_js('consulta.js');
		$this->template->render();
	}

}

/* End of file laboratorios.php */
/* Location: ./application/controllers/laboratorios.php */