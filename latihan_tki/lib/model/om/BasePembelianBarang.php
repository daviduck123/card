<?php


abstract class BasePembelianBarang extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id_pembelian;


	
	protected $id_barang;


	
	protected $jumlah;


	
	protected $harga;


	
	protected $id;

	
	protected $aPembelian;

	
	protected $aBarang;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getIdPembelian()
	{

		return $this->id_pembelian;
	}

	
	public function getIdBarang()
	{

		return $this->id_barang;
	}

	
	public function getJumlah()
	{

		return $this->jumlah;
	}

	
	public function getHarga()
	{

		return $this->harga;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setIdPembelian($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_pembelian !== $v) {
			$this->id_pembelian = $v;
			$this->modifiedColumns[] = PembelianBarangPeer::ID_PEMBELIAN;
		}

		if ($this->aPembelian !== null && $this->aPembelian->getId() !== $v) {
			$this->aPembelian = null;
		}

	} 
	
	public function setIdBarang($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_barang !== $v) {
			$this->id_barang = $v;
			$this->modifiedColumns[] = PembelianBarangPeer::ID_BARANG;
		}

		if ($this->aBarang !== null && $this->aBarang->getId() !== $v) {
			$this->aBarang = null;
		}

	} 
	
	public function setJumlah($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->jumlah !== $v) {
			$this->jumlah = $v;
			$this->modifiedColumns[] = PembelianBarangPeer::JUMLAH;
		}

	} 
	
	public function setHarga($v)
	{

		if ($this->harga !== $v) {
			$this->harga = $v;
			$this->modifiedColumns[] = PembelianBarangPeer::HARGA;
		}

	} 
	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = PembelianBarangPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id_pembelian = $rs->getInt($startcol + 0);

			$this->id_barang = $rs->getInt($startcol + 1);

			$this->jumlah = $rs->getInt($startcol + 2);

			$this->harga = $rs->getFloat($startcol + 3);

			$this->id = $rs->getInt($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating PembelianBarang object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PembelianBarangPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			PembelianBarangPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(PembelianBarangPeer::DATABASE_NAME);
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


												
			if ($this->aPembelian !== null) {
				if ($this->aPembelian->isModified()) {
					$affectedRows += $this->aPembelian->save($con);
				}
				$this->setPembelian($this->aPembelian);
			}

			if ($this->aBarang !== null) {
				if ($this->aBarang->isModified()) {
					$affectedRows += $this->aBarang->save($con);
				}
				$this->setBarang($this->aBarang);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = PembelianBarangPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += PembelianBarangPeer::doUpdate($this, $con);
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


												
			if ($this->aPembelian !== null) {
				if (!$this->aPembelian->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aPembelian->getValidationFailures());
				}
			}

			if ($this->aBarang !== null) {
				if (!$this->aBarang->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aBarang->getValidationFailures());
				}
			}


			if (($retval = PembelianBarangPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PembelianBarangPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getIdPembelian();
				break;
			case 1:
				return $this->getIdBarang();
				break;
			case 2:
				return $this->getJumlah();
				break;
			case 3:
				return $this->getHarga();
				break;
			case 4:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PembelianBarangPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdPembelian(),
			$keys[1] => $this->getIdBarang(),
			$keys[2] => $this->getJumlah(),
			$keys[3] => $this->getHarga(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PembelianBarangPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setIdPembelian($value);
				break;
			case 1:
				$this->setIdBarang($value);
				break;
			case 2:
				$this->setJumlah($value);
				break;
			case 3:
				$this->setHarga($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PembelianBarangPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdPembelian($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdBarang($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setJumlah($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setHarga($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(PembelianBarangPeer::DATABASE_NAME);

		if ($this->isColumnModified(PembelianBarangPeer::ID_PEMBELIAN)) $criteria->add(PembelianBarangPeer::ID_PEMBELIAN, $this->id_pembelian);
		if ($this->isColumnModified(PembelianBarangPeer::ID_BARANG)) $criteria->add(PembelianBarangPeer::ID_BARANG, $this->id_barang);
		if ($this->isColumnModified(PembelianBarangPeer::JUMLAH)) $criteria->add(PembelianBarangPeer::JUMLAH, $this->jumlah);
		if ($this->isColumnModified(PembelianBarangPeer::HARGA)) $criteria->add(PembelianBarangPeer::HARGA, $this->harga);
		if ($this->isColumnModified(PembelianBarangPeer::ID)) $criteria->add(PembelianBarangPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(PembelianBarangPeer::DATABASE_NAME);

		$criteria->add(PembelianBarangPeer::ID, $this->id);

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

		$copyObj->setIdPembelian($this->id_pembelian);

		$copyObj->setIdBarang($this->id_barang);

		$copyObj->setJumlah($this->jumlah);

		$copyObj->setHarga($this->harga);


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
			self::$peer = new PembelianBarangPeer();
		}
		return self::$peer;
	}

	
	public function setPembelian($v)
	{


		if ($v === null) {
			$this->setIdPembelian(NULL);
		} else {
			$this->setIdPembelian($v->getId());
		}


		$this->aPembelian = $v;
	}


	
	public function getPembelian($con = null)
	{
		if ($this->aPembelian === null && ($this->id_pembelian !== null)) {
						include_once 'lib/model/om/BasePembelianPeer.php';

			$this->aPembelian = PembelianPeer::retrieveByPK($this->id_pembelian, $con);

			
		}
		return $this->aPembelian;
	}

	
	public function setBarang($v)
	{


		if ($v === null) {
			$this->setIdBarang(NULL);
		} else {
			$this->setIdBarang($v->getId());
		}


		$this->aBarang = $v;
	}


	
	public function getBarang($con = null)
	{
		if ($this->aBarang === null && ($this->id_barang !== null)) {
						include_once 'lib/model/om/BaseBarangPeer.php';

			$this->aBarang = BarangPeer::retrieveByPK($this->id_barang, $con);

			
		}
		return $this->aBarang;
	}

} 