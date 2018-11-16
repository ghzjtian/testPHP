<?php
/**
 * 本文参考:[PHP7 MongDB 安装与使用](http://www.runoob.com/mongodb/php7-mongdb-tutorial.html)
 */
require '../../vendor/autoload.php'; // include Composer's autoloader

//$client = new MongoDB\Client("mongodb://localhost:27017");
//$collection = $client->demo->beers;
//
//$result = $collection->insertOne( [ 'name' => 'Hinterland', 'brewery' => 'BrewDog' ] );
//
//echo "Inserted with Object ID '{$result->getInsertedId()}'";




$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

//Insert
echo "<hr>Insert:";
$bulk = new MongoDB\Driver\BulkWrite;
$bulk->insert(['x' => 1,'y' => 1]);
$bulk->insert(['x' => 2,'y' => 2]);
$bulk->insert(['x' => 3,'y' => 3]);
//Update
echo "<hr/>Update:";
$bulk ->update(
    ['x' => 3],
    ['$set' => ['y' => 555]],
    ['multi' => false ,'upsert' => false]
);
$manager->executeBulkWrite('db.collection4', $bulk);

//Query
echo "<hr>Query:";
$filter = ['x' => ['$gt' => 1]];
$options = [
    'projection' => ['_id' => 0],
    'sort' => ['x' => 1],
];
$query = new MongoDB\Driver\Query($filter, $options);
$cursor = $manager->executeQuery('db.collection4', $query);
foreach ($cursor as $document) {
    var_dump($document);
}

////Delete
//echo "<hr>Delete:";
////$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
//$bulk = new MongoDB\Driver\BulkWrite;
//$bulk->delete(['x' => 2], ['limit' => 1]);
//$result = $manager->executeBulkWrite('db.collection4', $bulk);

//Query
echo "<hr>Query:";
$filter = ['x' => ['$gt' => 1]];
$options = [
    'projection' => ['_id' => 0],
    'sort' => ['x' => 1],
];
$query = new MongoDB\Driver\Query($filter, $options);
$cursor = $manager->executeQuery('db.collection4', $query);
foreach ($cursor as $document) {
    var_dump($document);
}


//Delete
echo "<hr>Delete:";
//$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
$bulk = new MongoDB\Driver\BulkWrite;
$bulk->delete(['x' => 3], ['limit' => 2]);
$result = $manager->executeBulkWrite('db.collection4', $bulk);

//Query
echo "<hr>Query:";
$filter = ['x' => ['$gt' => 1]];
$options = [
    'projection' => ['_id' => 0],
    'sort' => ['x' => 1],
];
$query = new MongoDB\Driver\Query($filter, $options);
$cursor = $manager->executeQuery('db.collection4', $query);
foreach ($cursor as $document) {
    var_dump($document);
}

?>