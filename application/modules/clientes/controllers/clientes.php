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

		$datos = array();
		$datos['query'] = $this->cliente->get();
		$this->template->write('title', 'Clientes');
		$this->template->write_view('content', 'tabla', $datos);
		$this->template->asset_js('consulta.js');
		$this->template->render();
	}

	public function agregar()
	{
		$this->template->render();
	}

	public function editar($id = '')
	{
		$this->template->render();
	}

	public function eliminar($id = '')
	{
		redirect('clientes');
	}

}

/* End of file clientes.php */
/* Location: ./application/controllers/clientes.php */