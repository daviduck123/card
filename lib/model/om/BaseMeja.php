<?php


abstract class BaseMeja extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $baris;


	
	protected $kolom;


	
	protected $status;


	
	protected $id_game;


	
	protected $id_skill;


	
	protected $created_at;


	
	protected $updated_at;

	
	protected $aGame;

	
	protected $aKartu;

	
	protected $collKartuMejas;

	
	protected $lastKartuMejaCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getBaris()
	{

		return $this->baris;
	}

	
	public function getKolom()
	{

		return $this->kolom;
	}

	
	public function getStatus()
	{

		return $this->status;
	}

	
	public function getIdGame()
	{

		return $this->id_game;
	}

	
	public function getIdSkill()
	{

		return $this->id_skill;
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
			$this->modifiedColumns[] = MejaPeer::ID;
		}

	} 
	
	public function setBaris($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->baris !== $v) {
			$this->baris = $v;
			$this->modifiedColumns[] = MejaPeer::BARIS;
		}

	} 
	
	public function setKolom($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->kolom !== $v) {
			$this->kolom = $v;
			$this->modifiedColumns[] = MejaPeer::KOLOM;
		}

	} 
	
	public function setStatus($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = MejaPeer::STATUS;
		}

	} 
	
	public function setIdGame($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_game !== $v) {
			$this->id_game = $v;
			$this->modifiedColumns[] = MejaPeer::ID_GAME;
		}

		if ($this->aGame !== null && $this->aGame->getId() !== $v) {
			$this->aGame = null;
		}

	} 
	
	public function setIdSkill($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_skill !== $v) {
			$this->id_skill = $v;
			$this->modifiedColumns[] = MejaPeer::ID_SKILL;
		}

		if ($this->aKartu !== null && $this->aKartu->getId() !== $v) {
			$this->aKartu = null;
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
			$this->modifiedColumns[] = MejaPeer::CREATED_AT;
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
			$this->modifiedColumns[] = MejaPeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->baris = $rs->getInt($startcol + 1);

			$this->kolom = $rs->getInt($startcol + 2);

			$this->status = $rs->getInt($startcol + 3);

			$this->id_game = $rs->getInt($startcol + 4);

			$this->id_skill = $rs->getInt($startcol + 5);

			$this->created_at = $rs->getTimestamp($startcol + 6, null);

			$this->updated_at = $rs->getTimestamp($startcol + 7, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Meja object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MejaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MejaPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(MejaPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(MejaPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MejaPeer::DATABASE_NAME);
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


												
			if ($this->aGame !== null) {
				if ($this->aGame->isModified()) {
					$affectedRows += $this->aGame->save($con);
				}
				$this->setGame($this->aGame);
			}

			if ($this->aKartu !== null) {
				if ($this->aKartu->isModified()) {
					$affectedRows += $this->aKartu->save($con);
				}
				$this->setKartu($this->aKartu);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = MejaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += MejaPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

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


												
			if ($this->aGame !== null) {
				if (!$this->aGame->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aGame->getValidationFailures());
				}
			}

			if ($this->aKartu !== null) {
				if (!$this->aKartu->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aKartu->getValidationFailures());
				}
			}


			if (($retval = MejaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
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
		$pos = MejaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getBaris();
				break;
			case 2:
				return $this->getKolom();
				break;
			case 3:
				return $this->getStatus();
				break;
			case 4:
				return $this->getIdGame();
				break;
			case 5:
				return $this->getIdSkill();
				break;
			case 6:
				return $this->getCreatedAt();
				break;
			case 7:
				return $this->getUpdatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MejaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getBaris(),
			$keys[2] => $this->getKolom(),
			$keys[3] => $this->getStatus(),
			$keys[4] => $this->getIdGame(),
			$keys[5] => $this->getIdSkill(),
			$keys[6] => $this->getCreatedAt(),
			$keys[7] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MejaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setBaris($value);
				break;
			case 2:
				$this->setKolom($value);
				break;
			case 3:
				$this->setStatus($value);
				break;
			case 4:
				$this->setIdGame($value);
				break;
			case 5:
				$this->setIdSkill($value);
				break;
			case 6:
				$this->setCreatedAt($value);
				break;
			case 7:
				$this->setUpdatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MejaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setBaris($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setKolom($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setStatus($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setIdGame($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setIdSkill($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCreatedAt($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setUpdatedAt($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MejaPeer::DATABASE_NAME);

		if ($this->isColumnModified(MejaPeer::ID)) $criteria->add(MejaPeer::ID, $this->id);
		if ($this->isColumnModified(MejaPeer::BARIS)) $criteria->add(MejaPeer::BARIS, $this->baris);
		if ($this->isColumnModified(MejaPeer::KOLOM)) $criteria->add(MejaPeer::KOLOM, $this->kolom);
		if ($this->isColumnModified(MejaPeer::STATUS)) $criteria->add(MejaPeer::STATUS, $this->status);
		if ($this->isColumnModified(MejaPeer::ID_GAME)) $criteria->add(MejaPeer::ID_GAME, $this->id_game);
		if ($this->isColumnModified(MejaPeer::ID_SKILL)) $criteria->add(MejaPeer::ID_SKILL, $this->id_skill);
		if ($this->isColumnModified(MejaPeer::CREATED_AT)) $criteria->add(MejaPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(MejaPeer::UPDATED_AT)) $criteria->add(MejaPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MejaPeer::DATABASE_NAME);

		$criteria->add(MejaPeer::ID, $this->id);

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

		$copyObj->setBaris($this->baris);

		$copyObj->setKolom($this->kolom);

		$copyObj->setStatus($this->status);

		$copyObj->setIdGame($this->id_game);

		$copyObj->setIdSkill($this->id_skill);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

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
			self::$peer = new MejaPeer();
		}
		return self::$peer;
	}

	
	public function setGame($v)
	{


		if ($v === null) {
			$this->setIdGame(NULL);
		} else {
			$this->setIdGame($v->getId());
		}


		$this->aGame = $v;
	}


	
	public function getGame($con = null)
	{
		if ($this->aGame === null && ($this->id_game !== null)) {
						include_once 'lib/model/om/BaseGamePeer.php';

			$this->aGame = GamePeer::retrieveByPK($this->id_game, $con);

			
		}
		return $this->aGame;
	}

	
	public function setKartu($v)
	{


		if ($v === null) {
			$this->setIdSkill(NULL);
		} else {
			$this->setIdSkill($v->getId());
		}


		$this->aKartu = $v;
	}


	
	public function getKartu($con = null)
	{
		if ($this->aKartu === null && ($this->id_skill !== null)) {
						include_once 'lib/model/om/BaseKartuPeer.php';

			$this->aKartu = KartuPeer::retrieveByPK($this->id_skill, $con);

			
		}
		return $this->aKartu;
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

				$criteria->add(KartuMejaPeer::ID_MEJA, $this->getId());

				KartuMejaPeer::addSelectColumns($criteria);
				$this->collKartuMejas = KartuMejaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(KartuMejaPeer::ID_MEJA, $this->getId());

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

		$criteria->add(KartuMejaPeer::ID_MEJA, $this->getId());

		return KartuMejaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addKartuMeja(KartuMeja $l)
	{
		$this->collKartuMejas[] = $l;
		$l->setMeja($this);
	}


	
	public function getKartuMejasJoinKartu($criteria = null, $con = null)
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

				$criteria->add(KartuMejaPeer::ID_MEJA, $this->getId());

				$this->collKartuMejas = KartuMejaPeer::doSelectJoinKartu($criteria, $con);
			}
		} else {
									
			$criteria->add(KartuMejaPeer::ID_MEJA, $this->getId());

			if (!isset($this->lastKartuMejaCriteria) || !$this->lastKartuMejaCriteria->equals($criteria)) {
				$this->collKartuMejas = KartuMejaPeer::doSelectJoinKartu($criteria, $con);
			}
		}
		$this->lastKartuMejaCriteria = $criteria;

		return $this->collKartuMejas;
	}

} 