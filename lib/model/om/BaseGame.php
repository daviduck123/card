<?php


abstract class BaseGame extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nama;


	
	protected $status;


	
	protected $created_at;


	
	protected $updated_at;

	
	protected $collMejas;

	
	protected $lastMejaCriteria = null;

	
	protected $collUserGames;

	
	protected $lastUserGameCriteria = null;

	
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

	
	public function getStatus()
	{

		return $this->status;
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
			$this->modifiedColumns[] = GamePeer::ID;
		}

	} 
	
	public function setNama($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nama !== $v) {
			$this->nama = $v;
			$this->modifiedColumns[] = GamePeer::NAMA;
		}

	} 
	
	public function setStatus($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = GamePeer::STATUS;
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
			$this->modifiedColumns[] = GamePeer::CREATED_AT;
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
			$this->modifiedColumns[] = GamePeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->nama = $rs->getString($startcol + 1);

			$this->status = $rs->getInt($startcol + 2);

			$this->created_at = $rs->getTimestamp($startcol + 3, null);

			$this->updated_at = $rs->getTimestamp($startcol + 4, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Game object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(GamePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			GamePeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(GamePeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(GamePeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(GamePeer::DATABASE_NAME);
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
					$pk = GamePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += GamePeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collMejas !== null) {
				foreach($this->collMejas as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collUserGames !== null) {
				foreach($this->collUserGames as $referrerFK) {
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


			if (($retval = GamePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collMejas !== null) {
					foreach($this->collMejas as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collUserGames !== null) {
					foreach($this->collUserGames as $referrerFK) {
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
		$pos = GamePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getStatus();
				break;
			case 3:
				return $this->getCreatedAt();
				break;
			case 4:
				return $this->getUpdatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GamePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNama(),
			$keys[2] => $this->getStatus(),
			$keys[3] => $this->getCreatedAt(),
			$keys[4] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GamePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setStatus($value);
				break;
			case 3:
				$this->setCreatedAt($value);
				break;
			case 4:
				$this->setUpdatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GamePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNama($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setStatus($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCreatedAt($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setUpdatedAt($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(GamePeer::DATABASE_NAME);

		if ($this->isColumnModified(GamePeer::ID)) $criteria->add(GamePeer::ID, $this->id);
		if ($this->isColumnModified(GamePeer::NAMA)) $criteria->add(GamePeer::NAMA, $this->nama);
		if ($this->isColumnModified(GamePeer::STATUS)) $criteria->add(GamePeer::STATUS, $this->status);
		if ($this->isColumnModified(GamePeer::CREATED_AT)) $criteria->add(GamePeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(GamePeer::UPDATED_AT)) $criteria->add(GamePeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(GamePeer::DATABASE_NAME);

		$criteria->add(GamePeer::ID, $this->id);

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

		$copyObj->setStatus($this->status);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getMejas() as $relObj) {
				$copyObj->addMeja($relObj->copy($deepCopy));
			}

			foreach($this->getUserGames() as $relObj) {
				$copyObj->addUserGame($relObj->copy($deepCopy));
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
			self::$peer = new GamePeer();
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

				$criteria->add(MejaPeer::ID_GAME, $this->getId());

				MejaPeer::addSelectColumns($criteria);
				$this->collMejas = MejaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(MejaPeer::ID_GAME, $this->getId());

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

		$criteria->add(MejaPeer::ID_GAME, $this->getId());

		return MejaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addMeja(Meja $l)
	{
		$this->collMejas[] = $l;
		$l->setGame($this);
	}


	
	public function getMejasJoinKartu($criteria = null, $con = null)
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

				$criteria->add(MejaPeer::ID_GAME, $this->getId());

				$this->collMejas = MejaPeer::doSelectJoinKartu($criteria, $con);
			}
		} else {
									
			$criteria->add(MejaPeer::ID_GAME, $this->getId());

			if (!isset($this->lastMejaCriteria) || !$this->lastMejaCriteria->equals($criteria)) {
				$this->collMejas = MejaPeer::doSelectJoinKartu($criteria, $con);
			}
		}
		$this->lastMejaCriteria = $criteria;

		return $this->collMejas;
	}

	
	public function initUserGames()
	{
		if ($this->collUserGames === null) {
			$this->collUserGames = array();
		}
	}

	
	public function getUserGames($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseUserGamePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collUserGames === null) {
			if ($this->isNew()) {
			   $this->collUserGames = array();
			} else {

				$criteria->add(UserGamePeer::ID_GAME, $this->getId());

				UserGamePeer::addSelectColumns($criteria);
				$this->collUserGames = UserGamePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(UserGamePeer::ID_GAME, $this->getId());

				UserGamePeer::addSelectColumns($criteria);
				if (!isset($this->lastUserGameCriteria) || !$this->lastUserGameCriteria->equals($criteria)) {
					$this->collUserGames = UserGamePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastUserGameCriteria = $criteria;
		return $this->collUserGames;
	}

	
	public function countUserGames($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseUserGamePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(UserGamePeer::ID_GAME, $this->getId());

		return UserGamePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addUserGame(UserGame $l)
	{
		$this->collUserGames[] = $l;
		$l->setGame($this);
	}


	
	public function getUserGamesJoinUser($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseUserGamePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collUserGames === null) {
			if ($this->isNew()) {
				$this->collUserGames = array();
			} else {

				$criteria->add(UserGamePeer::ID_GAME, $this->getId());

				$this->collUserGames = UserGamePeer::doSelectJoinUser($criteria, $con);
			}
		} else {
									
			$criteria->add(UserGamePeer::ID_GAME, $this->getId());

			if (!isset($this->lastUserGameCriteria) || !$this->lastUserGameCriteria->equals($criteria)) {
				$this->collUserGames = UserGamePeer::doSelectJoinUser($criteria, $con);
			}
		}
		$this->lastUserGameCriteria = $criteria;

		return $this->collUserGames;
	}

} 