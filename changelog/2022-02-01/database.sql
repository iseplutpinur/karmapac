    -- drop table galeri
    -- DROP TABLE `galeri_detail`, `galeri_detail_komentar`;

    -- add new column to galeri table
    ALTER TABLE `galeri` ADD `slug` VARCHAR(255) NOT NULL AFTER `nama`, ADD `id_gdrive` TEXT NOT NULL AFTER `slug`;

    -- add menu galeri
    INSERT INTO `menu` (`menu_id`, `menu_menu_id`, `menu_nama`, `menu_keterangan`, `menu_index`, `menu_icon`, `menu_url`, `menu_status`, `created_at`) VALUES (NULL, '0', 'Galeri', '-', '5', 'fas fa-images', 'admin/galeri', 'Aktif', '2022-02-01 12:59:28');
    INSERT INTO `role_aplikasi` (`rola_id`, `rola_menu_id`, `rola_lev_id`, `created_at`) VALUES (NULL, '137', '1', '2022-01-30 05:55:39');

    -- add column foto to galeri
    ALTER TABLE `galeri` ADD `foto` VARCHAR(255) NOT NULL AFTER `nama`;

    -- add column foto_id_gdrive to galeri
    ALTER TABLE `galeri` ADD `foto_id_gdrive` VARCHAR(255) NULL DEFAULT NULL AFTER `foto`;

    ALTER TABLE `pengurus_pendidikan` CHANGE `nama` `sekolah` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL;

    ALTER TABLE `pengurus_pendidikan` ADD `jurusan` VARCHAR(255) NOT NULL AFTER `sekolah`;

    INSERT INTO `galeri` (`id`, `nama`, `foto`, `foto_id_gdrive`, `slug`, `id_gdrive`, `keterangan`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES (NULL, 'Poesaka 2021 HP', '2022-02-01_01-26-12_karmapack_image_IMG20211119165725-min.jpg', '13b0CTxnvNoCnOsbNQ7ZPS6Q2z0UQv4Bu', 'poesaka-2021-hp', '1F1QK4DlfRtA-N4cwWqozhsC3bEXQVkYw', 'Poesaka 2021', '1', '1', '1', NULL, '2022-02-01 13:16:08', '2022-02-01 13:58:01', NULL), (NULL, 'Poesaka 2021 Aksi', '', '1zBhpR4ZorbUKCegBKWL6vkaZEGyD_XSv', 'poesaka-2021-aksi', '1E7M9y3SYGPchJZ_a405ZyslSnZjsjKmx', 'Poesaka 2021', '1', '1', '1', NULL, '2022-02-01 14:01:37', '2022-02-03 00:53:30', NULL), (NULL, 'Poesaka 2021 Alumni', '', '1Z_OidR5bx3dKsURlPMjfEMVt2QjiKZPE', 'poesaka-2021-alumni', '1Nec7rpkeyDDIrK87LBXOGX3HEo1QaUVS', 'Poesaka 2021', '1', '1', '1', NULL, '2022-02-03 00:53:11', '2022-02-03 00:53:34', NULL), (NULL, 'Poesaka 2021 Bersama', '', '1WO_AvcDgcgX10AC9DRmoNVDYQY_jizAx', 'poesaka-2021-bersama', '1XTem6ZsdzI3UFePcaC-4aOq0jEQJLrKH', 'Poesaka 2021', '1', '1', NULL, NULL, '2022-02-03 00:56:57', NULL, NULL), (NULL, 'Poesaka 2021 Panitia', '', '1aqr3bC8tIm1UFDZNAkteenY_mY8EUsJF', 'poesaka-2021-panitia', '1v69PHNkZL7MnjYrzZKd6TdD6uqLwYN7h', 'Poesaka 2021', '1', '1', NULL, NULL, '2022-02-03 00:58:04', NULL, NULL), (NULL, 'Poesaka 2021 Pemateri', '', '1raNNMwl5v2StH3q75zNjpMUh8Gj1GyMa', 'poesaka-2021-pemateri', '1BiAWI0EEO5fzqGJ7aVhGWBGPXNNlZnS2', 'Poesaka 2021', '1', '1', NULL, NULL, '2022-02-03 00:59:06', NULL, NULL), (NULL, 'Poesaka 2021 Peserta', '', '1a6wl413xLxQ7Qsm6Jwp-LPdoTZr-FBLX', 'poesaka-2021-peserta', '1iU_QYfDJm-t8yFXN4sehVBAJu5l6un6W', 'Poesaka 2021', '1', '1', NULL, NULL, '2022-02-03 01:00:21', NULL, NULL)
