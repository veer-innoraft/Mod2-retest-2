<?php

use App\Classes\DbHelper;
require('../vendor/autoload.php');
$dbHelper = new DbHelper();

// If requested for delete post then call delete function from database
if (isset($_GET['deleteId'])) {
    $dbHelper->deleteScore($_GET['deleteId']);
    echo "inside delete score";
}

// If requested for add post then call add function from database
if (isset($_GET['addScore'])) {
    $strikeRate = $_REQUEST['runs'] / $_REQUEST['balls'];
    $dbHelper->addScore($_REQUEST['userId'], $_REQUEST['name'], $_REQUEST['runs'], $_REQUEST['balls'], $_REQUEST['strikeRate']);
}
?>