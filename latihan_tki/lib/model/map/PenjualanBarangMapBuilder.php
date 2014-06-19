<?php



class PenjualanBarangMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.PenjualanBarangMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('penjualan_barang');
		$tMap->setPhpName('PenjualanBarang');

		$tMap->setUseIdGenerator(true);

		$tMap->addForeignKey('ID_PEMBELIAN', 'IdPembelian', 'int', CreoleTypes::INTEGER, 'pembelian', 'ID', true, null);

		$tMap->addForeignKey('ID_BARANG', 'IdBarang', 'int', CreoleTypes::INTEGER, 'barang', 'ID', true, null);

		$tMap->addColumn('JUMLAH', 'Jumlah', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('HARGA', 'Harga', 'double', CreoleTypes::FLOAT, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 