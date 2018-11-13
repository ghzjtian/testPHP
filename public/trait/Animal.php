<?php
/**
 * Created by PhpStorm.
 * User: glb_gz
 * Date: 2018/11/9
 * Time: 16:17
 */

trait AnimalRunable{
    public function run(){
        echo "I can run.";
    }
}

class Animal{
    use AnimalRunable;
//    use reflectionAble;
    private $high;
    protected $length;
    public $age;

    public function getName(){
        echo "Animal Name.";
    }

}

//$animal = new Animal();
//var_dump($animal ->publics());
//$animal -> getName();
//$animal->run();