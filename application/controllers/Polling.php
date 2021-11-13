<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Polling extends CI_Controller
{
	public function index()
	{
		if (isset($_POST['submit'])) {
			$this->model_main->kirim_Pesan();
			redirect('polling');
		} else {
			$data['title'] = 'Poling';
			$template = template();
			$this->template->load($template . '/template', $template . '/view_polling', $data);
		}
	}

	public function hasil()
	{
		$template = template();
		$data['title'] = 'Hasil Poling';
		$this->template->load($template . '/template', $template . '/view_polling_hasil', $data);
	}
}
