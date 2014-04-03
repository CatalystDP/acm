<?php
    include_once "core/absView.class.php";
class IndexView extends absView{
    public function __construct($var_arr){
        parent::__construct($var_arr);
    }
    protected  function render(){
       //var_dump($this->v_a);
        echo $this->v_a[0];
    }
}
?>