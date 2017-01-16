<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends MY_Model {

	protected $table = 'services';
	protected $slug = 'en_title';
	protected $images_table = 'service_images';
	protected $images_model = 'Service_image';

	public function get_localized($id) {
		$this->select_localized();
		$this->join_images();
		return parent::get($id);
	}

	public function get_localized_list($limit = NULL, $offset = NULL) {

		$this->db->select('SQL_CALC_FOUND_ROWS null as rows', FALSE);
		$this->select_localized();

		$this->join_images();
		$this->db->group_by("{$this->table}.id");
		$this->db->order_by('priority');

		$response['data'] = parent::get_list($limit, $offset);
		$response['rows'] = $this->db->query('SELECT FOUND_ROWS() count')->row()->count;

		return $response;
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