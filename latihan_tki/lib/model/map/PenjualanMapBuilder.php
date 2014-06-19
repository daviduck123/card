<?php



class PenjualanMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.PenjualanMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('penjualan');
		$tMap->setPhpName('Penjualan');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('TANGGAL', 'Tanggal', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('GRAND_TOTAL', 'GrandTotal', 'double', CreoleTypes::FLOAT, false, null);

		$tMap->addForeignKey('PEGAWAI_ID', 'PegawaiId', 'int', CreoleTypes::INTEGER, 'pegawai', 'ID', true, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 