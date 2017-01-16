<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partner_image extends MY_Model {

	protected $upload_path = 'static/uploads/partners/';
	protected $thumbs_path = 'static/uploads/partners/thumbs/';

	protected $table = 'partner_images';
	protected $with_image = TRUE;
	protected $image_required = TRUE;

	public function get_for_product($item) {

		$this->db->where('item', $item);
		return parent::get_list();
	}

}

/* End of file Partner_image.php */
/* Location: ./application/models/Partner_image.php */