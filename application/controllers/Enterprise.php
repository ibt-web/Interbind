<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enterprise extends CI_Controller
{
    public function index()
    {
		$this->load->view('inc/include');
        $this->load->view('Ep');
    }
}