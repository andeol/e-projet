-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 08, 2018 at 10:32 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-projet`
--
CREATE DATABASE IF NOT EXISTS `e-projet` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `e-projet`;

-- --------------------------------------------------------

--
-- Table structure for table `Activite`
--

CREATE TABLE `Activite` (
  `id` int(11) NOT NULL,
  `Pro_id` int(11) NOT NULL,
  `libelle` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `dateDebut` datetime DEFAULT NULL,
  `duree` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Activite`
--

INSERT INTO `Activite` (`id`, `Pro_id`, `libelle`, `dateDebut`, `duree`) VALUES
(6, 7, 'activ', '2018-01-01 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ChefProjet`
--

CREATE TABLE `ChefProjet` (
  `id` int(11) NOT NULL,
  `nom` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `prenoms` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `code` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ChefProjet`
--

INSERT INTO `ChefProjet` (`id`, `nom`, `prenoms`, `code`) VALUES
(11, 'Ayantome', 'jislain', 1304);

-- --------------------------------------------------------

--
-- Table structure for table `Log`
--

CREATE TABLE `Log` (
  `id` int(11) NOT NULL,
  `Pro_id` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `action` varchar(254) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Log`
--

INSERT INTO `Log` (`id`, `Pro_id`, `date`, `action`) VALUES
(2, 7, '2018-01-01 00:00:00', 'modif');

-- --------------------------------------------------------

--
-- Table structure for table `Objectif`
--

CREATE TABLE `Objectif` (
  `id` int(11) NOT NULL,
  `Pro_id` int(11) NOT NULL,
  `libelle` varchar(254) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Projet`
--

CREATE TABLE `Projet` (
  `id` int(11) NOT NULL,
  `Che_id` int(11) NOT NULL,
  `code` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `intitule` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `objet` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `description` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `duree` int(11) DEFAULT NULL,
  `datedemarrage` datetime DEFAULT NULL,
  `cout` int(11) DEFAULT NULL,
  `maitriseOeuvre` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `financement` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `coucheSI` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `perspectives` varchar(254) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Projet`
--

INSERT INTO `Projet` (`id`, `Che_id`, `code`, `intitule`, `objet`, `description`, `duree`, `datedemarrage`, `cout`, `maitriseOeuvre`, `financement`, `coucheSI`, `perspectives`) VALUES
(7, 11, 'code', 'intitulé', '', 'description', 0, '2018-01-01 00:00:00', 0, 'maitrÃ®se d\'oeuvre', 'financement', 'coucheSI', 'perspectives');

-- --------------------------------------------------------

--
-- Table structure for table `Resultat`
--

CREATE TABLE `Resultat` (
  `id` int(11) NOT NULL,
  `Pro_id` int(11) NOT NULL,
  `libelle` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `indicateurs` varchar(254) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Resultat`
--

INSERT INTO `Resultat` (`id`, `Pro_id`, `libelle`, `indicateurs`) VALUES
(4, 7, 'obj', 'indicateurs');

-- --------------------------------------------------------

--
-- Table structure for table `Risque`
--

CREATE TABLE `Risque` (
  `id` int(11) NOT NULL,
  `Pro_id` int(11) NOT NULL,
  `libelle` varchar(254) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Activite`
--
ALTER TABLE `Activite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_association2` (`Pro_id`);

--
-- Indexes for table `ChefProjet`
--
ALTER TABLE `ChefProjet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Log`
--
ALTER TABLE `Log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_association6` (`Pro_id`);

--
-- Indexes for table `Objectif`
--
ALTER TABLE `Objectif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_association3` (`Pro_id`);

--
-- Indexes for table `Projet`
--
ALTER TABLE `Projet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_association1` (`Che_id`);

--
-- Indexes for table `Resultat`
--
ALTER TABLE `Resultat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_association5` (`Pro_id`);

--
-- Indexes for table `Risque`
--
ALTER TABLE `Risque`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_association4` (`Pro_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Activite`
--
ALTER TABLE `Activite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ChefProjet`
--
ALTER TABLE `ChefProjet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `Log`
--
ALTER TABLE `Log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Objectif`
--
ALTER TABLE `Objectif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Projet`
--
ALTER TABLE `Projet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `Resultat`
--
ALTER TABLE `Resultat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Risque`
--
ALTER TABLE `Risque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Activite`
--
ALTER TABLE `Activite`
  ADD CONSTRAINT `FK_association2` FOREIGN KEY (`Pro_id`) REFERENCES `Projet` (`id`);

--
-- Constraints for table `Log`
--
ALTER TABLE `Log`
  ADD CONSTRAINT `FK_association6` FOREIGN KEY (`Pro_id`) REFERENCES `Projet` (`id`);

--
-- Constraints for table `Objectif`
--
ALTER TABLE `Objectif`
  ADD CONSTRAINT `FK_association3` FOREIGN KEY (`Pro_id`) REFERENCES `Projet` (`id`);

--
-- Constraints for table `Projet`
--
ALTER TABLE `Projet`
  ADD CONSTRAINT `FK_association1` FOREIGN KEY (`Che_id`) REFERENCES `ChefProjet` (`id`);

--
-- Constraints for table `Resultat`
--
ALTER TABLE `Resultat`
  ADD CONSTRAINT `FK_association5` FOREIGN KEY (`Pro_id`) REFERENCES `Projet` (`id`);

--
-- Constraints for table `Risque`
--
ALTER TABLE `Risque`
  ADD CONSTRAINT `FK_association4` FOREIGN KEY (`Pro_id`) REFERENCES `Projet` (`id`);
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(11) NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"e-projet\",\"table\":\"Risque\"},{\"db\":\"e-projet\",\"table\":\"Resultat\"},{\"db\":\"e-projet\",\"table\":\"Projet\"},{\"db\":\"e-projet\",\"table\":\"Objectif\"},{\"db\":\"e-projet\",\"table\":\"Log\"},{\"db\":\"e-projet\",\"table\":\"ChefProjet\"},{\"db\":\"e-projet\",\"table\":\"Activite\"},{\"db\":\"phpmyadmin\",\"table\":\"pma__history\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float UNSIGNED NOT NULL DEFAULT '0',
  `y` float UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'e-projet', 'ChefProjet', '[]', '2018-01-04 10:29:05');

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2018-01-03 11:51:26', '{\"collation_connection\":\"utf8mb4_unicode_ci\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
--
-- Database: `wordpress`
--
CREATE DATABASE IF NOT EXISTS `wordpress` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `wordpress`;

-- --------------------------------------------------------

--
-- Table structure for table `wp_ai1ec_events`
--
-- Error reading structure for table wordpress.wp_ai1ec_events: #1932 - Table 'wordpress.wp_ai1ec_events' doesn't exist in engine
-- Error reading data for table wordpress.wp_ai1ec_events: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `wordpress`.`wp_ai1ec_events`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `wp_ai1ec_event_category_meta`
--
-- Error reading structure for table wordpress.wp_ai1ec_event_category_meta: #1932 - Table 'wordpress.wp_ai1ec_event_category_meta' doesn't exist in engine
-- Error reading data for table wordpress.wp_ai1ec_event_category_meta: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `wordpress`.`wp_ai1ec_event_category_meta`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `wp_ai1ec_event_instances`
--
-- Error reading structure for table wordpress.wp_ai1ec_event_instances: #1932 - Table 'wordpress.wp_ai1ec_event_instances' doesn't exist in engine
-- Error reading data for table wordpress.wp_ai1ec_event_instances: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `wordpress`.`wp_ai1ec_event_instances`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `wp_commentmeta`
--
-- Error reading structure for table wordpress.wp_commentmeta: #1932 - Table 'wordpress.wp_commentmeta' doesn't exist in engine
-- Error reading data for table wordpress.wp_commentmeta: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `wordpress`.`wp_commentmeta`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `wp_comments`
--
-- Error reading structure for table wordpress.wp_comments: #1932 - Table 'wordpress.wp_comments' doesn't exist in engine
-- Error reading data for table wordpress.wp_comments: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `wordpress`.`wp_comments`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `wp_em_bookings`
--
-- Error reading structure for table wordpress.wp_em_bookings: #1932 - Table 'wordpress.wp_em_bookings' doesn't exist in engine
-- Error reading data for table wordpress.wp_em_bookings: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `wordpress`.`wp_em_bookings`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `wp_em_events`
--
-- Error reading structure for table wordpress.wp_em_events: #1932 - Table 'wordpress.wp_em_events' doesn't exist in engine
-- Error reading data for table wordpress.wp_em_events: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `wordpress`.`wp_em_events`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `wp_em_locations`
--
-- Error reading structure for table wordpress.wp_em_locations: #1932 - Table 'wordpress.wp_em_locations' doesn't exist in engine
-- Error reading data for table wordpress.wp_em_locations: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `wordpress`.`wp_em_locations`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `wp_em_meta`
--
-- Error reading structure for table wordpress.wp_em_meta: #1932 - Table 'wordpress.wp_em_meta' doesn't exist in engine
-- Error reading data for table wordpress.wp_em_meta: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `wordpress`.`wp_em_meta`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `wp_em_tickets`
--
-- Error reading structure for table wordpress.wp_em_tickets: #1932 - Table 'wordpress.wp_em_tickets' doesn't exist in engine
-- Error reading data for table wordpress.wp_em_tickets: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `wordpress`.`wp_em_tickets`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `wp_em_tickets_bookings`
--
-- Error reading structure for table wordpress.wp_em_tickets_bookings: #1932 - Table 'wordpress.wp_em_tickets_bookings' doesn't exist in engine
-- Error reading data for table wordpress.wp_em_tickets_bookings: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `wordpress`.`wp_em_tickets_bookings`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `wp_fb3d_pages`
--
-- Error reading structure for table wordpress.wp_fb3d_pages: #1932 - Table 'wordpress.wp_fb3d_pages' doesn't exist in engine
-- Error reading data for table wordpress.wp_fb3d_pages: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `wordpress`.`wp_fb3d_pages`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `wp_huge_itportfolio_images`
--
-- Error reading structure for table wordpress.wp_huge_itportfolio_images: #1932 - Table 'wordpress.wp_huge_itportfolio_images' doesn't exist in engine
-- Error reading data for table wordpress.wp_huge_itportfolio_images: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `wordpress`.`wp_huge_itportfolio_images`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `wp_huge_itportfolio_portfolios`
--
-- Error reading structure for table wordpress.wp_huge_itportfolio_portfolios: #1932 - Table 'wordpress.wp_huge_itportfolio_portfolios' doesn't exist in engine
-- Error reading data for table wordpress.wp_huge_itportfolio_portfolios: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `wordpress`.`wp_huge_itportfolio_portfolios`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `wp_links`
--
-- Error reading structure for table wordpress.wp_links: #1932 - Table 'wordpress.wp_links' doesn't exist in engine
-- Error reading data for table wordpress.wp_links: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `wordpress`.`wp_links`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `wp_masterslider_options`
--
-- Error reading structure for table wordpress.wp_masterslider_options: #1932 - Table 'wordpress.wp_masterslider_options' doesn't exist in engine
-- Error reading data for table wordpress.wp_masterslider_options: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `wordpress`.`wp_masterslider_options`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `wp_masterslider_sliders`
--
-- Error reading structure for table wordpress.wp_masterslider_sliders: #1932 - Table 'wordpress.wp_masterslider_sliders' doesn't exist in engine
-- Error reading data for table wordpress.wp_masterslider_sliders: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `wordpress`.`wp_masterslider_sliders`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `wp_news_announcement`
--

CREATE TABLE `wp_news_announcement` (
  `gNews_id` mediumint(9) NOT NULL,
  `gNews_text` text NOT NULL,
  `gNews_order` int(11) NOT NULL DEFAULT '0',
  `gNews_status` char(3) NOT NULL DEFAULT 'YES',
  `gnews_redirect_link` varchar(255) DEFAULT NULL,
  `gNews_date` date NOT NULL DEFAULT '0000-00-00',
  `gNews_expiration` date NOT NULL DEFAULT '0000-00-00',
  `gNews_type` varchar(100) NOT NULL DEFAULT 'GROUP1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wp_news_announcement`
--

INSERT INTO `wp_news_announcement` (`gNews_id`, `gNews_text`, `gNews_order`, `gNews_status`, `gnews_redirect_link`, `gNews_date`, `gNews_expiration`, `gNews_type`) VALUES
(1, 'This plug-in will create a vertical scrolling announcement news <br><br> This plug-in will create a vertical scrolling announcement news', 0, 'YES', NULL, '0000-00-00', '0000-00-00', 'WIDGET'),
(2, 'Dieses Plug-in wird ein vertikales Scrollen Ankündigung news', 0, 'YES', NULL, '0000-00-00', '0000-00-00', 'SAMPLE'),
(3, 'Quisque consectetur, eros sit amet vehicula mollis, metus lectus cursus eros, et laoreet risus orci et eros. Integer id dignissim odio. Quisque nisi dui, gravida eget enim sit amet, hendrerit euismod orci. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nam augue enim, eleifend non dui quis, lobortis consequat massa. Aenean ullamcorper commodo justo, ac porta orci faucibus sit amet. Ut hendrerit dapibus tellus. Sed ornare dapibus mi, ac blandit odio hendrerit in.', 1, 'YES', '#', '2014-07-01', '9999-12-30', 'GROUP2');

-- --------------------------------------------------------

--
-- Table structure for table `wp_ngg_album`
--
-- Error reading structure for table wordpress.wp_ngg_album: #1932 - Table 'wordpress.wp_ngg_album' doesn't exist in engine
-- Error reading data for table wordpress.wp_ngg_album: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `wordpress`.`wp_ngg_album`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `wp_ngg_gallery`
--
-- Error reading structure for table wordpress.wp_ngg_gallery: #1932 - Table 'wordpress.wp_ngg_gallery' doesn't exist in engine
-- Error reading data for table wordpress.wp_ngg_gallery: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `wordpress`.`wp_ngg_gallery`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `wp_ngg_pictures`
--
-- Error reading structure for table wordpress.wp_ngg_pictures: #1932 - Table 'wordpress.wp_ngg_pictures' doesn't exist in engine
-- Error reading data for table wordpress.wp_ngg_pictures: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `wordpress`.`wp_ngg_pictures`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `wp_options`
--
-- Error reading structure for table wordpress.wp_options: #1932 - Table 'wordpress.wp_options' doesn't exist in engine
-- Error reading data for table wordpress.wp_options: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `wordpress`.`wp_options`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `wp_pollsa`
--
-- Error reading structure for table wordpress.wp_pollsa: #1932 - Table 'wordpress.wp_pollsa' doesn't exist in engine
-- Error reading data for table wordpress.wp_pollsa: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `wordpress`.`wp_pollsa`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `wp_pollsip`
--
-- Error reading structure for table wordpress.wp_pollsip: #1932 - Table 'wordpress.wp_pollsip' doesn't exist in engine
-- Error reading data for table wordpress.wp_pollsip: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `wordpress`.`wp_pollsip`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `wp_pollsq`
--
-- Error reading structure for table wordpress.wp_pollsq: #1932 - Table 'wordpress.wp_pollsq' doesn't exist in engine
-- Error reading data for table wordpress.wp_pollsq: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `wordpress`.`wp_pollsq`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `wp_postmeta`
--
-- Error reading structure for table wordpress.wp_postmeta: #1932 - Table 'wordpress.wp_postmeta' doesn't exist in engine
-- Error reading data for table wordpress.wp_postmeta: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `wordpress`.`wp_postmeta`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `wp_posts`
--
-- Error reading structure for table wordpress.wp_posts: #1932 - Table 'wordpress.wp_posts' doesn't exist in engine
-- Error reading data for table wordpress.wp_posts: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `wordpress`.`wp_posts`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `wp_scroll_news`
--
-- Error reading structure for table wordpress.wp_scroll_news: #1932 - Table 'wordpress.wp_scroll_news' doesn't exist in engine
-- Error reading data for table wordpress.wp_scroll_news: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `wordpress`.`wp_scroll_news`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `wp_termmeta`
--
-- Error reading structure for table wordpress.wp_termmeta: #1932 - Table 'wordpress.wp_termmeta' doesn't exist in engine
-- Error reading data for table wordpress.wp_termmeta: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `wordpress`.`wp_termmeta`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `wp_terms`
--
-- Error reading structure for table wordpress.wp_terms: #1932 - Table 'wordpress.wp_terms' doesn't exist in engine
-- Error reading data for table wordpress.wp_terms: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `wordpress`.`wp_terms`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `wp_term_relationships`
--
-- Error reading structure for table wordpress.wp_term_relationships: #1932 - Table 'wordpress.wp_term_relationships' doesn't exist in engine
-- Error reading data for table wordpress.wp_term_relationships: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `wordpress`.`wp_term_relationships`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `wp_term_taxonomy`
--
-- Error reading structure for table wordpress.wp_term_taxonomy: #1932 - Table 'wordpress.wp_term_taxonomy' doesn't exist in engine
-- Error reading data for table wordpress.wp_term_taxonomy: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `wordpress`.`wp_term_taxonomy`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `wp_usermeta`
--
-- Error reading structure for table wordpress.wp_usermeta: #1932 - Table 'wordpress.wp_usermeta' doesn't exist in engine
-- Error reading data for table wordpress.wp_usermeta: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `wordpress`.`wp_usermeta`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `wp_users`
--
-- Error reading structure for table wordpress.wp_users: #1932 - Table 'wordpress.wp_users' doesn't exist in engine
-- Error reading data for table wordpress.wp_users: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `wordpress`.`wp_users`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `wp_wonderplugin_gridgallery`
--
-- Error reading structure for table wordpress.wp_wonderplugin_gridgallery: #1932 - Table 'wordpress.wp_wonderplugin_gridgallery' doesn't exist in engine
-- Error reading data for table wordpress.wp_wonderplugin_gridgallery: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `wordpress`.`wp_wonderplugin_gridgallery`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `wp_yoast_seo_links`
--
-- Error reading structure for table wordpress.wp_yoast_seo_links: #1932 - Table 'wordpress.wp_yoast_seo_links' doesn't exist in engine
-- Error reading data for table wordpress.wp_yoast_seo_links: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `wordpress`.`wp_yoast_seo_links`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `wp_yoast_seo_meta`
--
-- Error reading structure for table wordpress.wp_yoast_seo_meta: #1932 - Table 'wordpress.wp_yoast_seo_meta' doesn't exist in engine
-- Error reading data for table wordpress.wp_yoast_seo_meta: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `wordpress`.`wp_yoast_seo_meta`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `wp_yop2_pollmeta`
--
-- Error reading structure for table wordpress.wp_yop2_pollmeta: #1932 - Table 'wordpress.wp_yop2_pollmeta' doesn't exist in engine
-- Error reading data for table wordpress.wp_yop2_pollmeta: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `wordpress`.`wp_yop2_pollmeta`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `wp_yop2_polls`
--
-- Error reading structure for table wordpress.wp_yop2_polls: #1932 - Table 'wordpress.wp_yop2_polls' doesn't exist in engine
-- Error reading data for table wordpress.wp_yop2_polls: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `wordpress`.`wp_yop2_polls`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `wp_yop2_poll_answermeta`
--
-- Error reading structure for table wordpress.wp_yop2_poll_answermeta: #1932 - Table 'wordpress.wp_yop2_poll_answermeta' doesn't exist in engine
-- Error reading data for table wordpress.wp_yop2_poll_answermeta: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `wordpress`.`wp_yop2_poll_answermeta`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `wp_yop2_poll_answers`
--
-- Error reading structure for table wordpress.wp_yop2_poll_answers: #1932 - Table 'wordpress.wp_yop2_poll_answers' doesn't exist in engine
-- Error reading data for table wordpress.wp_yop2_poll_answers: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `wordpress`.`wp_yop2_poll_answers`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `wp_yop2_poll_bans`
--
-- Error reading structure for table wordpress.wp_yop2_poll_bans: #1932 - Table 'wordpress.wp_yop2_poll_bans' doesn't exist in engine
-- Error reading data for table wordpress.wp_yop2_poll_bans: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `wordpress`.`wp_yop2_poll_bans`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `wp_yop2_poll_custom_fields`
--
-- Error reading structure for table wordpress.wp_yop2_poll_custom_fields: #1932 - Table 'wordpress.wp_yop2_poll_custom_fields' doesn't exist in engine
-- Error reading data for table wordpress.wp_yop2_poll_custom_fields: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `wordpress`.`wp_yop2_poll_custom_fields`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `wp_yop2_poll_logs`
--
-- Error reading structure for table wordpress.wp_yop2_poll_logs: #1932 - Table 'wordpress.wp_yop2_poll_logs' doesn't exist in engine
-- Error reading data for table wordpress.wp_yop2_poll_logs: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `wordpress`.`wp_yop2_poll_logs`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `wp_yop2_poll_questionmeta`
--
-- Error reading structure for table wordpress.wp_yop2_poll_questionmeta: #1932 - Table 'wordpress.wp_yop2_poll_questionmeta' doesn't exist in engine
-- Error reading data for table wordpress.wp_yop2_poll_questionmeta: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `wordpress`.`wp_yop2_poll_questionmeta`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `wp_yop2_poll_questions`
--
-- Error reading structure for table wordpress.wp_yop2_poll_questions: #1932 - Table 'wordpress.wp_yop2_poll_questions' doesn't exist in engine
-- Error reading data for table wordpress.wp_yop2_poll_questions: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `wordpress`.`wp_yop2_poll_questions`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `wp_yop2_poll_results`
--
-- Error reading structure for table wordpress.wp_yop2_poll_results: #1932 - Table 'wordpress.wp_yop2_poll_results' doesn't exist in engine
-- Error reading data for table wordpress.wp_yop2_poll_results: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `wordpress`.`wp_yop2_poll_results`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `wp_yop2_poll_templates`
--
-- Error reading structure for table wordpress.wp_yop2_poll_templates: #1932 - Table 'wordpress.wp_yop2_poll_templates' doesn't exist in engine
-- Error reading data for table wordpress.wp_yop2_poll_templates: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `wordpress`.`wp_yop2_poll_templates`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `wp_yop2_poll_votes_custom_fields`
--
-- Error reading structure for table wordpress.wp_yop2_poll_votes_custom_fields: #1932 - Table 'wordpress.wp_yop2_poll_votes_custom_fields' doesn't exist in engine
-- Error reading data for table wordpress.wp_yop2_poll_votes_custom_fields: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `wordpress`.`wp_yop2_poll_votes_custom_fields`' at line 1

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wp_news_announcement`
--
ALTER TABLE `wp_news_announcement`
  ADD UNIQUE KEY `gNews_id` (`gNews_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wp_news_announcement`
--
ALTER TABLE `wp_news_announcement`
  MODIFY `gNews_id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Database: `zeminidb`
--
CREATE DATABASE IF NOT EXISTS `zeminidb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `zeminidb`;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--
-- Error reading structure for table zeminidb.category: #1932 - Table 'zeminidb.category' doesn't exist in engine
-- Error reading data for table zeminidb.category: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `zeminidb`.`category`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `connexion`
--
-- Error reading structure for table zeminidb.connexion: #1932 - Table 'zeminidb.connexion' doesn't exist in engine
-- Error reading data for table zeminidb.connexion: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `zeminidb`.`connexion`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `country`
--
-- Error reading structure for table zeminidb.country: #1932 - Table 'zeminidb.country' doesn't exist in engine
-- Error reading data for table zeminidb.country: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `zeminidb`.`country`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `file`
--
-- Error reading structure for table zeminidb.file: #1932 - Table 'zeminidb.file' doesn't exist in engine
-- Error reading data for table zeminidb.file: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `zeminidb`.`file`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `icon`
--
-- Error reading structure for table zeminidb.icon: #1932 - Table 'zeminidb.icon' doesn't exist in engine
-- Error reading data for table zeminidb.icon: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `zeminidb`.`icon`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `picture`
--
-- Error reading structure for table zeminidb.picture: #1932 - Table 'zeminidb.picture' doesn't exist in engine
-- Error reading data for table zeminidb.picture: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `zeminidb`.`picture`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `type`
--
-- Error reading structure for table zeminidb.type: #1932 - Table 'zeminidb.type' doesn't exist in engine
-- Error reading data for table zeminidb.type: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `zeminidb`.`type`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `user`
--
-- Error reading structure for table zeminidb.user: #1932 - Table 'zeminidb.user' doesn't exist in engine
-- Error reading data for table zeminidb.user: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `zeminidb`.`user`' at line 1
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
