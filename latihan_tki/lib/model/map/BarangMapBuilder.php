<?php



class BarangMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BarangMapBuilder';

	
	private $dbMap;

	
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap('propel');

		$tMap = $this->dbMap->addTable('barang');
		$tMap->setPhpName('Barang');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NAMA', 'Nama', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DESKRIPSI', 'Deskripsi', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('STOK', 'Stok', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('HARGA_BELI', 'HargaBeli', 'double', CreoleTypes::FLOAT, false, null);

		$tMap->addColumn('HARGA_JUAL', 'HargaJual', 'double', CreoleTypes::FLOAT, false, null);

		$tMap->addColumn('STATUS', 'Status', 'int', CreoleTypes::SMALLINT, false, null);

		$tMap->addForeignKey('KATEGORI_ID', 'KategoriId', 'int', CreoleTypes::INTEGER, 'kategori', 'ID', true, null);

		$tMap->addColumn('NAMA_STRIP', 'NamaStrip', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('NAMAFILE', 'Namafile', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 