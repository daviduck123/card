<?php

/**
 * home actions.
 *
 * @package    card
 * @subpackage home
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class homeActions extends sfActions {

    /**
     * Executes index action
     *
     */
    public function executeIndex() {
        //echo $this->getUser()->getsfGuard()->getId;
        //exit();

        $roomAktif = RoomPeer::ambilRoom();
        $this->room = $roomAktif;

        //$objectUser = UserPeer::getInfoUser($this->getUser()->getSfGuard()->getId());
        //asd
        //asd
    }

    public function executeTambahRoom() {

        if ($this->getRequest()->getMethod() == sfRequest::POST) {

            $data = $this->getRequestParameter('data');
            $room = new Room();
            $room->setNama($data);
            $room->setJumlah(0);
            $room->setMax(4);
            $room->setStatus(0);
            $room->save();
        }
        return $this->redirect('home');
    }

}
