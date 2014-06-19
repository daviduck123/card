<?php


abstract class BasePenjualan extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $tanggal;


	
	protected $grand_total;


	
	protected $pegawai_id;


	
	protected $created_at;


	
	protected $updated_at;

	
	protected $aPegawai;

	
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
			$this->modifiedColumns[] = PenjualanPeer::ID;
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
			$this->modifiedColumns[] = PenjualanPeer::TANGGAL;
		}

	} 
	
	public function setGrandTotal($v)
	{

		if ($this->grand_total !== $v) {
			$this->grand_total = $v;
			$this->modifiedColumns[] = PenjualanPeer::GRAND_TOTAL;
		}

	} 
	
	public function setPegawaiId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->pegawai_id !== $v) {
			$this->pegawai_id = $v;
			$this->modifiedColumns[] = PenjualanPeer::PEGAWAI_ID;
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
			$this->modifiedColumns[] = PenjualanPeer::CREATED_AT;
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
			$this->modifiedColumns[] = PenjualanPeer::UPDATED_AT;
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
			throw new PropelException("Error populating Penjualan object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PenjualanPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			PenjualanPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(PenjualanPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(PenjualanPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PenjualanPeer::DATABASE_NAME);
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
					$pk = PenjualanPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += PenjualanPeer::doUpdate($this, $con);
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


												
			if ($this->aPegawai !== null) {
				if (!$this->aPegawai->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aPegawai->getValidationFailures());
				}
			}


			if (($retval = PenjualanPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PenjualanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
		$keys = PenjualanPeer::getFieldNames($keyType);
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
		$pos = PenjualanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
		$keys = PenjualanPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTanggal($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setGrandTotal($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPegawaiId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCreatedAt($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setUpdatedAt($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(PenjualanPeer::DATABASE_NAME);

		if ($this->isColumnModified(PenjualanPeer::ID)) $criteria->add(PenjualanPeer::ID, $this->id);
		if ($this->isColumnModified(PenjualanPeer::TANGGAL)) $criteria->add(PenjualanPeer::TANGGAL, $this->tanggal);
		if ($this->isColumnModified(PenjualanPeer::GRAND_TOTAL)) $criteria->add(PenjualanPeer::GRAND_TOTAL, $this->grand_total);
		if ($this->isColumnModified(PenjualanPeer::PEGAWAI_ID)) $criteria->add(PenjualanPeer::PEGAWAI_ID, $this->pegawai_id);
		if ($this->isColumnModified(PenjualanPeer::CREATED_AT)) $criteria->add(PenjualanPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(PenjualanPeer::UPDATED_AT)) $criteria->add(PenjualanPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(PenjualanPeer::DATABASE_NAME);

		$criteria->add(PenjualanPeer::ID, $this->id);

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
			self::$peer = new PenjualanPeer();
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

} 