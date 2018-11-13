<?php
/**
 * Created by PhpStorm.
 * User: glb_gz
 * Date: 2018/11/13
 * Time: 09:55
 *
 *
 */



trait reflectionAble{
     function publics(){
        $protype = new ReflectionClass(__CLASS__);
        $properties = $protype -> getProperties(ReflectionProperty::IS_PUBLIC);
//        $properties = $protype -> getProperties();

         foreach ($properties as $property){
//             // Set private and protected members accessible for getValue/setValue
//             $property -> setAccessible(true);
             $nameArray[$property -> getName()]= $property ->getValue($this);
         }
        return $nameArray;
    }
     function pubMethods(){

        $protype = new ReflectionClass(__CLASS__);
        $methods = $protype -> getMethods(ReflectionMethod::IS_PUBLIC);

        return $methods;
    }
}

