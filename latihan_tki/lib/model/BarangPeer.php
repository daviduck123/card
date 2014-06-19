<?php

/**
 * Subclass for performing query and update operations on the 'barang' table.
 *
 * 
 *
 * @package lib.model
 */
class BarangPeer extends BaseBarangPeer {

    public static function getBarang($limit) {
        $c = new Criteria();
        $c->addDescendingOrderByColumn(self::UPDATED_AT);
        $c->setLimit($limit);
        return self::doselect($c);
    }

    public static function retrievenama($nama) {
        $c = new Criteria();
        $c->add(self::NAMA_STRIP,$nama);
       
        return self::doselect($c);
    }
    public static function tesPanggilDataSession()
    {
        $user= sfContext::getInstance()->getUser();
        $datas= $user->getAttribute('halamanku','','sfGuardSecurityUser');
        return $datas;
    }

}
