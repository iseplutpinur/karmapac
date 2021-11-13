<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Utama extends CI_Controller
{
	public function index()
	{
		$this->template->load(template() . '/template', template() . '/view_home');
	}
}
