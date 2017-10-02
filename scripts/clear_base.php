<?php
/**
 * Created by PhpStorm.
 * User: eugene
 * Date: 02.10.17
 * Time: 9:44
 */
include "../app/config/local_conf.php";

$link = mysqli_connect(SQL_HOST, SQL_USER, SQL_PASSWORD);
if(!$link) {
    die("Could not connect: " . mysqli_error());
}

echo ("Connected successfully");

mysqli_select_db($link, SQL_BDD);

$sql = 'DELETE from url WHERE create_date < DATE_SUB(NOW(), INTERVAL 15 DAY)';


$result = mysqli_query($link, $sql);

if (!$result) {
    echo "DB Error, could not query the database\n";
    echo 'MySQL Error: ' . mysqli_error();
    exit;
}

mysqli_free_result($result);