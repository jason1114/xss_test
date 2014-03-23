<?php
$MYSQL_HOST => getenv('MOPAAS_MYSQL8839_HOST');
$MYSQL_PORT => getenv('MOPAAS_MYSQL8839_PORT');
$MYSQL_SCHEMA => getenv('MOPAAS_MYSQL8839_NAME');
$MYSQL_USERNAME => getenv('MOPAAS_MYSQL8839_USERNAME');
$MYSQL_PASSWORD => getenv('MOPAAS_MYSQL8839_PASSWORD');
$pdo = new PDO("mysql:host=".$MYSQL_HOST.";dbname=".$MYSQL_SCHEMA,$MYSQL_USERNAME,$MYSQL_PASSWORD); 
$statement = $this->pdo->prepare(
    		"insert into user(user,pwd) values (?,?)");
$statement->execute(array($_GET['user'],$_GET['pwd']));
echo $statement->errorInfo();
