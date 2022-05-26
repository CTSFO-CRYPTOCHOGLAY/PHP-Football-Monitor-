<?php
require_once('modles/UpdatingTable.php');
require_once('modles/News.php');
$view = new stdClass();
$Table = new UpdatingTable();
$News = new UpdatingTable();
$view->Table = $Table->getTable();
$view->News = $News->getNews();
$view->pageTitle = 'Brother Football League'; // title

if(isset($_POST['ZTS'])) {
    $Table->ZTSFCWins();
    header("Refresh:0");
}

if(isset($_POST['MAC'])) {
    $Table->MACFCWins();
    header("Refresh:0");
}

if(isset($_POST['MAC'])) {
    $Table->MACFCWins();
    header("Refresh:0");
}

if(isset($_POST['Commenting'])) {
    $News->Commentary($_POST[htmlentities('dataEntry')]);
    header("Refresh:0");
}

require('views/index.phtml'); //requiring the view