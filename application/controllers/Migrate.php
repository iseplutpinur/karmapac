<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migrate extends Render_Controller
{
  public function users_slug()
  {
    $query = <<<SQL
      ALTER TABLE `users`
      ADD COLUMN IF NOT EXISTS `slug` VARCHAR(255) NULL AFTER `level_id`;
    SQL;
    $result = $this->db->query($query);
    echo "Menambahkan kolom slug " . ($result ? 'Berhasil' : 'Gagal') . "<br>";

    $query = <<<SQL
      UPDATE `users` SET `slug` = concat(if(`thn_angkatan` IS null, '', concat(`thn_angkatan`, '_')), LOWER(REPLACE(REPLACE(`user_nama`, '\'', '_'), ' ', '_'))); #'
    SQL;
    $result = $this->db->query($query);
    echo "Generate slug " . ($result ? 'Berhasil' : 'Gagal') . "<br>";
  }
}
