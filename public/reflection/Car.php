<?php
/**
 * Created by PhpStorm.
 * User: glb_gz
 * Date: 2018/11/13
 * Time: 10:16
 *
 * 用 ReflectionAble 实现 https://job.xiyanghui.com/job 中的第二题.
 */

include_once __DIR__.'/reflectionAble.php';

class Car{
    use reflectionAble;
    public $oil="3.5";
    protected $wheel="1.17m";
    private $high=3.222;

    public function getOil(){}
    protected function getWheel(){}
    private function getHigh(){}


}

$car = new Car();
var_dump($car->publics());
var_dump($car->pubMethods());