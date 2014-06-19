<?php

/**
 * Subclass for performing query and update operations on the 'room' table.
 *
 * 
 *
 * @package lib.model
 */ 
class RoomPeer extends BaseRoomPeer
{
       public static function ambilRoom()
    {
          //doni
        $c=new Criteria();
        $c->add(self::STATUS,'0');      
        return self::doSelect($c);
    }
}
