
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- kartu
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `kartu`;


CREATE TABLE `kartu`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`point` INTEGER,
	`file` VARCHAR(255),
	`keterangan` TEXT,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`)
)Engine=MyISAM;

#-----------------------------------------------------------------------------
#-- meja
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `meja`;


CREATE TABLE `meja`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`baris` INTEGER,
	`kolom` INTEGER,
	`status` INTEGER,
	`id_game` INTEGER  NOT NULL,
	`id_skill` INTEGER  NOT NULL,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `meja_FI_1` (`id_game`),
	CONSTRAINT `meja_FK_1`
		FOREIGN KEY (`id_game`)
		REFERENCES `game` (`id`),
	INDEX `meja_FI_2` (`id_skill`),
	CONSTRAINT `meja_FK_2`
		FOREIGN KEY (`id_skill`)
		REFERENCES `kartu` (`id`)
)Engine=MyISAM;

#-----------------------------------------------------------------------------
#-- skill
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `skill`;


CREATE TABLE `skill`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nama` VARCHAR(255),
	`deskripsi` TEXT,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`)
)Engine=MyISAM;

#-----------------------------------------------------------------------------
#-- game
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `game`;


CREATE TABLE `game`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nama` VARCHAR(255),
	`status` INTEGER,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`)
)Engine=MyISAM;

#-----------------------------------------------------------------------------
#-- room
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `room`;


CREATE TABLE `room`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nama` VARCHAR(255),
	`jumlah` INTEGER,
	`max` INTEGER,
	`status` INTEGER,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`)
)Engine=MyISAM;

#-----------------------------------------------------------------------------
#-- user
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `user`;


CREATE TABLE `user`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`username` VARCHAR(255),
	`password` VARCHAR(255),
	`nama` VARCHAR(255),
	`file` VARCHAR(255),
	`status` INTEGER,
	`games` INTEGER,
	`win` INTEGER,
	`lose` INTEGER,
	`point` INTEGER,
	`id_room` INTEGER  NOT NULL,
	`id_sf` INTEGER,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `user_FI_1` (`id_room`),
	CONSTRAINT `user_FK_1`
		FOREIGN KEY (`id_room`)
		REFERENCES `room` (`id`)
)Engine=MyISAM;

#-----------------------------------------------------------------------------
#-- user_game
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `user_game`;


CREATE TABLE `user_game`
(
	`id_user` INTEGER  NOT NULL,
	`id_game` INTEGER  NOT NULL,
	`HP` INTEGER,
	`point` INTEGER,
	`urutan` INTEGER,
	`element` INTEGER,
	`status` INTEGER,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	INDEX `user_game_FI_1` (`id_user`),
	CONSTRAINT `user_game_FK_1`
		FOREIGN KEY (`id_user`)
		REFERENCES `user` (`id`),
	INDEX `user_game_FI_2` (`id_game`),
	CONSTRAINT `user_game_FK_2`
		FOREIGN KEY (`id_game`)
		REFERENCES `game` (`id`)
)Engine=MyISAM;

#-----------------------------------------------------------------------------
#-- kartu_meja
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `kartu_meja`;


CREATE TABLE `kartu_meja`
(
	`id_meja` INTEGER  NOT NULL,
	`id_kartu` INTEGER  NOT NULL,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	INDEX `kartu_meja_FI_1` (`id_meja`),
	CONSTRAINT `kartu_meja_FK_1`
		FOREIGN KEY (`id_meja`)
		REFERENCES `meja` (`id`),
	INDEX `kartu_meja_FI_2` (`id_kartu`),
	CONSTRAINT `kartu_meja_FK_2`
		FOREIGN KEY (`id_kartu`)
		REFERENCES `kartu` (`id`)
)Engine=MyISAM;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
