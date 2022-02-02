<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GaleriModel extends Render_Model
{
  public function getTotalRowsGaleri(): int
  {
    $result = $this->db->select('count(*) as total')
      ->from('galeri')
      ->where('status', 1)
      ->get()->row();

    return $result->total ?? 0;
  }

  public function getGaleris($start, $limit, $search = null)
  {
    $this->db->select('nama, foto, foto_id_gdrive, slug, id_gdrive, keterangan')
      ->from('galeri')
      ->where('status', 1);
    if ($search) {
      $this->db->where("(
        nama like '%$search%' or
        foto like '%$search%' or
        foto_id_gdrive like '%$search%' or
        slug like '%$search%' or
        id_gdrive like '%$search%' or
        keterangan like '%$search%'
      )");
    }
    $this->db->limit($limit, $start);

    $result = $this->db->get()->result();
    return $result;
  }

  public function getGaleri($slug)
  {
    $this->db->select('nama, id_gdrive')
      ->from('galeri')
      ->where('status', 1)
      ->where('slug', $slug);
    $result = $this->db->get()->row();
    return $result;
  }
}
