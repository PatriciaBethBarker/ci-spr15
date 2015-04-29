<?php
//Rss.php controller
class Rss extends CI_Controller {

        public function __construct()
        {  //everything here is global to allmethods in the controller
                parent::__construct();
                $this->load->model('rss_model');
                $this->config->set_item('banner', 'Global News Banner');
        }
 
        public function index()

                $request = "http://rss.news.yahoo.com/rss/software";  //model
                $response = file_get_contents($request);  //model
                $dta[xml] = simplexml_load_string($response);  //model
                
                $data['title'] = 'RSS Feed';
                $this->load->view('rss/index', $data);
 
        }#end of index
          
}#end of Rss class/controller()
