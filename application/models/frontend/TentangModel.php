<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TentangModel extends Render_Model
{
  public function getTotalRowsGaleri(): int
  {
    $result = $this->db->select('count(*) as total')
      ->from('galeri')
      ->where('status', 1)
      ->get()->row();

    return $result->total ?? 0;
  }

  public function pengurus_list($periode_id, $cari = null)
  {
    $query_get_sub_jabatan = "SELECT nama FROM pengurus_jabatan as y where y.id = z.parrent_id";

    $query_get_jabatan = "SELECT concat(z.nama,
      if(z.parrent_id is null, '', concat(' -> ',($query_get_sub_jabatan)))
      ) from pengurus_jabatan as z
      join pengurus_jabatan_detail as x on x.pengurus_jabatan_id = z.id
      where
      z.pengurus_periode_id = '$periode_id' and
      x.user_id = a.user_id
      limit 1";

    $this->db->select("b.thn_angkatan, b.user_nama, a.id, b.user_id, ($query_get_jabatan) as jabatan");
    $this->db->from('pengurus_periode_detail a');
    $this->db->join('users b', 'a.user_id = b.user_id');
    $this->db->join('level c', 'c.lev_id = b.level_id');
    $this->db->where('b.level_id', $this->pengurus_level);
    $this->db->where('a.pengurus_periode_id', $periode_id);

    // pencarian
    if ($cari != null) {
      $this->db->where("( user_nama  like '%$cari%' or
          b.nama_belakang  like '%$cari%' or
          b.nama_depan  like '%$cari%' or
          b.alamat_kabupaten  like '%$cari%' or
          b.alamat_kecamatan  like '%$cari%' or
          b.alamat_desa  like '%$cari%' or
          b.npp  like '%$cari%' or
          b.user_nik  like '%$cari%' or
          b.user_tgl_lahir  like '%$cari%' or
          b.thn_angkatan  like '%$cari%' or
          b.user_jenis_kelamin  like '%$cari%' or
          b.user_password  like '%$cari%' or
          b.user_email  like '%$cari%' or
          b.user_email_status  like '%$cari%' or
          b.user_phone  like '%$cari%' or
          b.user_foto  like '%$cari%' or
          b.user_status  like '%$cari%' or
          b.level_id  like '%$cari%' )");
    }

    $result = $this->db->get();
    return $result;
  }

  public function pengurus_list1($periode_id, $cari = null)
  {
    $count_child = <<<SQL
      select count(*) from pengurus_jabatan as z where z.parrent_id = a.id
    SQL;
    $parrents = $this->db->select("a.*, ($count_child) as child")->from('pengurus_jabatan a')
      ->where('a.pengurus_periode_id', $periode_id)
      ->where('a.parrent_id', null)
      ->where('a.status', 1)
      ->order_by('a.no_urut')
      ->get()->result_array();


    $results = [
      'utama' => [],
      'bidang' => [],
    ];

    foreach ($parrents as $parrent) {
      // pengurus bidang
      if (((int)$parrent['child']) > 0) {
        // get turunan
        $turunan = $this->getChildJabatan($parrent['id']);
        $turunan_result = [];
        foreach ($turunan as $value) {
          if (((int)$value['jml_pengurus']) > 1) {
            $pejabat = $this->getAnggotaFromJabatanPeriode($value['id'])->result_array();
            if ($pejabat) {
              $turunan_result[] = [
                'jabatan' => $value,
                'pejabat' => $pejabat,
                'list' => true
              ];
            }
          } else {
            $pejabat = $this->getAnggotaFromJabatanPeriode($value['id'])->row_array();
            if ($pejabat) {
              $turunan_result[] = [
                'jabatan' => $value,
                'pejabat' => $pejabat,
                'list' => false
              ];
            }
          }
        }


        $results['bidang'][] = [
          'header' => $parrent,
          'body' => $turunan_result
        ];

        // pengurus inti
      } else {
        $pejabat = $this->getAnggotaFromJabatanPeriode($parrent['id'])->row_array();
        if ($pejabat) {
          $results['utama'][] = [
            'jabatan' => $parrent,
            'pejabat' => $pejabat,
            'list' => false
          ];
        }
      }
    }

    return $results;
  }

  private function getAnggotaFromJabatanPeriode($jabatan_id)
  {
    $result = $this->db->select("*")->from('users a')
      ->join('pengurus_jabatan_detail b', 'a.user_id = b.user_id')
      ->where('b.pengurus_jabatan_id', $jabatan_id)
      ->get();

    return $result;
  }

  private function getChildJabatan($jabatan_id)
  {
    $jml_user = <<<SQL
      select count(*) from users as z join pengurus_jabatan_detail as y ON y.user_id = z.user_id WHERE y.pengurus_jabatan_id = a.id
    SQL;

    $result = $this->db->select("a.*, ($jml_user) as jml_pengurus")
      ->from('pengurus_jabatan a')
      ->where('a.parrent_id', $jabatan_id)
      ->order_by('a.no_urut')
      ->get()->result_array();

    return $result;
  }
}
