<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeri extends Render_Controller
{
	public function index()
	{
		$this->preloader = false;
		$this->navigation_front = 'galeri';
		$total_rows = $this->model->getTotalRowsGaleri();
		$per_page = 9;
		$galeri_from = $this->input->get('galeri_from') ?? 0;
		$search_key = $this->input->get('search');
		$galeris = $this->model->getGaleris($galeri_from, $per_page, $search_key);
		$this->load->library('pagination');
		$this->pagination->initialize([
			'base_url' => base_url('/galeri' . ((is_null($search_key) || $search_key == "") ? '' : ('?search=' . $search_key))),
			'total_rows' => $total_rows,
			'per_page' => $per_page,
			'page_query_string' => true,
			'query_string_segment' => 'galeri_from',

			// title
			'first_link' => 'First',
			'last_link' => 'Last',

			// tag html
			'full_tag_open' => '<nav><ul class="pagination justify-content-center">',
			'full_tag_close' => '</ul></nav>',
			'cur_tag_open' => '<li class="page-item active" aria-current="page"><span class="page-link">',
			'cur_tag_close' => '</span></li>',
			'first_tag_open' => '<li class="page-item">',
			'first_tag_close' => '</li>',
			'last_tag_open' => '<li class="page-item">',
			'last_tag_close' => '</li>',
			'next_tag_open' => '<li class="page-item">',
			'next_tag_close' => '</li>',
			'prev_tag_open' => '<li class="page-item">',
			'prev_tag_close' => '</li>',
			'num_tag_open' => '<li class="page-item">',
			'num_tag_close' => '</li>',

			// atribut
			'attributes' => ['class' => 'page-link'],
		]);

		$pagination = $this->pagination->create_links();
		$this->data['pagination'] = $pagination;
		$this->data['galeris'] = $galeris;
		$this->data['search'] = $search_key;

		// get kategori

		$this->navigation_type = 'front';
		$this->title = "Galeri";
		$this->content = 'frontend/galeri';
		$this->render();
	}

	public function detail($slug)
	{
		$this->navigation_front = 'galeri';
		$this->preloader = false;
		$this->data['galeri'] = $this->model->getGaleri($slug);
		$this->title = is_null($this->data['galeri']) ? 'Galeri' : $this->data['galeri']->nama;
		$this->content = 'frontend/galeri-detail';
		$this->render();
	}

	function __construct()
	{
		parent::__construct();
		$this->default_template = 'templates/karmapack';
		$this->navigation_type = 'front';
		$this->load->model('frontend/GaleriModel', 'model');
		$this->load->library('plugin');
		$this->load->helper('url');
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */