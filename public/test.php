<?php
//header("content-type:text/plain;charset=utf-8");
/**
 * Created by PhpStorm.
 * User: glb_gz
 * Date: 2018/10/26
 * Time: 下午1:51
 *
 * // 测试 https://www.jianshu.com/p/6b7526fcd93d?utm_campaign=maleskine&utm_content=note&utm_medium=seo_notes&utm_source=recommendation 后的题目

 * Have a try
1．编写一个有效手机号码的正则表达式。
 * (+086 )13812345678
2．定义一个有效的时间正则表达式。
3．编写一个函数，使用正则替换方式能够实现清除字符串中的所有HTML标签。
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

//只匹配中国境内的 11 位手机号.
$testString = "abc86 abcd+86 13812345671,sfdj+86-13812345672asfswuefb8613812345673sdfhi13812345678747284";

// 删除 空格
$strArr = explode(" ",$testString);
$newStr = $strArr[0];
for($i=1;$i<count($strArr);$i++){
    //如果 $newStr 后半部分为 两位的数字 ， $strArr[$i] 前半部分为 11 位的数字，就合并
    if(preg_match("/\d{2}$/",$newStr) && preg_match("/^\d{11}/",$strArr[$i])){
        $newStr .= $strArr[$i];
    }else{
        $newStr .= "-".$strArr[$i];
    }
}

//当不需要存储匹配结果时使用非存储模式单元“（？：）”
$reg='/\D(?:86)?(\d{11})\D/is';
preg_match_all($reg,$newStr,$result);
var_dump($result);
/**
 * 输出
array (size=2)
0 =>
array (size=3)
0 => string '+8613812345671,' (length=15)
1 => string '-13812345672a' (length=13)
2 => string 'b8613812345673s' (length=15)
1 =>
array (size=3)
0 => string '13812345671' (length=11)
1 => string '13812345672' (length=11)
2 => string '13812345673' (length=11)
 *
 */
