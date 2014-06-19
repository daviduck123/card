<?php


abstract class BaseBarangPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'barang';

	
	const CLASS_DEFAULT = 'lib.model.Barang';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'barang.ID';

	
	const NAMA = 'barang.NAMA';

	
	const DESKRIPSI = 'barang.DESKRIPSI';

	
	const STOK = 'barang.STOK';

	
	const HARGA_BELI = 'barang.HARGA_BELI';

	
	const HARGA_JUAL = 'barang.HARGA_JUAL';

	
	const STATUS = 'barang.STATUS';

	
	const KATEGORI_ID = 'barang.KATEGORI_ID';

	
	const NAMA_STRIP = 'barang.NAMA_STRIP';

	
	const NAMAFILE = 'barang.NAMAFILE';

	
	const CREATED_AT = 'barang.CREATED_AT';

	
	const UPDATED_AT = 'barang.UPDATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Nama', 'Deskripsi', 'Stok', 'HargaBeli', 'HargaJual', 'Status', 'KategoriId', 'NamaStrip', 'Namafile', 'CreatedAt', 'UpdatedAt', ),
		BasePeer::TYPE_COLNAME => array (BarangPeer::ID, BarangPeer::NAMA, BarangPeer::DESKRIPSI, BarangPeer::STOK, BarangPeer::HARGA_BELI, BarangPeer::HARGA_JUAL, BarangPeer::STATUS, BarangPeer::KATEGORI_ID, BarangPeer::NAMA_STRIP, BarangPeer::NAMAFILE, BarangPeer::CREATED_AT, BarangPeer::UPDATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'nama', 'deskripsi', 'stok', 'harga_beli', 'harga_jual', 'status', 'kategori_id', 'nama_strip', 'namaFile', 'created_at', 'updated_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Nama' => 1, 'Deskripsi' => 2, 'Stok' => 3, 'HargaBeli' => 4, 'HargaJual' => 5, 'Status' => 6, 'KategoriId' => 7, 'NamaStrip' => 8, 'Namafile' => 9, 'CreatedAt' => 10, 'UpdatedAt' => 11, ),
		BasePeer::TYPE_COLNAME => array (BarangPeer::ID => 0, BarangPeer::NAMA => 1, BarangPeer::DESKRIPSI => 2, BarangPeer::STOK => 3, BarangPeer::HARGA_BELI => 4, BarangPeer::HARGA_JUAL => 5, BarangPeer::STATUS => 6, BarangPeer::KATEGORI_ID => 7, BarangPeer::NAMA_STRIP => 8, BarangPeer::NAMAFILE => 9, BarangPeer::CREATED_AT => 10, BarangPeer::UPDATED_AT => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'nama' => 1, 'deskripsi' => 2, 'stok' => 3, 'harga_beli' => 4, 'harga_jual' => 5, 'status' => 6, 'kategori_id' => 7, 'nama_strip' => 8, 'namaFile' => 9, 'created_at' => 10, 'updated_at' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/BarangMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.BarangMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = BarangPeer::getTableMap();
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
		return str_replace(BarangPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(BarangPeer::ID);

		$criteria->addSelectColumn(BarangPeer::NAMA);

		$criteria->addSelectColumn(BarangPeer::DESKRIPSI);

		$criteria->addSelectColumn(BarangPeer::STOK);

		$criteria->addSelectColumn(BarangPeer::HARGA_BELI);

		$criteria->addSelectColumn(BarangPeer::HARGA_JUAL);

		$criteria->addSelectColumn(BarangPeer::STATUS);

		$criteria->addSelectColumn(BarangPeer::KATEGORI_ID);

		$criteria->addSelectColumn(BarangPeer::NAMA_STRIP);

		$criteria->addSelectColumn(BarangPeer::NAMAFILE);

		$criteria->addSelectColumn(BarangPeer::CREATED_AT);

		$criteria->addSelectColumn(BarangPeer::UPDATED_AT);

	}

	const COUNT = 'COUNT(barang.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT barang.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BarangPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BarangPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = BarangPeer::doSelectRS($criteria, $con);
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
		$objects = BarangPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return BarangPeer::populateObjects(BarangPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			BarangPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = BarangPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinKategori(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BarangPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BarangPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(BarangPeer::KATEGORI_ID, KategoriPeer::ID);

		$rs = BarangPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinKategori(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		BarangPeer::addSelectColumns($c);
		$startcol = (BarangPeer::NUM_COLUMNS - BarangPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		KategoriPeer::addSelectColumns($c);

		$c->addJoin(BarangPeer::KATEGORI_ID, KategoriPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = BarangPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = KategoriPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getKategori(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addBarang($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initBarangs();
				$obj2->addBarang($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BarangPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BarangPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(BarangPeer::KATEGORI_ID, KategoriPeer::ID);

		$rs = BarangPeer::doSelectRS($criteria, $con);
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

		BarangPeer::addSelectColumns($c);
		$startcol2 = (BarangPeer::NUM_COLUMNS - BarangPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		KategoriPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + KategoriPeer::NUM_COLUMNS;

		$c->addJoin(BarangPeer::KATEGORI_ID, KategoriPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = BarangPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = KategoriPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getKategori(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addBarang($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initBarangs();
				$obj2->addBarang($obj1);
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
		return BarangPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(BarangPeer::ID); 

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
			$comparison = $criteria->getComparison(BarangPeer::ID);
			$selectCriteria->add(BarangPeer::ID, $criteria->remove(BarangPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(BarangPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(BarangPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Barang) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(BarangPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Barang $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(BarangPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(BarangPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(BarangPeer::DATABASE_NAME, BarangPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = BarangPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(BarangPeer::DATABASE_NAME);

		$criteria->add(BarangPeer::ID, $pk);


		$v = BarangPeer::doSelect($criteria, $con);

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
			$criteria->add(BarangPeer::ID, $pks, Criteria::IN);
			$objs = BarangPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseBarangPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/BarangMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.BarangMapBuilder');
}
