<?php
//class Pages can access methods and variables defined
//in the CI_Controller class
//the Controller is the super object-center of every request to the app

class Pages extends CI_Controller {
    
    public function view($page = 'home')
    { //see if file exists the slug identifies the $page
            if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
            {
                    // Whoops, we don't have a page for that!
                    show_404();
            }
    //ucfirst makes the first charachter upper case
            $data['title'] = ucfirst($page); // Capitalize the first letter
            
    //the slug expects a prefix - file path - and $data is passed through
    //start at view and find file string on load
    //the dot is a Concatenator, put space before it to define code
            $this->load->view('templates/header', $data);
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer', $data);
    }
}
?>