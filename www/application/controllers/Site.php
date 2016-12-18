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

	public function services() {
		$slug = 'services';
		$this->data['page'] = $this->get_page($slug);
		$this->data['items'] = $this->get_list('Service');
		$this->data['uploads_path'] = static_url('uploads/services');
		$this->data['item_url'] = locale_url('service');
		$this->data['highlighted'] = $slug;
		$this->view('pages/list');
	}

	public function service($id) {
		$this->data['item'] = $this->get_item('Service', $id);
		$this->data['gallery'] = $this->get_gallery('Service', $id);
		$this->data['uploads_path'] = static_url('uploads/services');
		$this->data['highlighted'] = 'services';
		$this->view('pages/item');
	}

	public function news() {
		$slug = 'news';
		$this->data['page'] = $this->get_page($slug);
		$this->data['items'] = $this->get_list('Post');
		$this->data['uploads_path'] = static_url('uploads/news');
		$this->data['item_url'] = locale_url('post');
		$this->data['highlighted'] = $slug;
		$this->view('pages/list');
	}

	public function post($id) {
		$this->data['item'] = $this->get_item('Post', $id);
		$this->data['gallery'] = $this->get_gallery('Post', $id);
		$this->data['uploads_path'] = static_url('uploads/news');
		$this->data['highlighted'] = 'news';
		$this->view('pages/item');
	}

	public function partners() {
		$slug = 'partners';
		$this->data['page'] = $this->get_page($slug);
		$this->data['items'] = $this->get_list('Partner');
		$this->data['uploads_path'] = static_url('uploads/partners');
		$this->data['item_url'] = locale_url('partner');
		$this->data['highlighted'] = $slug;
		$this->view('pages/list');
	}

	public function partner($id) {
		$this->data['item'] = $this->get_item('Partner', $id);
		$this->data['gallery'] = $this->get_gallery('Partner', $id);
		$this->data['uploads_path'] = static_url('uploads/partners');
		$this->data['highlighted'] = 'partners';
		$this->view('pages/item');
	}

	public function projects() {
		$slug = 'projects';
		$this->data['page'] = $this->get_page($slug);
		$this->data['items'] = $this->get_list('Project');
		$this->data['uploads_path'] = static_url('uploads/projects');
		$this->data['item_url'] = locale_url('project');
		$this->data['highlighted'] = $slug;
		$this->view('pages/list');
	}

	public function project($id) {
		$this->data['item'] = $this->get_item('Project', $id);
		$this->data['gallery'] = $this->get_gallery('Project', $id);
		$this->data['uploads_path'] = static_url('uploads/projects');
		$this->data['highlighted'] = 'projects';
		$this->view('pages/item');
	}


	/*	PULLERS	*/

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

	private function get_list($type) {
		$this->load->model($type);
		return $this->$type->get_localized_list();
	}

	private function get_item($type, $id) {
		$this->load->model($type);
		return $this->$type->get_localized($id);
	}

	private function get_gallery($type, $id) {
		$this->load->model($type);
		return $this->$type->get_gallery($id);
	}

}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */