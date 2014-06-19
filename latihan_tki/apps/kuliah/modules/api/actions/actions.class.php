<?php

/**
 * api actions.
 *
 * @package    latihan_tki
 * @subpackage api
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class apiActions extends sfActions {

    /**
     * Executes index action
     *
     */
    public function executeServisSangatSederhana() {
        $this->setLayout(false);
        $this->getResponse()->setContentType('text/plain');
        $tipe=$this->getRequestParameter('tipe');
        $kunci=$this->getRequestParameter('kunci');
        $key=sfConfig::get('app_servis_key');
        $key_lengkap=sha1($key.$tipe);
        
        if($kunci!=$key_lengkap)
        {
            return $this->renderText('HOI SP KAU');
        }
        if($tipe=='c')
        {
            $jumlah=  BarangPeer::doCount(new Criteria());
        }
        else
        {
            
        $jumlah = KategoriPeer::doCount(new Criteria());
        }
        return $this->renderText($jumlah);
    }
    public function executeServisLumayanSederhana()
    {
        $this ->setLayout(false);
        $this ->getResponse()->setContentType('text/pdf');
        $kategori_id= $this->getRequestParameter('kategori_id');
        $namaBaru=sha1($kategori_id);
        
        $this->getResponse()->setHttpHeader('Content-Disposition','inline;filename='.$namaBaru.'.pdf');
        $c= new Criteria();
        $c->add(BarangPeer::KATEGORI_ID,$kategori_id);
        $this->barangs=  BarangPeer::doSelect($c);
    }

}
