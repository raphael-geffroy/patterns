<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\EventManager;
use App\PDO\FactoryPDO;
use App\Repository\PDOUserRepository;
use App\User;

$pdo = FactoryPDO::buildSqlite("sqlite:" . __DIR__ . "/../_data/database.db");
$repository = new PDOUserRepository($pdo);

EventManager::attach(
    'user_connection',
    function ($args) use ($repository) {
        $repository->incrementHistoryCount(
            $repository->find($args['id'])
        );
    });

$user = $repository->find(1);
connectUser($user);
var_dump($repository->find(1));

function connectUser(User $user){
    $user->isConnected = true;
    EventManager::trigger('user_connection', ['id'=>$user->getId()]);
}
