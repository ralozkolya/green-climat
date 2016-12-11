<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->data['navigation'] = $this->get_navigation();
	}

	public function index() {
		$this->data['highlighted'] = 'home';
		$this->view('pages/home');
	}

	private function get_navigation() {
		$this->load->model('Page');
		return $this->Page->get_navigation();
	}

}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */