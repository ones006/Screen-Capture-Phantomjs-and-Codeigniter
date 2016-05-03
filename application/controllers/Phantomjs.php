<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Phantomjs extends CI_Controller {

	public function index()
	{
		date_default_timezone_set("Asia/Jakarta");
		//echo PHP_OS; exit();
		$config['url'] = 'http://phantomjs.org/screen-capture.html'; //set url
		$config['filename'] = date('YMd').'-worksaurus.png'; //set file name
		$config['width'] = 1366; // set width
		$config['height'] = 768; // set height
		// $config['clipwidth'] = 1024; // optional
		// $config['clipheight'] = 768; // optional

		$this->load->library('phantomcapture', $config);
		$this->phantomcapture->captureit();
	}
}

/* End of file Phantomjs.php */
/* Location: ./application/controllers/Phantomjs.php */