<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends MY_Model {

	protected $table = 'news';
	protected $slug = 'en_title';
	protected $images_table = 'post_images';

	public function get_localized($id) {
		$this->select_localized();
		$this->join();
		return parent::get($id);
	}

	public function get_localized_list($limit = NULL, $offset = NULL) {
		$this->select_localized();
		$this->join();
		$this->db->group_by("{$this->table}.id");
		$this->db->order_by('priority');
		return parent::get_list($limit, $offset);
	}

	public function get_gallery($id) {
		$this->db->where('item', $id);
		return $this->db->get($this->images_table)->result();
	}

	private function join() {
		$this->db->join($this->images_table,
			"{$this->images_table}.item = {$this->table}.id", 'left');
	}

	private function select_localized() {
		$lang = get_lang_code(get_lang());
		$this->db->select([
			"{$this->table}.{$lang}_title as title",
			"{$this->table}.{$lang}_body as body",
			"{$this->table}.id",
			"{$this->table}.slug",
			"{$this->images_table}.image",
		]);
	}
}

/* End of file Post.php */
/* Location: ./application/models/Post.php */