<?php
/**

create table users(
id INT NOT NULL AUTO_INCREMENT,
name VARCHAR(100) NOT NULL,
age VARCHAR(40) NOT NULL,
PRIMARY KEY ( id )
);

INSERT INTO users
 (name,age)
 VALUES
 ("zhenzhen",18);

 *
 */


$user = 'homestead';
$pass = 'secret';


try {
    $dbh = new PDO('mysql:host=localhost;dbname=USER', $user, $pass);
    foreach($dbh->query('SELECT * from users') as $row) {
        var_dump($row);
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>