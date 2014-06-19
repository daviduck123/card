<?php


abstract class BasePenjualanBarangPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'penjualan_barang';

	
	const CLASS_DEFAULT = 'lib.model.PenjualanBarang';

	
	const NUM_COLUMNS = 5;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID_PEMBELIAN = 'penjualan_barang.ID_PEMBELIAN';

	
	const ID_BARANG = 'penjualan_barang.ID_BARANG';

	
	const JUMLAH = 'penjualan_barang.JUMLAH';

	
	const HARGA = 'penjualan_barang.HARGA';

	
	const ID = 'penjualan_barang.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('IdPembelian', 'IdBarang', 'Jumlah', 'Harga', 'Id', ),
		BasePeer::TYPE_COLNAME => array (PenjualanBarangPeer::ID_PEMBELIAN, PenjualanBarangPeer::ID_BARANG, PenjualanBarangPeer::JUMLAH, PenjualanBarangPeer::HARGA, PenjualanBarangPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id_pembelian', 'id_barang', 'jumlah', 'harga', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('IdPembelian' => 0, 'IdBarang' => 1, 'Jumlah' => 2, 'Harga' => 3, 'Id' => 4, ),
		BasePeer::TYPE_COLNAME => array (PenjualanBarangPeer::ID_PEMBELIAN => 0, PenjualanBarangPeer::ID_BARANG => 1, PenjualanBarangPeer::JUMLAH => 2, PenjualanBarangPeer::HARGA => 3, PenjualanBarangPeer::ID => 4, ),
		BasePeer::TYPE_FIELDNAME => array ('id_pembelian' => 0, 'id_barang' => 1, 'jumlah' => 2, 'harga' => 3, 'id' => 4, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/PenjualanBarangMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.PenjualanBarangMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = PenjualanBarangPeer::getTableMap();
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
		return str_replace(PenjualanBarangPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(PenjualanBarangPeer::ID_PEMBELIAN);

		$criteria->addSelectColumn(PenjualanBarangPeer::ID_BARANG);

		$criteria->addSelectColumn(PenjualanBarangPeer::JUMLAH);

		$criteria->addSelectColumn(PenjualanBarangPeer::HARGA);

		$criteria->addSelectColumn(PenjualanBarangPeer::ID);

	}

	const COUNT = 'COUNT(penjualan_barang.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT penjualan_barang.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PenjualanBarangPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PenjualanBarangPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = PenjualanBarangPeer::doSelectRS($criteria, $con);
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
		$objects = PenjualanBarangPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return PenjualanBarangPeer::populateObjects(PenjualanBarangPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			PenjualanBarangPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = PenjualanBarangPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinPembelian(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PenjualanBarangPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PenjualanBarangPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(PenjualanBarangPeer::ID_PEMBELIAN, PembelianPeer::ID);

		$rs = PenjualanBarangPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinBarang(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PenjualanBarangPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PenjualanBarangPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(PenjualanBarangPeer::ID_BARANG, BarangPeer::ID);

		$rs = PenjualanBarangPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinPembelian(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		PenjualanBarangPeer::addSelectColumns($c);
		$startcol = (PenjualanBarangPeer::NUM_COLUMNS - PenjualanBarangPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		PembelianPeer::addSelectColumns($c);

		$c->addJoin(PenjualanBarangPeer::ID_PEMBELIAN, PembelianPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = PenjualanBarangPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = PembelianPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getPembelian(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addPenjualanBarang($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initPenjualanBarangs();
				$obj2->addPenjualanBarang($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinBarang(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		PenjualanBarangPeer::addSelectColumns($c);
		$startcol = (PenjualanBarangPeer::NUM_COLUMNS - PenjualanBarangPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		BarangPeer::addSelectColumns($c);

		$c->addJoin(PenjualanBarangPeer::ID_BARANG, BarangPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = PenjualanBarangPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = BarangPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getBarang(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addPenjualanBarang($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initPenjualanBarangs();
				$obj2->addPenjualanBarang($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PenjualanBarangPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PenjualanBarangPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(PenjualanBarangPeer::ID_PEMBELIAN, PembelianPeer::ID);

		$criteria->addJoin(PenjualanBarangPeer::ID_BARANG, BarangPeer::ID);

		$rs = PenjualanBarangPeer::doSelectRS($criteria, $con);
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

		PenjualanBarangPeer::addSelectColumns($c);
		$startcol2 = (PenjualanBarangPeer::NUM_COLUMNS - PenjualanBarangPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		PembelianPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + PembelianPeer::NUM_COLUMNS;

		BarangPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + BarangPeer::NUM_COLUMNS;

		$c->addJoin(PenjualanBarangPeer::ID_PEMBELIAN, PembelianPeer::ID);

		$c->addJoin(PenjualanBarangPeer::ID_BARANG, BarangPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = PenjualanBarangPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = PembelianPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getPembelian(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addPenjualanBarang($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initPenjualanBarangs();
				$obj2->addPenjualanBarang($obj1);
			}


					
			$omClass = BarangPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getBarang(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addPenjualanBarang($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initPenjualanBarangs();
				$obj3->addPenjualanBarang($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptPembelian(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PenjualanBarangPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PenjualanBarangPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(PenjualanBarangPeer::ID_BARANG, BarangPeer::ID);

		$rs = PenjualanBarangPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptBarang(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PenjualanBarangPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PenjualanBarangPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(PenjualanBarangPeer::ID_PEMBELIAN, PembelianPeer::ID);

		$rs = PenjualanBarangPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptPembelian(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		PenjualanBarangPeer::addSelectColumns($c);
		$startcol2 = (PenjualanBarangPeer::NUM_COLUMNS - PenjualanBarangPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		BarangPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + BarangPeer::NUM_COLUMNS;

		$c->addJoin(PenjualanBarangPeer::ID_BARANG, BarangPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = PenjualanBarangPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = BarangPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getBarang(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addPenjualanBarang($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initPenjualanBarangs();
				$obj2->addPenjualanBarang($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptBarang(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		PenjualanBarangPeer::addSelectColumns($c);
		$startcol2 = (PenjualanBarangPeer::NUM_COLUMNS - PenjualanBarangPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		PembelianPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + PembelianPeer::NUM_COLUMNS;

		$c->addJoin(PenjualanBarangPeer::ID_PEMBELIAN, PembelianPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = PenjualanBarangPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = PembelianPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getPembelian(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addPenjualanBarang($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initPenjualanBarangs();
				$obj2->addPenjualanBarang($obj1);
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
		return PenjualanBarangPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(PenjualanBarangPeer::ID); 

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
			$comparison = $criteria->getComparison(PenjualanBarangPeer::ID);
			$selectCriteria->add(PenjualanBarangPeer::ID, $criteria->remove(PenjualanBarangPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(PenjualanBarangPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(PenjualanBarangPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof PenjualanBarang) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(PenjualanBarangPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(PenjualanBarang $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(PenjualanBarangPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(PenjualanBarangPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(PenjualanBarangPeer::DATABASE_NAME, PenjualanBarangPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = PenjualanBarangPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(PenjualanBarangPeer::DATABASE_NAME);

		$criteria->add(PenjualanBarangPeer::ID, $pk);


		$v = PenjualanBarangPeer::doSelect($criteria, $con);

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
			$criteria->add(PenjualanBarangPeer::ID, $pks, Criteria::IN);
			$objs = PenjualanBarangPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BasePenjualanBarangPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/PenjualanBarangMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.PenjualanBarangMapBuilder');
}
