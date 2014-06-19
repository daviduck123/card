<?php

class myUser extends sfGuardSecurityUser
{
    public function isBuat()
    {
        return $this ->hasCredential('ubah');
    }
    public function setHalamanDikunjungi($halamanku)
    {
        $ada= array();
        $ada= $this->getAttribute('halamanku','','sfGuardSecurityUser');
        $ada[]=$halamanku;
        $this->setAttribute('halamanku', $ada,'sfGuardSecurityUser');
    }
}
