<?php
namespace App\View;
class View
{
    function get($data)
    {
        $skips = ['[',':','{','}','"',']',',','\/'];
        $replace = ['','=','-----------------------------------','','','','','/'];
        $format = str_replace($skips, $replace, $data);
         print_r($format);
    }
}
