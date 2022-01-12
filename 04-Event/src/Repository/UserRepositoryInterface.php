<?php

namespace App\Repository;

use App\User;

interface UserRepositoryInterface
{
    function find(int $id):?User;

    /**
     * @return iterable<User>
     */
    function all():iterable;
}