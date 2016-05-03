<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * inspired by https://github.com/microweber/screen
 * @ClassName Phantomcapture
 * @package	KCT Frame
 * @author	Ones Lynxs 
 * @copyright	Ones Lynxs
 * @license	MIT
 * @link	
 * @since	Version 1.0.0
 * @filesource
 */
class Phantomcapture
{
	private $width = 1024;
	private $height = 768;
	private $clipwidth = 0;
	private $clipheight = 0;
	private $url = 'http://localhost';
	private $filename = 'phantomcapture.png';
	private $backgroundcolor = '#FFFFFF';
    /**
     * summary
     */
    public function __construct($config = array())
    {
        empty($config) OR $this->initialize($config);
		log_message('info', 'Phantomcapture Class Initialized');
    }

    /**
	 * Initialize preferences
	 *
	 * @param	array	$config
	 * @return	void
	 */
	public function initialize($config = array())
	{
		// define directory phantomjs
		define('PHANTOMJS', FCPATH.'phantomjs/');

		foreach ($config as $key => $val)
		{
			if (isset($this->$key))
			{
				$this->$key = $val;
			}
		}

	}

	public function captureit()
	{
		$outputpath = PHANTOMJS.'screencapture' . DIRECTORY_SEPARATOR . $this->filename;

		$data = array(
			'url'           => $this->url,
			'width'         => $this->width,
			'height'        => $this->height,
			'filename'        => $this->filename,
			'backgroundcolor' => $this->backgroundcolor,
			// If used on windows the \ char needs to be handled to be used on a js string
			'imagelocation' => str_replace("\\", "\\\\", $outputpath),
		);

		//set clip option
		$data['clipoptions']['width'] = ($this->clipwidth>0)?$this->clipwidth:$this->width;
		$data['clipoptions']['height'] = ($this->clipheight>0)?$this->clipheight:$this->height;
		$data['clipoptions']['top'] = 0;
		$data['clipoptions']['left'] = 0;
		
		/*if ($this->userAgentString) {
			$data['userAgent'] = $this->userAgentString;
		}*/

		if (file_exists($outputpath))
			unlink($outputpath);

		$jobname = md5(json_encode($data));
		$jobpath = PHANTOMJS.'jobs' .DIRECTORY_SEPARATOR. $jobname . '.js';

		if (!is_file($jobpath)) {
			// Now we write the code to a js file
			$resultstring = $this->gettemplateresult('capture', $data);
			file_put_contents($jobpath, $resultstring);
		}

		$binpath = '';//PHANTOMJS.'bin' . DIRECTORY_SEPARATOR;
		$command = sprintf("%sphantomjs %s", $binpath, $jobpath);
		$result = system(escapeshellcmd($command));

		return file_exists($outputpath);
	}

	private function gettemplateresult($templatename, array $args)
	{
		$templatepath = PHANTOMJS.'template' . DIRECTORY_SEPARATOR . $templatename . '.php';
		if (!file_exists($templatepath)) {
			throw new \Exception("The template {$templatename} does not exist!");
		}
		ob_start();
		extract($args);
		include PHANTOMJS.'template' . DIRECTORY_SEPARATOR . $templatename . '.php';

		return ob_get_clean();
	}
}

/* End of file Phantomcapture.php */
/* Location: ./application/libraries/Phantomcapture.php */