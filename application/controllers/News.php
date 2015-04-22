<?php
class News extends CI_Controller {

        public function __construct()
        { //go grab the data from the raw ci controller
                parent::__construct();
                $this->load->model('news_model');
        }#end contruct function

        public function index()
        {  //this is the list of news items
                $data['news'] = $this->news_model->get_news();
                $data['title'] = 'News archive';
        
                $this->load->view('templates/header', $data);
                $this->load->view('news/index', $data);
                $this->load->view('templates/footer');
        }#end index function

        public function view($slug = NULL)
        {  // this is our view page
                $data['news_item'] = $this->news_model->get_news($slug);
        
                if (empty($data['news_item']))
                {
                        show_404();
                }
        
                $data['title'] = $data['news_item']['title'];
        
                $this->load->view('templates/header', $data);
                $this->load->view('news/view', $data);
                $this->load->view('templates/footer');
        }
        
        public function create()
        {  // loading form and form helper functions
        $this->load->helper('form');
        $this->load->library('form_validation');
    
        $data['title'] = 'Create a news item';
    
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('text', 'text', 'required');
    
        if ($this->form_validation->run() === FALSE)
        {  // this is the post back, pass data into all three
            $this->load->view('templates/header', $data);
            $this->load->view('news/create', $data);
            $this->load->view('templates/footer', $data);
    
        }
        else
        { //you could interrogate the data here as well
            $this->news_model->set_news();
            $this->load->view('news/success');
        }
        }
        
        
        
        
        
}