<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_form extends CI_Controller
{
	public function index()
	{
		$response = array();
		$msg = '';
		$this->load->library('form_validation');
		$this->load->model('Form');
		
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('subject', 'Subject', 'required');
		$this->form_validation->set_rules('message', 'Message', 'required');
		
		$this->form_validation->set_rules('username', 'Username', 'required',
			array('required' => 'Please enter your username')
		);
		
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email',
			array('required' => 'Please enter your email', 'valid_email' => 'Email must be valid.')
		);
		
		$this->form_validation->set_rules('subject', 'Subject', 'required',
			array('required' => 'Subject field required')
		);
		
		$this->form_validation->set_rules('message', 'Message', 'required',
			array('required' => 'Message field required')
		);
		
		
		
		if ($this->form_validation->run() == FALSE)
		{
				//$this->form_validation->set_error_delimiters('', '');
				$msg = validation_errors();
				$respone['ok'] = 0;
		}
		else
		{
			
			$data = array(
						'user_name' => $this->input->post('username'),
						'email' => $this->input->post('email'),
						'subject' => $this->input->post('subject'),
						'message' => $this->input->post('message')
						);
		
			$this->Form->insert($data);
			
			$msg = "Thank you for choosing Interbind. Our customer executive will contact you shortly.";
			$response['ok'] = 1;
		}
		
		$response['message'] = $msg;
		echo json_encode($response);
	}
	

}


