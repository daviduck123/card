
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- kategori
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `kategori`;


CREATE TABLE `kategori`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nama` TEXT,
	`deskripsi` TEXT,
	`nama_strip` VARCHAR(100),
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- barang
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `barang`;


CREATE TABLE `barang`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nama` VARCHAR(50),
	`deskripsi` TEXT,
	`stok` INTEGER,
	`harga_beli` FLOAT,
	`harga_jual` FLOAT,
	`status` SMALLINT default 0,
	`kategori_id` INTEGER  NOT NULL,
	`nama_strip` VARCHAR(100),
	`namaFile` VARCHAR(100),
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `barang_FI_1` (`kategori_id`),
	CONSTRAINT `barang_FK_1`
		FOREIGN KEY (`kategori_id`)
		REFERENCES `kategori` (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- pegawai
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `pegawai`;


CREATE TABLE `pegawai`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nama` VARCHAR(100)  NOT NULL,
	`nama_strip` VARCHAR(100)  NOT NULL,
	`is_aktif` INTEGER default 1,
	`alamat` VARCHAR(255),
	`kota` VARCHAR(50),
	`jabatan` VARCHAR(25),
	`gaji` FLOAT,
	`sf_guard_user_id` INTEGER,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `pegawai_FI_1` (`sf_guard_user_id`),
	CONSTRAINT `pegawai_FK_1`
		FOREIGN KEY (`sf_guard_user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE RESTRICT
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- pembelian
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `pembelian`;


CREATE TABLE `pembelian`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`tanggal` DATE,
	`grand_total` FLOAT,
	`pegawai_id` INTEGER  NOT NULL,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `pembelian_FI_1` (`pegawai_id`),
	CONSTRAINT `pembelian_FK_1`
		FOREIGN KEY (`pegawai_id`)
		REFERENCES `pegawai` (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- pembelian_barang
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `pembelian_barang`;


CREATE TABLE `pembelian_barang`
(
	`id_pembelian` INTEGER  NOT NULL,
	`id_barang` INTEGER  NOT NULL,
	`jumlah` INTEGER,
	`harga` FLOAT,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	INDEX `pembelian_barang_FI_1` (`id_pembelian`),
	CONSTRAINT `pembelian_barang_FK_1`
		FOREIGN KEY (`id_pembelian`)
		REFERENCES `pembelian` (`id`),
	INDEX `pembelian_barang_FI_2` (`id_barang`),
	CONSTRAINT `pembelian_barang_FK_2`
		FOREIGN KEY (`id_barang`)
		REFERENCES `barang` (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- penjualan
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `penjualan`;


CREATE TABLE `penjualan`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`tanggal` DATE,
	`grand_total` FLOAT,
	`pegawai_id` INTEGER  NOT NULL,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `penjualan_FI_1` (`pegawai_id`),
	CONSTRAINT `penjualan_FK_1`
		FOREIGN KEY (`pegawai_id`)
		REFERENCES `pegawai` (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- penjualan_barang
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `penjualan_barang`;


CREATE TABLE `penjualan_barang`
(
	`id_pembelian` INTEGER  NOT NULL,
	`id_barang` INTEGER  NOT NULL,
	`jumlah` INTEGER,
	`harga` FLOAT,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	INDEX `penjualan_barang_FI_1` (`id_pembelian`),
	CONSTRAINT `penjualan_barang_FK_1`
		FOREIGN KEY (`id_pembelian`)
		REFERENCES `pembelian` (`id`),
	INDEX `penjualan_barang_FI_2` (`id_barang`),
	CONSTRAINT `penjualan_barang_FK_2`
		FOREIGN KEY (`id_barang`)
		REFERENCES `barang` (`id`)
)Type=MyISAM;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
