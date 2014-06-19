<?php


abstract class BasePegawaiPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'pegawai';

	
	const CLASS_DEFAULT = 'lib.model.Pegawai';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'pegawai.ID';

	
	const NAMA = 'pegawai.NAMA';

	
	const NAMA_STRIP = 'pegawai.NAMA_STRIP';

	
	const IS_AKTIF = 'pegawai.IS_AKTIF';

	
	const ALAMAT = 'pegawai.ALAMAT';

	
	const KOTA = 'pegawai.KOTA';

	
	const JABATAN = 'pegawai.JABATAN';

	
	const GAJI = 'pegawai.GAJI';

	
	const SF_GUARD_USER_ID = 'pegawai.SF_GUARD_USER_ID';

	
	const CREATED_AT = 'pegawai.CREATED_AT';

	
	const UPDATED_AT = 'pegawai.UPDATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Nama', 'NamaStrip', 'IsAktif', 'Alamat', 'Kota', 'Jabatan', 'Gaji', 'SfGuardUserId', 'CreatedAt', 'UpdatedAt', ),
		BasePeer::TYPE_COLNAME => array (PegawaiPeer::ID, PegawaiPeer::NAMA, PegawaiPeer::NAMA_STRIP, PegawaiPeer::IS_AKTIF, PegawaiPeer::ALAMAT, PegawaiPeer::KOTA, PegawaiPeer::JABATAN, PegawaiPeer::GAJI, PegawaiPeer::SF_GUARD_USER_ID, PegawaiPeer::CREATED_AT, PegawaiPeer::UPDATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'nama', 'nama_strip', 'is_aktif', 'alamat', 'kota', 'jabatan', 'gaji', 'sf_guard_user_id', 'created_at', 'updated_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Nama' => 1, 'NamaStrip' => 2, 'IsAktif' => 3, 'Alamat' => 4, 'Kota' => 5, 'Jabatan' => 6, 'Gaji' => 7, 'SfGuardUserId' => 8, 'CreatedAt' => 9, 'UpdatedAt' => 10, ),
		BasePeer::TYPE_COLNAME => array (PegawaiPeer::ID => 0, PegawaiPeer::NAMA => 1, PegawaiPeer::NAMA_STRIP => 2, PegawaiPeer::IS_AKTIF => 3, PegawaiPeer::ALAMAT => 4, PegawaiPeer::KOTA => 5, PegawaiPeer::JABATAN => 6, PegawaiPeer::GAJI => 7, PegawaiPeer::SF_GUARD_USER_ID => 8, PegawaiPeer::CREATED_AT => 9, PegawaiPeer::UPDATED_AT => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'nama' => 1, 'nama_strip' => 2, 'is_aktif' => 3, 'alamat' => 4, 'kota' => 5, 'jabatan' => 6, 'gaji' => 7, 'sf_guard_user_id' => 8, 'created_at' => 9, 'updated_at' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/PegawaiMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.PegawaiMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = PegawaiPeer::getTableMap();
			$columns = $map->getColumns();
			$nameMap = array();
			foreach ($columns as $column) {
				$nameMap[$column->getPhpName()] = $column->getColumnName();
			}
			self::$phpNameMap = $nameMap;
		}
		return self::$phpNameMap;
	}
	
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants TYPE_PHPNAME, TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	
	public static function alias($alias, $column)
	{
		return str_replace(PegawaiPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(PegawaiPeer::ID);

		$criteria->addSelectColumn(PegawaiPeer::NAMA);

		$criteria->addSelectColumn(PegawaiPeer::NAMA_STRIP);

		$criteria->addSelectColumn(PegawaiPeer::IS_AKTIF);

		$criteria->addSelectColumn(PegawaiPeer::ALAMAT);

		$criteria->addSelectColumn(PegawaiPeer::KOTA);

		$criteria->addSelectColumn(PegawaiPeer::JABATAN);

		$criteria->addSelectColumn(PegawaiPeer::GAJI);

		$criteria->addSelectColumn(PegawaiPeer::SF_GUARD_USER_ID);

		$criteria->addSelectColumn(PegawaiPeer::CREATED_AT);

		$criteria->addSelectColumn(PegawaiPeer::UPDATED_AT);

	}

	const COUNT = 'COUNT(pegawai.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT pegawai.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PegawaiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PegawaiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = PegawaiPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}
	
	public static function doSelectOne(Criteria $criteria, $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = PegawaiPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return PegawaiPeer::populateObjects(PegawaiPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			PegawaiPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = PegawaiPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinsfGuardUser(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PegawaiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PegawaiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(PegawaiPeer::SF_GUARD_USER_ID, sfGuardUserPeer::ID);

		$rs = PegawaiPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinsfGuardUser(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		PegawaiPeer::addSelectColumns($c);
		$startcol = (PegawaiPeer::NUM_COLUMNS - PegawaiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(PegawaiPeer::SF_GUARD_USER_ID, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = PegawaiPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = sfGuardUserPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getsfGuardUser(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addPegawai($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initPegawais();
				$obj2->addPegawai($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PegawaiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PegawaiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(PegawaiPeer::SF_GUARD_USER_ID, sfGuardUserPeer::ID);

		$rs = PegawaiPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		PegawaiPeer::addSelectColumns($c);
		$startcol2 = (PegawaiPeer::NUM_COLUMNS - PegawaiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		$c->addJoin(PegawaiPeer::SF_GUARD_USER_ID, sfGuardUserPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = PegawaiPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getsfGuardUser(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addPegawai($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initPegawais();
				$obj2->addPegawai($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}

	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return PegawaiPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(PegawaiPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(PegawaiPeer::ID);
			$selectCriteria->add(PegawaiPeer::ID, $criteria->remove(PegawaiPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$affectedRows = 0; 		try {
									$con->begin();
			$affectedRows += BasePeer::doDeleteAll(PegawaiPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	 public static function doDelete($values, $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(PegawaiPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Pegawai) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(PegawaiPeer::ID, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public static function doValidate(Pegawai $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(PegawaiPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(PegawaiPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		$res =  BasePeer::doValidate(PegawaiPeer::DATABASE_NAME, PegawaiPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = PegawaiPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(PegawaiPeer::DATABASE_NAME);

		$criteria->add(PegawaiPeer::ID, $pk);


		$v = PegawaiPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria();
			$criteria->add(PegawaiPeer::ID, $pks, Criteria::IN);
			$objs = PegawaiPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BasePegawaiPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/PegawaiMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.PegawaiMapBuilder');
}
