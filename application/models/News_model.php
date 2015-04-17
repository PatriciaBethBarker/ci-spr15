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



}#end news_model