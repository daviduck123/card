<?php


abstract class BasePegawai extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nama;


	
	protected $nama_strip;


	
	protected $is_aktif = true;


	
	protected $alamat;


	
	protected $kota;


	
	protected $jabatan;


	
	protected $gaji;


	
	protected $sf_guard_user_id;


	
	protected $created_at;


	
	protected $updated_at;

	
	protected $asfGuardUser;

	
	protected $collPembelians;

	
	protected $lastPembelianCriteria = null;

	
	protected $collPenjualans;

	
	protected $lastPenjualanCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getNama()
	{

		return $this->nama;
	}

	
	public function getNamaStrip()
	{

		return $this->nama_strip;
	}

	
	public function getIsAktif()
	{

		return $this->is_aktif;
	}

	
	public function getAlamat()
	{

		return $this->alamat;
	}

	
	public function getKota()
	{

		return $this->kota;
	}

	
	public function getJabatan()
	{

		return $this->jabatan;
	}

	
	public function getGaji()
	{

		return $this->gaji;
	}

	
	public function getSfGuardUserId()
	{

		return $this->sf_guard_user_id;
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
			$this->modifiedColumns[] = PegawaiPeer::ID;
		}

	} 
	
	public function setNama($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nama !== $v) {
			$this->nama = $v;
			$this->modifiedColumns[] = PegawaiPeer::NAMA;
		}

	} 
	
	public function setNamaStrip($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nama_strip !== $v) {
			$this->nama_strip = $v;
			$this->modifiedColumns[] = PegawaiPeer::NAMA_STRIP;
		}

	} 
	
	public function setIsAktif($v)
	{

		if ($this->is_aktif !== $v || $v === true) {
			$this->is_aktif = $v;
			$this->modifiedColumns[] = PegawaiPeer::IS_AKTIF;
		}

	} 
	
	public function setAlamat($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->alamat !== $v) {
			$this->alamat = $v;
			$this->modifiedColumns[] = PegawaiPeer::ALAMAT;
		}

	} 
	
	public function setKota($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->kota !== $v) {
			$this->kota = $v;
			$this->modifiedColumns[] = PegawaiPeer::KOTA;
		}

	} 
	
	public function setJabatan($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->jabatan !== $v) {
			$this->jabatan = $v;
			$this->modifiedColumns[] = PegawaiPeer::JABATAN;
		}

	} 
	
	public function setGaji($v)
	{

		if ($this->gaji !== $v) {
			$this->gaji = $v;
			$this->modifiedColumns[] = PegawaiPeer::GAJI;
		}

	} 
	
	public function setSfGuardUserId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->sf_guard_user_id !== $v) {
			$this->sf_guard_user_id = $v;
			$this->modifiedColumns[] = PegawaiPeer::SF_GUARD_USER_ID;
		}

		if ($this->asfGuardUser !== null && $this->asfGuardUser->getId() !== $v) {
			$this->asfGuardUser = null;
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
			$this->modifiedColumns[] = PegawaiPeer::CREATED_AT;
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
			$this->modifiedColumns[] = PegawaiPeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->nama = $rs->getString($startcol + 1);

			$this->nama_strip = $rs->getString($startcol + 2);

			$this->is_aktif = $rs->getBoolean($startcol + 3);

			$this->alamat = $rs->getString($startcol + 4);

			$this->kota = $rs->getString($startcol + 5);

			$this->jabatan = $rs->getString($startcol + 6);

			$this->gaji = $rs->getFloat($startcol + 7);

			$this->sf_guard_user_id = $rs->getInt($startcol + 8);

			$this->created_at = $rs->getTimestamp($startcol + 9, null);

			$this->updated_at = $rs->getTimestamp($startcol + 10, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 11; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Pegawai object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PegawaiPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			PegawaiPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(PegawaiPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(PegawaiPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PegawaiPeer::DATABASE_NAME);
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


												
			if ($this->asfGuardUser !== null) {
				if ($this->asfGuardUser->isModified()) {
					$affectedRows += $this->asfGuardUser->save($con);
				}
				$this->setsfGuardUser($this->asfGuardUser);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = PegawaiPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += PegawaiPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collPembelians !== null) {
				foreach($this->collPembelians as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collPenjualans !== null) {
				foreach($this->collPenjualans as $referrerFK) {
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


												
			if ($this->asfGuardUser !== null) {
				if (!$this->asfGuardUser->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->asfGuardUser->getValidationFailures());
				}
			}


			if (($retval = PegawaiPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collPembelians !== null) {
					foreach($this->collPembelians as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collPenjualans !== null) {
					foreach($this->collPenjualans as $referrerFK) {
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
		$pos = PegawaiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNama();
				break;
			case 2:
				return $this->getNamaStrip();
				break;
			case 3:
				return $this->getIsAktif();
				break;
			case 4:
				return $this->getAlamat();
				break;
			case 5:
				return $this->getKota();
				break;
			case 6:
				return $this->getJabatan();
				break;
			case 7:
				return $this->getGaji();
				break;
			case 8:
				return $this->getSfGuardUserId();
				break;
			case 9:
				return $this->getCreatedAt();
				break;
			case 10:
				return $this->getUpdatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PegawaiPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNama(),
			$keys[2] => $this->getNamaStrip(),
			$keys[3] => $this->getIsAktif(),
			$keys[4] => $this->getAlamat(),
			$keys[5] => $this->getKota(),
			$keys[6] => $this->getJabatan(),
			$keys[7] => $this->getGaji(),
			$keys[8] => $this->getSfGuardUserId(),
			$keys[9] => $this->getCreatedAt(),
			$keys[10] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PegawaiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNama($value);
				break;
			case 2:
				$this->setNamaStrip($value);
				break;
			case 3:
				$this->setIsAktif($value);
				break;
			case 4:
				$this->setAlamat($value);
				break;
			case 5:
				$this->setKota($value);
				break;
			case 6:
				$this->setJabatan($value);
				break;
			case 7:
				$this->setGaji($value);
				break;
			case 8:
				$this->setSfGuardUserId($value);
				break;
			case 9:
				$this->setCreatedAt($value);
				break;
			case 10:
				$this->setUpdatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PegawaiPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNama($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNamaStrip($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setIsAktif($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAlamat($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setKota($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setJabatan($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setGaji($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setSfGuardUserId($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCreatedAt($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setUpdatedAt($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(PegawaiPeer::DATABASE_NAME);

		if ($this->isColumnModified(PegawaiPeer::ID)) $criteria->add(PegawaiPeer::ID, $this->id);
		if ($this->isColumnModified(PegawaiPeer::NAMA)) $criteria->add(PegawaiPeer::NAMA, $this->nama);
		if ($this->isColumnModified(PegawaiPeer::NAMA_STRIP)) $criteria->add(PegawaiPeer::NAMA_STRIP, $this->nama_strip);
		if ($this->isColumnModified(PegawaiPeer::IS_AKTIF)) $criteria->add(PegawaiPeer::IS_AKTIF, $this->is_aktif);
		if ($this->isColumnModified(PegawaiPeer::ALAMAT)) $criteria->add(PegawaiPeer::ALAMAT, $this->alamat);
		if ($this->isColumnModified(PegawaiPeer::KOTA)) $criteria->add(PegawaiPeer::KOTA, $this->kota);
		if ($this->isColumnModified(PegawaiPeer::JABATAN)) $criteria->add(PegawaiPeer::JABATAN, $this->jabatan);
		if ($this->isColumnModified(PegawaiPeer::GAJI)) $criteria->add(PegawaiPeer::GAJI, $this->gaji);
		if ($this->isColumnModified(PegawaiPeer::SF_GUARD_USER_ID)) $criteria->add(PegawaiPeer::SF_GUARD_USER_ID, $this->sf_guard_user_id);
		if ($this->isColumnModified(PegawaiPeer::CREATED_AT)) $criteria->add(PegawaiPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(PegawaiPeer::UPDATED_AT)) $criteria->add(PegawaiPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(PegawaiPeer::DATABASE_NAME);

		$criteria->add(PegawaiPeer::ID, $this->id);

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

		$copyObj->setNama($this->nama);

		$copyObj->setNamaStrip($this->nama_strip);

		$copyObj->setIsAktif($this->is_aktif);

		$copyObj->setAlamat($this->alamat);

		$copyObj->setKota($this->kota);

		$copyObj->setJabatan($this->jabatan);

		$copyObj->setGaji($this->gaji);

		$copyObj->setSfGuardUserId($this->sf_guard_user_id);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getPembelians() as $relObj) {
				$copyObj->addPembelian($relObj->copy($deepCopy));
			}

			foreach($this->getPenjualans() as $relObj) {
				$copyObj->addPenjualan($relObj->copy($deepCopy));
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
			self::$peer = new PegawaiPeer();
		}
		return self::$peer;
	}

	
	public function setsfGuardUser($v)
	{


		if ($v === null) {
			$this->setSfGuardUserId(NULL);
		} else {
			$this->setSfGuardUserId($v->getId());
		}


		$this->asfGuardUser = $v;
	}


	
	public function getsfGuardUser($con = null)
	{
		if ($this->asfGuardUser === null && ($this->sf_guard_user_id !== null)) {
						include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardUserPeer.php';

			$this->asfGuardUser = sfGuardUserPeer::retrieveByPK($this->sf_guard_user_id, $con);

			
		}
		return $this->asfGuardUser;
	}

	
	public function initPembelians()
	{
		if ($this->collPembelians === null) {
			$this->collPembelians = array();
		}
	}

	
	public function getPembelians($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BasePembelianPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPembelians === null) {
			if ($this->isNew()) {
			   $this->collPembelians = array();
			} else {

				$criteria->add(PembelianPeer::PEGAWAI_ID, $this->getId());

				PembelianPeer::addSelectColumns($criteria);
				$this->collPembelians = PembelianPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(PembelianPeer::PEGAWAI_ID, $this->getId());

				PembelianPeer::addSelectColumns($criteria);
				if (!isset($this->lastPembelianCriteria) || !$this->lastPembelianCriteria->equals($criteria)) {
					$this->collPembelians = PembelianPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastPembelianCriteria = $criteria;
		return $this->collPembelians;
	}

	
	public function countPembelians($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BasePembelianPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(PembelianPeer::PEGAWAI_ID, $this->getId());

		return PembelianPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addPembelian(Pembelian $l)
	{
		$this->collPembelians[] = $l;
		$l->setPegawai($this);
	}

	
	public function initPenjualans()
	{
		if ($this->collPenjualans === null) {
			$this->collPenjualans = array();
		}
	}

	
	public function getPenjualans($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BasePenjualanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPenjualans === null) {
			if ($this->isNew()) {
			   $this->collPenjualans = array();
			} else {

				$criteria->add(PenjualanPeer::PEGAWAI_ID, $this->getId());

				PenjualanPeer::addSelectColumns($criteria);
				$this->collPenjualans = PenjualanPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(PenjualanPeer::PEGAWAI_ID, $this->getId());

				PenjualanPeer::addSelectColumns($criteria);
				if (!isset($this->lastPenjualanCriteria) || !$this->lastPenjualanCriteria->equals($criteria)) {
					$this->collPenjualans = PenjualanPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastPenjualanCriteria = $criteria;
		return $this->collPenjualans;
	}

	
	public function countPenjualans($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BasePenjualanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(PenjualanPeer::PEGAWAI_ID, $this->getId());

		return PenjualanPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addPenjualan(Penjualan $l)
	{
		$this->collPenjualans[] = $l;
		$l->setPegawai($this);
	}

} 