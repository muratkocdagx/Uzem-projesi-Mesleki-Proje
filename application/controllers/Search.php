<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller
{
        
    public function index()
    {
        $term = $this->input->get('term');
        $rows = $this->database->search($term);
        echo json_encode($rows);
    }

    
}