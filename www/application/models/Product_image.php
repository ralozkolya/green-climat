<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_image extends MY_Model {

	protected $upload_path = 'static/uploads/products/';
	protected $thumbs_path = 'static/uploads/products/thumbs/';

	protected $table = 'product_images';
	protected $with_image = TRUE;
	protected $image_required = TRUE;

	public function get_for_product($item) {

		$this->db->where('item', $item);
		return parent::get_list();
	}

}

/* End of file Product_image.php */
/* Location: ./application/models/Product_image.php */