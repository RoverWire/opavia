<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tickets extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->template->set_master_template('ticket');
		$this->load->model('venta');
		$this->load->model('venta_articulo');
		$this->load->model('graduaciones/graduacion');
	}

	public function index()
	{
		redirect('ventas');
	}

	public function comprobante($id_venta = '')
	{
		if (! $this->venta->exists($id_venta)) {
			redirect('ventas');
		}

		$this->load->model('clientes/cliente');
		$this->load->model('abono');

		$datos = array();
		$datos['venta']     = $this->venta->get($id_venta)->row();
		$datos['articulos'] = $this->venta_articulo->listado($id_venta);
		$datos['cliente']   = $this->cliente->get($datos['venta']->id_cliente)->row();
		$datos['pago'] 		= $this->abono->pagado_venta($id_venta);

		$this->template->write_view('content', 'comprobante', $datos);
		$this->template->write('title', 'Imprimir Comprobante');
		$this->template->render();
	}

	public function orden($id_venta = '')
	{
		if (! $this->venta->exists($id_venta)) {
			redirect('ventas');
		}

		$venta = $this->venta->get($id_venta)->row();

		if ($venta->id_graduacion == 0) {
			show_error('Esta venta no cuenta con algun trabajo de graduación');
		}

		$this->load->model('graduaciones/graduacion');
		$datos = array('venta' => $venta);
		$datos['graduacion'] = $this->graduacion->get($venta->id_graduacion)->row();
		$this->template->write_view('content', 'orden_laboratorio', $datos);
		$this->template->write('title', 'Imprimir Orden');
		$this->template->render();
	}

}

/* End of file tickets.php */
/* Location: ./application/controllers/tickets.php */