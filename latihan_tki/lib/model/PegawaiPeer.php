<?php

/**
 * Subclass for performing query and update operations on the 'pegawai' table.
 *
 * 
 *
 * @package lib.model
 */ 
class PegawaiPeer extends BasePegawaiPeer
{
    public static function getPegawai($limit)
    {
        $c=new Criteria();
        $c->addAscendingOrderByColumn(self::UPDATED_AT);
        $c->setLimit($limit);
        return self::doSelect($c);
    }
     public static function retrievenama($nama) {
        $c = new Criteria();
        $c->add(self::NAMA_STRIP,$nama);
       
        return self::doselect($c);
    }
}
