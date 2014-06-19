<?php

/**
 * Subclass for representing a row from the 'kategori' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Kategori extends BaseKategori
{
    public function __toString() {
        return $this->getNama()." dan ".$this->getDeskripsi();
    }
    public function getStringCombo()
    {
        return '=='.$this->getNama().'==';
    }
    public function getJumlahBarang()
    {
        return count($this->getBarangs());
    }
    public function getTigaBarangTerbaru()
    {
        $c=new Criteria();
        $c->addDescendingOrderByColumn(BarangPeer::UPDATED_AT);
        $c->setLimit(3);
        return $this->getBarangs($c);
    }
}
