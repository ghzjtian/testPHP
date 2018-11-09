<?php
/**
 * Created by PhpStorm.
 * User: glb_gz
 * Date: 2018/11/9
 * Time: 11:33
 */


$original_string = 'abc$200.49dfhsj$1,999.00sbeuinf$99sfueng24,250.00美元';
echo $original_string;

//匹配含有 $ 部分
//$reg = '/\$\d+([,\.]\d+)*/i';
//匹配含有 美元 部分
//$reg = '/\d+([,\.]\d+)美元/i';
//匹配全部: $ 和 美元 部分
//$reg = '/\$\d+([,\.]\d+)*|\d+([,\.]\d+)*美元/u';
$reg = '/\$[\d,\.]*|[\d,\.]*美元/';
//$reg = '/(\d+([,\.]\d+)*)|\\1美元/i';




preg_match_all($reg,$original_string,$matches);

var_dump($matches);
