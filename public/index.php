<?php
/**
 * Created by PhpStorm.
 * User: glb_gz
 * Date: 2018/10/26
 * Time: 下午2:14
 */
echo "hello , Index .php,Good Afternoon.";

$str1 = "ABC$200.49UWNS$1,999.00$99oin50.00美元";

echo "<hr>";

$p = "|<[^>]+>(.*?)</[^>]+>|i";
$str = "<b>example: </b><div align=left>this is a test</div>";
preg_match_all($p, $str, $matches);
print_r($matches);

echo "<hr>";

$p = '/[\w\.\-]+@[a-z0-9\-]+\.(com|cn)/';
$str = "我的邮箱是Spark.eric@imooc.com";
preg_match($p, $str, $match);
echo $match[0];

echo "<hr>";

$p = "/<tr><td>(.*?)<\/td>\s*<td>(.*?)<\/td>\s*<\/tr>/i";
$str = "<table> <tr><td>Eric</td><td>25</td></tr> <tr><td>John</td><td>26</td></tr> </table>";
preg_match_all($p, $str, $matches);
print_r($matches);

echo "<hr>";

$p = "/BC<tr>.*<\/tr>/i";
$str = "ABC<tr>DEFG</tr>HIJKLMN";
preg_match($p,$str,$matches);
print_r($matches);