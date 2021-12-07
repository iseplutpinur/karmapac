<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JabatanModel extends Render_Model
{
    public function getAllData($draw = null, $show = null, $start = null, $cari = null, $order = null, $filter = null)
    {
        $level = $this->config->item('level_mentor');
        $get_parrent_no_urut = "(select z.no_urut from pengurus_jabatan as z where a.parrent_id = z.id)";
        // select tabel
        $this->db->select("a.*,
        if(isnull(a.parrent_id),'',
            (select z.nama from pengurus_jabatan as z where a.parrent_id = z.id)
        ) as parrent,
        concat( if(isnull(a.parrent_id),'',
                concat($get_parrent_no_urut, '.')
            ), a.no_urut
        ) as kode,

        (if(isnull(a.parrent_id), a.no_urut,
            $get_parrent_no_urut)
        ) as parrent_no_urut,

        (
            if(isnull(a.parrent_id), 0, a.no_urut)
        )as child_no_urut,

        IF(a.status = '0' , 'Tidak Aktif', IF(a.status = '1' , 'Aktif', 'Tidak Diketahui')) as status_str
        ");
        $this->db->from("pengurus_jabatan a");
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

        $this->db->order_by('parrent_no_urut');
        $this->db->order_by('child_no_urut');

        if ($filter) {
            if ($filter['periode'] != '') {
                $this->db->where('a.pengurus_periode_id', $filter['periode']);
            }
        }

        // initial data table
        if ($draw == 1) {
            $this->db->limit(10, 0);
        }

        // pencarian
        if ($cari != null) {
            $this->db->where("(
                (select z.nama from pengurus_jabatan as z where a.parrent_id = z.id) like '%$cari%' or
                a.slug like '%$cari%' or
                a.pengurus_periode_id like '%$cari%' or
                a.parrent_id like '%$cari%' or
                a.nama like '%$cari%' or
                a.keterangan like '%$cari%' or
                a.slogan like '%$cari%' or
                a.status like '%$cari%' or
                a.visi like '%$cari%' or
                a.misi like '%$cari%' or
                a.no_urut like '%$cari%' or
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

    public function insert($user_id, $foto, $no_urut, $pengurus_periode_id, $parrent_id, $nama, $slug, $keterangan, $slogan, $visi, $misi, $status)
    {
        $data = [
            'pengurus_periode_id' => $pengurus_periode_id,
            'parrent_id' => $parrent_id,
            'no_urut' => $no_urut,
            'foto' => $foto,
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
        $execute = $this->db->insert('pengurus_jabatan', $data);
        $execute = $this->db->insert_id();
        return $execute;
    }

    public function update($id, $user_id, $foto, $no_urut, $pengurus_periode_id, $parrent_id, $nama, $slug, $keterangan, $slogan, $visi, $misi, $status)
    {
        $data = [
            'pengurus_periode_id' => $pengurus_periode_id,
            'parrent_id' => $parrent_id,
            'no_urut' => $no_urut,
            'foto' => $foto,
            'nama' => $nama,
            'slug' => $slug,
            'keterangan' => $keterangan,
            'slogan' => $slogan,
            'visi' => $visi,
            'misi' => $misi,
            'status' => $status,
            'updated_by' => $user_id,
        ];
        // Update users
        $execute = $this->db->where('id', $id);
        $execute = $this->db->update('pengurus_jabatan', $data);
        return  $execute;
    }

    // hard delete
    public function delete($id)
    {
        $exe = $this->db->where('id', $id)->delete('pengurus_jabatan');
        return $exe;
    }

    public function getOne($id)
    {
        return $this->db->select('*')->from('pengurus_jabatan')->where('id', $id)->where('status <>', 3)->order_by('no_urut')->get()->row_array();
    }


    public function getParrent($pengurus_periode_id = null)
    {
        $result = $this->db->select('id, nama as text')
            ->from('pengurus_jabatan')
            ->where('parrent_id', null);
        if ($pengurus_periode_id) {
            $result->where('pengurus_periode_id', $pengurus_periode_id);
        }
        $result->order_by('no_urut');
        return $result->get()->result_array();
    }

    public function getChild($parrent_id)
    {
        return is_null($parrent_id) ? null : $this->db->select('id, nama as text')->from('pengurus_jabatan')->where('parrent_id', $parrent_id)->where('status <>', 3)->get()->result_array();
    }

    public function getList()
    {
        return $this->db->select('id, nama as text')
            ->from('pengurus_jabatan')
            ->where('status', 1)
            ->get()->result_array();
    }
}
