<?php
include_once "lib/pageTemplate.class.php";
include_once "config/path.config.php";
header(UTF8_HEADER);
abstract class absView
{
    protected $v_a;

    public function __construct($var_arr)
    {
        /*
         * @param array 变量键值对*/
        $this->v_a = $var_arr;
        $this->render();
    }
    abstract protected function render();
}

?>