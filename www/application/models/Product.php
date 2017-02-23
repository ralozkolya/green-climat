<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Model {

	protected $table = 'products';
	protected $slug = 'en_name';
	protected $images_table = 'product_images';
	protected $images_model = 'Product_image';

	public function get_top() {
		$this->select_localized();
		$this->join_images();
		$this->db->group_by("{$this->table}.id");
		$this->db->where(['top' => 1]);
		return parent::get_list();
	}

	public function get_localized_list($limit = NULL, $offset = NULL) {

		$this->db->select('SQL_CALC_FOUND_ROWS null as rows', FALSE);
		$this->select_localized();

		$this->join_images();
		$this->db->group_by("{$this->table}.id");

		$response['data'] = parent::get_list($limit, $offset);
		$response['rows'] = $this->db->query('SELECT FOUND_ROWS() count')->row()->count;

		return $response;
	}

	public function get_localized($id) {

		$this->select_localized();
		$this->join_images();
		return parent::get($id);
	}

	protected function join_images() {
		$this->db->join($this->images_table,
			"{$this->images_table}.item = {$this->table}.id", 'left');
	}

	public function get_filtered($categories, $limit = NULL, $offset = NULL) {

		if($categories) {
			$this->db->where_in('category', $categories);
		}

		return $this->get_localized_list($limit, $offset);
	}

	public function add($data) {

		if(empty($data['top'])) {
			$data['top'] = 0;
		}

		return parent::add($data);
	}

	public function edit($data) {

		if(empty($data['top'])) {
			$data['top'] = 0;
		}

		return parent::edit($data);
	}

	private function select_localized() {

		$lang = get_lang_code(get_lang());
		$this->db->select([
			"{$this->table}.{$lang}_name as name",
			"{$this->table}.{$lang}_desc as desc",
			"{$this->table}.id",
			"{$this->table}.slug",
			"{$this->table}.category",
			"{$this->table}.price",
			"{$this->images_table}.image"
		]);
	}

}

/* End of file Product.php */
/* Location: ./application/models/Product.php */