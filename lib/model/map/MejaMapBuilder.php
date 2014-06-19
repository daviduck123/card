<?php



class MejaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.MejaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('meja');
		$tMap->setPhpName('Meja');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('BARIS', 'Baris', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('KOLOM', 'Kolom', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('STATUS', 'Status', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addForeignKey('ID_GAME', 'IdGame', 'int', CreoleTypes::INTEGER, 'game', 'ID', true, null);

		$tMap->addForeignKey('ID_SKILL', 'IdSkill', 'int', CreoleTypes::INTEGER, 'kartu', 'ID', true, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 