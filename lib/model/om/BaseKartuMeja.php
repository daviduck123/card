<?php


abstract class BaseKartuMeja extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id_meja;


	
	protected $id_kartu;


	
	protected $id;

	
	protected $aMeja;

	
	protected $aKartu;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getIdMeja()
	{

		return $this->id_meja;
	}

	
	public function getIdKartu()
	{

		return $this->id_kartu;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setIdMeja($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_meja !== $v) {
			$this->id_meja = $v;
			$this->modifiedColumns[] = KartuMejaPeer::ID_MEJA;
		}

		if ($this->aMeja !== null && $this->aMeja->getId() !== $v) {
			$this->aMeja = null;
		}

	} 
	
	public function setIdKartu($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_kartu !== $v) {
			$this->id_kartu = $v;
			$this->modifiedColumns[] = KartuMejaPeer::ID_KARTU;
		}

		if ($this->aKartu !== null && $this->aKartu->getId() !== $v) {
			$this->aKartu = null;
		}

	} 
	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = KartuMejaPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id_meja = $rs->getInt($startcol + 0);

			$this->id_kartu = $rs->getInt($startcol + 1);

			$this->id = $rs->getInt($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating KartuMeja object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(KartuMejaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			KartuMejaPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(KartuMejaPeer::DATABASE_NAME);
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


												
			if ($this->aMeja !== null) {
				if ($this->aMeja->isModified()) {
					$affectedRows += $this->aMeja->save($con);
				}
				$this->setMeja($this->aMeja);
			}

			if ($this->aKartu !== null) {
				if ($this->aKartu->isModified()) {
					$affectedRows += $this->aKartu->save($con);
				}
				$this->setKartu($this->aKartu);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = KartuMejaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += KartuMejaPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

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


												
			if ($this->aMeja !== null) {
				if (!$this->aMeja->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aMeja->getValidationFailures());
				}
			}

			if ($this->aKartu !== null) {
				if (!$this->aKartu->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aKartu->getValidationFailures());
				}
			}


			if (($retval = KartuMejaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = KartuMejaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getIdMeja();
				break;
			case 1:
				return $this->getIdKartu();
				break;
			case 2:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = KartuMejaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdMeja(),
			$keys[1] => $this->getIdKartu(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = KartuMejaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setIdMeja($value);
				break;
			case 1:
				$this->setIdKartu($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = KartuMejaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdMeja($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdKartu($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(KartuMejaPeer::DATABASE_NAME);

		if ($this->isColumnModified(KartuMejaPeer::ID_MEJA)) $criteria->add(KartuMejaPeer::ID_MEJA, $this->id_meja);
		if ($this->isColumnModified(KartuMejaPeer::ID_KARTU)) $criteria->add(KartuMejaPeer::ID_KARTU, $this->id_kartu);
		if ($this->isColumnModified(KartuMejaPeer::ID)) $criteria->add(KartuMejaPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(KartuMejaPeer::DATABASE_NAME);

		$criteria->add(KartuMejaPeer::ID, $this->id);

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

		$copyObj->setIdMeja($this->id_meja);

		$copyObj->setIdKartu($this->id_kartu);


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
			self::$peer = new KartuMejaPeer();
		}
		return self::$peer;
	}

	
	public function setMeja($v)
	{


		if ($v === null) {
			$this->setIdMeja(NULL);
		} else {
			$this->setIdMeja($v->getId());
		}


		$this->aMeja = $v;
	}


	
	public function getMeja($con = null)
	{
		if ($this->aMeja === null && ($this->id_meja !== null)) {
						include_once 'lib/model/om/BaseMejaPeer.php';

			$this->aMeja = MejaPeer::retrieveByPK($this->id_meja, $con);

			
		}
		return $this->aMeja;
	}

	
	public function setKartu($v)
	{


		if ($v === null) {
			$this->setIdKartu(NULL);
		} else {
			$this->setIdKartu($v->getId());
		}


		$this->aKartu = $v;
	}


	
	public function getKartu($con = null)
	{
		if ($this->aKartu === null && ($this->id_kartu !== null)) {
						include_once 'lib/model/om/BaseKartuPeer.php';

			$this->aKartu = KartuPeer::retrieveByPK($this->id_kartu, $con);

			
		}
		return $this->aKartu;
	}

} 