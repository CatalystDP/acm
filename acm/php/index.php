<?php
include_once "config/path.config.php";
include_once "config/dirparse.config.php";
header(UTF8_HEADER);
$req = $_REQUEST;

$controller = $path["controller"] . "/" . (Dirparse::returnDir($req["c"])) . ".php";
$class = $req["cl"];
$func = $req["f"];
$arg = array_slice($req, 3);
if (file_exists($controller)) {
    include_once "$controller";
    if(isset($class)){
        $c=new $class();
        call_user_func_array(array($c,$func),$arg);
    }
}
else
    exit("当前控制器不存在");
?>