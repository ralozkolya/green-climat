<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends MY_Model {

	protected $table = 'services';
	protected $slug = 'en_name';
	protected $images_table = 'service_images';

	public function get_localized($id) {
		$this->select_localized();
		$this->join();
		return parent::get($id);
	}

	public function get_list($limit = NULL, $offset = NULL) {
		$this->select_localized();
		$this->join();
		$this->db->group_by("{$this->table}.id");
		$this->db->order_by('priority');
		return parent::get_list($limit, $offset);
	}

	public function get_gallery($id) {
		$this->db->where('service', $id);
		return $this->db->get($this->images_table)->result();
	}

	private function join() {
		$this->db->join($this->images_table,
			"{$this->images_table}.service = {$this->table}.id");
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

/* End of file Service.php */
/* Location: ./application/models/Service.php */