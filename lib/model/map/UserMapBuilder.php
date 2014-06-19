<?php



class UserMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.UserMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('user');
		$tMap->setPhpName('User');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('USERNAME', 'Username', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('PASSWORD', 'Password', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('NAMA', 'Nama', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('FILE', 'File', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('STATUS', 'Status', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('GAMES', 'Games', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('WIN', 'Win', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('LOSE', 'Lose', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('POINT', 'Point', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addForeignKey('ID_ROOM', 'IdRoom', 'int', CreoleTypes::INTEGER, 'room', 'ID', true, null);

		$tMap->addColumn('ID_SF', 'IdSf', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 