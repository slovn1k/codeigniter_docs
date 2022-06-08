<?php

class Blog extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code

        // this is an example of loading model and renaming it
        // if we want to autoload models, in autoload.php config, we can set models to autoload on project initialization
        // $this->load->model('some_model', 'renamed_model');

		// loading helper
        $this->load->helper('url');
		// loading multiple helpers
		// $this->load->helper(array('helper_1', 'helper_2'));
		// we can autoload helpers in autoload config file
    }

    //example
    //_remap is used to redirect the controller to a certain method
//    public function _remap($method)
//    {
//        if ($method == 'some_method') {
//            $this->method();
//        } else {
//            $this->default_method();
//        }
//    }

//    public function _remap($method, $params = array())
//    {
//        $method = 'process_' . $method;
//        if (method_exists($this, $method)) {
//            return call_user_func_array(array($this, $method), $params);
//        }
//
//        show_404();
//    }

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
//        echo "Hello world";

        $data['title'] = 'My Real Title';
        $data['heading'] = 'My Real Heading';

        $data['todo_list'] = array('Clean house', 'Call mom', 'Run Errands');

        // passing data to the view
        $this->load->view('blogview', $data);
    }

    public function comments()
    {
        echo "Look at this";
    }

//    method with parameters
// uri for this method /shoes/sandals/123
    public function shoes($sandals, $id)
    {
        echo $sandals;
        echo $id;
    }
}
