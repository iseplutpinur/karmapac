<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GaleriModel extends Render_Model
{
  public function getAllData($draw = null, $show = null, $start = null, $cari = null, $order = null)
  {
    // select tabel
    $this->db->select("a.*,
        IF(a.status = '0' , 'Tidak Aktif', IF(a.status = '1' , 'Aktif', 'Tidak Diketahui')) as status_str");
    $this->db->from("galeri a");
    $this->db->where('a.status <>', 3);

    // order by
    if ($order['order'] != null) {
      $columns = $order['columns'];
      $dir = $order['order'][0]['dir'];
      $order = $order['order'][0]['column'];
      $columns = $columns[$order];

      $order_colum = $columns['data'];
      $this->db->order_by($order_colum, $dir);
    }

    // initial data table
    if ($draw == 1) {
      $this->db->limit(10, 0);
    }

    // pencarian
    if ($cari != null) {
      $this->db->where("(
                a.nama LIKE '%$cari%' or
                a.slug LIKE '%$cari%' or
                a.id_gdrive LIKE '%$cari%' or
                a.keterangan LIKE '%$cari%' or
                IF(a.status = '0' , 'Tidak Aktif', IF(a.status = '1' , 'Aktif', 'Tidak Diketahui')) LIKE '%$cari%'
            )");
    }

    // pagination
    if ($show != null && $start != null) {
      $this->db->limit($show, $start);
    }

    $result = $this->db->get();
    return $result;
  }

  public function insert($user_id, $nama, $slug, $foto, $id_gdrive, $foto_id_gdrive, $keterangan, $status)
  {
    $data = [
      'nama' => $nama,
      'slug' => $slug,
      'id_gdrive' => $id_gdrive,
      'foto_id_gdrive' => in_array($foto_id_gdrive, ['', '0', 'null']) ?  null : $foto_id_gdrive,
      'keterangan' => $keterangan,
      'status' => $status,
      'foto' => $foto,
      'created_by' => $user_id,
    ];
    // Insert users
    $execute = $this->db->insert('galeri', $data);
    $execute = $this->db->insert_id();
    return $execute;
  }

  public function update($id, $user_id, $nama, $slug, $foto, $id_gdrive, $foto_id_gdrive, $keterangan, $status)
  {
    $data = [
      'nama' => $nama,
      'slug' => $slug,
      'id_gdrive' => $id_gdrive,
      'foto_id_gdrive' => in_array($foto_id_gdrive, ['', '0', 'null']) ?  null : $foto_id_gdrive,
      'keterangan' => $keterangan,
      'status' => $status,
      'foto' => $foto,
      'updated_by' => $user_id,
    ];
    // Update users
    $execute = $this->db->where('id', $id);
    $execute = $this->db->update('galeri', $data);
    return  $execute;
  }

  public function delete($id)
  {
    // Delete users
    $exe = $this->db->where('id', $id)->update('galeri');
    return $exe;
  }

  public function getList()
  {
    return $this->db->select('id, nama as text')
      ->from('galeri')
      ->where('status', 1)
      ->get()->result_array();
  }
}
