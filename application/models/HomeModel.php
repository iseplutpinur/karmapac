<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HomeModel extends Render_Model
{
  function getKepengurusanAktifHome($kepengurusan)
  {
    $this->db->select('visi,misi,slogan,nama')
      ->from('pengurus_periode');

    if ($kepengurusan != null) {
      $this->db->where('slug', $kepengurusan);
    } else {
      $this->db->where('status', 1);
    }

    $get = $this->db->get()->row();
    return $get;
  }

  public function getTotalRowsArticle(): int
  {
    $result = $this->db->select('count(*) as total')
      ->from('artikel')
      ->where('status', 2)
      ->get()->row();

    return $result->total ?? 0;
  }

  public function getArticles($start, $limit)
  {
    $this->db->select('id')
      ->from('artikel')
      ->where('status', 2)
      // ->order_by('created_at', 'DESC')
      ->limit($limit, $start);

    $result = $this->db->get()->result();
    return $result;
  }
}
