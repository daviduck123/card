<?php

/**
 * Subclass for representing a row from the 'barang' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Barang extends BaseBarang
{
    public function getStatusString()
    {
        return $this->getStatus() ? 'Aktif':'Tidak Aktif';
    }
    public function setNama($v)
	{
        parent::setNama($v);
        $this->setNamaStrip(myTools::stripText($v));
	} 
        
}
