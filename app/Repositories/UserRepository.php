<?php
/**
 * Created by PhpStorm.
 * User: xiaohai
 * Date: 17/7/17
 * Time: 下午2:34
 */

namespace App\Repositories;


use App\User;

class UserRepository
{
    public function byId($id){
        return User::find($id);
    }
}