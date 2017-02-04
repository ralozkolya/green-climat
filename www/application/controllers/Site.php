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

	public function products($page = 1) {

		$slug = 'products';
		$category_ids = $this->get_category_ids($this->input->get('category'));

		$this->data['page'] = $this->get_page($slug);
		$this->data['categories'] = $this->get_categories();
		$this->data['category'] = $this->get_category($category_ids[0]);
		$this->data['items'] = $this->get_products($page, $category_ids)['data'];
		$this->data['highlighted'] = $slug;

		$this->load->view('pages/products', $this->data);
	}

	public function product($id) {

		$this->data['item'] = $this->get_item('Product', $id);
		$this->data['categories'] = $this->get_categories();
		$this->data['category'] = $this->get_category($this->data['item']->category);
		$this->data['gallery'] = $this->get_gallery('Product', $id);
		$this->data['uploads_path'] = static_url('uploads/products');
		$this->data['highlighted'] = 'products';

		$this->load->view('pages/product', $this->data);
	}

	public function services() {
		$slug = 'services';
		$this->data['page'] = $this->get_page($slug);
		$this->data['items'] = $this->get_list('Service')['data'];
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
		$this->data['items'] = $this->get_list('Post')['data'];
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
		$this->data['items'] = $this->get_list('Partner')['data'];
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
		$this->data['items'] = $this->get_list('Project')['data'];
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

	public function contact() {

		if($this->input->post()) {
			$this->send_mail();
		}

		$slug = 'contact';
		$this->data['page'] = $this->get_page($slug);
		$this->data['highlighted'] = $slug;
		$this->view('pages/contact');
	}

	public function sitemap() {

		header('Content-Type: text/xml; charset="utf-8"');
		$this->load->model('Product');
		$this->data['products'] = $this->Product->get_list();
		$this->load->view('xml/sitemap', $this->data);
	}


	/*	PULLERS	*/

	private function get_navigation() {
		$this->load->model('Page');
		return $this->Page->get_navigation();
	}

	private function get_banners() {
		$this->load->model('Banner');
		return $this->Banner->get_prioritized();
	}

	private function get_top_products() {
		$this->load->model('Product');
		return $this->Product->get_top();
	}

	private function get_products($page = 1, $category_ids = NULL) {
		$this->load->model('Product');
		return $this->Product->get_filtered($category_ids);
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
		$item = $this->$type->get_localized($id);

		if($item) {
			return $item;
		}
		
		show_404();
	}

	private function get_gallery($type, $id) {
		$this->load->model($type);
		return $this->$type->get_gallery($id);
	}

	private function get_categories() {
		$this->load->model('Category');
		return $this->Category->get_list_with_subcategories();
	}

	private function get_category($id) {
		$this->load->model('Category');
		return $this->Category->get($id);
	}

	private function get_category_ids($slug) {
		$this->load->model('Category');

		$ids = [];

		$parent = $this->Category->get_by_key('slug', $slug);

		if($parent) {
			$ids[] = $parent->id;

			$subs = $this->Category->get_subcategories($parent->id);

			foreach($subs as $s) {
				$ids[] = $s->id;
			}
		}

		return empty($ids) ? NULL : $ids;
	}


	/*	HELPERS	*/

	private function send_mail() {

		$this->load->helper(['email_sender', 'purifier']);
		$this->load->library('form_validation');

		if(!$this->input->post()) {
			$this->data['error_message'] = lang('unexpected_error');
		}

		if($this->form_validation->run('send_mail')) {
			send_message($this->input->post());
			$this->session->set_flashdata('success_message', lang('successfully_sent'));
			redirect($this->agent->referrer());
		}

		else {
			$this->data['error_message'] = validation_errors('<div>', '</div>');
		}
	}

}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */