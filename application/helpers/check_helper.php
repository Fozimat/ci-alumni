<?php

function is_logged_in()
{
	$ci = get_instance();
	if($ci->session->userdata('status') != 'login')
	{
		redirect('auth');
	}
}

function is_logged()
{
	$ci = get_instance();
	if($ci->session->userdata('status') != 'login_alumni')
	{
		redirect('login');
	}
}