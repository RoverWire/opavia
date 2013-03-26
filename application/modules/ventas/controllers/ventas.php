<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ventas extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('clientes/cliente');
		$this->load->model('graduaciones/graduacion');
	}

	public function index()
	{
		$this->session->unset_userdata('venta_cliente');
		$this->session->unset_userdata('venta_articulos');
		$this->session->unset_userdata('venta_graduacion');

		$this->template->write('title', 'Ventas');
		$this->template->write_view('content', 'venta_nueva');
		$this->template->render();
	}

	public function clientes()
	{
		$datos = array();
		$datos['buscar'] = $this->input->post('buscar', TRUE);
		$datos['query']  = $this->cliente->busqueda($datos['buscar']);

		$this->template->write_view('content', 'cliente_listado', $datos);
		$this->template->write('title', 'Listado de Clientes');
		$this->template->render();
	}

	public function cliente_nuevo()
	{
		$this->load->helper('formulario');
		$this->form_validation->set_error_delimiters('<span class="help-inline">', '</span>');
		$this->form_validation->set_rules('datos[nombre]', 'nombre', 'required|trim');
		$this->form_validation->set_rules('datos[apellidos]', 'apellidos', 'required|trim');
		$this->form_validation->set_rules('datos[telefono]', 'telefono', 'required|trim');
		$this->form_validation->set_rules('datos[email]', 'e-mail', 'required|valid_email|trim');

		$datos = $this->cliente->prepare_data( $this->input->post('datos') );

		if ($this->form_validation->run()) {
			if ($this->cliente->insert( $this->input->post('datos') )) {
				$id_cliente = $this->db->insert_id();
				$this->session->set_userdata('venta_cliente', $id_cliente);
				redirect('ventas/articulos/'.$id_cliente);
			}
		}

		$this->template->write('title', 'Agregar Cliente');
		$this->template->write_view('content', 'cliente_nuevo', $datos);
		$this->template->render();
	}

	public function graduaciones($id_cliente = '')
	{
		if (! $this->cliente->exists($id_cliente)) {
			$this->session->set_flashdata('msg_warning', 'El usuario proporcionado no existe. Verificar número e intenter de nuevo');
			redirect('ventas');
		}

		$this->session->set_userdata('venta_cliente', $id_cliente);

		$datos               = array();
		$datos['cliente']    = $this->cliente->get($id_cliente)->row();
		$datos['query']      = $this->graduacion->where('id_cliente', $id_cliente)->get();
		$datos['id_cliente'] = $id_cliente;

		$this->template->write('title', 'Graduaciones');
		$this->template->write_view('content', 'graduaciones/listado_ventas', $datos);
		$this->template->add_js('ventas.js');
		$this->template->render();
	}

	public function agregar_graduacion($id_cliente)
	{
		if (! $this->cliente->exists($id_cliente)) {
			$this->session->set_flashdata('msg_warning', 'El usuario proporcionado no existe. Verificar número e intenter de nuevo');
			redirect('ventas');
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
				$id_graduacion = $this->db->insert_id();
				$this->session->set_userdata('venta_graduacion', $id_graduacion);
				redirect('ventas/orden/'.$id_graduacion);
			}
		}

		$datos                = $this->graduacion->prepare_data( $this->input->post('datos') );
		$datos['idcliente']   = $id_cliente;
		$datos['titulo_form'] = 'Agregar Graduación';

		$this->template->write('title', 'Agregar Graduación');
		$this->template->write_view('content', 'graduaciones/form_ventas', $datos);
		$this->template->render();
	}

	public function orden($id_graduacion = '')
	{
		if (!$this->session->userdata('venta_cliente')) {
			redirect('ventas');
		}

		$this->load->model('venta');
		$this->load->model('venta_articulo');
		$this->load->model('catalogo/articulo');
		$this->load->model('laboratorios/laboratorio');
		$this->load->model('graduaciones/graduacion');
		$this->load->model('abono');

		$this->form_validation->set_error_delimiters('<span class="help-inline">', '</span>');
		$this->form_validation->set_rules('datos[id_cliente]', 'cliente', 'required|trim');
		$this->form_validation->set_rules('datos[total]', 'total', 'required|trim');

		if ($this->input->post('tipo_operacion') == 'venta') {
			$this->form_validation->set_rules('abono', 'efectivo', 'required|trim');
			$this->form_validation->set_rules('datos[fecha_entrega]', 'fecha entrega', 'required|trim');
		}

		if ($this->form_validation->run()) {
			$datos = $this->input->post('datos');
			$datos['fecha'] = date('Y-m-d');

			if ($this->input->post('tipo_operacion') == 'venta') {
				$datos['folio_venta'] = $this->venta->folio_siguiente();
			}

			if ($this->input->post('tipo_operacion') == 'venta' && $datos['total'] == $this->input->post('abono')) {
				$datos['saldado'] = 1;
			}

			if ($this->venta->insert($datos)) {
				$id_venta = $this->db->insert_id();
				$limit = sizeof($this->input->post('articulos'));
				$articulo = $this->input->post('articulo');

				for ($i=0; $i < $limit; $i++) { 
					$articulo[$i]['id_venta'] = $id_venta;
					$this->venta_articulo->insert($articulo[$i]);
				}

				if ($this->input->post('tipo_operacion') == 'venta') {
					$abono['fecha']    = date('Y-m-d');
					$abono['abono']    = $this->input->post('abono');
					$abono['id_venta'] = $id_venta;
					$abono['saldo']    = $datos['total'] - $abono['abono'];

					$this->abono->insert($abono);
				}
			}

			$this->session->unset_userdata('venta_cliente');
			$this->session->unset_userdata('venta_articulos');
			$this->session->unset_userdata('venta_graduacion');

			redirect('ventas/finalizado/'.$id_venta);
		}


		if (!empty($id_graduacion)) {
			$this->session->set_userdata('venta_graduacion', $id_graduacion);
		}

		if ($this->session->userdata('venta_graduacion') && empty($id_graduacion)) {
			$id_graduacion = $this->session->userdata('venta_graduacion');
		}

		$this->load->helper('lentes');
		$datos = $this->venta->prepare_data( $this->input->post('datos') );
		$datos['id_graduacion'] = $id_graduacion;
		$datos['id_cliente']    = $this->session->userdata('venta_cliente');

		if (!empty($id_graduacion)) {
			$datos['laboratorios'] = $this->laboratorio->get();
			$datos['graduacion']   = $this->graduacion->limit(1)->get($id_graduacion);
		}

		if ($this->session->userdata('venta_articulos') && is_array($this->session->userdata('venta_articulos'))) {
			$id_articulos    =  array_keys($this->session->userdata('venta_articulos'));
			$datos['lista_articulos'] = $this->articulo->where_in('id', $id_articulos)->get();
		}

		$this->template->write('title', 'Orden a Laboratorio');
		$this->template->write_view('content', 'orden_form', $datos);
		$this->template->asset_js('bootstrap-datepicker.js');
		$this->template->asset_js('ventas.js');
		$this->template->asset_css('datepicker.css');
		$this->template->render();
	}

	public function finalizado($id_venta ='')
	{
		$this->load->model('venta');

		if (! $this->venta->exists($id_venta)) {
			redirect('ventas');
		}

		$datos = array();
		$datos['venta'] = $this->venta->get($id_venta)->row();
		$this->template->write_view('content', 'venta_finalizado', $datos);
		$this->template->write('title', 'Impresión');
		$this->template->render();
	}

	public function articulos($idcliente = '', $idarticulo = '')
	{
		if (! $this->session->userdata('venta_cliente') && empty($idcliente)) {
			redirect('ventas');
		}

		if (! empty($idcliente)) {
			$this->session->set_userdata('venta_cliente', $idcliente);
		}

		$this->load->model('catalogo/articulo');
		
		$datos   = array();
		$buscar  = $this->input->post('buscar', TRUE); 
		$datos['buscar']    = $this->input->post('buscar');
		$datos['articulos'] = $this->session->userdata('venta_articulos');
		$datos['idcliente'] = $idcliente;

		if ($this->session->userdata('venta_articulos')) {
			$datos['contador'] = count($this->session->userdata('venta_articulos'));
		} else {
			$datos['contador'] = 0;
		}

		if (!empty($buscar)) {
			$arreglo = array('marca' => $buscar, 'modelo' => $buscar);
			$datos['query']  = $this->articulo->or_like($arreglo)->get();
		}

		$this->template->write('title', 'Artículos');
		$this->template->write_view('content', 'articulos_listado', $datos);
		$this->template->asset_js('consulta.js');
		$this->template->asset_js('ventas.js');
		$this->template->render();
	}

	public function agregar_articulo()
	{
		if ($this->input->is_ajax_request()) {
			if ($this->session->userdata('venta_articulos')) {
				$articulos = $this->session->userdata('venta_articulos');
			} else {
				$articulos = array();
			}

			$articulos[$this->input->post('id')] = 1;
			$this->session->set_userdata('venta_articulos', $articulos);

			$return = array('status' => 'success', 'total' => count($articulos));
			echo json_encode($return);	
		}	
	}

	public function eliminar_articulo()
	{
		if ($this->input->is_ajax_request()) {
			
			if ($this->session->userdata('venta_articulos')) {
				$articulos = $this->session->userdata('venta_articulos');
				unset($articulos[$this->input->post('id')]);
				$this->session->set_userdata('venta_articulos', $articulos);
			} else {
				$articulos = array();
			}

			$return = array('status' => 'success', 'total' => count($articulos));
			echo json_encode($return);	
		}
	}

	public function credito()
	{
		$this->load->model('venta');
		$datos = array();
		$datos['buscar'] = $this->input->post('buscar');
		$datos['query']  = $this->venta->no_saldadas($this->input->post('buscar'));
		$this->template->write_view('content', 'credito_listado', $datos);
		$this->template->write('title', 'Ventas a Crédito');
		$this->template->render();
	}

	public function detalle_credito($id_venta = '')
	{
		$this->load->model('venta');
		if (! $this->venta->exists($id_venta)) {
			redirect('ventas/credito');
		}

		$this->load->model('clientes/cliente');
		$this->load->model('venta_articulo');
		$this->load->model('graduaciones/graduacion');
		$this->load->model('abono');
		
		$venta     = $this->venta->get($id_venta)->row();
		$articulos = $this->venta_articulo->listado($id_venta);
		$abonos    = $this->abono->abonos_venta($id_venta);
		$datos     = array('venta' => $venta, 'articulos' => $articulos, 'abonos' => $abonos); 

		if (!empty($venta->id_graduacion)) {
			$datos['graduacion'] = $this->graduacion->get($venta->id_graduacion)->row();
		}

		$this->template->write('title', 'Detalle de Venta');
		$this->template->write_view('content', 'credito_detalles', $datos);
		$this->template->render();
	}

}

/* End of file ventas.php */
/* Location: ./application/controllers/ventas.php */