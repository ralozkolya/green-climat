<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	protected $data = [
		'title' => 'Green Climat',
		'highlighted' => NULL,
	];

	public function __construct() {
		parent::__construct();
		$this->data['redirect_base'] = base_url();
		set_language();
	}

	public function set_language($lang) {
		set_language($lang);
		$this->redirect();
	}

	protected function redirect($path = NULL) {

		if(!empty($this->data[ERROR])) {
			$this->session->set_flashdata(ERROR, $this->data[ERROR]);
		}

		if(!empty($this->data[SUCCESS])) {
			$this->session->set_flashdata(SUCCESS, $this->data[SUCCESS]);
		}

		if($path) {
			redirect($path);
		}

		elseif($this->agent->referrer()) {
			redirect($this->agent->referrer());
		}

		redirect($this->data['redirect_base']);
	}

	protected function message($message, $type = SUCCESS, $redirects = TRUE) {

		if($redirects) {
			$this->session->set_flashdata($type, $message);
			$this->redirect();
		}

		else {
			$this->data[$type] = $message;
		}
	}

	protected function view($view) {
		$this->load->view($view, $this->data);
	}

}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */