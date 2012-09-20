<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	private   $publicas = array('/', 'index.php/', 'usuarios/login', 'usuarios/logout');
	protected $permitidos = array(0);

	public function __construct()
	{
		parent::__construct();

		/* Verificamos si está permitido el acceso */
		$actual = $this->uri->segment(1, '') . '/' . $this->uri->segment(2, '');
		$publica = in_array($actual, $this->publicas);
		if( ! $publica AND ! $this->session->userdata('id') )
		{
			redirect('usuarios/login');
		}
		else if ( in_array($this->session->userdata('tipo'), $this->permitidos) AND $this->session->userdata('id') ) 
		{
			redirect('usuarios/login');
		}
	}

}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */