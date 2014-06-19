<?php

/**
 * pegawai actions.
 *
 * @package    latihan_tki
 * @subpackage pegawai
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class pegawaiActions extends sfActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
    $limit=10;
    $this->pegawai=  PegawaiPeer::getPegawai($limit);
    
  }
  public function executeDetail()
  {
      $id = $this->getRequestParameter('nama_strip');
        $this->tampil= PegawaiPeer::retrievenama($id);
//        print_r(BarangPeer::retrievenama($id));
//        exit();
  }
}
