<?php


abstract class BasePembelian extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $tanggal;


	
	protected $grand_total;


	
	protected $pegawai_id;


	
	protected $created_at;


	
	protected $updated_at;

	
	protected $aPegawai;

	
	protected $collPembelianBarangs;

	
	protected $lastPembelianBarangCriteria = null;

	
	protected $collPenjualanBarangs;

	
	protected $lastPenjualanBarangCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getTanggal($format = 'Y-m-d')
	{

		if ($this->tanggal === null || $this->tanggal === '') {
			return null;
		} elseif (!is_int($this->tanggal)) {
						$ts = strtotime($this->tanggal);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [tanggal] as date/time value: " . var_export($this->tanggal, true));
			}
		} else {
			$ts = $this->tanggal;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getGrandTotal()
	{

		return $this->grand_total;
	}

	
	public function getPegawaiId()
	{

		return $this->pegawai_id;
	}

	
	public function getCreatedAt($format = 'Y-m-d H:i:s')
	{

		if ($this->created_at === null || $this->created_at === '') {
			return null;
		} elseif (!is_int($this->created_at)) {
						$ts = strtotime($this->created_at);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [created_at] as date/time value: " . var_export($this->created_at, true));
			}
		} else {
			$ts = $this->created_at;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getUpdatedAt($format = 'Y-m-d H:i:s')
	{

		if ($this->updated_at === null || $this->updated_at === '') {
			return null;
		} elseif (!is_int($this->updated_at)) {
						$ts = strtotime($this->updated_at);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [updated_at] as date/time value: " . var_export($this->updated_at, true));
			}
		} else {
			$ts = $this->updated_at;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = PembelianPeer::ID;
		}

	} 
	
	public function setTanggal($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [tanggal] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->tanggal !== $ts) {
			$this->tanggal = $ts;
			$this->modifiedColumns[] = PembelianPeer::TANGGAL;
		}

	} 
	
	public function setGrandTotal($v)
	{

		if ($this->grand_total !== $v) {
			$this->grand_total = $v;
			$this->modifiedColumns[] = PembelianPeer::GRAND_TOTAL;
		}

	} 
	
	public function setPegawaiId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->pegawai_id !== $v) {
			$this->pegawai_id = $v;
			$this->modifiedColumns[] = PembelianPeer::PEGAWAI_ID;
		}

		if ($this->aPegawai !== null && $this->aPegawai->getId() !== $v) {
			$this->aPegawai = null;
		}

	} 
	
	public function setCreatedAt($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [created_at] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->created_at !== $ts) {
			$this->created_at = $ts;
			$this->modifiedColumns[] = PembelianPeer::CREATED_AT;
		}

	} 
	
	public function setUpdatedAt($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [updated_at] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->updated_at !== $ts) {
			$this->updated_at = $ts;
			$this->modifiedColumns[] = PembelianPeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->tanggal = $rs->getDate($startcol + 1, null);

			$this->grand_total = $rs->getFloat($startcol + 2);

			$this->pegawai_id = $rs->getInt($startcol + 3);

			$this->created_at = $rs->getTimestamp($startcol + 4, null);

			$this->updated_at = $rs->getTimestamp($startcol + 5, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Pembelian object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PembelianPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			PembelianPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(PembelianPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(PembelianPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PembelianPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	protected function doSave($con)
	{
		$affectedRows = 0; 		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


												
			if ($this->aPegawai !== null) {
				if ($this->aPegawai->isModified()) {
					$affectedRows += $this->aPegawai->save($con);
				}
				$this->setPegawai($this->aPegawai);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = PembelianPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += PembelianPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collPembelianBarangs !== null) {
				foreach($this->collPembelianBarangs as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collPenjualanBarangs !== null) {
				foreach($this->collPenjualanBarangs as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			$this->alreadyInSave = false;
		}
		return $affectedRows;
	} 
	
	protected $validationFailures = array();

	
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


												
			if ($this->aPegawai !== null) {
				if (!$this->aPegawai->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aPegawai->getValidationFailures());
				}
			}


			if (($retval = PembelianPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collPembelianBarangs !== null) {
					foreach($this->collPembelianBarangs as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collPenjualanBarangs !== null) {
					foreach($this->collPenjualanBarangs as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PembelianPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getTanggal();
				break;
			case 2:
				return $this->getGrandTotal();
				break;
			case 3:
				return $this->getPegawaiId();
				break;
			case 4:
				return $this->getCreatedAt();
				break;
			case 5:
				return $this->getUpdatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PembelianPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getTanggal(),
			$keys[2] => $this->getGrandTotal(),
			$keys[3] => $this->getPegawaiId(),
			$keys[4] => $this->getCreatedAt(),
			$keys[5] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PembelianPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setTanggal($value);
				break;
			case 2:
				$this->setGrandTotal($value);
				break;
			case 3:
				$this->setPegawaiId($value);
				break;
			case 4:
				$this->setCreatedAt($value);
				break;
			case 5:
				$this->setUpdatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PembelianPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTanggal($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setGrandTotal($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPegawaiId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCreatedAt($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setUpdatedAt($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(PembelianPeer::DATABASE_NAME);

		if ($this->isColumnModified(PembelianPeer::ID)) $criteria->add(PembelianPeer::ID, $this->id);
		if ($this->isColumnModified(PembelianPeer::TANGGAL)) $criteria->add(PembelianPeer::TANGGAL, $this->tanggal);
		if ($this->isColumnModified(PembelianPeer::GRAND_TOTAL)) $criteria->add(PembelianPeer::GRAND_TOTAL, $this->grand_total);
		if ($this->isColumnModified(PembelianPeer::PEGAWAI_ID)) $criteria->add(PembelianPeer::PEGAWAI_ID, $this->pegawai_id);
		if ($this->isColumnModified(PembelianPeer::CREATED_AT)) $criteria->add(PembelianPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(PembelianPeer::UPDATED_AT)) $criteria->add(PembelianPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(PembelianPeer::DATABASE_NAME);

		$criteria->add(PembelianPeer::ID, $this->id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setTanggal($this->tanggal);

		$copyObj->setGrandTotal($this->grand_total);

		$copyObj->setPegawaiId($this->pegawai_id);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getPembelianBarangs() as $relObj) {
				$copyObj->addPembelianBarang($relObj->copy($deepCopy));
			}

			foreach($this->getPenjualanBarangs() as $relObj) {
				$copyObj->addPenjualanBarang($relObj->copy($deepCopy));
			}

		} 

		$copyObj->setNew(true);

		$copyObj->setId(NULL); 
	}

	
	public function copy($deepCopy = false)
	{
				$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new PembelianPeer();
		}
		return self::$peer;
	}

	
	public function setPegawai($v)
	{


		if ($v === null) {
			$this->setPegawaiId(NULL);
		} else {
			$this->setPegawaiId($v->getId());
		}


		$this->aPegawai = $v;
	}


	
	public function getPegawai($con = null)
	{
		if ($this->aPegawai === null && ($this->pegawai_id !== null)) {
						include_once 'lib/model/om/BasePegawaiPeer.php';

			$this->aPegawai = PegawaiPeer::retrieveByPK($this->pegawai_id, $con);

			
		}
		return $this->aPegawai;
	}

	
	public function initPembelianBarangs()
	{
		if ($this->collPembelianBarangs === null) {
			$this->collPembelianBarangs = array();
		}
	}

	
	public function getPembelianBarangs($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BasePembelianBarangPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPembelianBarangs === null) {
			if ($this->isNew()) {
			   $this->collPembelianBarangs = array();
			} else {

				$criteria->add(PembelianBarangPeer::ID_PEMBELIAN, $this->getId());

				PembelianBarangPeer::addSelectColumns($criteria);
				$this->collPembelianBarangs = PembelianBarangPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(PembelianBarangPeer::ID_PEMBELIAN, $this->getId());

				PembelianBarangPeer::addSelectColumns($criteria);
				if (!isset($this->lastPembelianBarangCriteria) || !$this->lastPembelianBarangCriteria->equals($criteria)) {
					$this->collPembelianBarangs = PembelianBarangPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastPembelianBarangCriteria = $criteria;
		return $this->collPembelianBarangs;
	}

	
	public function countPembelianBarangs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BasePembelianBarangPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(PembelianBarangPeer::ID_PEMBELIAN, $this->getId());

		return PembelianBarangPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addPembelianBarang(PembelianBarang $l)
	{
		$this->collPembelianBarangs[] = $l;
		$l->setPembelian($this);
	}


	
	public function getPembelianBarangsJoinBarang($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BasePembelianBarangPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPembelianBarangs === null) {
			if ($this->isNew()) {
				$this->collPembelianBarangs = array();
			} else {

				$criteria->add(PembelianBarangPeer::ID_PEMBELIAN, $this->getId());

				$this->collPembelianBarangs = PembelianBarangPeer::doSelectJoinBarang($criteria, $con);
			}
		} else {
									
			$criteria->add(PembelianBarangPeer::ID_PEMBELIAN, $this->getId());

			if (!isset($this->lastPembelianBarangCriteria) || !$this->lastPembelianBarangCriteria->equals($criteria)) {
				$this->collPembelianBarangs = PembelianBarangPeer::doSelectJoinBarang($criteria, $con);
			}
		}
		$this->lastPembelianBarangCriteria = $criteria;

		return $this->collPembelianBarangs;
	}

	
	public function initPenjualanBarangs()
	{
		if ($this->collPenjualanBarangs === null) {
			$this->collPenjualanBarangs = array();
		}
	}

	
	public function getPenjualanBarangs($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BasePenjualanBarangPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPenjualanBarangs === null) {
			if ($this->isNew()) {
			   $this->collPenjualanBarangs = array();
			} else {

				$criteria->add(PenjualanBarangPeer::ID_PEMBELIAN, $this->getId());

				PenjualanBarangPeer::addSelectColumns($criteria);
				$this->collPenjualanBarangs = PenjualanBarangPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(PenjualanBarangPeer::ID_PEMBELIAN, $this->getId());

				PenjualanBarangPeer::addSelectColumns($criteria);
				if (!isset($this->lastPenjualanBarangCriteria) || !$this->lastPenjualanBarangCriteria->equals($criteria)) {
					$this->collPenjualanBarangs = PenjualanBarangPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastPenjualanBarangCriteria = $criteria;
		return $this->collPenjualanBarangs;
	}

	
	public function countPenjualanBarangs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BasePenjualanBarangPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(PenjualanBarangPeer::ID_PEMBELIAN, $this->getId());

		return PenjualanBarangPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addPenjualanBarang(PenjualanBarang $l)
	{
		$this->collPenjualanBarangs[] = $l;
		$l->setPembelian($this);
	}


	
	public function getPenjualanBarangsJoinBarang($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BasePenjualanBarangPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPenjualanBarangs === null) {
			if ($this->isNew()) {
				$this->collPenjualanBarangs = array();
			} else {

				$criteria->add(PenjualanBarangPeer::ID_PEMBELIAN, $this->getId());

				$this->collPenjualanBarangs = PenjualanBarangPeer::doSelectJoinBarang($criteria, $con);
			}
		} else {
									
			$criteria->add(PenjualanBarangPeer::ID_PEMBELIAN, $this->getId());

			if (!isset($this->lastPenjualanBarangCriteria) || !$this->lastPenjualanBarangCriteria->equals($criteria)) {
				$this->collPenjualanBarangs = PenjualanBarangPeer::doSelectJoinBarang($criteria, $con);
			}
		}
		$this->lastPenjualanBarangCriteria = $criteria;

		return $this->collPenjualanBarangs;
	}

} 