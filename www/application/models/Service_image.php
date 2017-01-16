<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service_image extends MY_Model {

	protected $upload_path = 'static/uploads/services/';
	protected $thumbs_path = 'static/uploads/services/thumbs/';

	protected $table = 'service_images';
	protected $with_image = TRUE;
	protected $image_required = TRUE;

	public function get_for_product($item) {

		$this->db->where('item', $item);
		return parent::get_list();
	}

}

/* End of file Service_image.php */
/* Location: ./application/models/Service_image.php */