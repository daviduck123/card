<?php


abstract class BaseUser extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $username;


	
	protected $password;


	
	protected $nama;


	
	protected $file;


	
	protected $status;


	
	protected $games;


	
	protected $win;


	
	protected $lose;


	
	protected $point;


	
	protected $id_room;


	
	protected $id_sf;


	
	protected $created_at;


	
	protected $updated_at;

	
	protected $aRoom;

	
	protected $collUserGames;

	
	protected $lastUserGameCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getUsername()
	{

		return $this->username;
	}

	
	public function getPassword()
	{

		return $this->password;
	}

	
	public function getNama()
	{

		return $this->nama;
	}

	
	public function getFile()
	{

		return $this->file;
	}

	
	public function getStatus()
	{

		return $this->status;
	}

	
	public function getGames()
	{

		return $this->games;
	}

	
	public function getWin()
	{

		return $this->win;
	}

	
	public function getLose()
	{

		return $this->lose;
	}

	
	public function getPoint()
	{

		return $this->point;
	}

	
	public function getIdRoom()
	{

		return $this->id_room;
	}

	
	public function getIdSf()
	{

		return $this->id_sf;
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
			$this->modifiedColumns[] = UserPeer::ID;
		}

	} 
	
	public function setUsername($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->username !== $v) {
			$this->username = $v;
			$this->modifiedColumns[] = UserPeer::USERNAME;
		}

	} 
	
	public function setPassword($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->password !== $v) {
			$this->password = $v;
			$this->modifiedColumns[] = UserPeer::PASSWORD;
		}

	} 
	
	public function setNama($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nama !== $v) {
			$this->nama = $v;
			$this->modifiedColumns[] = UserPeer::NAMA;
		}

	} 
	
	public function setFile($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->file !== $v) {
			$this->file = $v;
			$this->modifiedColumns[] = UserPeer::FILE;
		}

	} 
	
	public function setStatus($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = UserPeer::STATUS;
		}

	} 
	
	public function setGames($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->games !== $v) {
			$this->games = $v;
			$this->modifiedColumns[] = UserPeer::GAMES;
		}

	} 
	
	public function setWin($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->win !== $v) {
			$this->win = $v;
			$this->modifiedColumns[] = UserPeer::WIN;
		}

	} 
	
	public function setLose($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->lose !== $v) {
			$this->lose = $v;
			$this->modifiedColumns[] = UserPeer::LOSE;
		}

	} 
	
	public function setPoint($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->point !== $v) {
			$this->point = $v;
			$this->modifiedColumns[] = UserPeer::POINT;
		}

	} 
	
	public function setIdRoom($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_room !== $v) {
			$this->id_room = $v;
			$this->modifiedColumns[] = UserPeer::ID_ROOM;
		}

		if ($this->aRoom !== null && $this->aRoom->getId() !== $v) {
			$this->aRoom = null;
		}

	} 
	
	public function setIdSf($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_sf !== $v) {
			$this->id_sf = $v;
			$this->modifiedColumns[] = UserPeer::ID_SF;
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
			$this->modifiedColumns[] = UserPeer::CREATED_AT;
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
			$this->modifiedColumns[] = UserPeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->username = $rs->getString($startcol + 1);

			$this->password = $rs->getString($startcol + 2);

			$this->nama = $rs->getString($startcol + 3);

			$this->file = $rs->getString($startcol + 4);

			$this->status = $rs->getInt($startcol + 5);

			$this->games = $rs->getInt($startcol + 6);

			$this->win = $rs->getInt($startcol + 7);

			$this->lose = $rs->getInt($startcol + 8);

			$this->point = $rs->getInt($startcol + 9);

			$this->id_room = $rs->getInt($startcol + 10);

			$this->id_sf = $rs->getInt($startcol + 11);

			$this->created_at = $rs->getTimestamp($startcol + 12, null);

			$this->updated_at = $rs->getTimestamp($startcol + 13, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 14; 
		} catch (Exception $e) {
			throw new PropelException("Error populating User object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(UserPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			UserPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(UserPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(UserPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(UserPeer::DATABASE_NAME);
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


												
			if ($this->aRoom !== null) {
				if ($this->aRoom->isModified()) {
					$affectedRows += $this->aRoom->save($con);
				}
				$this->setRoom($this->aRoom);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = UserPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += UserPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

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


												
			if ($this->aRoom !== null) {
				if (!$this->aRoom->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aRoom->getValidationFailures());
				}
			}


			if (($retval = UserPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
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
		$pos = UserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getUsername();
				break;
			case 2:
				return $this->getPassword();
				break;
			case 3:
				return $this->getNama();
				break;
			case 4:
				return $this->getFile();
				break;
			case 5:
				return $this->getStatus();
				break;
			case 6:
				return $this->getGames();
				break;
			case 7:
				return $this->getWin();
				break;
			case 8:
				return $this->getLose();
				break;
			case 9:
				return $this->getPoint();
				break;
			case 10:
				return $this->getIdRoom();
				break;
			case 11:
				return $this->getIdSf();
				break;
			case 12:
				return $this->getCreatedAt();
				break;
			case 13:
				return $this->getUpdatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = UserPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getUsername(),
			$keys[2] => $this->getPassword(),
			$keys[3] => $this->getNama(),
			$keys[4] => $this->getFile(),
			$keys[5] => $this->getStatus(),
			$keys[6] => $this->getGames(),
			$keys[7] => $this->getWin(),
			$keys[8] => $this->getLose(),
			$keys[9] => $this->getPoint(),
			$keys[10] => $this->getIdRoom(),
			$keys[11] => $this->getIdSf(),
			$keys[12] => $this->getCreatedAt(),
			$keys[13] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = UserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setUsername($value);
				break;
			case 2:
				$this->setPassword($value);
				break;
			case 3:
				$this->setNama($value);
				break;
			case 4:
				$this->setFile($value);
				break;
			case 5:
				$this->setStatus($value);
				break;
			case 6:
				$this->setGames($value);
				break;
			case 7:
				$this->setWin($value);
				break;
			case 8:
				$this->setLose($value);
				break;
			case 9:
				$this->setPoint($value);
				break;
			case 10:
				$this->setIdRoom($value);
				break;
			case 11:
				$this->setIdSf($value);
				break;
			case 12:
				$this->setCreatedAt($value);
				break;
			case 13:
				$this->setUpdatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = UserPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUsername($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPassword($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNama($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFile($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setStatus($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setGames($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setWin($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setLose($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setPoint($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setIdRoom($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setIdSf($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCreatedAt($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setUpdatedAt($arr[$keys[13]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(UserPeer::DATABASE_NAME);

		if ($this->isColumnModified(UserPeer::ID)) $criteria->add(UserPeer::ID, $this->id);
		if ($this->isColumnModified(UserPeer::USERNAME)) $criteria->add(UserPeer::USERNAME, $this->username);
		if ($this->isColumnModified(UserPeer::PASSWORD)) $criteria->add(UserPeer::PASSWORD, $this->password);
		if ($this->isColumnModified(UserPeer::NAMA)) $criteria->add(UserPeer::NAMA, $this->nama);
		if ($this->isColumnModified(UserPeer::FILE)) $criteria->add(UserPeer::FILE, $this->file);
		if ($this->isColumnModified(UserPeer::STATUS)) $criteria->add(UserPeer::STATUS, $this->status);
		if ($this->isColumnModified(UserPeer::GAMES)) $criteria->add(UserPeer::GAMES, $this->games);
		if ($this->isColumnModified(UserPeer::WIN)) $criteria->add(UserPeer::WIN, $this->win);
		if ($this->isColumnModified(UserPeer::LOSE)) $criteria->add(UserPeer::LOSE, $this->lose);
		if ($this->isColumnModified(UserPeer::POINT)) $criteria->add(UserPeer::POINT, $this->point);
		if ($this->isColumnModified(UserPeer::ID_ROOM)) $criteria->add(UserPeer::ID_ROOM, $this->id_room);
		if ($this->isColumnModified(UserPeer::ID_SF)) $criteria->add(UserPeer::ID_SF, $this->id_sf);
		if ($this->isColumnModified(UserPeer::CREATED_AT)) $criteria->add(UserPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(UserPeer::UPDATED_AT)) $criteria->add(UserPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(UserPeer::DATABASE_NAME);

		$criteria->add(UserPeer::ID, $this->id);

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

		$copyObj->setUsername($this->username);

		$copyObj->setPassword($this->password);

		$copyObj->setNama($this->nama);

		$copyObj->setFile($this->file);

		$copyObj->setStatus($this->status);

		$copyObj->setGames($this->games);

		$copyObj->setWin($this->win);

		$copyObj->setLose($this->lose);

		$copyObj->setPoint($this->point);

		$copyObj->setIdRoom($this->id_room);

		$copyObj->setIdSf($this->id_sf);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

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
			self::$peer = new UserPeer();
		}
		return self::$peer;
	}

	
	public function setRoom($v)
	{


		if ($v === null) {
			$this->setIdRoom(NULL);
		} else {
			$this->setIdRoom($v->getId());
		}


		$this->aRoom = $v;
	}


	
	public function getRoom($con = null)
	{
		if ($this->aRoom === null && ($this->id_room !== null)) {
						include_once 'lib/model/om/BaseRoomPeer.php';

			$this->aRoom = RoomPeer::retrieveByPK($this->id_room, $con);

			
		}
		return $this->aRoom;
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

				$criteria->add(UserGamePeer::ID_USER, $this->getId());

				UserGamePeer::addSelectColumns($criteria);
				$this->collUserGames = UserGamePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(UserGamePeer::ID_USER, $this->getId());

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

		$criteria->add(UserGamePeer::ID_USER, $this->getId());

		return UserGamePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addUserGame(UserGame $l)
	{
		$this->collUserGames[] = $l;
		$l->setUser($this);
	}


	
	public function getUserGamesJoinGame($criteria = null, $con = null)
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

				$criteria->add(UserGamePeer::ID_USER, $this->getId());

				$this->collUserGames = UserGamePeer::doSelectJoinGame($criteria, $con);
			}
		} else {
									
			$criteria->add(UserGamePeer::ID_USER, $this->getId());

			if (!isset($this->lastUserGameCriteria) || !$this->lastUserGameCriteria->equals($criteria)) {
				$this->collUserGames = UserGamePeer::doSelectJoinGame($criteria, $con);
			}
		}
		$this->lastUserGameCriteria = $criteria;

		return $this->collUserGames;
	}

} 