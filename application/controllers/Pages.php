<?php

class Pages extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// Load a library
		$this->load->library('form_validation');

		// Load multiple libraries using array
		$this->load->library(array('email', 'table'));

		// Loading a driver, driver is a library with multiple libraries
		$this->load->driver('cache');

		// Sample driver directory and file structure layout:
		// /application/libraries/Driver_name
		// Driver_name.php
		// drivers
		// Driver_name_subclass_1.php
		// Driver_name_subclass_2.php
		// Driver_name_subclass_3.php
	}

	public function view($page = 'home')
	{
		if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
			// Whoops, we don't have a page for that!
			show_404();
		}

		$data['title'] = ucfirst($page); // Capitalize the first letter

		// load views
		$this->load->view('templates/header', $data);
		$this->load->view('pages/' . $page, $data);
		$this->load->view('templates/footer', $data);
	}
}
