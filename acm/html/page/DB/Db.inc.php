<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14-3-23
 * Time: 下午1:21
 */
    class ConnDB
    {
        public $dbtype;
        public $host;
        public $user;
        public $pwd;
        public $dbname;
        public $conn;
        function ConnDB($dbtype,$host,$user,$pwd,$dbname)
        {
            $this->dbtype=$dbtype;
            $this->host=$host;
            $this->user=$user;
            $this->pwd=$pwd;
            $this->dbname=$dbname;
        }
        function GetConnid()
        {
            $this->conn=mysql_connect($this->host,$this->user,$this->pwd) or die("数据库连接错误".mysql_error());
            mysql_select_db($this->dbname,$this->conn) or die("数据库连接错误".mysql_error());
            mysql_query("set names utf8");
            return $this->conn;

        }
        function CloseConnid()
        {
            mysql_close($this->conn);
        }
    }
    class AdminDB{
        public $arrays;
        function ExecSQL($sqlstr,$conn)
        {
            $sqltype=strtolower(substr(trim($sqlstr),0,6));
            $rs=mysql_query($sqlstr);
            $this->arrays=array();
            if($sqltype=="select")
            {
                if(is_resource($rs))
                {
                     while($res=mysql_fetch_array($rs))
                     {
                        array_push($this->arrays,$res);
                     }
                     if(count($this->arrays)==0||$rs==false)
                     {
                        return false;
                     }
                    else
                    {
                        return $this->arrays;
                    }
                }
            }
            elseif($sqltype=="update"||$sqltype=="insert"||$sqltype=="delete")
            {
                if($rs)
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
        }
    }
    class SepPage
    {
        public $rs;
        public $nowpage;
        public $pagesize;
        public $array;
        public $conn;
        public $sqlstr;
        public $total;
        public $pagecount;
        function ShowDate($sqlstr,$conn,$pagesize,$nowpage)
        {
            $arrays=array();
            $array_title=array();
            $array_content=array();
            if(!sset($nowpage)||$nowpage==""||$nowpage==0)
            {
                $this->nowpage=1;
            }
            else
            {
                $this->nowpage=$nowpage;
            }
            $this->pagesize=$pagesize;
            $this->conn=$conn;
            $this->sqlstr=$sqlstr;
            $this->pagecount=0;
            $this->total=0;
            $this->rs=mysql_query($this->sqlstr."limit ".$this->pagesize*($this->nowpage-1).", $this->pagesize",$this->conn);
            $this->total=mysql_num_rows($this->rs);
            if($this->total==0)
            {
                return false;
            }
            else
            {
                if(($this->total % $this->pagesize)==0)
                {
                    $this->pagecount=intval($this->total/$this->pagesize);
                }
                else if($this->total<=$this->pagesize)
                {
                    $this->pagecount=1;
                }
                else
                {
                    $this->pagecount=ceil($this->total/$this->pagesize);
                }
                //行行获取
                while($this->array=mysql_fetch_array($this->rs))
                {
                    //行数决定从这里修改
                    array_push($array_title,$this->array[title]);
                    array_push($array_content,$this->array[content]);
                }
                array_push($arrays,$array_title,$array_content);
                return $arrays;
            }

        }
    }
?>