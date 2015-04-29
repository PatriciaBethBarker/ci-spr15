<?php
class Rss extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('rss_model');
                $this->config->set_item('banner', 'Global News Banner');
        }

        
        public function index()
        {       //adds rss///////////////////////
                $data['rss'] = $this->rss_model->get_rss();
                ////////////////////////////////
                $data['title'] = 'RSS Feed';
                $this->load->view('rss/index', $data);
        }
          
}
