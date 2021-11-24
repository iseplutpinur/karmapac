START TRANSACTION;

CREATE TABLE `pengurus_periode_detail` (
  `id` int(11) NOT NULL,

  `user_id` int,
  `pengurus_periode_id` int,

  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 Tidak Aktif | 1 Aktif',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `pengurus_periode_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `pengurus_periode_id` (`pengurus_periode_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `deleted_by` (`deleted_by`);

ALTER TABLE `pengurus_periode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `pengurus_periode_detail`
  ADD CONSTRAINT `pengurus_periode_detail_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `pengurus_periode_detail_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `pengurus_periode_detail_ibfk_3` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `pengurus_periode_detail_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengurus_periode_detail_ibfk_5` FOREIGN KEY (`pengurus_periode_id`) REFERENCES `pengurus_periode` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
