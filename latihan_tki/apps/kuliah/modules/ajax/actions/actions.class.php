<?php

/**
 * ajax actions.
 *
 * @package    latihan_tki
 * @subpackage ajax
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class ajaxActions extends sfActions {

    /**
     * Executes index action
     *
     */
    public function executeIndex() {
        $c=new Criteria();
        $c->addDescendingOrderByColumn(BarangPeer::UPDATED_AT);
        $this->barang=BarangPeer::doSelect($c);
    }

    public function executeAmbilData() {
        $this->setLayout(false);
        sfLoader::loadHelpers('Partial');

        $barang = BarangPeer::doSelect(new Criteria());
        return $this->renderText(get_partial('dataBarang', array('barangku' => $barang)));
    }

    public function executeSimpanBarang() {
        $this->setLayout(false);
        sfLoader::loadHelpers('Partial');
         $barang = new Barang();
      //   $barang = new Barang();
        if ($this->getRequest()->getMethod() == sfRequest::POST) {
            $data = $this->getRequestParameter('barangnya');

            
            $barang->setNama($data['nama']);
            $barang->setDeskripsi($data['deskripsi']);
            $barang->setStok($data['stok']);
            $barang->setHargaBeli($data['harga_beli']);
            $barang->setHargaJual($data['harga_jual']);
            $barang->save();


           
        }
        // $barang = BarangPeer::doSelect(new Criteria());
         return $this->renderText(get_partial('dataTersimpan', array('barangku' => $barang)));
    }

}

