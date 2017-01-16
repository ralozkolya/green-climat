<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_image extends MY_Model {

	protected $upload_path = 'static/uploads/news/';
	protected $thumbs_path = 'static/uploads/news/thumbs/';

	protected $table = 'post_images';
	protected $with_image = TRUE;
	protected $image_required = TRUE;

	public function get_for_product($item) {

		$this->db->where('item', $item);
		return parent::get_list();
	}

}

/* End of file Post_image.php */
/* Location: ./application/models/Post_image.php */