<?php

namespace app\helpers;

class RequestType {

    public static function get() {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

}