<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_form extends CI_Controller
{
	public function index()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('subject', 'Subject', 'required');
		$this->form_validation->set_rules('message', 'Message', 'required');

		if ($this->form_validation->run() == FALSE)
		{
				echo "Error in form fields";
		}
		else
		{
				echo "success";
		}
	}
}


