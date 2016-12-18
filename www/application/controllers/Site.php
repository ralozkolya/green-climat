<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->language('general');
		$this->data['navigation'] = $this->get_navigation();
	}

	public function index() {
		$this->home();
	}

	public function home() {
		$this->data['banners'] = $this->get_banners();
		$this->data['top_products'] = $this->get_top_products();
		$this->data['highlighted'] = 'home';
		$this->view('pages/home');
	}

	public function about_us() {
		$slug = 'about_us';
		$this->data['page'] = $this->get_page($slug);
		$this->data['categories'] = [
			lang('water_systems'),
			lang('sewer'),
			lang('drainage'),
			lang('ventilation'),
			lang('conditioning'),
			lang('heating'),
		];
		$this->data['highlighted'] = $slug;
		$this->view('pages/about_us');
	}

	public function services($page = 1) {
		$slug = 'services';
		$this->data['page'] = $this->get_page($slug);
		$this->data['services'] = $this->get_services($page);
		$this->data['highlighted'] = $slug;
		$this->view('pages/services');
	}

	public function service($id) {
		$this->data['service'] = $this->get_service($id);
		$this->data['gallery'] = $this->get_service_images($id);
		$this->data['path'] = static_url('uploads/services');
		$this->data['highlighted'] = 'services';
		$this->view('pages/item');
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

	private function get_page($slug) {
		$this->load->model('Page');
		return $this->Page->get_localized($slug);
	}

	private function get_services($page) {
		$page = abs($page - 1);

		$limit = SERVICES_PER_PAGE;
		$offset = $page * $limit;

		$this->load->model('Service');
		return $this->Service->get_list($limit, $offset);
	}

	private function get_service($id) {
		$this->load->model('Service');
		return $this->Service->get_localized($id);
	}

	private function get_service_images($id) {
		$this->load->model('Service');
		return $this->Service->get_gallery($id);
	}

}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */