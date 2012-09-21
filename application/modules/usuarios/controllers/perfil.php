<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perfil extends MY_Controller {

	protected $permitidos = array(0,1);
	
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->template->write('title', 'Perfil de Usuario');
		$this->template->render();
	}

	public function cuenta ()
	{
		$this->template->write('title', 'Datos de Usuario');
		$this->template->render();
	}

	public function password()
	{
		$this->template->write('title', 'Cambiar Contraseña');
		$this->template->write_view('content', 'password');
		$this->template->render();
	}

}

/* End of file perfil.php */
/* Location: ./application/controllers/perfil.php */