<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends MY_Model {

	protected $upload_path = 'static/uploads/banners/';

	protected $table = 'banners';
	protected $with_image = TRUE;
	protected $image_required = TRUE;

	public function get_prioritized() {
		$this->db->order_by('priority');
		return parent::get_list();
	}

}

/* End of file Banner.php */
/* Location: ./application/models/Banner.php */