<?php

/****
 *  http://php.net/manual/zh/reflectionclass.getmethods.php#115197 中的例子
 * Class Apple
 */

final class Apple {
    public function publicMethod() { }
    public final function publicFinalMethod() { }
    protected final function protectedFinalMethod() { }
    private static function privateStaticMethod() { }
}

class MyReflection extends ReflectionClass {
    public function __construct($argument) {
        parent::__construct($argument);
    }

    /**
     * (non-PHPdoc)
     * @see ReflectionClass::getMethods()
     */
    public function getMethods($filter = null, $useAndOperator = true) {
        if ($useAndOperator !== true) {
            return parent::getMethods($filter);
        }

        $methods = parent::getMethods($filter);
        $results = array();

        foreach ($methods as $method) {
            if (($method->getModifiers() & $filter) === $filter) {
                $results[] = $method;
            }
        }

        return $results;
    }
}

$class = new MyReflection('Apple');
$methods = $class->getMethods(ReflectionMethod::IS_FINAL | ReflectionMethod::IS_PUBLIC);
var_dump($methods);

$methods = $class->getMethods(ReflectionMethod::IS_FINAL | ReflectionMethod::IS_PUBLIC, false);
var_dump($methods);
?>