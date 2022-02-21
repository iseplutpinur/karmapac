<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tentang extends Render_Controller
{
  public function struktur_kepengurusan()
  {
    $this->preloader = false;
    // kepengurusan query from url
    $kepengurusan = $this->input->get('kepengurusan');
    $get_kepengurusan_aktif = $this->home->getKepengurusanAktifHome($kepengurusan);

    if ($get_kepengurusan_aktif) {
      $this->data['kepengurusan'] =  $get_kepengurusan_aktif;
      $lists = $this->model->pengurus_list1($get_kepengurusan_aktif->id);
      $this->content = 'frontend/struktur-kepengurusan';
      $this->data['anggota_lists'] = $lists;
    }

    $this->navigation_type = 'front';
    $this->title = "Struktur Kepengurusan";
    $this->render();
  }

  function __construct()
  {
    parent::__construct();
    $this->default_template = 'templates/karmapack';
    $this->navigation_type = 'front';
    $this->load->model('frontend/TentangModel', 'model');
    $this->load->model('HomeModel', 'home');
    $this->load->library('plugin');
    $this->load->helper('url');
  }
}
