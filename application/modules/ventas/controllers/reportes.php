<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reportes extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->template->write('title', 'Reportes de Ventas');
		$this->template->render();
	}

	public function rand()
	{
		echo mt_rand() / mt_getrandmax();
	}

}

/* End of file reportes.php */
/* Location: ./application/controllers/reportes.php */