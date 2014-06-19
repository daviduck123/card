<?php



class PegawaiMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.PegawaiMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('pegawai');
		$tMap->setPhpName('Pegawai');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NAMA', 'Nama', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('NAMA_STRIP', 'NamaStrip', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('IS_AKTIF', 'IsAktif', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('ALAMAT', 'Alamat', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('KOTA', 'Kota', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('JABATAN', 'Jabatan', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('GAJI', 'Gaji', 'double', CreoleTypes::FLOAT, false, null);

		$tMap->addForeignKey('SF_GUARD_USER_ID', 'SfGuardUserId', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 