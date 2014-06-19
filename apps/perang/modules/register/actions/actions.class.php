<?php

/**
 * register actions.
 *
 * @package    card
 * @subpackage register
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class registerActions extends sfActions {

    /**
     * Executes index action
     *
     */
    public function executeIndex() {
        
    }

    public function executeSignup() {
        if ($this->getRequest()->getMethod() == sfRequest::POST) {

            $data = $this->getRequestParameter('data');
            $error_gambar = $this->getRequest()->getFileError('file');
            $user = new User();
            
            $sf = new sfGuardUser();
            $sf->setUsername($data['username']);
            $sf->setPassword($data['password']);
            $sf->setIsActive(true);
            $sf->save();
            
            $user->setUsername($data['username']);
            $user->setPassword($data['password']);
            $user->setNama($data['nama']);
            $user->setPoint(0);
            $user->setStatus(0);
            $user->setGames(0);
            $user->setWin(0);
            $user->setLose(0);
            $user->setIdSf($sf->getId());
            
            if (!$error_gambar) {
                $nama_file = $this->getRequest()->getFilename('file');
                $this->getRequest()->moveFile('file', sfConfig::get('sf_upload_dir') . '/' . $nama_file);
                $user->setFile($nama_file);
            }

            $user->save();
            return $this->redirect('home');
        }
    }

}
