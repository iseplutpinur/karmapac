<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PengurusModel extends Render_Model
{
  private $pengurus_level = 2;
  public function getAllData($draw = null, $show = null, $start = null, $cari = null, $order = null)
  {
    // select tabel
    $this->db->select("a.user_id as id, a.npp, a.thn_angkatan, a.user_nama, a.user_email, IF(a.user_status = '0' , 'Tidak Aktif', IF(a.user_status = '1' , 'Aktif', 'Tidak Diketahui')) as status_str, a.user_status");
    $this->db->from("users a");
    $this->db->join('role_users b', 'a.user_id = b.role_user_id');
    $this->db->where('a.user_status <>', 3);
    $this->db->where('b.role_lev_id', $this->pengurus_level);

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
              a.npp LIKE '%$cari%' or
              a.thn_angkatan LIKE '%$cari%' or
              a.user_nama LIKE '%$cari%' or
              a.user_email LIKE '%$cari%' or
              a.user_status LIKE '%$cari%' or
              IF(a.user_status = '0' , 'Tidak Aktif', IF(a.user_status = '1' , 'Aktif', 'Tidak Diketahui')) LIKE '%$cari%'
          )");
    }

    // pagination
    if ($show != null && $start != null) {
      $this->db->limit($show, $start);
    }

    $result = $this->db->get();
    return $result;
  }



  public function insert($npp, $nama, $angkatan, $email, $password, $status)
  {
    $data['npp'] = $npp;
    $data['user_nama'] = $nama;
    $data['thn_angkatan'] = $angkatan;
    $data['user_email'] = $email;
    $data['user_password'] = $this->b_password->bcrypt_hash($password);
    $data['user_status'] = $status;

    // Insert users
    $execute = $this->db->insert('users', $data);
    $execute = $this->db->insert_id();

    $data2['role_user_id'] = $execute;
    $data2['role_lev_id'] = $this->pengurus_level;

    // Insert role users
    $execute2 = $this->db->insert('role_users', $data2);
    return $execute;
  }

  public function update($id, $npp, $nama, $angkatan, $email, $password, $status)
  {
    $data['npp'] = $npp;
    $data['user_nama'] = $nama;
    $data['thn_angkatan'] = $angkatan;
    $data['user_email'] = $email;
    if ($password != '') {
      $data['user_password'] = $this->b_password->bcrypt_hash($password);
    }
    $data['user_status'] = $status;
    $data['updated_at'] = Date('Y-m-d H:i:s');

    // Insert users
    $execute = $this->db->where('user_id', $id)->update('users', $data);
    return $execute;
  }

  public function delete($id)
  {
    $user = $this->db->where('user_id', $id)->delete('users');
    $lev = $this->db->where('role_user_id', $id)->delete('role_users');
    return $user && $lev;
  }
}
