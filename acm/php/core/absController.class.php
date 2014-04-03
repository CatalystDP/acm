<?php
include_once "core/loadView.class.php";
include_once "config/path.config.php";
header(UTF8_HEADER);
    abstract class absController{
        protected $load;
        public function __construct(){
            $this->load=new LoadView();
        }
        public function __call($name,$arguments){
            LoadView::load_404();
        }
    }
?>