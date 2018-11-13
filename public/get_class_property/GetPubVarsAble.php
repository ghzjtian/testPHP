<?php
/**
 * Created by PhpStorm.
 * User: glb_gz
 * Date: 2018/11/13
 * Time: 11:38
 */
trait GetPubVarsAble{

    public function publics(){
        return get_class_vars(__CLASS__);
    }

}