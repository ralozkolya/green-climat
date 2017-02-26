<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	public function __construct() {

		parent::__construct();

		set_language(GE);

		$this->load->language('admin');
		$this->load->library(['Auth_admin' => 'auth', 'form_validation']);
		$this->load->helper(['view', 'no_image']);
		$this->load->model([
			'User_admin', 'Product', 'Page', 'Post', 'Banner',
			'Post', 'Post_image', 'Partner', 'Partner_image',
			'Project', 'Project_image', 'Service', 'Service_image',
			'Category', 'Product_image',
		]);

		$this->data['user'] = $this->auth->get_current_user();

		if(!$this->data['user']) {
			$this->auth->logout();
			$this->message(lang('unauthorized'), ERROR, FALSE);
			$this->redirect('login');
		}

		$this->data['redirect_base'] = base_url('admin');
	}
	

	/*	VIEWS	*/

	public function index() {

		$this->products();
	}

	public function products() {

		$this->data['type'] = $type = 'Product';

		$this->modify($type);

		$this->data['items'] = $this->get_items($type)['data'];
		$this->data['categories'] = $this->get_items('Category');
		$this->data['highlighted'] = 'products';

		$this->view('pages/admin/products');
	}

	public function Product($id) {

		$this->data['type'] = $type = 'Product';

		$this->modify($type);

		$this->data['item'] = $this->get_item($type, $id);
		$this->data['categories'] = $this->get_items('Category');
		$this->data['gallery'] = $this->get_gallery($type, $id);
		$this->data['highlighted'] = 'products';

		$this->load->view('pages/admin/product', $this->data);
	}

	public function categories() {

		$this->data['type'] = $type = 'Category';

		$this->modify($type);

		$this->data['items'] = $this->get_items($type);
		$this->data['parents'] = $this->Category->get_top();
		$this->data['highlighted'] = 'categories';

		$this->load->view('pages/admin/categories', $this->data);
	}

	public function Category($id) {

		$this->data['type'] = $type = 'Category';

		$this->modify($type);

		$item = $this->data['item'] = $this->get_item($type, $id);
		$this->data['parents'] = $this->Category->get_top();
		
		$ids = [$item->id];

		$subs = $this->Category->get_subcategories($item->id);

		foreach($subs as $s) {
			$ids[] = $s->id;
		}

		$this->data['products'] = $this->Product->get_filtered($ids)['data'];
		$this->data['sub_categories'] = $subs;
		$this->data['highlighted'] = 'categories';

		$this->load->view('pages/admin/category', $this->data);
	}

	public function pages() {

		$this->data['type'] = $type = 'Page';

		$this->data['items'] = $this->get_items($type);
		$this->data['highlighted'] = 'pages';

		$this->load->view('pages/admin/pages', $this->data);
	}

	public function Page($id) {

		$this->data['type'] = $type = 'Page';

		$this->modify($type);
		
		$this->data['item'] = $this->get_item($type, $id);
		$this->data['highlighted'] = 'pages';

		$this->load->view('pages/admin/page', $this->data);
	}

	public function banners() {

		$this->data['type'] = $type = 'Banner';

		$this->modify($type);

		$this->data['items'] = $this->get_items($type);
		$this->data['highlighted'] = 'banners';

		$this->load->view('pages/admin/banners', $this->data);
	}

	public function Banner($id) {

		$this->data['type'] = $type = 'Banner';

		$this->modify($type);

		$this->data['item'] = $this->get_item($type, $id);
		$this->data['highlighted'] = 'banners';

		$this->load->view('pages/admin/banner', $this->data);
	}

	public function news() {

		$this->data['type'] = $type = 'Post';

		$this->modify($type);

		$this->data['items'] = $this->get_items($type)['data'];
		$this->data['highlighted'] = 'news';

		$this->load->view('pages/admin/news', $this->data);
	}

	public function Post($id) {

		$this->data['type'] = $type = 'Post';

		$this->modify($type);

		$this->data['item'] = $this->get_item($type, $id);
		$this->data['gallery'] = $this->get_gallery($type, $id);
		$this->data['highlighted'] = 'news';

		$this->load->view('pages/admin/post', $this->data);
	}

	public function partners() {

		$this->data['type'] = $type = 'Partner';

		$this->modify($type);

		$this->data['items'] = $this->get_items($type)['data'];
		$this->data['highlighted'] = 'partners';

		$this->load->view('pages/admin/partners', $this->data);
	}

	public function Partner($id) {

		$this->data['type'] = $type = 'Partner';

		$this->modify($type);

		$this->data['item'] = $this->get_item($type, $id);
		$this->data['highlighted'] = 'partners';

		$this->load->view('pages/admin/partner', $this->data);
	}

	public function projects() {

		$this->data['type'] = $type = 'Project';

		$this->modify($type);

		$this->data['items'] = $this->get_items($type)['data'];
		$this->data['highlighted'] = 'projects';

		$this->load->view('pages/admin/projects', $this->data);
	}

	public function Project($id) {

		$this->data['type'] = $type = 'Project';

		$this->modify($type);

		$this->data['item'] = $this->get_item($type, $id);
		$this->data['gallery'] = $this->get_gallery($type, $id);
		$this->data['highlighted'] = 'projects';

		$this->load->view('pages/admin/project', $this->data);
	}

	public function services() {

		$this->data['type'] = $type = 'Service';

		$this->modify($type);

		$this->data['items'] = $this->get_items($type)['data'];
		$this->data['highlighted'] = 'services';

		$this->load->view('pages/admin/services', $this->data);
	}

	public function Service($id) {

		$this->data['type'] = $type = 'Service';

		$this->modify($type);

		$this->data['item'] = $this->get_item($type, $id);
		$this->data['gallery'] = $this->get_gallery($type, $id);
		$this->data['highlighted'] = 'services';

		$this->load->view('pages/admin/service', $this->data);
	}

	public function user() {

		$type = 'User_admin';

		$this->modify($type, [
			'password' => $this->input->post('password'),
			'id' => $this->data['user']->id,
		]);

		$this->data['highlighted'] = 'user';
		$this->load->view('pages/admin/user', $this->data);
	}


	/*	MODIFIERS	*/

	public function modify($type, $data = NULL) {

		if(!$this->input->post()) {
			return;
		}

		if(empty($data)) {
			$data = $this->input->post();
		}

		if(empty($data['id'])) {
			$this->add($type, $data);
		}

		else {
			$this->edit($type, $data);
		}
	}

	public function add($type, $data) {

		$allowed = [
			'Banner', 'Post',
			'Product', 'Agent', 'Category',
			'Partner', 'Project', 'Service',
		];

		if(!$this->is_allowed($allowed, $type)) {
			$this->message(lang('not_allowed'), ERROR);
		}

		if($this->form_validation->run("add_{$type}")) {

			try {
				$this->$type->add($data);
				$this->message(lang('added_successfully'));
			}

			catch(Exception $e) {
				$this->message($e->getMessage(), ERROR, FALSE);
			}
		}

		else {
			$this->validation_errors();
		}
	}

	public function edit($type, $data) {

		$allowed = [
			'Banner', 'Page', 'Partner',
			'Post', 'Product', 'Agent',
			'User_admin', 'Category',
			'Project', 'Service',
		];

		if(!$this->is_allowed($allowed, $type)) {
			$this->message(lang('not_allowed'), ERROR);
		}

		if($this->form_validation->run("edit_{$type}")) {

			try {
				$this->$type->edit($data);
				$this->message(lang('changed_successfully'));
			}

			catch(Exception $e) {
				$this->message($e->getMessage(), ERROR, FALSE);
			}
		}

		else {
			$this->validation_errors();
		}
	}

	public function delete($type, $id) {

		$allowed = [
			'Banner', 'Post', 'Project',
			'Product', 'Product_image',
			'Agent', 'Category', 'Partner',
			'Service', 'Post_image',
			'Partner_image', 'Service_image', 'Project_image',
		];

		if(!$this->is_allowed($allowed, $type)) {
			$this->message(lang('not_allowed'), ERROR);
		}

		if($this->$type->delete($id)) {
			$this->message(lang('deleted_successfully'));
		}

		else {
			$this->message(lang('unexpected_error'), ERROR);
		}
	}

	public function add_images($type) {

		$allowed = [
			'Post_image', 'Partner_image', 'Product_image',
			'Service_image', 'Project_image',
		];

		if(!$this->is_allowed($allowed, $type)) {
			$this->message(lang('not_allowed'), ERROR);
		}

		if($this->form_validation->run("add_{$type}")) {

			$item = $this->input->post('item');

			try {
				$this->$type->add_images($item);
				$this->message(lang('added_successfully'));
			}

			catch(Exception $e) {
				$this->message($e->getMessage(), ERROR);
			}
		}

		else {
			$this->validation_errors();
			$this->redirect();
		}
	}


	/*	HELPERS	*/

	private function is_allowed($array, $type) {

		foreach($array as $a) {
			if($type === $a) {
				return TRUE;
			}
		}

		return FALSE;
	}

	private function validation_errors() {
		$message = validation_errors('<div>', '</div>');
		$message = $message ? $message : lang('no_validation_rules');
		$this->message($message, ERROR, FALSE);
	}

	private function get_items($type) {

		$items = $this->$type->get_localized_list();
		return $items;
	}

	private function get_item($type, $id) {

		$item = $this->$type->get($id);

		if(empty($item)) {
			show_404();
			exit;
		}

		return $item;
	}

	private function get_gallery($type, $id) {

		return $this->$type->get_gallery($id);
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */
