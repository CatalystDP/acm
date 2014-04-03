<?php
include_once "config/path.config.php";
final class LoadView{
        private $v;
        public function view($viewPath,$viewClass,$viewArg){
            /*
             *@param string $viewPath view路径
             *@param string $viewClass view类名
             *@param array $viewArg 传递给view的变量
             *@return bool view是否载入成功*/
            if(func_num_args()==0)
                return false;
            if(include_once("view/".$viewPath.".php"))
                $this->v=new $viewClass($viewArg);
            else
                self::load_404();
            //echo "view".include_once("view/".$viewPath.".php");
        }
        public static function load_404(){
            include_once "view/404/page_404.html";
        }
    }
?>