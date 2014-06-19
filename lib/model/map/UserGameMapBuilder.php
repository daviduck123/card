<?php



class UserGameMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.UserGameMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('user_game');
		$tMap->setPhpName('UserGame');

		$tMap->setUseIdGenerator(true);

		$tMap->addForeignKey('ID_USER', 'IdUser', 'int', CreoleTypes::INTEGER, 'user', 'ID', true, null);

		$tMap->addForeignKey('ID_GAME', 'IdGame', 'int', CreoleTypes::INTEGER, 'game', 'ID', true, null);

		$tMap->addColumn('HP', 'Hp', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('POINT', 'Point', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('URUTAN', 'Urutan', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('ELEMENT', 'Element', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('STATUS', 'Status', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 