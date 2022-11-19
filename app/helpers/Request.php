<?php

namespace app\helpers;

class Request
{


    public static function input(string $param)
    {
        if (isset($_POST[$param])) {
            return $_POST[$param];
        }
    }

    public static function all()
    {
        return $_POST;
    }
}
