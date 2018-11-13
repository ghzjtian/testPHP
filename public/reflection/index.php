<?php
/**
 * Created by PhpStorm.
 * User: glb_gz
 * Date: 2018/10/26
 * Time: 下午2:14
 */


require '../trait/Animal.php';


echo "<hr/>获取 Animal 类的指定属性:<br/>";
// Person 在beans.php文件中声明
$protype = new ReflectionClass("Animal");
// 可以添加一个参数，来进行过滤操作。如只获取public类型的属性
$properties = $protype->getProperties(ReflectionProperty::IS_PUBLIC|ReflectionProperty::IS_PROTECTED);

// 反射获取到类的属性信息
foreach ($properties as $property) {
    echo $property."<br />";
}

echo "<hr/>获取 Animal 类的所有方法(包括 trait 的方法):<br/>";
$methods = $protype -> getMethods();
foreach($methods as $method){
    echo $method->getName()."<br />";
}