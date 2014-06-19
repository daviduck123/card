<?php

/**
 * list actions.
 *
 * @package    latihan_tki
 * @subpackage list
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class listActions extends sfActions {

    /**
     * Executes index action
     *
     */
    public function executeIndex() {
        $this->getUser()->setHalamanDikunjungi($this->getActionName());
        $limit = 10;
        
       // $this->barang = BarangPeer::getBarang($limit);
        $this->kategori = KategoriPeer::getKategorix($limit);
       
        
        //pager
        $pager= new sfPropelPager('Barang',sfConfig::get('app_pager_homepage_max'));
        $c=new Criteria();
        $c->addDescendingOrderByColumn(BarangPeer::UPDATED_AT);
        $pager->setCriteria($c);
        $pager->setPage($this->getRequestParameter('halaman',1));
        $pager->init();
        
        $this->barang=$pager;
        //kemudian ubah di app.yml dan aktifkan nyo...
        
    }

    public function executeDetail() {
         $this->getUser()->setHalamanDikunjungi($this->getActionName());
          $this->data_sessions= BarangPeer::tesPanggilDataSession();
        $id = $this->getRequestParameter('nama_strip');
        $this->tampil = BarangPeer::retrievenama($id);
//        print_r(BarangPeer::retrievenama($id));
//        exit();
    }

    public function executeDetailKategori() {
         $this->getUser()->setHalamanDikunjungi($this->getActionName());
        $id = $this->getRequestParameter('nama_strip');
        $this->tampil = KategoriPeer::retrievenama($id);
//        print_r(BarangPeer::retrievenama($id));
//        exit();
    }

    public function executeSetStrip() {
         $this->getUser()->setHalamanDikunjungi($this->getActionName());
        $id = $this->getRequestParameter('id');
        $barang = BarangPeer::getDetail($id);
        $barang->setNamaStrip(myTools::stripText($barang->getNama()));
        $barang->save();
        return $this->redirect('list');
    }

    public function executeBuat() {
         $this->getUser()->setHalamanDikunjungi($this->getActionName());
        //$this->kategoriKombo = KategoriPeer::getCombo();
        if(!$this->getUser()->isBuat())
        {
         die('anda tidak boleh kesini');   
        }
        $id = $this->getRequestParameter('id');
        if ($id) {
            $this->barang = BarangPeer::retrieveByPK($id);
        } else {
            $this->barang = new Barang();
        }
    }

    public function executeSimpan() {
         $this->getUser()->setHalamanDikunjungi($this->getActionName());
        if ($this->getRequest()->getMethod() == sfRequest::POST) {

//          $nama=$this->getRequestParameter('nama');
//          $deskripsi=$this->getRequestParameter('deskripsi');
//          $stok= $this->getRequestParameter('stok');
//          $harga_beli= $this->getRequestParameter('harga_beli');
//          $harga_jual= $this->getRequestParameter('harga_jual');
//          $status= $this->getRequestParameter('status');
//          $kategori= $this->getRequestParameter('kategori');
            $data = $this->getRequestParameter('barangnya');
            //print_r($nama.'--'.$deskripsi.'--'.$stok.'--'.$harga_beli.'--'.$harga_jual.'--'.$status.'--'.$kategori.'--');
            // print_r($data);
            //
        
       //   $nama_file = $this->getRequest()->getFilename('gambar');
            $error_gambar = $this->getRequest()->getFileError('gambar');

            //  print_r($error_gambar);exit();

            if ($data['id']) {
                $barang = BarangPeer::retrieveByPK($data['id']);
            } else {
                $barang = new Barang();
            }
            $barang->setNama($data['nama']);
            $barang->setDeskripsi($data['deskripsi']);
            $barang->setStok($data['stok']);
            $barang->setHargaBeli($data['harga_beli']);
            $barang->setHargaJual($data['harga_jual']);
            $barang->setStatus($data['status'] == null ? 0 : 1);
            $barang->setKategoriId($data['kategori']);
            
            //$barang->fromArray($data,  BasePeer::TYPE_FIELDNAME);
            if (!$error_gambar) {
                if ($data['id'] && $barang->getNamafile()) {
                    unlink(sfConfig::get('sf_upload_dir') . '/' . $barang->getNamafile());
                }
                $nama_file = $this->getRequest()->getFilename('gambar');
                $this->getRequest()->moveFile('gambar', sfConfig::get('sf_upload_dir') . '/' . $nama_file);
                $barang->setNamafile($nama_file);
            }
            $barang->save();
            return $this->redirect('list');
        }
    }
    public function handleErrorSimpan()
    {
         $this->getUser()->setHalamanDikunjungi($this->getActionName());
         $this->forward('list','buat');
    }

    public function executeHapus() {
         $this->getUser()->setHalamanDikunjungi($this->getActionName());
        $barangx = BarangPeer::retrieveByPK($this->getRequestParameter('id'));
        $barangx->delete();
        return $this->redirect('list');
    }

    public function executeUbahStatus() {
         $this->getUser()->setHalamanDikunjungi($this->getActionName());
        $this->setLayout(false);
        sfLoader::loadHelpers('Partial');
        $barangx = BarangPeer::retrieveByPK($this->getRequestParameter('id'));
        $statusny=$barangx->getStatus();
        if($statusny==0)
        {
            $barangx->setStatus('1');
        }
        else{
            $barangx->setStatus('0');
        }
        $barangx->save();
        // $barang = BarangPeer::doSelect(new Criteria());
         return $this->renderText($barangx->getStatusString());
    }
    

}
