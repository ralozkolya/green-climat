<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->language('general');
		$this->data['navigation'] = $this->get_navigation();
	}

	public function index() {
		$this->data['banners'] = $this->get_banners();
		$this->data['top_products'] = $this->get_top_products();
		$this->data['highlighted'] = 'home';
		$this->view('pages/home');
	}

	private function get_navigation() {
		$this->load->model('Page');
		return $this->Page->get_navigation();
	}

	private function get_banners() {
		return [
			(object) [
				'image' => '1.jpg',
				'link' => '',
				'blank' => '',
			],
			(object) [
				'image' => 'http://placehold.it/1400x600',
				'link' => '',
				'blank' => '',
			],
			(object) [
				'image' => '1.jpg',
				'link' => '',
				'blank' => '',
			],
		];
	}

	private function get_top_products() {
		$this->load->model('Product');
		return $this->Product->get_top();
	}

}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */