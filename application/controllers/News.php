<?php

class News extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // loading news model
        $this->load->model('news_model');
        // loading url_helpers
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $data['news'] = $this->news_model->get_news();
        $data['title'] = 'News archive';

        $this->load->view('templates/header', $data);
        $this->load->view('news/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($slug = null)
    {
        $data['news_item'] = $this->news_model->get_news($slug);

        if (empty($data['news_item'])) {
            show_404();
        }

        $data['title'] = $data['news_item']['title'];

        $this->load->view('templates/header', $data);
        $this->load->view('news/view', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        // load form helper to create forms with CSRF token
        $this->load->helper('form');
        // load form validation library
        $this->load->library('form_validation');

        $data['title'] = 'Create news item';

        // set validation rules for title input
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('text', 'Text', 'required');

        // runs the validation, if it fails opens create news item view
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('news/create');
            $this->load->view('templates/footer');
        } else {
            // creates news item and displayes success view
            $this->news_model->set_news();
            $this->load->view('news/success');
        }
    }
}
