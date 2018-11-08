<?php
/**
 * Created by PhpStorm.
 * User: glb_gz
 * Date: 2018/11/8
 * Time: 20:29
 * 在一串字符串中匹配对应的中国 11 位手机号
 *
 * 参考1: PHP提取字符串中的手机号:https://www.jianshu.com/p/0566fc93cd4a
 * 参考2: PHP正则表达式:https://www.jianshu.com/p/6b7526fcd93d
 */


/**
在字符串Tom and Jerry chased each other in the house until tom’s uncel come in中
元字符“^”或“\A” 置于字符串的开始确保模式匹配出现在字符串首端；
/^Tom/
元字符“$”或“\Z” 置于字符串的结束，确保模式匹配出现字符串尾端。
/in$/
如果不加边界限制元字符，将获得更多的匹配结果。
/^Tom$/精确匹配     /Tom/模糊匹配
 *
 *
 */
//测试 $ 的作用
$testDollar = "11aabc";
var_dump("testDollar:".preg_match("/\d{2}$/",$testDollar));



function findPhoneNumbers($oldStr = "")
{
    //检测字符串是否位空
    $oldStr = trim($oldStr);
    $numbers = array();
    if(empty($oldStr)){
        return $numbers;
    }

    //在首尾插入一些 字母，使得首尾的 phone number  能被检测出来.
    $oldStr = substr_replace($oldStr,"abc",0,0);
    $oldStr = substr_replace($oldStr,"abc",strlen($oldStr),0);

//// 删除 空格
//$strArr = explode(" ",$testString);
//$newStr = $strArr[0];
//for($i=1;$i<count($strArr);$i++){
//    //如果 $newStr 后半部分为 两位的数字 ， $strArr[$i] 前半部分为 11 位的数字，就合并
//    if(preg_match("/\d{2}$/",$newStr) && preg_match("/^\d{11}/",$strArr[$i])){
//        $newStr .= $strArr[$i];
//    }else{
//        $newStr .= "-".$strArr[$i];
//    }
//}
//var_dump($oldStr);
//当不需要存储匹配结果时使用非存储模式单元“（？：）”
    $reg = '/\D(?:86)?(\d{11})\D/is';
    preg_match_all($reg, $oldStr, $result);
//    var_dump($result);
    /**
     * 输出
     * array (size=2)
     * 0 =>
     * array (size=3)
     * 0 => string '+8613812345671,' (length=15)
     * 1 => string '-13812345672a' (length=13)
     * 2 => string 'b8613812345673s' (length=15)
     * 1 =>
     * array (size=3)
     * 0 => string '13812345671' (length=11)
     * 1 => string '13812345672' (length=11)
     * 2 => string '13812345673' (length=11)
     *
     */

    return $result[1];
}

//只匹配中国境内的 11 位手机号.
$newStr = "13812345670abc86 abcd+86 13812345671,sfdj+86-13812345672asfswuefb8613812345673sdfhi1381234567874728434ndfsjsadfo13812345675";

var_dump(findPhoneNumbers($newStr));