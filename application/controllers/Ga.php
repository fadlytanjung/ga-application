<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ga extends CI_Controller {

    
	public function index()
	{
        $this->load->view('templates/header');
        $this->load->view('ga_index');
        $this->load->view('templates/footer');
	}
}