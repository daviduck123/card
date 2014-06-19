<?php



class RoomMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RoomMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('room');
		$tMap->setPhpName('Room');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NAMA', 'Nama', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('JUMLAH', 'Jumlah', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('MAX', 'Max', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('STATUS', 'Status', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 