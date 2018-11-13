<?php
/**
 * Created by PhpStorm.
 * User: glb_gz
 * Date: 2018/11/13
 * Time: 11:12
 *
 * 不用 ReflectionAble 去实现 https://job.xiyanghui.com/job 中的第二题.
 */

include_once __DIR__ . '/GetPubVarsAble.php';

class Food
{
    use GetPubVarsAble;
    public $hot = 1;
    protected $good = 2;
    private $cold = 3;

    /**
     * @PHPDoc
     * @return array
     * 取得全部的属性 name and values
     */
    public function getVars($vars = NULL)
    {
        $properties = get_class_vars(get_class($this));
//        var_dump(get_object_vars($this));
        foreach ($properties as $name => $defaultVal) {
            $vars[$name] = $defaultVal; // gets actual val.
        }

        return $vars;
    }

    /**
     * @return array
     * 取得全部的方法名
     */
    function getMethods()
    {
        return get_class_methods($this);

    }
    protected function getProtected(){}
    private function getPrivate()
    {
    }
}

$food = new Food();
//只取得 public 属性
var_dump(get_class_vars(get_class($food)));
var_dump($food->getVars());

//只取得 public 方法
var_dump(get_class_methods(get_class($food)));
var_dump($food->getMethods());

var_dump($food->publics());


