<?php
/**
 * pdo方式连接数据库类
 */
class pdodatabase{
    protected  $pdo;
    protected  $result;//用于存储返回的记录
    static private $instace;
    //protected  $isExec;//bool类型用于标识是否插入/删除
    static public function dateBase($type,$host,$user,$pwd,$db){
        if(!self::$instace)
            return self::$instace;
        self::$instace=new pdodatabase($type,$host,$user,$pwd,$db);
        return self::$instace;
    }
    private function __construct($type,$host,$user,$pwd,$db){
        $dsn="$type:host=$host;dbname=$db";
        $this->pdo=new PDO($dsn,$user,$pwd);

        $this->execSql_without_result('set names utf8');
    }
    public function changeDatabase($dbname){
        $this->pdo->exec("use $dbname");
    }

    public function execSql_with_result($sql){
        $this->result=$this->pdo->query($sql);
        $this->result->setFetchMode(PDO::FETCH_ASSOC);
    }
    public function execSql_without_result($sql){
        return $this->pdo->exec($sql);
    }
    public function lastId(){
        return $this->pdo->lastInsertId();
    }
    public function fetchSingleResult(){
        return $this->result->fetch();
    }
    public function fetchMultiResult(){
        return $this->result->fetchAll();
    }
    public function closeDatabase(){
        $this->pdo=null;
    }
}
?>