<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends Render_Controller
{
	public function index()
	{
		// kepengurusan query from url
		$kepengurusan = $this->input->get('kepengurusan');
		$get_kepengurusan_aktif = $this->model->getKepengurusanAktifHome($kepengurusan);
		// get kepengurusan aktif
		$this->data['visi'] = is_null($get_kepengurusan_aktif) ? '' : $get_kepengurusan_aktif->visi;
		$this->data['misi'] = is_null($get_kepengurusan_aktif) ? '' : $get_kepengurusan_aktif->misi;
		$this->data['slogan'] = is_null($get_kepengurusan_aktif) ? '' : $get_kepengurusan_aktif->slogan;
		$this->data['nama'] = is_null($get_kepengurusan_aktif) ? '' : $get_kepengurusan_aktif->nama;
		// get list kepengurusan sekarang

		// get list artikel
		$total_rows = $this->model->getTotalRowsArticle();
		$per_page = 5;
		$article_from = $this->input->get('article_from') ?? 0;
		$articles = $this->model->getArticles($article_from, $per_page);

		$this->load->library('pagination');
		$this->pagination->initialize([
			'base_url' => base_url(),
			'total_rows' => $total_rows,
			'per_page' => $per_page,
			'page_query_string' => true,
			'query_string_segment' => 'article_from',

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
		$this->data['articles'] = $articles;

		// get kategori

		$this->navigation_type = 'front';
		$this->title = "Home";
		$this->content = 'frontend/home';
		$this->render();
	}

	public function detail($slug)
	{
		$this->title = "Home";
		$this->render();
	}

	function __construct()
	{
		parent::__construct();
		$this->default_template = 'templates/karmapack';
		$this->navigation_type = 'front';
		$this->load->model('HomeModel', 'model');
		$this->load->library('plugin');
		$this->load->helper('url');
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */