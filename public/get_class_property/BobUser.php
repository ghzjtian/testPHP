<?php
/**
 * Created by PhpStorm.
 * User: glb_gz
 * Date: 2018/11/13
 * Time: 14:16
 *
 * [参考:  Get Only Public Class Properties for the Current Class in PHP](http://vancelucas.com/blog/get-only-public-class-properties-for-the-current-class-in-php/)
 *
 *不用 反射 Reflection 去获得 public 的属性.
 *
*/


trait GetPubPropertyAble{
    public function publics(){
        $getPubs = create_function('$obj','return get_object_vars($obj);');
        return $getPubs($this);
    }
}

class BobUser {
    use GetPubPropertyAble;
    public $name = 'bob';
    public $publicFlag = true;
    protected $internalFlag = true;
    private $privateProperty = true;
    public function getFields()
    {
//        $getFields = call_user_func('get_object_vars',$this);
        $getFields = create_function('$obj', 'return get_object_vars($obj);');
//        $getFields = function($obj){return get_object_vars($obj);};
//        $getFields = function($obj){return get_class_vars(__CLASS__);};
        return $getFields($this); // Returns only 'name' and 'publicFlag'
    }
}

$bob = new BobUser();
var_dump($bob->getFields());
var_dump($bob->publics());