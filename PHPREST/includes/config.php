<?php
$db_user='tigerot';
$db_password='123456';
$db_name='phprest';
$db=new PDO('mysql:host=localhost;dbname='.$db_name.';charset=utf8',$db_user,$db_password);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
$db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY,true);
$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

define('APP_NAME','PHP REST API TUTORIAL');

?>