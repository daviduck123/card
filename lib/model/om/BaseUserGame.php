<?php


abstract class BaseUserGame extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id_user;


	
	protected $id_game;


	
	protected $hp;


	
	protected $point;


	
	protected $urutan;


	
	protected $element;


	
	protected $status;


	
	protected $id;

	
	protected $aUser;

	
	protected $aGame;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getIdUser()
	{

		return $this->id_user;
	}

	
	public function getIdGame()
	{

		return $this->id_game;
	}

	
	public function getHp()
	{

		return $this->hp;
	}

	
	public function getPoint()
	{

		return $this->point;
	}

	
	public function getUrutan()
	{

		return $this->urutan;
	}

	
	public function getElement()
	{

		return $this->element;
	}

	
	public function getStatus()
	{

		return $this->status;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setIdUser($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_user !== $v) {
			$this->id_user = $v;
			$this->modifiedColumns[] = UserGamePeer::ID_USER;
		}

		if ($this->aUser !== null && $this->aUser->getId() !== $v) {
			$this->aUser = null;
		}

	} 
	
	public function setIdGame($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_game !== $v) {
			$this->id_game = $v;
			$this->modifiedColumns[] = UserGamePeer::ID_GAME;
		}

		if ($this->aGame !== null && $this->aGame->getId() !== $v) {
			$this->aGame = null;
		}

	} 
	
	public function setHp($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->hp !== $v) {
			$this->hp = $v;
			$this->modifiedColumns[] = UserGamePeer::HP;
		}

	} 
	
	public function setPoint($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->point !== $v) {
			$this->point = $v;
			$this->modifiedColumns[] = UserGamePeer::POINT;
		}

	} 
	
	public function setUrutan($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->urutan !== $v) {
			$this->urutan = $v;
			$this->modifiedColumns[] = UserGamePeer::URUTAN;
		}

	} 
	
	public function setElement($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->element !== $v) {
			$this->element = $v;
			$this->modifiedColumns[] = UserGamePeer::ELEMENT;
		}

	} 
	
	public function setStatus($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = UserGamePeer::STATUS;
		}

	} 
	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = UserGamePeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id_user = $rs->getInt($startcol + 0);

			$this->id_game = $rs->getInt($startcol + 1);

			$this->hp = $rs->getInt($startcol + 2);

			$this->point = $rs->getInt($startcol + 3);

			$this->urutan = $rs->getInt($startcol + 4);

			$this->element = $rs->getInt($startcol + 5);

			$this->status = $rs->getInt($startcol + 6);

			$this->id = $rs->getInt($startcol + 7);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating UserGame object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(UserGamePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			UserGamePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(UserGamePeer::DATABASE_NAME);
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


												
			if ($this->aUser !== null) {
				if ($this->aUser->isModified()) {
					$affectedRows += $this->aUser->save($con);
				}
				$this->setUser($this->aUser);
			}

			if ($this->aGame !== null) {
				if ($this->aGame->isModified()) {
					$affectedRows += $this->aGame->save($con);
				}
				$this->setGame($this->aGame);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = UserGamePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += UserGamePeer::doUpdate($this, $con);
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


												
			if ($this->aUser !== null) {
				if (!$this->aUser->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aUser->getValidationFailures());
				}
			}

			if ($this->aGame !== null) {
				if (!$this->aGame->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aGame->getValidationFailures());
				}
			}


			if (($retval = UserGamePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = UserGamePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getIdUser();
				break;
			case 1:
				return $this->getIdGame();
				break;
			case 2:
				return $this->getHp();
				break;
			case 3:
				return $this->getPoint();
				break;
			case 4:
				return $this->getUrutan();
				break;
			case 5:
				return $this->getElement();
				break;
			case 6:
				return $this->getStatus();
				break;
			case 7:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = UserGamePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdUser(),
			$keys[1] => $this->getIdGame(),
			$keys[2] => $this->getHp(),
			$keys[3] => $this->getPoint(),
			$keys[4] => $this->getUrutan(),
			$keys[5] => $this->getElement(),
			$keys[6] => $this->getStatus(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = UserGamePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setIdUser($value);
				break;
			case 1:
				$this->setIdGame($value);
				break;
			case 2:
				$this->setHp($value);
				break;
			case 3:
				$this->setPoint($value);
				break;
			case 4:
				$this->setUrutan($value);
				break;
			case 5:
				$this->setElement($value);
				break;
			case 6:
				$this->setStatus($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = UserGamePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdUser($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdGame($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setHp($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPoint($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setUrutan($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setElement($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setStatus($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(UserGamePeer::DATABASE_NAME);

		if ($this->isColumnModified(UserGamePeer::ID_USER)) $criteria->add(UserGamePeer::ID_USER, $this->id_user);
		if ($this->isColumnModified(UserGamePeer::ID_GAME)) $criteria->add(UserGamePeer::ID_GAME, $this->id_game);
		if ($this->isColumnModified(UserGamePeer::HP)) $criteria->add(UserGamePeer::HP, $this->hp);
		if ($this->isColumnModified(UserGamePeer::POINT)) $criteria->add(UserGamePeer::POINT, $this->point);
		if ($this->isColumnModified(UserGamePeer::URUTAN)) $criteria->add(UserGamePeer::URUTAN, $this->urutan);
		if ($this->isColumnModified(UserGamePeer::ELEMENT)) $criteria->add(UserGamePeer::ELEMENT, $this->element);
		if ($this->isColumnModified(UserGamePeer::STATUS)) $criteria->add(UserGamePeer::STATUS, $this->status);
		if ($this->isColumnModified(UserGamePeer::ID)) $criteria->add(UserGamePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(UserGamePeer::DATABASE_NAME);

		$criteria->add(UserGamePeer::ID, $this->id);

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

		$copyObj->setIdUser($this->id_user);

		$copyObj->setIdGame($this->id_game);

		$copyObj->setHp($this->hp);

		$copyObj->setPoint($this->point);

		$copyObj->setUrutan($this->urutan);

		$copyObj->setElement($this->element);

		$copyObj->setStatus($this->status);


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
			self::$peer = new UserGamePeer();
		}
		return self::$peer;
	}

	
	public function setUser($v)
	{


		if ($v === null) {
			$this->setIdUser(NULL);
		} else {
			$this->setIdUser($v->getId());
		}


		$this->aUser = $v;
	}


	
	public function getUser($con = null)
	{
		if ($this->aUser === null && ($this->id_user !== null)) {
						include_once 'lib/model/om/BaseUserPeer.php';

			$this->aUser = UserPeer::retrieveByPK($this->id_user, $con);

			
		}
		return $this->aUser;
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

} 