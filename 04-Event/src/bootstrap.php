<?php
require_once __DIR__ . '/../vendor/autoload.php';
use App\PDO\FactoryPDO;
use App\Migration;

$pdo = FactoryPDO::buildSqlite("sqlite:" . __DIR__ . "/../_data/database.db");
(new Migration())->setData($pdo);