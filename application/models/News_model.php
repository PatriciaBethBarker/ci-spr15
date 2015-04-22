<?php
class News_model extends CI_Model {

        public function __construct()
        {//automatically opens the database with the underscrore construct function above
                $this->load->database();
        }#end constructor
        
        
        public function get_news($slug = FALSE)
        { //slug allows us to vary the data - if false, then get all the data
                if ($slug === FALSE)
                {
                        $query = $this->db->get('news');
                        return $query->result_array();
                }
        
                $query = $this->db->get_where('news', array('slug' => $slug));
                return $query->row_array();
        }#end get_news

        public function set_news()
        {
            $this->load->helper('url');
        
            $slug = url_title($this->input->post('title'), 'dash', TRUE);
        
            $data = array( //the array data and field names match
                'title' => $this->input->post('title'),
                'slug' => $slug,
                'text' => $this->input->post('text')
            );
        
            return $this->db->insert('news', $data);
        }#end set news



}#end news_model