<?php
/**
 * Created by PhpStorm.
 * User: glb_gz
 * Date: 2018/11/16
 * Time: 17:47
 */



$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

//Insert
//echo "<hr>Insert:";
//$bulk = new MongoDB\Driver\BulkWrite;
//$bulk->insert(['name' => 'tian','age' => 18]);
//$bulk->insert(['name' => 'kingmax','age' => 19]);
//$bulk->insert(['name' => 'soul','age' => 20]);
//$bulk->insert(['name' => 'MJ','age' => 21]);
//$bulk->insert(['name' => 'zhenzhen','age' => 17]);
//$bulk->insert(['name' => 'Michal','age' => 22]);
//$manager->executeBulkWrite('db.user2', $bulk);

//Query
echo "<hr>Query:";
//greater than
//$filter = ['x' => ['$gt' => 1]];
$filter = [];
$options = [
    'sort' => ['name' => 1],
];
$query = new MongoDB\Driver\Query($filter, $options);
$cursor = $manager->executeQuery('db.user2', $query);
foreach ($cursor as $document) {
    print_r("<br/>");
    print_r($document);
}