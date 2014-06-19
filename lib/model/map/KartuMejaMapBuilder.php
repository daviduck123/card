<?php



class KartuMejaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.KartuMejaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('kartu_meja');
		$tMap->setPhpName('KartuMeja');

		$tMap->setUseIdGenerator(true);

		$tMap->addForeignKey('ID_MEJA', 'IdMeja', 'int', CreoleTypes::INTEGER, 'meja', 'ID', true, null);

		$tMap->addForeignKey('ID_KARTU', 'IdKartu', 'int', CreoleTypes::INTEGER, 'kartu', 'ID', true, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 