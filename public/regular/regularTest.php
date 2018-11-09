<?php
//header("content-type:text/plain;charset=utf-8");
//\\2是一个后向引用的示例. 这会告诉pcre它必须匹配正则表达式中第二个圆括号(这里是([\w]+))
//匹配到的结果. 这里使用两个反斜线是因为这里使用了双引号.
$html = "<b>bold text</b><a href=howdy.html>click me</a>";

preg_match_all("/(<([\w]+)[^>]*>)(.*?)(<\/\\2>)/", $html, $matches, PREG_SET_ORDER);
var_dump($matches);
foreach ($matches as $val) {
    echo "matched: " . $val[0] . "\n";
    echo "part 1: " . $val[1] . "\n";
    echo "part 2: " . $val[2] . "\n";
    echo "part 3: " . $val[3] . "\n";
    echo "part 4: " . $val[4] . "\n\n";
}





$str = <<<FOO
a: 1
b: 2
c: 3
FOO;

echo $str;
preg_match_all('/(?P<name>\w+): (?P<digit>\d+)/', $str, $matches);

/* 下面代码在php 5.2.2(pcre 7.0)或更高版本下工作, 不过, 为了向后兼容
 * 推荐使用上面的方式. */
// preg_match_all('/(?<name>\w+): (?<digit>\d+)/', $str, $matches);

var_dump($matches);



?>



