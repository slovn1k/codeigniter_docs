<?php

class Blog extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// Your own constructor code
	}

	//example
	//_remap is used to redirect the controller to a certain method
//	public function _remap($method)
//	{
//		if ($method == 'some_method') {
//			$this->method();
//		} else {
//			$this->default_method();
//		}
//	}

	public function _remap($method, $params = array())
	{
		$method = 'process_' . $method;
		if (method_exists($this, $method)) {
			return call_user_func_array(array($this, $method), $params);
		}

		show_404();
	}

	//this method permits modifiing output data
	public function _output($output)
	{
		echo $output;

		if ($this->output->cache_expiration > 0) {
			$this->output->_write_cache($output);
		}
	}

	//private method, it will not be able to access via url
	//if method has underscore it also cannot be accessed via url
	private function _utility()
	{
		echo 'Some code';
	}

	public function index()
	{
		echo "Hello world";
	}

	public function comments()
	{
		echo "Look at this";
	}

//	method with parameters
// uri for this method /shoes/sandals/123
	public function shoes($sandals, $id)
	{
		echo $sandals;
		echo $id;
	}
}
