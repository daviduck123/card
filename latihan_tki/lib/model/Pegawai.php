<?php

/**
 * Subclass for representing a row from the 'pegawai' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Pegawai extends BasePegawai
{
    public function getStatusString()
    {
        return $this->getIsAktif() ? 'Aktif':'Tidak Aktif';
    }
}
