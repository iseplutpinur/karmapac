<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KepengurusanModel extends Render_Model
{
    public function getAllData($draw = null, $show = null, $start = null, $cari = null, $order = null)
    {
        $level = $this->config->item('level_mentor');
        // select tabel
        $this->db->select("a.*,
        IF(a.status = '0' , 'Tidak Aktif', IF(a.status = '1' , 'Aktif', 'Tidak Diketahui')) as status_str
        ");
        $this->db->from("pengurus_periode a");
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
                a.dari LIKE '%$cari%' or
                a.sampai LIKE '%$cari%' or
                a.nama LIKE '%$cari%' or
                a.slug LIKE '%$cari%' or
                a.keterangan LIKE '%$cari%' or
                a.slogan LIKE '%$cari%' or
                a.visi LIKE '%$cari%' or
                a.misi LIKE '%$cari%' or
                a.status LIKE '%$cari%' or
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

    public function insert($user_id, $foto, $dari, $sampai, $nama, $slug, $keterangan, $slogan, $visi, $misi)
    {
        $status = $this->db->select('count(*) as found')->from('pengurus_periode')->where('status', 1)->get()->row();
        $status = isset($status->found) ? $status->found : 0;
        $status = $status > 0 ? 0 : 1;

        $data = [
            'foto' => $foto,
            'dari' => $dari,
            'sampai' => $sampai,
            'nama' => $nama,
            'slug' => $slug,
            'keterangan' => $keterangan,
            'slogan' => $slogan,
            'visi' => $visi,
            'misi' => $misi,
            'status' => $status,
            'created_by' => $user_id,
        ];
        // Insert users
        $execute = $this->db->insert('pengurus_periode', $data);
        $execute = $this->db->insert_id();
        return $execute;
    }

    public function update($id, $user_id, $foto, $dari, $sampai, $nama, $slug, $keterangan, $slogan, $visi, $misi)
    {
        $data = [
            'foto' => $foto,
            'dari' => $dari,
            'sampai' => $sampai,
            'nama' => $nama,
            'slug' => $slug,
            'keterangan' => $keterangan,
            'slogan' => $slogan,
            'visi' => $visi,
            'misi' => $misi,
            'updated_by' => $user_id,
        ];
        // Update users
        $execute = $this->db->where('id', $id);
        $execute = $this->db->update('pengurus_periode', $data);
        return  $execute;
    }

    public function delete($user_id, $id)
    {
        // Delete users
        $exe = $this->db->where('id', $id)->update('pengurus_periode', [
            'status' => 3,
            'deleted_by' => $user_id,
            'deleted_at' => Date("Y-m-d H:i:s", time())
        ]);
        return $exe;
    }

    public function activate($user_id, $id)
    {
        $this->db->where('id', $id)->update('pengurus_periode', ['status' => 1, 'updated_by' => $user_id]);
        $this->db
            ->where('id <>', $id)
            ->where('status', 1)
            ->where('status <>', 3)
            ->update('pengurus_periode', ['status' => 0, 'updated_by' => $user_id]);
        return true;
    }

    public function getOne($id)
    {
        return $this->db->select('*')->from('pengurus_periode')->where('id', $id)->where('status <>', 3)->get()->row_array();
    }

    public function getList()
    {
        return $this->db->select('id, nama as text')
            ->from('pengurus_periode')
            ->where('status', 1)
            ->get()->result_array();
    }
}
