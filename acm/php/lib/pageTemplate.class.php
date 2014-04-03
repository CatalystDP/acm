<?php
/**
 * Created by PhpStorm.
 * User: dp
 * Date: 13-12-10
 * Time: 上午9:59
 */
class pageTemplate
{
    private static function render($content,$key_value){
        /*
         * @param string $content 字符串内容
         * @param array $key_value 变量键值对
         * @return string*/
        $page_content = $content;
        $regex = '/\{\%\=([\w]+)\%\}/i';
        $matches = array();
        preg_match_all($regex, $page_content, $matches);
        $argList = array();
        if(!$content)
            return false;
        if($matches==0)
            return $content;
        foreach ($matches[1] as $var) {
            $argList["{%=$var%}"] = '';
            if (isset($key_value[$var])) {
                $argList["{%=$var%}"] = $key_value[$var];
            }
        }
        return str_replace(array_keys($argList), array_values($argList),
            $content);
    }
    public static function renderPage($page, $key_value)
    {
        /*
         * @param string $page html页面路径
         * @param array $key_value html变量
         * @return string 渲染后字符*/
       return self::render(file_get_contents($page),$key_value);
    }
    public static function renderStr($content,$key_value){
        /*
         * @param string $content 字符串中包含变量
         * @param array $key_value 变量
         * @return string 渲染后字符*/
        return self::render($content,$key_value);
    }
}

?>