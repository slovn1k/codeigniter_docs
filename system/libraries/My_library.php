<?php

defined('BASEPATH') or exit('No direct script access allowed');

class My_library
{
	// Super-object
	protected $CI;

	public function __construct()
	{

		// Initilizalizing the super-object to user all framework this elements
		$this->CI = &get_instance();

		$this->CI->load->helper('url');
		$this->CI->load->library('session');
		$this->CI->config->item('base_url');
	}

	// You can also replace native libraries by creating identically named librarie
	// You can also extend librarie by simbly using extend [Library_name]
}
