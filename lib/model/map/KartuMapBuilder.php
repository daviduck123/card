<?php



class KartuMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.KartuMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('kartu');
		$tMap->setPhpName('Kartu');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('POINT', 'Point', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('FILE', 'File', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('KETERANGAN', 'Keterangan', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 