<?php
require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../config/App.php';
require_once __DIR__.'/../helpers/Global.php';

$app = new \app\core\App(config());
$app->run();