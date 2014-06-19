<?php

/**
 * Subclass for performing query and update operations on the 'user' table.
 *
 * 
 *
 * @package lib.model
 */
class UserPeer extends BaseUserPeer {

    public static function getInfoUser($id) {
        $c = new Criteria();
        $c->add(self::ID_SF, $id);
        $tamp = self::doselect($c);
        return $tamp[0];
    }

}
