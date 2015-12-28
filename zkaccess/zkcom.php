<?php

use App\Connected;

/**
 * test
 */
class zkcom
{

    private $zkcom;
    private $connected_device;

    public function __construct()
    {

        $this->zkcom = new COM("zkemkeeper.ZKEM");
        $this->connected_device = Connected::find(1);

    }

    public function init()
    {
        if ($this->zkcom->Connect_Net($this->connected_device['ip_address'], 4370)) {
            echo "connected";
        }
        $ip_addr = "ip:";
        $mac = "mac:";

        $this->zkcom->ACUnlock(1, 2000);
        $this->zkcom->GetDeviceIP(1, $ip_addr);
        $this->zkcom->GetDeviceMAC(1, $mac);

        echo $ip_addr . " " . $mac;

        dd($this->zkcom);
    }
}
