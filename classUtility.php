<?php
/**
 * class Utility
 */

namespace Cat;

class Utility {
    public $currentDateTime;

    public function __construct()
    {
        //do nothing
    }

    public static function getDateTime()
    {
        $timeRightNow = date('Y-m-d h:i:s');

        return $timeRightNow;
    }
}