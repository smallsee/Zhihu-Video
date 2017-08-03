<?php
namespace App\Repositories\Eloquent;
use App\Repositories\Eloquent\Repository;
use App\User;

class UserRepository extends Repository{

    function model()
    {
        // TODO: Implement model() method.
        return User::class;
    }


}