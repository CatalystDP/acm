<?php
class Dirparse
{
    public static function returnDir($controller)
    {
        $reg = "/\_/";
        $result = array();
        preg_match_all($reg, $controller, $result);
        if (count($result) == 0)
            return $controller;
        else
            return str_replace("_", "/", $controller);
    }
}

?>