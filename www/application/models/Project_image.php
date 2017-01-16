<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project_image extends MY_Model {

	protected $upload_path = 'static/uploads/projects/';
	protected $thumbs_path = 'static/uploads/projects/thumbs/';

	protected $table = 'project_images';
	protected $with_image = TRUE;
	protected $image_required = TRUE;

	public function get_for_product($item) {

		$this->db->where('item', $item);
		return parent::get_list();
	}

}

/* End of file Project_image.php */
/* Location: ./application/models/Project_image.php */