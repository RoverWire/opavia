<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Acceso extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->template->set_master_template('clean');
		$this->template->write('title', 'Inicio de Sesión');
		$this->template->write_view('content', 'login');
		$this->template->render();
	}

}

/* End of file acceso.php */
/* Location: ./application/controllers/acceso.php */