<?php


abstract class BaseBarang extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nama;


	
	protected $deskripsi;


	
	protected $stok;


	
	protected $harga_beli;


	
	protected $harga_jual;


	
	protected $status = 0;


	
	protected $kategori_id;


	
	protected $nama_strip;


	
	protected $namafile;


	
	protected $created_at;


	
	protected $updated_at;

	
	protected $aKategori;

	
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

	
	public function getNama()
	{

		return $this->nama;
	}

	
	public function getDeskripsi()
	{

		return $this->deskripsi;
	}

	
	public function getStok()
	{

		return $this->stok;
	}

	
	public function getHargaBeli()
	{

		return $this->harga_beli;
	}

	
	public function getHargaJual()
	{

		return $this->harga_jual;
	}

	
	public function getStatus()
	{

		return $this->status;
	}

	
	public function getKategoriId()
	{

		return $this->kategori_id;
	}

	
	public function getNamaStrip()
	{

		return $this->nama_strip;
	}

	
	public function getNamafile()
	{

		return $this->namafile;
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
			$this->modifiedColumns[] = BarangPeer::ID;
		}

	} 
	
	public function setNama($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nama !== $v) {
			$this->nama = $v;
			$this->modifiedColumns[] = BarangPeer::NAMA;
		}

	} 
	
	public function setDeskripsi($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->deskripsi !== $v) {
			$this->deskripsi = $v;
			$this->modifiedColumns[] = BarangPeer::DESKRIPSI;
		}

	} 
	
	public function setStok($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->stok !== $v) {
			$this->stok = $v;
			$this->modifiedColumns[] = BarangPeer::STOK;
		}

	} 
	
	public function setHargaBeli($v)
	{

		if ($this->harga_beli !== $v) {
			$this->harga_beli = $v;
			$this->modifiedColumns[] = BarangPeer::HARGA_BELI;
		}

	} 
	
	public function setHargaJual($v)
	{

		if ($this->harga_jual !== $v) {
			$this->harga_jual = $v;
			$this->modifiedColumns[] = BarangPeer::HARGA_JUAL;
		}

	} 
	
	public function setStatus($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->status !== $v || $v === 0) {
			$this->status = $v;
			$this->modifiedColumns[] = BarangPeer::STATUS;
		}

	} 
	
	public function setKategoriId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->kategori_id !== $v) {
			$this->kategori_id = $v;
			$this->modifiedColumns[] = BarangPeer::KATEGORI_ID;
		}

		if ($this->aKategori !== null && $this->aKategori->getId() !== $v) {
			$this->aKategori = null;
		}

	} 
	
	public function setNamaStrip($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nama_strip !== $v) {
			$this->nama_strip = $v;
			$this->modifiedColumns[] = BarangPeer::NAMA_STRIP;
		}

	} 
	
	public function setNamafile($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->namafile !== $v) {
			$this->namafile = $v;
			$this->modifiedColumns[] = BarangPeer::NAMAFILE;
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
			$this->modifiedColumns[] = BarangPeer::CREATED_AT;
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
			$this->modifiedColumns[] = BarangPeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->nama = $rs->getString($startcol + 1);

			$this->deskripsi = $rs->getString($startcol + 2);

			$this->stok = $rs->getInt($startcol + 3);

			$this->harga_beli = $rs->getFloat($startcol + 4);

			$this->harga_jual = $rs->getFloat($startcol + 5);

			$this->status = $rs->getInt($startcol + 6);

			$this->kategori_id = $rs->getInt($startcol + 7);

			$this->nama_strip = $rs->getString($startcol + 8);

			$this->namafile = $rs->getString($startcol + 9);

			$this->created_at = $rs->getTimestamp($startcol + 10, null);

			$this->updated_at = $rs->getTimestamp($startcol + 11, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 12; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Barang object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(BarangPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			BarangPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(BarangPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(BarangPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(BarangPeer::DATABASE_NAME);
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


												
			if ($this->aKategori !== null) {
				if ($this->aKategori->isModified()) {
					$affectedRows += $this->aKategori->save($con);
				}
				$this->setKategori($this->aKategori);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = BarangPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += BarangPeer::doUpdate($this, $con);
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


												
			if ($this->aKategori !== null) {
				if (!$this->aKategori->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aKategori->getValidationFailures());
				}
			}


			if (($retval = BarangPeer::doValidate($this, $columns)) !== true) {
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
		$pos = BarangPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getDeskripsi();
				break;
			case 3:
				return $this->getStok();
				break;
			case 4:
				return $this->getHargaBeli();
				break;
			case 5:
				return $this->getHargaJual();
				break;
			case 6:
				return $this->getStatus();
				break;
			case 7:
				return $this->getKategoriId();
				break;
			case 8:
				return $this->getNamaStrip();
				break;
			case 9:
				return $this->getNamafile();
				break;
			case 10:
				return $this->getCreatedAt();
				break;
			case 11:
				return $this->getUpdatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BarangPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNama(),
			$keys[2] => $this->getDeskripsi(),
			$keys[3] => $this->getStok(),
			$keys[4] => $this->getHargaBeli(),
			$keys[5] => $this->getHargaJual(),
			$keys[6] => $this->getStatus(),
			$keys[7] => $this->getKategoriId(),
			$keys[8] => $this->getNamaStrip(),
			$keys[9] => $this->getNamafile(),
			$keys[10] => $this->getCreatedAt(),
			$keys[11] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BarangPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setDeskripsi($value);
				break;
			case 3:
				$this->setStok($value);
				break;
			case 4:
				$this->setHargaBeli($value);
				break;
			case 5:
				$this->setHargaJual($value);
				break;
			case 6:
				$this->setStatus($value);
				break;
			case 7:
				$this->setKategoriId($value);
				break;
			case 8:
				$this->setNamaStrip($value);
				break;
			case 9:
				$this->setNamafile($value);
				break;
			case 10:
				$this->setCreatedAt($value);
				break;
			case 11:
				$this->setUpdatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BarangPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNama($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDeskripsi($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setStok($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setHargaBeli($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setHargaJual($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setStatus($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setKategoriId($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setNamaStrip($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setNamafile($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCreatedAt($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setUpdatedAt($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(BarangPeer::DATABASE_NAME);

		if ($this->isColumnModified(BarangPeer::ID)) $criteria->add(BarangPeer::ID, $this->id);
		if ($this->isColumnModified(BarangPeer::NAMA)) $criteria->add(BarangPeer::NAMA, $this->nama);
		if ($this->isColumnModified(BarangPeer::DESKRIPSI)) $criteria->add(BarangPeer::DESKRIPSI, $this->deskripsi);
		if ($this->isColumnModified(BarangPeer::STOK)) $criteria->add(BarangPeer::STOK, $this->stok);
		if ($this->isColumnModified(BarangPeer::HARGA_BELI)) $criteria->add(BarangPeer::HARGA_BELI, $this->harga_beli);
		if ($this->isColumnModified(BarangPeer::HARGA_JUAL)) $criteria->add(BarangPeer::HARGA_JUAL, $this->harga_jual);
		if ($this->isColumnModified(BarangPeer::STATUS)) $criteria->add(BarangPeer::STATUS, $this->status);
		if ($this->isColumnModified(BarangPeer::KATEGORI_ID)) $criteria->add(BarangPeer::KATEGORI_ID, $this->kategori_id);
		if ($this->isColumnModified(BarangPeer::NAMA_STRIP)) $criteria->add(BarangPeer::NAMA_STRIP, $this->nama_strip);
		if ($this->isColumnModified(BarangPeer::NAMAFILE)) $criteria->add(BarangPeer::NAMAFILE, $this->namafile);
		if ($this->isColumnModified(BarangPeer::CREATED_AT)) $criteria->add(BarangPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(BarangPeer::UPDATED_AT)) $criteria->add(BarangPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(BarangPeer::DATABASE_NAME);

		$criteria->add(BarangPeer::ID, $this->id);

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

		$copyObj->setDeskripsi($this->deskripsi);

		$copyObj->setStok($this->stok);

		$copyObj->setHargaBeli($this->harga_beli);

		$copyObj->setHargaJual($this->harga_jual);

		$copyObj->setStatus($this->status);

		$copyObj->setKategoriId($this->kategori_id);

		$copyObj->setNamaStrip($this->nama_strip);

		$copyObj->setNamafile($this->namafile);

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
			self::$peer = new BarangPeer();
		}
		return self::$peer;
	}

	
	public function setKategori($v)
	{


		if ($v === null) {
			$this->setKategoriId(NULL);
		} else {
			$this->setKategoriId($v->getId());
		}


		$this->aKategori = $v;
	}


	
	public function getKategori($con = null)
	{
		if ($this->aKategori === null && ($this->kategori_id !== null)) {
						include_once 'lib/model/om/BaseKategoriPeer.php';

			$this->aKategori = KategoriPeer::retrieveByPK($this->kategori_id, $con);

			
		}
		return $this->aKategori;
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

				$criteria->add(PembelianBarangPeer::ID_BARANG, $this->getId());

				PembelianBarangPeer::addSelectColumns($criteria);
				$this->collPembelianBarangs = PembelianBarangPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(PembelianBarangPeer::ID_BARANG, $this->getId());

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

		$criteria->add(PembelianBarangPeer::ID_BARANG, $this->getId());

		return PembelianBarangPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addPembelianBarang(PembelianBarang $l)
	{
		$this->collPembelianBarangs[] = $l;
		$l->setBarang($this);
	}


	
	public function getPembelianBarangsJoinPembelian($criteria = null, $con = null)
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

				$criteria->add(PembelianBarangPeer::ID_BARANG, $this->getId());

				$this->collPembelianBarangs = PembelianBarangPeer::doSelectJoinPembelian($criteria, $con);
			}
		} else {
									
			$criteria->add(PembelianBarangPeer::ID_BARANG, $this->getId());

			if (!isset($this->lastPembelianBarangCriteria) || !$this->lastPembelianBarangCriteria->equals($criteria)) {
				$this->collPembelianBarangs = PembelianBarangPeer::doSelectJoinPembelian($criteria, $con);
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

				$criteria->add(PenjualanBarangPeer::ID_BARANG, $this->getId());

				PenjualanBarangPeer::addSelectColumns($criteria);
				$this->collPenjualanBarangs = PenjualanBarangPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(PenjualanBarangPeer::ID_BARANG, $this->getId());

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

		$criteria->add(PenjualanBarangPeer::ID_BARANG, $this->getId());

		return PenjualanBarangPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addPenjualanBarang(PenjualanBarang $l)
	{
		$this->collPenjualanBarangs[] = $l;
		$l->setBarang($this);
	}


	
	public function getPenjualanBarangsJoinPembelian($criteria = null, $con = null)
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

				$criteria->add(PenjualanBarangPeer::ID_BARANG, $this->getId());

				$this->collPenjualanBarangs = PenjualanBarangPeer::doSelectJoinPembelian($criteria, $con);
			}
		} else {
									
			$criteria->add(PenjualanBarangPeer::ID_BARANG, $this->getId());

			if (!isset($this->lastPenjualanBarangCriteria) || !$this->lastPenjualanBarangCriteria->equals($criteria)) {
				$this->collPenjualanBarangs = PenjualanBarangPeer::doSelectJoinPembelian($criteria, $con);
			}
		}
		$this->lastPenjualanBarangCriteria = $criteria;

		return $this->collPenjualanBarangs;
	}

} 