<?php

/**
 * Subclass for performing query and update operations on the 'kategori' table.
 *
 * 
 *
 * @package lib.model
 */ 
class KategoriPeer extends BaseKategoriPeer
{
    public static function getKategori()
    {
        $c= new Criteria();
        return self::doselect($c);
    }
     public static function getKategorix($limit) {
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
    public static function getCombo()
    {
//        $kategorix=self::doSelect(new Criteria());
//        $arr_combo=array();
//        foreach ($kategorix as $kategori)
//        {
//            $arr_combo[$kategori->getId()]=$kategori->getNama();
//        }
//        return $arr_combo;
        //karena pakek punya simfony, returnya harus bentuk kategori objek
        $c=new Criteria();
        $c->addDescendingOrderByColumn(self::ID);
        return self::doSelect($c);
    }
}
