<?php
/**
 * class Utility
 */

namespace Cat;

class Utility {
    public $currentDateTime;

    public function __construct() {
        //do nothing
    }

    public function getDateTime() {
        $timeRightNow = date('Y-m-d h:i:s');

        $this->currentDateTime = $timeRightNow;

        return $timeRightNow;
    }
}