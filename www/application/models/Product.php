<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Model {

	protected $table = 'products';
	protected $slug = 'en_name';
	protected $images_table = 'product_images';

	public function get_top() {
		$this->select_localized();
		$this->join_images();
		$this->db->where(['top' => 1]);
		return parent::get_list();
	}

	public function join_images() {
		$this->db->join($this->images_table,
			"{$this->images_table}.product = {$this->table}.id");
	}

	private function select_localized() {
		$lang = get_lang_code(get_lang());
		$this->db->select([
			"{$this->table}.{$lang}_name as name",
			"{$this->table}.{$lang}_desc as desc",
			"{$this->table}.id",
			"{$this->table}.slug",
			"{$this->images_table}.image"
		]);
	}

}

/* End of file Product.php */
/* Location: ./application/models/Product.php */