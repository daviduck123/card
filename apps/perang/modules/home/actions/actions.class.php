<?php

/**
 * home actions.
 *
 * @package    card
 * @subpackage home
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class homeActions extends sfActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
      $roomAktif=  RoomPeer::ambilRoom();
      $this->room=$roomAktif;
      //asd
      
  }
}
