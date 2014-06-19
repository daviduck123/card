<?php


abstract class BaseKartu extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $point;


	
	protected $file;


	
	protected $keterangan;


	
	protected $created_at;


	
	protected $updated_at;

	
	protected $collMejas;

	
	protected $lastMejaCriteria = null;

	
	protected $collKartuMejas;

	
	protected $lastKartuMejaCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getPoint()
	{

		return $this->point;
	}

	
	public function getFile()
	{

		return $this->file;
	}

	
	public function getKeterangan()
	{

		return $this->keterangan;
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
			$this->modifiedColumns[] = KartuPeer::ID;
		}

	} 
	
	public function setPoint($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->point !== $v) {
			$this->point = $v;
			$this->modifiedColumns[] = KartuPeer::POINT;
		}

	} 
	
	public function setFile($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->file !== $v) {
			$this->file = $v;
			$this->modifiedColumns[] = KartuPeer::FILE;
		}

	} 
	
	public function setKeterangan($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->keterangan !== $v) {
			$this->keterangan = $v;
			$this->modifiedColumns[] = KartuPeer::KETERANGAN;
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
			$this->modifiedColumns[] = KartuPeer::CREATED_AT;
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
			$this->modifiedColumns[] = KartuPeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->point = $rs->getInt($startcol + 1);

			$this->file = $rs->getString($startcol + 2);

			$this->keterangan = $rs->getString($startcol + 3);

			$this->created_at = $rs->getTimestamp($startcol + 4, null);

			$this->updated_at = $rs->getTimestamp($startcol + 5, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Kartu object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(KartuPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			KartuPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(KartuPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(KartuPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(KartuPeer::DATABASE_NAME);
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


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = KartuPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += KartuPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collMejas !== null) {
				foreach($this->collMejas as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collKartuMejas !== null) {
				foreach($this->collKartuMejas as $referrerFK) {
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


			if (($retval = KartuPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collMejas !== null) {
					foreach($this->collMejas as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collKartuMejas !== null) {
					foreach($this->collKartuMejas as $referrerFK) {
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
		$pos = KartuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getPoint();
				break;
			case 2:
				return $this->getFile();
				break;
			case 3:
				return $this->getKeterangan();
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
		$keys = KartuPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getPoint(),
			$keys[2] => $this->getFile(),
			$keys[3] => $this->getKeterangan(),
			$keys[4] => $this->getCreatedAt(),
			$keys[5] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = KartuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setPoint($value);
				break;
			case 2:
				$this->setFile($value);
				break;
			case 3:
				$this->setKeterangan($value);
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
		$keys = KartuPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setPoint($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFile($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setKeterangan($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCreatedAt($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setUpdatedAt($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(KartuPeer::DATABASE_NAME);

		if ($this->isColumnModified(KartuPeer::ID)) $criteria->add(KartuPeer::ID, $this->id);
		if ($this->isColumnModified(KartuPeer::POINT)) $criteria->add(KartuPeer::POINT, $this->point);
		if ($this->isColumnModified(KartuPeer::FILE)) $criteria->add(KartuPeer::FILE, $this->file);
		if ($this->isColumnModified(KartuPeer::KETERANGAN)) $criteria->add(KartuPeer::KETERANGAN, $this->keterangan);
		if ($this->isColumnModified(KartuPeer::CREATED_AT)) $criteria->add(KartuPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(KartuPeer::UPDATED_AT)) $criteria->add(KartuPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(KartuPeer::DATABASE_NAME);

		$criteria->add(KartuPeer::ID, $this->id);

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

		$copyObj->setPoint($this->point);

		$copyObj->setFile($this->file);

		$copyObj->setKeterangan($this->keterangan);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getMejas() as $relObj) {
				$copyObj->addMeja($relObj->copy($deepCopy));
			}

			foreach($this->getKartuMejas() as $relObj) {
				$copyObj->addKartuMeja($relObj->copy($deepCopy));
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
			self::$peer = new KartuPeer();
		}
		return self::$peer;
	}

	
	public function initMejas()
	{
		if ($this->collMejas === null) {
			$this->collMejas = array();
		}
	}

	
	public function getMejas($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseMejaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collMejas === null) {
			if ($this->isNew()) {
			   $this->collMejas = array();
			} else {

				$criteria->add(MejaPeer::ID_SKILL, $this->getId());

				MejaPeer::addSelectColumns($criteria);
				$this->collMejas = MejaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(MejaPeer::ID_SKILL, $this->getId());

				MejaPeer::addSelectColumns($criteria);
				if (!isset($this->lastMejaCriteria) || !$this->lastMejaCriteria->equals($criteria)) {
					$this->collMejas = MejaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastMejaCriteria = $criteria;
		return $this->collMejas;
	}

	
	public function countMejas($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseMejaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(MejaPeer::ID_SKILL, $this->getId());

		return MejaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addMeja(Meja $l)
	{
		$this->collMejas[] = $l;
		$l->setKartu($this);
	}


	
	public function getMejasJoinGame($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseMejaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collMejas === null) {
			if ($this->isNew()) {
				$this->collMejas = array();
			} else {

				$criteria->add(MejaPeer::ID_SKILL, $this->getId());

				$this->collMejas = MejaPeer::doSelectJoinGame($criteria, $con);
			}
		} else {
									
			$criteria->add(MejaPeer::ID_SKILL, $this->getId());

			if (!isset($this->lastMejaCriteria) || !$this->lastMejaCriteria->equals($criteria)) {
				$this->collMejas = MejaPeer::doSelectJoinGame($criteria, $con);
			}
		}
		$this->lastMejaCriteria = $criteria;

		return $this->collMejas;
	}

	
	public function initKartuMejas()
	{
		if ($this->collKartuMejas === null) {
			$this->collKartuMejas = array();
		}
	}

	
	public function getKartuMejas($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseKartuMejaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collKartuMejas === null) {
			if ($this->isNew()) {
			   $this->collKartuMejas = array();
			} else {

				$criteria->add(KartuMejaPeer::ID_KARTU, $this->getId());

				KartuMejaPeer::addSelectColumns($criteria);
				$this->collKartuMejas = KartuMejaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(KartuMejaPeer::ID_KARTU, $this->getId());

				KartuMejaPeer::addSelectColumns($criteria);
				if (!isset($this->lastKartuMejaCriteria) || !$this->lastKartuMejaCriteria->equals($criteria)) {
					$this->collKartuMejas = KartuMejaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastKartuMejaCriteria = $criteria;
		return $this->collKartuMejas;
	}

	
	public function countKartuMejas($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseKartuMejaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(KartuMejaPeer::ID_KARTU, $this->getId());

		return KartuMejaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addKartuMeja(KartuMeja $l)
	{
		$this->collKartuMejas[] = $l;
		$l->setKartu($this);
	}


	
	public function getKartuMejasJoinMeja($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseKartuMejaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collKartuMejas === null) {
			if ($this->isNew()) {
				$this->collKartuMejas = array();
			} else {

				$criteria->add(KartuMejaPeer::ID_KARTU, $this->getId());

				$this->collKartuMejas = KartuMejaPeer::doSelectJoinMeja($criteria, $con);
			}
		} else {
									
			$criteria->add(KartuMejaPeer::ID_KARTU, $this->getId());

			if (!isset($this->lastKartuMejaCriteria) || !$this->lastKartuMejaCriteria->equals($criteria)) {
				$this->collKartuMejas = KartuMejaPeer::doSelectJoinMeja($criteria, $con);
			}
		}
		$this->lastKartuMejaCriteria = $criteria;

		return $this->collKartuMejas;
	}

} 